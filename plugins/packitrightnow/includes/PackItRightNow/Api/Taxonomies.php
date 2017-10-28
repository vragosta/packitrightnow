<?php

namespace PackItRightNow;

/**
 * Get taxonomies of the post type paramter.
 *
 * @since 0.1.0
 * @param string $post_type
 * @uses get_object_taxonomies
 * @return array
 */
function get_taxonomies_by_post_type( $post_type ) {
	$taxonomy_names = get_object_taxonomies( $post_type );
	$taxonomies = array();

	foreach( $taxonomy_names as $name ) {
		$taxonomy = get_taxonomy( $name );
		$taxonomies[] = $taxonomy;
	}

	return $taxonomies;
}
