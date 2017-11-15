<?php

namespace PackItRightNow;

/**
 * Get the post type description.
 *
 * @since 0.1.0
 * @param string $post_type
 * @uses get_post_type_object
 * @return string
 */
function get_post_type_description( $post_type ) {
	$post_type = get_post_type_object( $post_type );
	return $post_type->description ? $post_type->description : NULL;
}

/**
 * Get post ids based upon post type, taxonomy and term slug.
 *
 * @since 0.1.0
 * @param string $post_type
 * @param string $taxonomy
 * @param string $term_slug
 * @uses wp_query
 * @return object
 */
function get_post_ids( $post_type, $taxonomy, $term_slug ) {
	$query_params = array(
		'post_type' => $post_type,
		'fields' => 'ids',
		'posts_per_page' => -1,
		'order' => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => $taxonomy,
				'field' => 'slug',
				'terms' => array( $term_slug ),
			),
		)
	);

	$query = new \WP_Query( $query_params );
	return $query->posts;
}

/**
 * Get the six most recent posts.
 *
 * @since 0.1.0
 * @uses wp_query
 * @return object
 */
function get_recent_posts() {
	$query_args = array(
		'post_type' => array(
			ACCESSORY_POST_TYPE,
			CLOTHING_POST_TYPE,
			KITCHEN_POST_TYPE,
			GLOVE_POST_TYPE,
			PACKAGE_POST_TYPE,
		),
		'posts_per_page' => 6
	);

	return new \WP_Query( $query_args );
}

/**
 * Get posts that contain carousel meta.
 *
 * @since 0.1.0
 * @uses wp_query
 * @return object
 */
function get_carousel_posts() {
	$query_args = array(
		'post_type' => CAROUSEL_POST_POST_TYPE,
		'posts_per_page' => 6,
		'meta_key' => '_carousel_position',
		'orderby' => 'meta_value',
		'order' => 'ASC',
	);

	$query = new \WP_Query( $query_args );

	if ( $query->post_count == 0 ) {
		$query_args = array(
			'post_type' => CAROUSEL_POST_POST_TYPE,
			'posts_per_page' => 6,
			'order' => 'ASC',
		);

		$query = new \WP_Query( $query_args );
	}

	return $query;
}

/**
 * Get posts that contain featured meta.
 *
 * @since 0.1.0
 * @uses wp_query
 * @return object
 */
function get_featured_products() {
	$query_params = array(
		'post_type' => array(
			ACCESSORY_POST_TYPE,
			CLOTHING_POST_TYPE,
			KITCHEN_POST_TYPE,
			GLOVE_POST_TYPE,
			PACKAGE_POST_TYPE
		),
		'meta_key' => '_featured_position',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key'     => '_featured',
				'value'   => true,
				'compare' => '=',
			),
		)
	);

	$query = new \WP_Query( $query_params );

	if ( $query->post_count == 0 ) {
		$query = get_recent_posts();
	}

	return $query;
}

// TODO
function get_supported_post_types() {
	$post_types_array = array();

	$post_types = array(
		ACCESSORY_POST_TYPE,
		ALUMINUM_POST_TYPE,
		CLOTHING_POST_TYPE,
		KITCHEN_POST_TYPE,
		PACKAGE_POST_TYPE,
		MISCELLANEOUS_POST_TYPE,
	);

	foreach( $post_types as $post_type ) {
		$post_types_array[] = get_post_type_object( $post_type );
	}

	return $post_types_array;
}
