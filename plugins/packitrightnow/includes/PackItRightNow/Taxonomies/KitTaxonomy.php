<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for Kit.
 */
class KitTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return KIT_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Kit', 'packitrightnow_com' ),
			'singular_name'              => __( 'Kit', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Kits', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Kits', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Kit', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Kit:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Kit', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Kit', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Kit', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Kit', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Kits with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Kits', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Kit', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Kits', 'packitrightnow_com' ),
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
			CUTLERY_POST_TYPE
		);
	}
}
