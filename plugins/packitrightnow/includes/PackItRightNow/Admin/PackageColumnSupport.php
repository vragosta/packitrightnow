<?php

namespace PackItRightNow\Admin;

use PackItRightNow\Finders\PackageFinder;

class PackageColumnSupport {

	public function register() {
		add_filter( 'manage_package_posts_columns', array( $this, 'package_table_head' ) );
		add_action( 'manage_package_posts_custom_column', array( $this, 'package_table_content' ), 10, 2 );
	}

	function package_table_head( $defaults ) {
		unset( $defaults['categories'] );
		unset( $defaults['comments'] );

		$defaults['package_id']  = __( 'Package ID', 'packitrightnow_com' );
		$defaults['feature']  = __( 'Feature', 'packitrightnow_com' );
		$defaults['types'] = __( 'Package Types', 'packitrightnow_com' );

		return $defaults;
	}

	function package_table_content( $column_name, $post_id ) {

		$finder = new PackageFinder( $post_id );

		switch ( $column_name ) {

			case 'package_id':
				$package_id = $finder->get_post_id();

				if ( $package_id ) {
					printf( '<a href="%s">%s</a><br>', get_edit_post_link( intval( $package_id ) ), $package_id );
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
				$package_id = $finder->get_post_id();
				$types = wp_get_post_terms( $package_id, PACKAGE_TYPE_TAXONOMY );

				if ( $types ) {
					foreach( $types as $type ) {
						printf( '<a href="%s">%s</a><br>', get_edit_term_link( intval( $type->term_id ), PACKAGE_TYPE_TAXONOMY, PACKAGE_POST_TYPE ), $type->name );
					}
				} else {
					echo 'None';
				}
				break;

		}
	}
}
