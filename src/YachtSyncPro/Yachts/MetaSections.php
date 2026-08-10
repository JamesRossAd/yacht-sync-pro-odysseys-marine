<?php
	#[AllowDynamicProperties]
	class YachtSyncPro_Yachts_MetaSections {

		public function __construct() {
			
		}

		public function add_actions_and_filters() {

			add_action( 'add_meta_boxes', [ $this, 'yachts_meta_boxes' ]);
			add_action( 'save_post_ysp_yacht', [$this, 'ysp_yacht_data_save']);

		}

		public function yachts_meta_boxes() { 
			add_meta_box(
				'ysp_yacht_sync_meta_box',
				'Yacht Info',
				[ $this, 'yacht_meta_box_html' ],
				['ysp_yacht']
			);									
		}

		public function yacht_meta_box_html($post) {
			include YSP_TEMPLATES_DIR.'/admin-metabox-yacht-basics.php';		
		}

		public function ysp_yacht_data_save($post_id) {
			if ( isset($_POST['is_yacht_manual_entry']) && $_POST['is_yacht_manual_entry'] == 'yes') {
	            $fields = [
				    'YSP_BeamFeet',
				    'YSP_BeamMeter',
					'YSP_Beam_Feet_Measurement',
				    'YSP_BrokerName',
				    'YSP_City',
				    'YSP_CountryID',
					'YSP_Country',
					'YSP_Full_Country',
				    'YSP_State',
					'COUNTRY_WEIGHT',
				    'YSP_EngineCount',
					'NumberOfEngines',
				    'YSP_EngineFuel',
				    'YSP_EngineHours',
				    'YSP_EngineModel',
				    'YSP_EnginePower',
				    'YSP_EngineType',
				    'NormPrice',
					'Price',
					'YSP_USDVal',
				    'YSP_EuroVal',
					'YSP_AUDVal',
				    'YSP_Length',
				    'NominalLength',
				    'YSP_LOAFeet',
				    'YSP_LOAMeter',
				    'YSP_ListingDate',
				    'MakeString',
				    'Model',
				    'ModelYear',
					'BuilderName',
					'DesignerName',
					'StockNumber',
					'CabinsCountNumeric',
					'CruisingSpeedMeasure',
					'MaximumSpeedMeasure',
					'RangeMeasure',
					'DryWeightMeasure',
					'BridgeClearanceMeasure',
					'DriveTypeCode',
					'MaxDraft',
					'YSP_Max_Draft_Feet_Measurement',
				    'SalesStatus',
					'SaleClassCode',
				    'BoatCategoryCode',
				    //'BoatClassCode',
				    'HasHullID',
				    'BoatHullID',
				    'BoatHullMaterialCode',
				    'BoatName',
				    'CompanyBoat',
				    'CompanyName',
				    'DocumentID',
				    //'GeneralBoatDescription',
				    //'AdditionalDetailDescription',
				    'HeadsCountNumeric',
				    'FuelTankCapacityMeasure',
				    'FuelTankCountNumeric',
				    'FuelTankMaterialCode',
				    'HoldingTankCapacityMeasure',
				    'HoldingTankCountNumeric',
				    'HoldingTankMaterialCode',
				    'WaterTankCapacityMeasure',
				    'WaterTankCountNumeric',
				    'WaterTankMaterialCode',
				    'TotalEngineHoursNumberic',
				    'TotalEnginePowerQuantity',
				    'CompanyWeight',
				    'MakeWeight',
					'SalesStatusWeight'
				];

				// Keep NominalLength and YSP_Length in sync for search/display.
				$nominal = isset($_POST['NominalLength']) ? trim((string) $_POST['NominalLength']) : '';
				$length = isset($_POST['YSP_Length']) ? trim((string) $_POST['YSP_Length']) : '';
				$loa_feet = isset($_POST['YSP_LOAFeet']) ? trim((string) $_POST['YSP_LOAFeet']) : '';

				if ($nominal === '' && $length !== '') {
					$_POST['NominalLength'] = $length;
					$nominal = $length;
				} elseif ($nominal === '' && $loa_feet !== '') {
					$_POST['NominalLength'] = $loa_feet;
					$nominal = $loa_feet;
				}

				if ($length === '' && $nominal !== '') {
					$_POST['YSP_Length'] = is_numeric($nominal) ? (string) (int) $nominal : $nominal;
				}

				// Sync display helpers the front-end expects.
				if ( empty( $_POST['YSP_Country'] ) && ! empty( $_POST['YSP_CountryID'] ) ) {
					$_POST['YSP_Country'] = sanitize_text_field( wp_unslash( $_POST['YSP_CountryID'] ) );
				}

				if ( empty( $_POST['YSP_Beam_Feet_Measurement'] ) && isset( $_POST['YSP_BeamFeet'] ) && $_POST['YSP_BeamFeet'] !== '' ) {
					$_POST['YSP_Beam_Feet_Measurement'] = sanitize_text_field( wp_unslash( $_POST['YSP_BeamFeet'] ) );
				}

				if ( empty( $_POST['NumberOfEngines'] ) && ! empty( $_POST['YSP_EngineCount'] ) ) {
					$_POST['NumberOfEngines'] = sanitize_text_field( wp_unslash( $_POST['YSP_EngineCount'] ) );
				}

				if ( empty( $_POST['YSP_Max_Draft_Feet_Measurement'] ) && ! empty( $_POST['MaxDraft'] ) && is_numeric( $_POST['MaxDraft'] ) ) {
					$_POST['YSP_Max_Draft_Feet_Measurement'] = sanitize_text_field( wp_unslash( $_POST['MaxDraft'] ) );
				}

				$norm_price = isset( $_POST['NormPrice'] ) ? trim( (string) $_POST['NormPrice'] ) : '';
				$price = isset( $_POST['Price'] ) ? trim( (string) $_POST['Price'] ) : '';
				if ( $price === '' && $norm_price !== '' && is_numeric( $norm_price ) ) {
					$_POST['Price'] = number_format( (float) $norm_price, 2, '.', '' ) . ' USD';
				}
				if ( ( ! isset( $_POST['YSP_USDVal'] ) || $_POST['YSP_USDVal'] === '' ) && $norm_price !== '' && is_numeric( $norm_price ) ) {
					$_POST['YSP_USDVal'] = (string) (int) $norm_price;
				}

				foreach ($fields as $field) {
				    if (isset($_POST[$field])) {
				        update_post_meta($post_id, $field, $_POST[$field]);
				    }
				}

				// Keep TotalEngineHoursNumeric in sync with the typo'd form field name.
				if ( isset( $_POST['TotalEngineHoursNumberic'] ) ) {
					update_post_meta( $post_id, 'TotalEngineHoursNumeric', $_POST['TotalEngineHoursNumberic'] );
				}

				$boatLocation=(object) [
					"BoatCityName" => '',
					"BoatCountryID" => '',
					"BoatStateCode" => '',
				];

				if (isset($_POST['YSP_CountryID'])) {
					$boatLocation->BoatCountryID = $_POST['YSP_CountryID'];
				}
				
				if (isset($_POST['YSP_City'])) {
					$boatLocation->BoatCityName = $_POST['YSP_City'];
				}

				if (isset($_POST['YSP_State'])) {
					$boatLocation->BoatStateCode = $_POST['YSP_State'];
				}

				update_post_meta($post_id, "BoatLocation", $boatLocation);

				if (isset($_POST['BoatClassCode'])) {
					update_post_meta($post_id, "BoatClassCode", [ $_POST['BoatClassCode'] ]);
				}

			}
		}


	}