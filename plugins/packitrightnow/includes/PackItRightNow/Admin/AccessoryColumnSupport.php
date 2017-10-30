<?php

namespace PackItRightNow\Admin;

use PackItRightNow\Finders\AccessoryFinder;

class AccessoryColumnSupport {

	public function register() {
		add_filter( 'manage_accessory_posts_columns', array( $this, 'accessory_table_head' ) );
		add_action( 'manage_accessory_posts_custom_column', array( $this, 'accessory_table_content' ), 10, 2 );
	}

	function accessory_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['accessory_id']  = __( 'Accessory ID', 'packitrightnow_com' );
		$defaults['feature']  = __( 'Feature', 'packitrightnow_com' );
		$defaults['types'] = __( 'Accessory Types', 'packitrightnow_com' );

		return $defaults;
	}

	function accessory_table_content( $column_name, $post_id ) {

		$finder = new AccessoryFinder( $post_id );

		switch ( $column_name ) {

			case 'accessory_id':
				$accessory_id = $finder->get_post_id();

				if ( $accessory_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $accessory_id ) ), $accessory_id );
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
				$accessory_id = $finder->get_post_id();
				$types = wp_get_post_terms( $accessory_id, ACCESSORY_TYPE_TAXONOMY );

				if ( $types ) {
					foreach( $types as $type ) {
						printf( '<a href="%s">%s</a><br>', get_edit_term_link( intval( $type->term_id ), ACCESSORY_TYPE_TAXONOMY, ACCESSORY_POST_TYPE ), $type->name );
					}
				} else {
					echo 'None';
				}
				break;

		}
	}
}
