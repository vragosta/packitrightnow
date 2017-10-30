<?php

namespace PackItRightNow\Admin;

use PackItRightNow\Finders\CarouselPostFinder;

class CarouselPostColumnSupport {

	public function register() {
		add_filter( 'manage_carousel_post_posts_columns', array( $this, 'carousel_post_table_head' ) );
		add_action( 'manage_carousel_post_posts_custom_column', array( $this, 'carousel_post_table_content' ), 10, 2 );
	}

	function carousel_post_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['carousel_post_id']  = __( 'Carousel Post ID', 'packitrightnow_com' );
		$defaults['position']  = __( 'Position', 'packitrightnow_com' );

		return $defaults;
	}

	function carousel_post_table_content( $column_name, $post_id ) {

		$finder = new CarouselPostFinder( $post_id );

		switch ( $column_name ) {

			case 'carousel_post_id':
				$carousel_post_id = $finder->get_post_id();

				if ( $carousel_post_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $carousel_post_id ) ), $carousel_post_id );
				} else {
					echo 'None';
				}
				break;

			case 'position':
				$position = $finder->is_position();

				if ( $position ) {
					echo 'Yes';
				} else {
					echo '';
				}
				break;

		}
	}
}
