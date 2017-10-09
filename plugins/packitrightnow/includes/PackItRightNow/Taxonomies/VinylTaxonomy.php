<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for Vinyl.
 */
class VinylTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return VINYL_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Vinyl', 'packitrightnow_com' ),
			'singular_name'              => __( 'Vinyl', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Vinyl', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Vinyl Gloves', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Vinyl Glove', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Vinyl Glove:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Vinyl Glove', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Vinyl Glove', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Vinyl Glove', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Vinyl Glove', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Vinyl Gloves with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Vinyl Gloves', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Vinyl Gloves', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Vinyl Gloves', 'packitrightnow_com' ),
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
