<?php

namespace PackItRightNow\Admin;

use MultiPostThumbnails;

class PostTypeSupport {

	public function register() {
		$this->add_carousel_images();
	}

	function add_carousel_images() {
		$post_types = array(
			ACCESSORY_POST_TYPE,
			CLOTHING_POST_TYPE,
			CUTLERY_POST_TYPE,
			GLOVE_POST_TYPE,
			PACKAGE_POST_TYPE
		);

		if ( class_exists( 'MultiPostThumbnails' ) ) {
			foreach( $post_types as $post_type ) {
				new MultiPostThumbnails( array(
					'label'     => __( 'Carousel Image', 'packitrightnow_com' ),
					'id'        => 'carousel_image',
					'post_type' => $post_type
				) );
			}
		}
	}
}
