<?php

namespace PackItRightNow;

function get_featured_image( $post_id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' )[0];
}

function get_taxonomies_by_post_type( $post_type ) {
	$taxonomy_names = get_object_taxonomies( $post_type );
	$taxonomies = array();

	foreach( $taxonomy_names as $name ) {
		$taxonomy = get_taxonomy( $name );
		$taxonomies[] = $taxonomy;
	}

	return $taxonomies;
}
