<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for CutleryType.
 */
class CutleryTypeTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return CUTLERY_TYPE_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Cutlery Types', 'packitrightnow_com' ),
			'singular_name'              => __( 'Cutlery Type', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Cutlery Type', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Cutlery Types', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Cutlery Type', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Cutlery Type:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Cutlery Type', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Cutlery Type', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Cutlery Type', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Cutlery Type', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Cutlery Types with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Cutlery Types', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Cutlery Types', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Cutlery Types', 'packitrightnow_com' ),
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
			CUTLERY_POST_TYPE,
		);
	}
}
