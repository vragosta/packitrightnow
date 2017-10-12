<?php

namespace PackItRightNow;

use PackItRightNow\Taxonomies\TaxonomyFactory;
use PackItRightNow\PostTypes\PostTypeFactory;
use PackItRightNow\Finders\AccessoryFinder;
use PackItRightNow\Finders\ClothingFinder;
use PackItRightNow\Finders\CutleryFinder;
use PackItRightNow\Finders\GloveFinder;
use PackItRightNow\Finders\PackageFinder;
use PackItRightNow\Admin\PostTypeSupport;
use PackItRightNow\Admin\AccessoryColumnSupport;
use PackItRightNow\Admin\ClothingColumnSupport;
use PackItRightNow\Admin\CutleryColumnSupport;
use PackItRightNow\Admin\GloveColumnSupport;
use PackItRightNow\Admin\PackageColumnSupport;
use PackItRightNow\Admin\MetaBoxes\PostMetaFieldsMetaBox;
use PackItRightNow\Admin\Metaboxes\AccessoryMetaBox;
use PackItRightNow\Admin\Metaboxes\ClothingMetaBox;
use PackItRightNow\Admin\Metaboxes\CutleryMetaBox;
use PackItRightNow\Admin\Metaboxes\GloveMetaBox;
use PackItRightNow\Admin\Metaboxes\PackageMetaBox;
use PackItRightNow\REST\V1\Contact;

/**
 * Plugin is the main entry point into the PackItRightNow plugin
 * architecture. This class does not strictly enforce singleton pattern
 * for easier testing. But should be used as a singleton elsewhere.
 *
 * Usage:
 *
 * $plugin = Plugin::get_instance();
 * $plugin->enable();
 *
 * The plugin object holds various objects and dependencies instance of
 * global variables.
 */
class Plugin {

	static public $instance;

	static public function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Plugin();
		}
		return self::$instance;
	}

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'admin_init', array( $this, 'init_admin' ) );
	}

	/**
	 * Instantiates objects and activates various parts of the
	 * PackItRightNow plugin.
	 *
	 * There is an implicit order of declaration here. For instance
	 * Taxonomies must be registered before the Post Types etc.
	 */
	function init() {
		$taxonomy_factory = new TaxonomyFactory();
		$taxonomy_factory->build_all();

		$post_type_factory = new PostTypeFactory();
		$post_type_factory->build_all();

		$router = new Router();
		$router->register();

		$contact_api = new Contact();
		$contact_api->register();
	}

	function init_admin() {
		$postmeta_meta_box = new PostMetaFieldsMetaBox();
		$postmeta_meta_box->register();

		$accessory_meta_box = new AccessoryMetaBox();
		$accessory_meta_box->register();

		$clothing_meta_box = new ClothingMetaBox();
		$clothing_meta_box->register();

		$cutlery_meta_box = new CutleryMetaBox();
		$cutlery_meta_box->register();

		$glove_meta_box = new GloveMetaBox();
		$glove_meta_box->register();

		$package_meta_box = new PackageMetaBox();
		$package_meta_box->register();

		$post_type_support = new PostTypeSupport();
		$post_type_support->register();

		$accessory_column_support = new AccessoryColumnSupport();
		$accessory_column_support->register();

		$clothing_column_support = new ClothingColumnSupport();
		$clothing_column_support->register();

		$cutlery_column_support = new CutleryColumnSupport();
		$cutlery_column_support->register();

		$glove_column_support = new GloveColumnSupport();
		$glove_column_support->register();

		$package_column_support = new PackageColumnSupport();
		$package_column_support->register();
	}

	function get_accessory_finder( $post_id ) {
		return new AccessoryFinder( $post_id );
	}

	function get_clothing_finder( $post_id ) {
		return new ClothingFinder( $post_id );
	}

	function get_cutlery_finder( $post_id ) {
		return new CutleryFinder( $post_id );
	}

	function get_glove_finder( $post_id ) {
		return new GloveFinder( $post_id );
	}

	function get_package_finder( $post_id ) {
		return new PackageFinder( $post_id );
	}
}
