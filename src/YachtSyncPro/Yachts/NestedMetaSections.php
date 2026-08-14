<?php
	#[AllowDynamicProperties]
	class YachtSyncPro_Yachts_NestedMetaSections {

		public const MAX_MANUAL_IMAGES = 150;

		public function __construct() {
			
		}

		public function add_actions_and_filters() {

			add_action( 'add_meta_boxes', [ $this, 'nested_yachts_meta_boxes' ]);
			add_action( 'save_post_ysp_yacht', [$this, 'ysp_yacht_nested_data_save']);
			add_action( 'admin_enqueue_scripts', [ $this, 'enqueue_admin_assets' ]);

		}

		public function enqueue_admin_assets( $hook ) {
			if ( ! in_array( $hook, [ 'post.php', 'post-new.php' ], true ) ) {
				return;
			}

			$screen = get_current_screen();
			if ( ! $screen || $screen->post_type !== 'ysp_yacht' ) {
				return;
			}

			wp_enqueue_script( 'jquery-ui-sortable' );
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

				$general_boat_description = isset( $_POST['General_Boat_Description'] )
					? trim( wp_kses_post( wp_unslash( $_POST['General_Boat_Description'] ) ) )
					: '';

				update_post_meta($post_id, 'GeneralBoatDescription', [ $general_boat_description ]);

				$additional_detail_description = isset( $_POST['Additional_Detail_Description'] )
					? trim( wp_kses_post( wp_unslash( $_POST['Additional_Detail_Description'] ) ) )
					: '';
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

				// Keep Yacht Info summary engine meta in sync with Engine 1 details.
				update_post_meta( $post_id, 'YSP_EngineMake', $engines[0]->Make );
				update_post_meta( $post_id, 'YSP_EngineModel', $engines[0]->Model );
				update_post_meta( $post_id, 'YSP_EngineFuel', $engines[0]->Fuel );
				update_post_meta( $post_id, 'YSP_EnginePower', $engines[0]->EnginePower );
				update_post_meta( $post_id, 'YSP_EngineType', $engines[0]->Type );
				update_post_meta( $post_id, 'YSP_EngineHours', $engines[0]->Hours );

				$engine_count = 0;
				foreach ( $engines as $engine ) {
					if ( trim( (string) ( $engine->Make ?? '' ) ) !== '' || trim( (string) ( $engine->Model ?? '' ) ) !== '' ) {
						$engine_count++;
					}
				}
				if ( $engine_count > 0 && empty( $_POST['NumberOfEngines'] ) ) {
					update_post_meta( $post_id, 'NumberOfEngines', $engine_count );
					update_post_meta( $post_id, 'YSP_EngineCount', $engine_count );
				}

				$images = [];
				$posted_images = [];

				if ( isset( $_POST['YSP_Images'] ) && is_array( $_POST['YSP_Images'] ) ) {
					$posted_images = $_POST['YSP_Images'];
				} else {
					for ( $im = 0; $im < self::MAX_MANUAL_IMAGES; $im++ ) {
						if ( isset( $_POST[ 'YSP_Image_' . $im ] ) ) {
							$posted_images[] = $_POST[ 'YSP_Image_' . $im ];
						}
					}
				}

				foreach ( $posted_images as $posted_url ) {
					if ( count( $images ) >= self::MAX_MANUAL_IMAGES ) {
						break;
					}

					$url = esc_url_raw( wp_unslash( $posted_url ) );
					if ( $url === '' ) {
						continue;
					}

					$images[] = (object) [
						'Uri' => $url,
					];
				}

				update_post_meta( $post_id, 'Images', $images );

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

				$captains_view_360 = isset( $_POST['YSP_CaptainsView360'] )
					? esc_url_raw( wp_unslash( $_POST['YSP_CaptainsView360'] ) )
					: '';
				update_post_meta( $post_id, 'YSP_CaptainsView360', $captains_view_360 );

				$captains_view_360_link = isset( $_POST['YSP_CaptainsView360_Link'] )
					? esc_url_raw( wp_unslash( $_POST['YSP_CaptainsView360_Link'] ) )
					: '';
				update_post_meta( $post_id, 'YSP_CaptainsView360_Link', $captains_view_360_link );

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
