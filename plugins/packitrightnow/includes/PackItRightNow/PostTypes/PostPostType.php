<?php

namespace PackItRightNow\PostTypes;

/**
 * CorePostType overrides the 'post' post type. Currently set to
 * defaults but could be used to add custom taxonomies.
 */
class PostPostType extends BasePostType {
	public function get_name() {
		return 'post';
	}

	# override parent - since this is a Core Post Type
	public function register_post_type() {
		add_post_type_support( 'post', 'postmeta-fields' );
		remove_post_type_support( 'post', 'custom-fields' );
	}
}
