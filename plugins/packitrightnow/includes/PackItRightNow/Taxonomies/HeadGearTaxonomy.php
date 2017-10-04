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
			'name'                       => __( 'HeadGear', 'packitrightnow_com' ),
			'singular_name'              => __( 'HeadGear', 'packitrightnow_com' ),
			'menu_name'                  => __( 'HeadGear', 'packitrightnow_com' ),
			'all_items'                  => __( 'All HeadGear', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent HeadGear', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent HeadGear:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New HeadGear', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New HeadGear', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit HeadGear', 'packitrightnow_com' ),
			'update_item'                => __( 'Update HeadGear', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate HeadGear with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search HeadGear', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove HeadGear', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used HeadGear', 'packitrightnow_com' ),
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
			ACCESSORY_POST_TYPE
		);
	}
}
