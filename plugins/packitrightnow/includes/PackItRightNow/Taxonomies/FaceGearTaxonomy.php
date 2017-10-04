<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for FaceGear.
 */
class FaceGearTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return FACEGEAR_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'FaceGear', 'packitrightnow_com' ),
			'singular_name'              => __( 'FaceGear', 'packitrightnow_com' ),
			'menu_name'                  => __( 'FaceGear', 'packitrightnow_com' ),
			'all_items'                  => __( 'All FaceGear', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent FaceGear', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent FaceGear:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New FaceGear', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New FaceGear', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit FaceGear', 'packitrightnow_com' ),
			'update_item'                => __( 'Update FaceGear', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate FaceGear with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search FaceGear', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove FaceGear', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used FaceGear', 'packitrightnow_com' ),
			'not_found'                  => __( 'Not Found', 'packitrightnow_com' )
		);
	}

	public function get_options() {
		return array(
			'labels'            => $this->get_labels(),
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => false,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true
		);
	}

	public function get_post_types() {
		return array(
			ACCESSORY_POST_TYPE
		);
	}
}
