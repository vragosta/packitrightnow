<?php

namespace PackItRightNow\Admin;

use PackItRightNow\Finders\KitchenFinder;

class KitchenColumnSupport {

	public function register() {
		add_filter( 'manage_kitchen_posts_columns', array( $this, 'kitchen_table_head' ) );
		add_action( 'manage_kitchen_posts_custom_column', array( $this, 'kitchen_table_content' ), 10, 2 );
	}

	function kitchen_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['kitchen_id']  = __( 'Kitchen ID', 'packitrightnow_com' );
		$defaults['feature']  = __( 'Feature', 'packitrightnow_com' );
		$defaults['types'] = __( 'Kitchen Types', 'packitrightnow_com' );

		return $defaults;
	}

	function kitchen_table_content( $column_name, $post_id ) {

		$finder = new KitchenFinder( $post_id );

		switch ( $column_name ) {

			case 'kitchen_id':
				$kitchen_id = $finder->get_post_id();

				if ( $kitchen_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $kitchen_id ) ), $kitchen_id );
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
				$kitchen_id = $finder->get_post_id();
				$types = wp_get_post_terms( $kitchen_id, KITCHEN_TYPE_TAXONOMY );

				if ( $types ) {
					foreach( $types as $type ) {
						printf( '<a href="%s">%s</a><br>', get_edit_term_link( intval( $type->term_id ), KITCHEN_TYPE_TAXONOMY, KITCHEN_POST_TYPE ), $type->name );
					}
				} else {
					echo 'None';
				}
				break;

		}
	}
}
