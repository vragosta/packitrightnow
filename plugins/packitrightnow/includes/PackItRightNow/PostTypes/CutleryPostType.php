<?php

namespace PackItRightNow\PostTypes;

/**
 * CutleryPostType is a custom post type object for storing projects
 * in WordPress.
 */
class CutleryPostType extends BasePostType {
	public function get_name() {
		return CUTLERY_POST_TYPE;
	}

	public function get_labels() {
		return array(
			'name'               => __( 'Cutlery', 'packitrightnow' ),
			'singular_name'      => __( 'Cutlery', 'packitrightnow' ),
			'menu_name'          => __( 'Cutlery', 'packitrightnow' ),
			'parent_item_colon'  => __( 'Parent Cutlery:', 'packitrightnow' ),
			'all_items'          => __( 'All Cutlery', 'packitrightnow' ),
			'view_item'          => __( 'View Cutlery', 'packitrightnow' ),
			'add_new_item'       => __( 'Add New Cutlery', 'packitrightnow' ),
			'add_new'            => __( 'Add New', 'packitrightnow' ),
			'edit_item'          => __( 'Edit Cutlery', 'packitrightnow' ),
			'update_item'        => __( 'Update Cutlery', 'packitrightnow' ),
			'search_items'       => __( 'Search Cutlery', 'packitrightnow' ),
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
			'menu_icon'           => 'dashicons-carrot',
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
