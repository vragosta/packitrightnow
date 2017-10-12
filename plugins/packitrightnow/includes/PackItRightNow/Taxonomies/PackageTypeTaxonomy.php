<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for PackageType.
 */
class PackageTypeTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return PACKAGE_TYPE_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Package Types', 'packitrightnow_com' ),
			'singular_name'              => __( 'Package Type', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Package Type', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Package Types', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Package Type', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Package Type:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Package Type', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Package Type', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Package Type', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Package Type', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Package Types with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Package Types', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Package Types', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Package Types', 'packitrightnow_com' ),
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
			PACKAGE_POST_TYPE,
		);
	}
}
