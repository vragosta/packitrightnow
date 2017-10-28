<?php

namespace PackItRightNow;

/**
 * Get terms that do not have any child terms.
 * NOTE: Ordered by meta_key
 *
 * @since 0.1.0
 * @uses get_terms
 * @return object
 */
function get_parent_terms( $taxonomy_name ) {
	$terms = get_terms( array(
		'taxonomy' => $taxonomy_name,
		'parent' => 0,
		'hide_empty' => false,
		'orderby' => 'meta_value',
		'meta_key' => '_position',
		'order' => ASC,
	) );

	if ( count( $terms ) == 0 ) {
		$terms = get_recent_parent_terms( $taxonomy_name );
	}

	return $terms;
}

/**
 * Get terms that do not have any child terms.
 *
 * @since 0.1.0
 * @uses get_terms
 * @return object
 */
function get_recent_parent_terms( $taxonomy_name ) {
	return get_terms( array(
		'taxonomy' => $taxonomy_name,
		'parent' => 0,
		'hide_empty' => false,
	) );
}

/**
 * Count the terms that do not have any child terms.
 *
 * @since 0.1.0
 * @uses count, get_parent_terms
 * @return int
 */
function count_parent_terms( $taxonomy_name ) {
	return count( get_recent_parent_terms( $taxonomy_name ) );
}

/**
 * Get child terms of parent term.
 *
 * @since 0.1.0
 * @uses get_terms
 * @return object
 */
function get_child_terms( $taxonomy_name, $parent_term_id ) {
	return get_terms( array(
		'taxonomy' => $taxonomy_name,
		'parent' => $parent_term_id
	) );
}
