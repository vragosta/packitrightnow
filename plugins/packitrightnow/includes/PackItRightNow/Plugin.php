<?php

namespace PackItRightNow;

use PackItRightNow\Taxonomies\TaxonomyFactory;
use PackItRightNow\PostTypes\PostTypeFactory;

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

	public $post_type_factory;
	public $router;

	public function enable() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Instantiates objects and activates various parts of the
	 * PackItRightNow plugin.
	 *
	 * There is an implicit order of declaration here. For instance
	 * Taxonomies must be registered before the Post Types etc.
	 */
	function init() {
		$this->taxonomy_factory = new TaxonomyFactory();
		$this->taxonomy_factory->build_all();

		$this->post_type_factory = new PostTypeFactory();
		$this->post_type_factory->build_all();

		$this->router = new Router();
		$this->router->register();
	}
}
