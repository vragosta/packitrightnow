<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for RainGear.
 */
class RainGearTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return RAINGEAR_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'RainGear', 'packitrightnow_com' ),
			'singular_name'              => __( 'RainGear', 'packitrightnow_com' ),
			'menu_name'                  => __( 'RainGear', 'packitrightnow_com' ),
			'all_items'                  => __( 'All RainGear', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent RainGear', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent RainGear:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New RainGear', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New RainGear', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit RainGear', 'packitrightnow_com' ),
			'update_item'                => __( 'Update RainGear', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate RainGear with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search RainGear', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove RainGear', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used RainGear', 'packitrightnow_com' ),
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
