<?php

namespace PackItRightNow;

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
