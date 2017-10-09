<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for Poly.
 */
class PolyTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return POLY_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Poly', 'packitrightnow_com' ),
			'singular_name'              => __( 'Poly', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Poly', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Poly Gloves', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Poly Glove', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Poly Glove:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Poly Glove', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Poly Glove', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Poly Glove', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Poly Glove', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Poly Gloves with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Poly Gloves', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Poly Gloves', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Poly Gloves', 'packitrightnow_com' ),
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
			GLOVE_POST_TYPE
		);
	}
}
