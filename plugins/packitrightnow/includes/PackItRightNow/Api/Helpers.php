<?php

namespace PackItRightNow;

use MultiPostThumbnails;

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

function get_post_type_description( $post_type ) {
	$post_type = get_post_type_object( $post_type );
	return $post_type->description ? $post_type->description : NULL;
}

function get_accessories( $taxonomy, $term_slug ) {
	$query_params = array(
		'post_type' => ACCESSORY_POST_TYPE,
		'fields' => 'ids',
		'posts_per_page' => -1,
		'order' => ASC,
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
		'meta_query' => array(
			'relation' => 'OR',
			'accessory_clause' => array(
				'key' => 'accessory_carousel_image_thumbnail_id',
				'compare' => 'EXISTS'
			),
			'clothing_clause' => array(
				'key' => 'clothing_carousel_image_thumbnail_id',
				'compare' => 'EXISTS'
			),
			'cutlery_clause' => array(
				'key' => 'cutlery_carousel_image_thumbnail_id',
				'compare' => 'EXISTS'
			),
			'glove_clause' => array(
				'key' => 'glove_carousel_image_thumbnail_id',
				'compare' => 'EXISTS'
			),
			'package_clause' => array(
				'key' => 'package_carousel_image_thumbnail_id',
				'compare' => 'EXISTS'
			)
		)
	);

	$query = new \WP_Query( $query_args );

	if ( $query->post_count == 0 ) {
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

		$query = new \WP_Query( $query_args );
	}

	return $query;
}

function get_carousel_image( $post ) {
	if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::has_post_thumbnail( $post->post_type, 'carousel_image', $post->ID ) ) {
		return MultiPostThumbnails::get_post_thumbnail_url( $post->post_type, 'carousel_image', $post->ID, 'large' );
	}

	return NULL;
}
