<?php

namespace PackItRightNow;

function get_accessories( $taxonomy, $term_slug ) {
	$query_params = array(
		'post_type' => ACCESSORY_POST_TYPE,
		'fields' => 'ids',
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

function get_featured_image( $post_id ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'medium_square' )[0];
}
