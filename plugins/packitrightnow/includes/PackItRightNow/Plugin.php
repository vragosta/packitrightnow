<?php

namespace PackItRightNow;

use PackItRightNow\Taxonomies\TaxonomyFactory;
use PackItRightNow\PostTypes\PostTypeFactory;
use PackItRightNow\Finders\CarouselPostFinder;
use PackItRightNow\Finders\AccessoryFinder;
use PackItRightNow\Finders\ClothingFinder;
use PackItRightNow\Finders\KitchenFinder;
use PackItRightNow\Finders\PackageFinder;
use PackItRightNow\Admin\CarouselPostColumnSupport;
use PackItRightNow\Admin\AccessoryColumnSupport;
use PackItRightNow\Admin\ClothingColumnSupport;
use PackItRightNow\Admin\KitchenColumnSupport;
use PackItRightNow\Admin\PackageColumnSupport;
use PackItRightNow\Admin\MetaBoxes\PostMetaFieldsMetaBox;
use PackItRightNow\Admin\Metaboxes\CarouselPostMetaBox;
use PackItRightNow\Admin\Metaboxes\AccessoryMetaBox;
use PackItRightNow\Admin\Metaboxes\ClothingMetaBox;
use PackItRightNow\Admin\Metaboxes\KitchenMetaBox;
use PackItRightNow\Admin\Metaboxes\PackageMetaBox;
use PackItRightNow\Admin\Metaboxes\TaxonomyMetaBox;
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

		$carousel_post_meta_box = new CarouselPostMetaBox();
		$carousel_post_meta_box->register();

		$accessory_meta_box = new AccessoryMetaBox();
		$accessory_meta_box->register();

		$clothing_meta_box = new ClothingMetaBox();
		$clothing_meta_box->register();

		$kitchen_meta_box = new KitchenMetaBox();
		$kitchen_meta_box->register();

		$package_meta_box = new PackageMetaBox();
		$package_meta_box->register();

		$taxonomy_meta_box = new TaxonomyMetaBox();
		$taxonomy_meta_box->register();

		$carousel_post_column_support = new CarouselPostColumnSupport();
		$carousel_post_column_support->register();

		$accessory_column_support = new AccessoryColumnSupport();
		$accessory_column_support->register();

		$clothing_column_support = new ClothingColumnSupport();
		$clothing_column_support->register();

		$kitchen_column_support = new KitchenColumnSupport();
		$kitchen_column_support->register();

		$package_column_support = new PackageColumnSupport();
		$package_column_support->register();
	}

	function get_accessory_finder( $post_id ) {
		return new AccessoryFinder( $post_id );
	}

	function get_clothing_finder( $post_id ) {
		return new ClothingFinder( $post_id );
	}

	function get_kitchen_finder( $post_id ) {
		return new KitchenFinder( $post_id );
	}

	function get_package_finder( $post_id ) {
		return new PackageFinder( $post_id );
	}

	function get_carousel_post_finder( $post_id ) {
		return new CarouselPostFinder( $post_id );
	}
}
