<?php

namespace PackItRightNow\Taxonomies;

/**
 * Hierarchial taxonomy declaration for KitPiece.
 */
class KitPieceTaxonomy extends BaseTaxonomy {
	public function get_name() {
		return KIT_PIECE_TAXONOMY;
	}

	public function get_labels() {
		return array(
			'name'                       => __( 'Kit Pieces', 'packitrightnow_com' ),
			'singular_name'              => __( 'Kit Piece', 'packitrightnow_com' ),
			'menu_name'                  => __( 'Kit Pieces', 'packitrightnow_com' ),
			'all_items'                  => __( 'All Kit Pieces', 'packitrightnow_com' ),
			'parent_item'                => __( 'Parent Kit Piece', 'packitrightnow_com' ),
			'parent_item_colon'          => __( 'Parent Kit Piece:', 'packitrightnow_com' ),
			'new_item_name'              => __( 'New Kit Piece', 'packitrightnow_com' ),
			'add_new_item'               => __( 'Add New Kit Piece', 'packitrightnow_com' ),
			'edit_item'                  => __( 'Edit Kit Piece', 'packitrightnow_com' ),
			'update_item'                => __( 'Update Kit Piece', 'packitrightnow_com' ),
			'separate_items_with_commas' => __( 'Separate Kit Pieces with commas', 'packitrightnow_com' ),
			'search_items'               => __( 'Search Kit Pieces', 'packitrightnow_com' ),
			'add_or_remove_items'        => __( 'Add or remove Kit Piece', 'packitrightnow_com' ),
			'choose_from_most_used'      => __( 'Choose from the most used Kit Pieces', 'packitrightnow_com' ),
			'not_found'                  => __( 'Not Found', 'packitrightnow_com' )
		);
	}

	public function get_options() {
		return array(
			'labels'            => $this->get_labels(),
			'hierarchical'      => true,
			'public'            => true,
			'show_admin_column' => false,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'show_ui'           => true,
			'query_var'         => true
		);
	}

	public function get_post_types() {
		return array(
			CUTLERY_POST_TYPE
		);
	}
}
