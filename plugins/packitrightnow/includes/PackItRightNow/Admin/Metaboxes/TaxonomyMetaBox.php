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
		$toggle_archive_display = get_term_meta( $term->term_id, '_toggle_archive_display', true ); ?>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="_toggle_archive_display"><?php _e( 'Toggle Archive Display' ); ?></label></th>
			<td>
				<select name="_toggle_archive_display">
					<option value="yes" <?php echo $toggle_archive_display == 'yes' ? 'selected' : ''; ?>>Yes</option>
					<option value="no" <?php echo $toggle_archive_display == 'no' ? 'selected' : ''; ?>>No</option>
				</select>
				<p class="description">If this is set to Yes, the term name and its description ( if the description is filled out ) will appear on any archive template that supports this term.</p>
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
		if ( isset( $_POST['_toggle_archive_display'] ) ) {
			$toggle_archive_display = $_POST['_toggle_archive_display'];
			update_term_meta( $term_id, '_toggle_archive_display', $toggle_archive_display );
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
			FACEGEAR_TAXONOMY,
			HEADGEAR_TAXONOMY,
			APRON_TAXONOMY,
			OVERCOAT_TAXONOMY,
			RAINGEAR_TAXONOMY,
			KIT_PIECE_TAXONOMY,
			KIT_TAXONOMY,
			CHEMICAL_TAXONOMY,
			WORK_TAXONOMY,
			LATEX_TAXONOMY,
			NITRILE_TAXONOMY,
			POLY_TAXONOMY,
			VINYL_TAXONOMY,
			MISCELLANEOUS_TAXONOMY
		);
	}

}
