<?php

namespace PackItRightNow\PostTypes;

/**
 * PackagePostType is a custom post type object for storing projects
 * in WordPress.
 */
class PackagePostType extends BasePostType {
	public function get_name() {
		return PACKAGE_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Packages', 'packitrightnow' ),
			'singular_name'      => __( 'Package', 'packitrightnow' ),
			'menu_name'          => __( 'Packages', 'packitrightnow' ),
			'parent_item_colon'  => __( 'Parent Package:', 'packitrightnow' ),
			'all_items'          => __( 'All Packages', 'packitrightnow' ),
			'view_item'          => __( 'View Package', 'packitrightnow' ),
			'add_new_item'       => __( 'Add New Package', 'packitrightnow' ),
			'add_new'            => __( 'Add New', 'packitrightnow' ),
			'edit_item'          => __( 'Edit Package', 'packitrightnow' ),
			'update_item'        => __( 'Update Package', 'packitrightnow' ),
			'search_items'       => __( 'Search Packages', 'packitrightnow' ),
			'not_found'          => __( 'Not found', 'packitrightnow' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'packitrightnow' )
		);
	}

	public function get_options() {
		return array(
			'labels'              => $this->get_labels(),
			'supports'            => $this->get_editor_support(),
			'hierarchical'        => false,
			'rewrite'             => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_icon'           => 'dashicons-image-rotate-left',
			'menu_position'       => 26,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
		);
	}

	public function get_editor_support() {
		return array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'comments',
			'postmeta-fields',
		);
	}
}
