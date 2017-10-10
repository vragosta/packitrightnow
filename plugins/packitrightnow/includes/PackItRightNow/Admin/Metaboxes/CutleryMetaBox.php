<?php

namespace PackItRightNow\Admin\MetaBoxes;

use PackItRightNow\Finders\CutleryFinder;

class CutleryMetaBox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since  0.1.0
	 * @uses   add_action()
	 * @return void
	 */
	function register() {
		add_action( 'add_meta_boxes', array( $this, 'packitrightnow_cutlery_metaboxes' ) );
		add_action( 'save_post', array( $this, 'packitrightnow_cutlery_save_data' ) );
	}

	/**
	 * Create 'Configuration' metabox for the 'project' custom post type.
	 *
	 * @since  0.1.0
	 * @uses   add_meta_box()
	 * @return void
	 */
	function packitrightnow_cutlery_metaboxes() {
		add_meta_box(
			'configuration',
			__( 'Configuration', 'packitrightnow_com' ),
			array( $this, 'packitrightnow_cutlery_callback' ),
			CUTLERY_POST_TYPE
		);
	}

	/**
	 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
	 *
	 * @since  0.1.0
	 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
	 * @return void
	 */
	function packitrightnow_cutlery_callback( $post ) {
		# Add a nonce field so we can check for it later.
		wp_nonce_field( 'packitrightnow_cutlery_save_data', 'packitrightnow_cutlery_nonce' );

		# Call AccessoryFinder class methods.
		$finder = new CutleryFinder( $post->ID );
		$is_featured = $finder->is_featured();

		?>

		<table style="width: 100%;">
			<tr>
				<td>
					<label for="_featured"><?php echo esc_html( __( 'Feature Cutlery', 'packitrightnow_com' ) ); ?></label>
				</td>
				<td>
					<input name="_featured" type="checkbox" <?php echo $is_featured == true ? 'checked': ''; ?> />
				</td>
			</tr>
		</table><?php
	}

	/**
	 * Saves and sanitizes the POST data.
	 *
	 * @since  0.1.0
	 * @uses   isset(), wp_verify_nonce(), defined(), current_user_can(), sanitize_text_field(), update_post_meta()
	 * @return void
	 */
	function packitrightnow_cutlery_save_data( $post_id ) {
		/**
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		if ( ! isset( $_POST['packitrightnow_cutlery_nonce'] ) ) {
			return;
		}

		# Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['packitrightnow_cutlery_nonce'], 'packitrightnow_cutlery_save_data' ) ) {
			return;
		}

		# If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		# Check the user's permissions.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

		# Catch the default checkbox behavior.
		$featured = $_POST['_featured'] == 'on' ? true : false;

		# Sanitize the input and update the meta field in the database.
		update_post_meta( $post_id, '_featured', $featured );
	}

}
?>
