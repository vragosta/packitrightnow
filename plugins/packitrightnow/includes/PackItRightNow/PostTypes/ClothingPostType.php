<?php

namespace PackItRightNow\PostTypes;

/**
 * ClothingPostType is a custom post type object for storing projects
 * in WordPress.
 */
class ClothingPostType extends BasePostType {
	public function get_name() {
		return CLOTHING_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Clothing', 'packitrightnow_com' ),
			'singular_name'      => __( 'Clothing', 'packitrightnow_com' ),
			'menu_name'          => __( 'Clothing', 'packitrightnow_com' ),
			'parent_item_colon'  => __( 'Parent Clothing:', 'packitrightnow_com' ),
			'all_items'          => __( 'All Clothing', 'packitrightnow_com' ),
			'view_item'          => __( 'View Clothing', 'packitrightnow_com' ),
			'add_new_item'       => __( 'Add New Clothing', 'packitrightnow_com' ),
			'add_new'            => __( 'Add New', 'packitrightnow_com' ),
			'edit_item'          => __( 'Edit Clothing', 'packitrightnow_com' ),
			'update_item'        => __( 'Update Clothing', 'packitrightnow_com' ),
			'search_items'       => __( 'Search Clothing', 'packitrightnow_com' ),
			'not_found'          => __( 'Not found', 'packitrightnow_com' ),
			'not_found_in_trash' => __( 'Not found in Trash', 'packitrightnow_com' )
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
			'menu_icon'           => 'dashicons-businessman',
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
