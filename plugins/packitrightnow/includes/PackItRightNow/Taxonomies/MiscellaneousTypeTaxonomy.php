<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for MiscellaneousType.
 */
class MiscellaneousTypeTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return MISCELLANEOUS_TYPE_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Miscellaneous Types', 'packitrightnow_com' ),
			'singular_name'              => __( 'Miscellaneous Type', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Miscellaneous Types', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Miscellaneous Types', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Miscellaneous Type', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Miscellaneous Type:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Miscellaneous Type', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Miscellaneous Type', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Miscellaneous Type', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Miscellaneous Type', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Miscellaneous Types with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Miscellaneous Types', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Miscellaneous Types', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Miscellaneous Types', 'packitrightnow_com' ),
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
			MISCELLANEOUS_POST_TYPE,
		);
	}
}
