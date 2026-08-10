<?php
	#[AllowDynamicProperties]
	class YachtSyncPro_Yachts_NestedMetaSections {

		public function __construct() {
			
		}

		public function add_actions_and_filters() {

			add_action( 'add_meta_boxes', [ $this, 'nested_yachts_meta_boxes' ]);
			add_action( 'save_post_ysp_yacht', [$this, 'ysp_yacht_nested_data_save']);

		}

		public function nested_yachts_meta_boxes() {

			
			add_meta_box(
				'ysp_yacht_sync_nested_meta_boxs',
				'Other Yacht Info',
				[ $this, 'nested_yacht_meta_box_html' ],
				['ysp_yacht']
			);									
		}

		public function nested_yacht_meta_box_html($post) {
			include YSP_TEMPLATES_DIR.'/admin-nested-metabox-yacht-basics.php';
		}

		private function extract_youtube_id( $input ) {
			$input = trim( (string) $input );
			if ( $input === '' ) {
				return '';
			}

			if ( preg_match( '/^[a-zA-Z0-9_-]{11}$/', $input ) ) {
				return $input;
			}

			if ( preg_match( '/(?:youtube\.com\/(?:watch\?(?:.*&)?v=|embed\/|shorts\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $input, $matches ) ) {
				return $matches[1];
			}

			return '';
		}

		public function ysp_yacht_nested_data_save($post_id) {
			if ( isset($_POST['is_yacht_manual_entry']) && $_POST['is_yacht_manual_entry'] == 'yes') {

				$general_boat_description = isset($_POST['General_Boat_Description']) ? trim( wp_unslash( $_POST['General_Boat_Description'] ) ) : '';

				update_post_meta($post_id, 'GeneralBoatDescription', [ $general_boat_description ]);

				$additional_detail_description = isset($_POST['Additional_Detail_Description']) ? trim( wp_unslash( $_POST['Additional_Detail_Description'] ) ) : '';
				update_post_meta($post_id, 'AdditionalDetailDescription', [ $additional_detail_description ]);

				$sales_rep = (object) [
					'PartyId' => isset($_POST['YSP_Sales_Rep_Party_ID']) ? sanitize_text_field( wp_unslash( $_POST['YSP_Sales_Rep_Party_ID'] ) ) : '',
					'Name' => isset($_POST['YSP_Sales_Rep_Name']) ? sanitize_text_field( wp_unslash( $_POST['YSP_Sales_Rep_Name'] ) ) : '',
				];

				update_post_meta($post_id, 'SalesRep', $sales_rep);

				$engines = [
					(object) [
						'Make' => $_POST['YSP_Engine_1_Make'] ?? '',
						'Model' => $_POST['YSP_Engine_1_Model'] ?? '',
						'Fuel' => $_POST['YSP_Engine_1_Fuel'] ?? '',
						'EnginePower' => $_POST['YSP_Engine_1_EnginePower'] ?? '',
						'Type' => $_POST['YSP_Engine_1_Type'] ?? '',
						'Year' => $_POST['YSP_Engine_1_Year'] ?? '',
						'Hours' => $_POST['YSP_Engine_1_Hours'] ?? '',
						'BoatEngineLocationCode' => $_POST['YSP_Engine_1_Boat_Engine_Location_Code'] ?? '',
					],
					(object) [
						'Make' => $_POST['YSP_Engine_2_Make'] ?? '',
						'Model' => $_POST['YSP_Engine_2_Model'] ?? '',
						'Fuel' => $_POST['YSP_Engine_2_Fuel'] ?? '',
						'EnginePower' => $_POST['YSP_Engine_2_EnginePower'] ?? '',
						'Type' => $_POST['YSP_Engine_2_Type'] ?? '',
						'Year' => $_POST['YSP_Engine_2_Year'] ?? '',
						'Hours' => $_POST['YSP_Engine_2_Hours'] ?? '',
						'BoatEngineLocationCode' => $_POST['YSP_Engine_2_Boat_Engine_Location_Code'] ?? '',
					]
				];

				update_post_meta($post_id, 'Engines', $engines);

				$images = [];

				for ($im=0; $im <= 19; $im++) {

					if (isset($_POST['YSP_Image_'.$im]) && !empty($_POST['YSP_Image_'.$im])) {
						$images[ $im ]=(object) [
							'Uri' => esc_url_raw( wp_unslash( $_POST['YSP_Image_'.$im] ) ),
		 				];
					}

				}

				update_post_meta($post_id, 'Images', array_values( $images ));

				$youtube_data = [];
				for ( $v = 0; $v < 3; $v++ ) {
					$raw = isset( $_POST[ 'YSP_YouTube_' . $v ] ) ? wp_unslash( $_POST[ 'YSP_YouTube_' . $v ] ) : '';
					$youtube_id = $this->extract_youtube_id( $raw );
					if ( $youtube_id === '' ) {
						continue;
					}

					$youtube_data[] = (object) [
						'YoutubeID' => $youtube_id,
						'Title' => isset( $_POST[ 'YSP_YouTube_Title_' . $v ] ) ? sanitize_text_field( wp_unslash( $_POST[ 'YSP_YouTube_Title_' . $v ] ) ) : '',
					];
				}
				update_post_meta( $post_id, 'YSP_YouTubeData', $youtube_data );

				$virtual_tours = [];
				for ( $t = 0; $t < 2; $t++ ) {
					$url = isset( $_POST[ 'YSP_VirtualTour_' . $t ] ) ? esc_url_raw( wp_unslash( $_POST[ 'YSP_VirtualTour_' . $t ] ) ) : '';
					if ( $url === '' ) {
						continue;
					}

					$virtual_tours[] = (object) [
						'URL' => $url,
					];
				}
				update_post_meta( $post_id, 'YSP_VirtualTours', $virtual_tours );
				
			}
		}


	}
