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
function get_featured_image( $post_id, $size = 'medium' ) {
	return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size )[0];
}

/**
 * Get the term featured image.
 *
 * @since 0.1.0
 * @uses get_terms
 * @return object
 */
function get_term_image( $id ) {
	return get_term_meta( $id, '_featured_image_url', true );
}

/**
 * Get the about page excerpt.
 *
 * @since 0.1.0
 * @uses get_page_by_path
 * @return object
 */
function get_about_excerpt() {
	$page = get_page_by_path( 'about' );
	return $page->post_excerpt;
}
