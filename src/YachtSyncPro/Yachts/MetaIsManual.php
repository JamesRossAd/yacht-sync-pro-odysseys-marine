<?php 
	class YachtSyncPro_Yachts_MetaIsManual {

		public function __construct() {
			
		}

		public static function is_manual_entry( $post_id ) {
			return get_post_meta( (int) $post_id, 'is_yacht_manual_entry', true ) === 'yes';
		}

		public function add_actions_and_filters() {

			add_action( 'add_meta_boxes', [ $this, 'yachts_meta_boxes' ]);
			add_action( 'wp_insert_post', [ $this, 'default_manual_entry_for_new_admin_posts' ], 10, 3 );
			add_action( 'save_post_ysp_yacht', [$this, 'ysp_yacht_data_save']);

		}

		public function yachts_meta_boxes() { 
			add_meta_box(
				'ysp_yacht_is_manual_metabox',
				'Is Manual Entry',
				[ $this, 'yacht_meta_box_html' ],
				['ysp_yacht'],
				'side'
			);									
		}

		/**
		 * Sync creates posts as syncing_ysp_yacht; only wp-admin "Add New" creates a fresh ysp_yacht auto-draft.
		 * Mark those as manual entry so Yacht Info fields can save without requiring a checkbox click.
		 */
		public function default_manual_entry_for_new_admin_posts( $post_id, $post, $update ) {
			if ( $update || ! ( $post instanceof WP_Post ) || $post->post_type !== 'ysp_yacht' ) {
				return;
			}

			if ( $post->post_status !== 'auto-draft' ) {
				return;
			}

			// Never apply during imports/CLI/cron — those use syncing_ysp_yacht anyway.
			if ( ! is_admin() || wp_doing_cron() || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
				return;
			}

			update_post_meta( $post_id, 'is_yacht_manual_entry', 'yes' );
		}

		public function yacht_meta_box_html($post) {

			$_is_yacht_manual_entry = get_post_meta($post->ID, 'is_yacht_manual_entry', true);

			echo '<input type="hidden" name="ysp_manual_entry_metabox" value="1" />';
			echo '<label style="display:flex;align-items:center;gap:8px;font-weight:600;">';
			echo "<input type='checkbox' name='is_yacht_manual_entry' value='yes' " . checked('yes', $_is_yacht_manual_entry, false) . " />";
			echo '<span>Manual entry</span>';
			echo '</label>';
			echo '<p class="description" style="margin-top:8px;">Checked by default for new listings you create here. Leave checked so Yacht Info fields save.</p>';
		}

		public function ysp_yacht_data_save($post_id) {
			// Ignore quick edit / autosave when this metabox was not part of the request.
			if (!isset($_POST['ysp_manual_entry_metabox'])) {
				return;
			}

			if (isset($_POST['is_yacht_manual_entry']) && $_POST['is_yacht_manual_entry'] == 'yes') {
				update_post_meta($post_id, 'is_yacht_manual_entry', 'yes');
			} else {
				delete_post_meta($post_id, 'is_yacht_manual_entry');
			}
		}
	}
