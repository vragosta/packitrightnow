<?php

namespace PackItRightNow\Admin;

use PackItRightNow\Finders\CutleryFinder;

class CutleryColumnSupport {

	public function register() {
		add_filter( 'manage_cutlery_posts_columns', array( $this, 'cutlery_table_head' ) );
		add_action( 'manage_cutlery_posts_custom_column', array( $this, 'cutlery_table_content' ), 10, 2 );
	}

	function cutlery_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['cutlery_id']  = __( 'Cutlery ID', 'packitrightnow_com' );
		$defaults['feature']  = __( 'Feature', 'packitrightnow_com' );
		$defaults['carousel'] = __( 'Carousel', 'packitrightnow_com' );
		$defaults['types'] = __( 'Cutlery Types', 'packitrightnow_com' );

		return $defaults;
	}

	function cutlery_table_content( $column_name, $post_id ) {

		$finder = new CutleryFinder( $post_id );

		switch ( $column_name ) {

			case 'cutlery_id':
				$cutlery_id = $finder->get_post_id();

				if ( $cutlery_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $cutlery_id ) ), $cutlery_id );
				} else {
					echo 'None';
				}
				break;

			case 'feature':
				$feature = $finder->is_featured();

				if ( $feature ) {
					echo 'Yes';
				} else {
					echo '';
				}
				break;

			case 'carousel':
				$carousel = $finder->is_carousel();

				if ( $carousel ) {
					echo 'Yes';
				} else {
					echo '';
				}
				break;

			case 'types':
				$cutlery_id = $finder->get_post_id();
				$types = wp_get_post_terms( $cutlery_id, CUTLERY_TYPE_TAXONOMY );

				if ( $types ) {
					foreach( $types as $type ) {
						printf( '<a href="%s">%s</a><br>', get_edit_term_link( intval( $type->term_id ), CUTLERY_TYPE_TAXONOMY, CUTLERY_POST_TYPE ), $type->name );
					}
				} else {
					echo 'None';
				}
				break;

		}
	}
}
