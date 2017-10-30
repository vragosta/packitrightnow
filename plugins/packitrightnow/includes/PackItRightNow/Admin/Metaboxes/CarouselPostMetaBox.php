<?php

namespace PackItRightNow\Admin\MetaBoxes;

use PackItRightNow\Finders\CarouselPostFinder;

class CarouselPostMetaBox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since  0.1.0
	 * @uses   add_action()
	 * @return void
	 */
	function register() {
		add_action( 'add_meta_boxes', array( $this, 'packitrightnow_carousel_post_metaboxes' ) );
		add_action( 'save_post', array( $this, 'packitrightnow_carousel_post_save_data' ) );
	}

	/**
	 * Create 'Configuration' metabox for the 'project' custom post type.
	 *
	 * @since  0.1.0
	 * @uses   add_meta_box()
	 * @return void
	 */
	function packitrightnow_carousel_post_metaboxes() {
		add_meta_box(
			'configuration',
			__( 'Configuration', 'packitrightnow_com' ),
			array( $this, 'packitrightnow_carousel_post_callback' ),
			CAROUSEL_POST_POST_TYPE
		);
	}

	/**
	 * The callback for add_meta_box(), contains the HTML necessary to create the metaboxes.
	 *
	 * @since  0.1.0
	 * @uses   wp_nonce_field(), get_post_meta(), __(), esc_textarea()
	 * @return void
	 */
	function packitrightnow_carousel_post_callback( $post ) {
		# Add a nonce field so we can check for it later.
		wp_nonce_field( 'packitrightnow_carousel_post_save_data', 'packitrightnow_carousel_post_nonce' );

		# Call CarouselPostFinder class methods.
		$finder = new CarouselPostFinder( $post->ID );
		$carousel_position = $finder->get_position();

		?>

		<table style="width: 100%;">
			<tr>
				<td>
					<h2 style="padding: 0; margin-bottom: 10px; font-weight: 700; font-size: 20px;">Carousel</h2>
				</td>
			</tr>
			<tr>
				<td>
					<label for="_carousel_position"><?php echo esc_html( __( 'osition', 'packitrightnow_com' ) ); ?></label>
				</td>
				<td>
					<select name="_carousel_position" style="width: 100%;">
						<option value="1" <?php echo $carousel_position == 1 ? 'selected' : ''; ?>>1</option>
						<option value="2" <?php echo $carousel_position == 2 ? 'selected' : ''; ?>>2</option>
						<option value="3" <?php echo $carousel_position == 3 ? 'selected' : ''; ?>>3</option>
						<option value="4" <?php echo $carousel_position == 4 ? 'selected' : ''; ?>>4</option>
						<option value="5" <?php echo $carousel_position == 5 ? 'selected' : ''; ?>>5</option>
						<option value="6" <?php echo $carousel_position == 6 ? 'selected' : ''; ?>>6</option>
					</select>
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
	function packitrightnow_carousel_post_save_data( $post_id ) {
		/**
		 * We need to verify this came from our screen and with proper authorization,
		 * because the save_post action can be triggered at other times.
		 */
		if ( ! isset( $_POST['packitrightnow_carousel_post_nonce'] ) ) {
			return;
		}

		# Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['packitrightnow_carousel_post_nonce'], 'packitrightnow_carousel_post_save_data' ) ) {
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
		$carousel_position = sanitize_text_field( $_POST['_carousel_position'] );

		# Sanitize the input and update the meta field in the database.
		update_post_meta( $post_id, '_carousel_position', $carousel_position );
	}

}
?>
