<?php

namespace PackItRightNow\PostTypes;

/**
 * GlovePostType is a custom post type object for storing projects
 * in WordPress.
 */
class GlovePostType extends BasePostType {
	public function get_name() {
		return GLOVE_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Gloves', 'packitrightnow_com' ),
			'singular_name'      => __( 'Glove', 'packitrightnow_com' ),
			'menu_name'          => __( 'Gloves', 'packitrightnow_com' ),
			'parent_item_colon'  => __( 'Parent Glove:', 'packitrightnow_com' ),
			'all_items'          => __( 'All Gloves', 'packitrightnow_com' ),
			'view_item'          => __( 'View Glove', 'packitrightnow_com' ),
			'add_new_item'       => __( 'Add New Glove', 'packitrightnow_com' ),
			'add_new'            => __( 'Add New', 'packitrightnow_com' ),
			'edit_item'          => __( 'Edit Glove', 'packitrightnow_com' ),
			'update_item'        => __( 'Update Glove', 'packitrightnow_com' ),
			'search_items'       => __( 'Search Gloves', 'packitrightnow_com' ),
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
			'menu_icon'           => 'dashicons-thumbs-up',
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
