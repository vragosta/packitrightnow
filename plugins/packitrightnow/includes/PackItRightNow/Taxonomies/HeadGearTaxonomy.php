<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for HeadGear.
 */
class HeadGearTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return HEADGEAR_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'HeadGear', 'louiscasale_com' ),
			'singular_name'              => __( 'HeadGear', 'louiscasale_com' ),
			'menu_name'                  => __( 'HeadGear', 'louiscasale_com' ),
			'all_items'                  => __( 'All HeadGear', 'louiscasale_com' ),
			'parent_item'                => __( 'Parent HeadGear', 'louiscasale_com' ),
			'parent_item_colon'          => __( 'Parent HeadGear:', 'louiscasale_com' ),
			'new_item_name'              => __( 'New HeadGear', 'louiscasale_com' ),
			'add_new_item'               => __( 'Add New HeadGear', 'louiscasale_com' ),
			'edit_item'                  => __( 'Edit HeadGear', 'louiscasale_com' ),
			'update_item'                => __( 'Update HeadGear', 'louiscasale_com' ),
			'separate_items_with_commas' => __( 'Separate families with commas', 'louiscasale_com' ),
			'search_items'               => __( 'Search HeadGear', 'louiscasale_com' ),
			'add_or_remove_items'        => __( 'Add or remove families', 'louiscasale_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used families', 'louiscasale_com' ),
			'not_found'                  => __( 'Not Found', 'louiscasale_com' )
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
			ACCESSORY_POST_TYPE
		);
	}
}
