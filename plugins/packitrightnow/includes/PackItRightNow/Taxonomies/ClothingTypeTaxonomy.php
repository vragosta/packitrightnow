<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for ClothingType.
 */
class ClothingTypeTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return CLOTHING_TYPE_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Clothing Types', 'packitrightnow_com' ),
			'singular_name'              => __( 'Clothing Type', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Clothing Type', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Clothing Types', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Clothing Type', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Clothing Type:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Clothing Type', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Clothing Type', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Clothing Type', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Clothing Type', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Clothing Types with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Clothing Types', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Clothing Types', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Clothing Types', 'packitrightnow_com' ),
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
			CLOTHING_POST_TYPE,
		);
	}
}
