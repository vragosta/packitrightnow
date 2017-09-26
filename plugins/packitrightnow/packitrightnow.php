<?php
/**
 * Plugin Name: Pack It Right Now
 * Description: Pack It Right Now shared plugin
 * Version: 0.1.0
 * Author: Vincent Ragosta
 * Author URI: http://www.vincentragosta.com
 * Text Domain: packitrightnow_com
 * Domain Path: /languages
 */

require_once( __DIR__ . '/config.php' );

/**
 *
 * Loads the Plugin's PHP autoloader.
 */
function packitrightnow_autoload() {
	if ( packitrightnow_can_autoload() ) {
		require_once( packitrightnow_autoloader() );
		return true;
	} else {
		return false;
	}
}

/**
 * In server mode we can autoload if autoloader file exists. For
 * test environments we prevent autoloading of the plugin to prevent
 * global pollution and for better performance.
 */
function packitrightnow_can_autoload() {
	if ( ! defined( 'PHPUNIT_RUNNER' ) ) {
		if ( file_exists( packitrightnow_autoloader() ) ) {
			return true;
		} else {
			error_log(
				"Fatal Error: Composer not setup in " . PACKITRIGHTNOW_PLUGIN_DIR
			);
			return false;
		}
	} else {
		return false;
	}
}

/**
 * Defaults is Composer's autoloader
 */
function packitrightnow_autoloader() {
	return PACKITRIGHTNOW_PLUGIN_DIR . '/vendor/autoload.php';
}

/**
 * Plugin code entry point. Singleton instance is used to maintain single
 * instance of the plugin throughout the current lifecycle.
 */
function packitrightnow_autorun() {
	if ( packitrightnow_autoload() ) {
		$plugin = \PackItRightNow\Plugin::get_instance();
		$plugin->enable();
	} else {
		add_action( 'admin_notices', 'packitrightnow_autoload_notice' );
	}
}

function packitrightnow_autoload_notice() {
	$class = 'notice notice-error';
	$message = __( 'Autoload is not setup. Remember to run composer install on the Pack It Right Now plugin.', 'packitrightnow_com' );
	printf( '<div class="%1$s"><p>%2$s</p></div>', $class, $message );
}

packitrightnow_autorun();
