<?php

namespace PackItRightNow\Taxonomies;

/**
 * Overrides for the Core Category Taxonomy
 */
class CategoryTaxonomy extends BaseTaxonomy {

	public function get_name() {
		return CATEGORY_TAXONOMY;
	}

	public function register() {
		$taxonomy = get_taxonomy( CATEGORY_TAXONOMY );
		$taxonomy->show_ui = current_user_can( 'manage_categories' );
		$taxonomy->capabilities = [
			'manage_terms'  => 'manage_categories',
			'edit_terms'    => 'edit_categories',
			'delete_terms'  => 'delete_categories',
			'assign_terms'  => 'assign_categories',
		];

		register_taxonomy(
			CATEGORY_TAXONOMY, [ 'post', 'page' ], (array) $taxonomy
		);
	}

}
