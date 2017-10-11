<?php

namespace PackItRightNow;

use MultiPostThumbnails;

/**
 * Get the featured image of a post.
 *
 * @since 0.1.0
 * @param int $post_id
 * @uses wp_get_attachment_image_src, get_post_thumbnail_id
 * @return string
 */
function get_featured_image( $post_id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'large' )[0];
}

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

function get_recent_posts() {
	$query_args = array(
		'post_type' => array(
			ACCESSORY_POST_TYPE,
			CLOTHING_POST_TYPE,
			CUTLERY_POST_TYPE,
			GLOVE_POST_TYPE,
			PACKAGE_POST_TYPE
		),
		'posts_per_page' => 6
	);

	return new \WP_Query( $query_args );
}

/**
 * Get posts by meta query of carousel image.
 *
 * @since 0.1.0
 * @uses wp_query
 * @return object
 */
function get_carousel_posts() {
	$query_args = array(
		'post_type' => array(
			ACCESSORY_POST_TYPE,
			CLOTHING_POST_TYPE,
			CUTLERY_POST_TYPE,
			GLOVE_POST_TYPE,
			PACKAGE_POST_TYPE
		),
		'posts_per_page' => 6,
		'meta_key' => '_carousel_position',
		'orderby' => 'meta_value',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => '_carousel',
				'value' => true,
				'compare' => '='
			)
		)
	);

	$query = new \WP_Query( $query_args );

	if ( $query->post_count == 0 ) {
		$query = get_recent_posts();
	}

	return $query;
}

/**
 * Get carousel image.
 *
 * @since 0.1.0
 * @param object $post
 * @uses class_exists, has_post_thumbnail, get_post_thumbnail_url
 * @return string
 */
function get_carousel_image( $post ) {
	if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( $post->post_type, 'carousel_image', $post->ID ) ) {
		return MultiPostThumbnails::get_post_thumbnail_url( $post->post_type, 'carousel_image', $post->ID, 'large' );
	}

	return NULL;
}

function get_featured_products() {
	$query_params = array(
		'post_type' => array(
			ACCESSORY_POST_TYPE,
			CLOTHING_POST_TYPE,
			CUTLERY_POST_TYPE,
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

	return $query;
}
