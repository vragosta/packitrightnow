<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for Nitrile.
 */
class NitrileTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return NITRILE_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Nitrile', 'packitrightnow_com' ),
			'singular_name'              => __( 'Nitrile', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Nitrile', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Nitrile Gloves', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Nitrile Glove', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Nitrile Glove:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Nitrile Glove', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Nitrile Glove', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Nitrile Glove', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Nitrile Glove', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Nitrile Gloves with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Nitrile Gloves', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Nitrile Gloves', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Nitrile Gloves', 'packitrightnow_com' ),
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
