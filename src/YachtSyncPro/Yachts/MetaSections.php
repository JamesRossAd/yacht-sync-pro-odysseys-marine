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
				    'HasHullID',
				    'BoatHullID',
				    'BoatHullMaterialCode',
				    'BoatName',
				    'CompanyBoat',
				    'CompanyName',
				    'DocumentID',
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

				// Canonical Length (ft) → NominalLength, YSP_Length, YSP_LOAFeet.
				$nominal = isset($_POST['NominalLength']) ? trim((string) $_POST['NominalLength']) : '';
				if ( $nominal !== '' ) {
					$_POST['NominalLength'] = $nominal;
					$_POST['YSP_Length'] = is_numeric( $nominal ) ? (string) (int) $nominal : $nominal;
					$_POST['YSP_LOAFeet'] = is_numeric( $nominal ) ? (string) $nominal : $nominal;
				}

				// Canonical Beam (ft) → both beam meta keys.
				$beam_ft = isset( $_POST['YSP_Beam_Feet_Measurement'] ) ? trim( (string) $_POST['YSP_Beam_Feet_Measurement'] ) : '';
				if ( $beam_ft !== '' ) {
					$_POST['YSP_Beam_Feet_Measurement'] = $beam_ft;
					$_POST['YSP_BeamFeet'] = $beam_ft;
				}

				// Canonical Max Draft (ft).
				$draft_ft = isset( $_POST['YSP_Max_Draft_Feet_Measurement'] ) ? trim( (string) $_POST['YSP_Max_Draft_Feet_Measurement'] ) : '';
				if ( $draft_ft !== '' ) {
					$_POST['YSP_Max_Draft_Feet_Measurement'] = $draft_ft;
					$_POST['MaxDraft'] = $draft_ft . ' ft';
				}

				// Canonical Country → related country meta.
				$country = isset( $_POST['YSP_Country'] ) ? sanitize_text_field( wp_unslash( $_POST['YSP_Country'] ) ) : '';
				if ( $country !== '' ) {
					$_POST['YSP_Country'] = $country;
					$_POST['YSP_CountryID'] = $country;
					$_POST['YSP_Full_Country'] = $country;
				}

				// Engine count summary (details live in Other Yacht Info → Engines).
				$engine_count = isset( $_POST['NumberOfEngines'] ) ? trim( (string) $_POST['NumberOfEngines'] ) : '';
				if ( $engine_count !== '' ) {
					$_POST['NumberOfEngines'] = $engine_count;
					$_POST['YSP_EngineCount'] = $engine_count;
				}

				// Canonical Price (USD).
				$norm_price = isset( $_POST['NormPrice'] ) ? trim( (string) $_POST['NormPrice'] ) : '';
				if ( $norm_price !== '' && is_numeric( $norm_price ) ) {
					$_POST['NormPrice'] = $norm_price;
					$_POST['YSP_USDVal'] = (string) (int) $norm_price;
					$_POST['Price'] = number_format( (float) $norm_price, 2, '.', '' ) . ' USD';
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