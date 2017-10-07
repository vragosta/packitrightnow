<?php

namespace PackItRightNow\Taxonomies;

class TaxonomyFactory {

	public $taxonomies = array();

	public function build( $taxonomy ) {
		if ( $this->exists( $taxonomy ) ) {
			return $this->taxonomies[ $taxonomy ];
		} else {
			switch ( $taxonomy ) {
				case FACEGEAR_TAXONOMY:
					$instance = new FaceGearTaxonomy();
					break;
				case HEADGEAR_TAXONOMY:
					$instance = new HeadGearTaxonomy();
					break;
				case MISCELLANEOUS_TAXONOMY:
					$instance = new MiscellaneousTaxonomy();
					break;

				default:
					throw new \Exception(
						"TaxonomyFactory - Unknown Taxonomy: $taxonomy"
					);
			}

			$instance->register();
			$this->taxonomies[ $taxonomy ] = $instance;

			return $instance;
		}
	}

	public function build_all() {
		foreach ( $this->get_supported_taxonomies() as $taxonomy ) {
			$this->build( $taxonomy );
		}
	}

	public function exists( $taxonomy ) {
		return ! empty( $this->taxonomies[ $taxonomy ] );
	}

	public function get_supported_taxonomies() {
		$taxonomies = array(
			FACEGEAR_TAXONOMY,
			HEADGEAR_TAXONOMY,
			MISCELLANEOUS_TAXONOMY
		);

		$taxonomies = apply_filters( 'packitrightnow_taxonomies', $taxonomies );

		return $taxonomies;
	}

}
