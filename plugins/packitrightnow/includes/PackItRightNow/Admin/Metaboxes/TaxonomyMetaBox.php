<?php

namespace PackItRightNow\Admin\MetaBoxes;

class TaxonomyMetaBox {

	/**
	 * Registers metabox with WordPress.
	 *
	 * @since  0.1.0
	 * @uses   get_supported_taxonomies, add_action()
	 * @return void
	 */
	public function register() {
		$taxonomies = $this->get_supported_taxonomies();

		foreach( $taxonomies as $taxonomy ) {
			add_action( $taxonomy .'_edit_form_fields', array( $this, 'add_options' ) );
			add_action( "edited_$taxonomy", array( $this, 'save_options' ), 10, 2 );
		}
	}


	/**
	 * Create a new field called 'cover_photo_url'.
	 *
	 * @since  0.1.0
	 * @uses   get_term_meta(), _e()
	 * @return void
	 */
	function add_options( $term ) {
		$featured_image_url = get_term_meta( $term->term_id, '_featured_image_url', true ); ?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="_featured_image_url"><?php _e( 'Featured Image URL' ); ?></label></th>
			<td>
				<input type="text" name="_featured_image_url" value="<?php echo esc_url( $featured_image_url ); ?>" />
				<p class="description">The image URL will display as the featured image for the term.</p>
			</td>
		</tr><?php
	}

	/**
	 * Saves custom taxonomy fields.
	 *
	 * @since  0.1.0
	 * @uses   isset(), sanitize_title(), update_term_meta()
	 * @return void
	 */
	function save_options( $term_id ) {
		if ( isset( $_POST['_featured_image_url'] ) ) {
			$featured_image_url = $_POST['_featured_image_url'];
			update_term_meta( $term_id, '_featured_image_url', $featured_image_url );
		}
	}

	/**
	 * Generate array of supported taxonomies.
	 *
	 * @since  0.1.0
	 * @return void
	 */
	function get_supported_taxonomies() {
		return array(
			ACCESSORY_TYPE_TAXONOMY,
			CLOTHING_TYPE_TAXONOMY,
			KITCHEN_TYPE_TAXONOMY,
			GLOVE_TYPE_TAXONOMY,
			PACKAGE_TYPE_TAXONOMY,
		);
	}

}
