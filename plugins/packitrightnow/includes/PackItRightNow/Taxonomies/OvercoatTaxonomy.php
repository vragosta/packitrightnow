<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for Overcoat.
 */
class OvercoatTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return OVERCOAT_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Overcoats', 'packitrightnow_com' ),
			'singular_name'              => __( 'Overcoat', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Overcoats', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Overcoats', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Overcoat', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Overcoat:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Overcoat', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Overcoat', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Overcoat', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Overcoat', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Overcoats with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Overcoats', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Overcoat', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Overcoats', 'packitrightnow_com' ),
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
			CLOTHING_POST_TYPE
		);
	}
}
