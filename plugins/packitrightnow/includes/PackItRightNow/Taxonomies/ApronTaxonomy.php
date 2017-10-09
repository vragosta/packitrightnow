<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for Apron.
 */
class ApronTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return APRON_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Apron', 'packitrightnow_com' ),
			'singular_name'              => __( 'Apron', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Aprons', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Aprons', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Apron', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Apron:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Apron', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Apron', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Apron', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Apron', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Aprons with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Aprons', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Apron', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Aprons', 'packitrightnow_com' ),
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
