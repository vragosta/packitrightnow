<?php

namespace PackItRightNow\Admin;

use PackItRightNow\Finders\ClothingFinder;

class ClothingColumnSupport {

	public function register() {
		add_filter( 'manage_clothing_posts_columns', array( $this, 'clothing_table_head' ) );
		add_action( 'manage_clothing_posts_custom_column', array( $this, 'clothing_table_content' ), 10, 2 );
	}

	function clothing_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['clothing_id']  = __( 'Clothing ID', 'packitrightnow_com' );
		$defaults['feature']  = __( 'Feature', 'packitrightnow_com' );
		$defaults['types'] = __( 'Clothing Types', 'packitrightnow_com' );

		return $defaults;
	}

	function clothing_table_content( $column_name, $post_id ) {

		$finder = new ClothingFinder( $post_id );

		switch ( $column_name ) {

			case 'clothing_id':
				$clothing_id = $finder->get_post_id();

				if ( $clothing_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $clothing_id ) ), $clothing_id );
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

			case 'types':
				$clothing_id = $finder->get_post_id();
				$types = wp_get_post_terms( $clothing_id, CLOTHING_TYPE_TAXONOMY );

				if ( $types ) {
					foreach( $types as $type ) {
						printf( '<a href="%s">%s</a><br>', get_edit_term_link( intval( $type->term_id ), CLOTHING_TYPE_TAXONOMY, CLOTHING_POST_TYPE ), $type->name );
					}
				} else {
					echo 'None';
				}
				break;

		}
	}
}
