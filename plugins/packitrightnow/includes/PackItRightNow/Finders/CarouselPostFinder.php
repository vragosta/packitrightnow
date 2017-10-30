<?php

namespace PackItRightNow\Finders;

/**
 * CarouselPostFinder is a central place to find and filter projects in the theme.
 * API Helpers are provider in the \PackItRightNow namespace to commonly
 * used methods below.
 *
 * Usage:
 *
 * $finder = new CarouselPostFinder();
 * $finder->get_foo();
 */
class CarouselPostFinder {

	public $post_id;
	public $post;

	public function __construct( $post_id ) {
		$this->post_id = $post_id;
	}

	public function get_post_id() {
		return $this->post_id;
	}

	public function get_post() {
		if ( is_null( $this->post ) ) {
			$this->post = get_post( $this->post_id );
		}
		return $this->post;
	}

	public function get_position() {
		return get_post_meta( $this->post_id, '_carousel_position', true );
	}

}
