<?php
/**
 * PackItRightNow - Twenty Seventeen functions and definitions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * @package PackItRightNow - Twenty Seventeen
 * @since 0.1.0
 */
# Useful global constants.
define( 'PACKITRIGHTNOW_TEMPLATE_URL', get_template_directory_uri() );
define( 'PACKITRIGHTNOW_PATH', get_template_directory() . '/' );

/**
 * Declare theme support.
 *
 * @since 0.1.0
 * @uses add_theme_support(), set_post_thumbnail_size(), add_image_size(), and add_post_type_support(), show_admin_bar()
 * @return void
 */
function setup() {
	# Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	# Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	# Add excerpt support to...
	add_post_type_support( 'page', 'excerpt' );

	# If set to 'false', the admin bar will not display on front end.
	show_admin_bar( false );
}
add_action( 'after_setup_theme', 'setup' );

/**
 * Enqueue scripts for front-end.
 *
 * @since 0.1.0
 * @uses wp_register_script(), p_enqueue_script(), wp_localize_script()
 * @return void
 */
function scripts() {
	wp_register_script(
		'bootstrap',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/lib/bootstrap/dist/js/bootstrap.min.js",
		array( 'jquery' ),
		PACKITRIGHTNOW_VERSION,
		true
	);

	wp_register_script(
		'slick',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js',
		array( 'jquery' ),
		PACKITRIGHTNOW_VERSION,
		true
	);

	wp_enqueue_script(
		'packitrightnow',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/js/packitrightnow---twenty-seventeen.js",
		array( 'jquery', 'slick', 'bootstrap' ),
		PACKITRIGHTNOW_VERSION,
		true
	);

	wp_localize_script(
		'packitrightnow',
		'PackItRightNow', array(
			'themeUrl' => PACKITRIGHTNOW_TEMPLATE_URL,
			'options'  => array(
				'apiUrl'  => home_url( '/wp-json/v1' ),
				'homeUrl' => home_url(),
				'nonce'   => wp_create_nonce( 'wp_rest' ),
			)
		)
	);
}
add_action( 'wp_enqueue_scripts', 'scripts' );

/**
 * Enqueue styles for front-end.
 *
 * @since 0.1.0
 * @uses wp_register_style(), wp_enqueue_style()
 * @return void
 */
function styles() {
	wp_register_style(
		'fonts',
		'https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i|Lato:100,100i,300,300i,400,400i,700,700i,900,900i',
		array(),
		PACKITRIGHTNOW_VERSION
	);

	wp_register_style(
		'fontawesome',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/lib/fontawesome/css/font-awesome.min.css",
		array(),
		PACKITRIGHTNOW_VERSION
	);

	wp_register_style(
		'ionicons',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/lib/ionicons/css/ionicons.min.css",
		array(),
		PACKITRIGHTNOW_VERSION
	);

	wp_register_style(
		'bootstrap',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/lib/bootstrap/dist/css/bootstrap.min.css",
		array(),
		PACKITRIGHTNOW_VERSION
	);

	wp_register_style(
		'sanitize',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/lib/sanitize/sanitize.min.css",
		array(),
		PACKITRIGHTNOW_VERSION
	);

	wp_register_style(
		'slick',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css',
		array(),
		PACKITRIGHTNOW_VERSION
	);

	wp_register_style(
		'slick-theme',
		'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css',
		array( 'slick' ),
		PACKITRIGHTNOW_VERSION
	);

	wp_enqueue_style(
		'packitrightnow',
		PACKITRIGHTNOW_TEMPLATE_URL . "/assets/css/packitrightnow---twenty-seventeen.css",
		array( 'fonts', 'fontawesome', 'ionicons', 'bootstrap', 'sanitize', 'slick-theme' ),
		PACKITRIGHTNOW_VERSION
	);
}
add_action( 'wp_enqueue_scripts', 'styles' );
