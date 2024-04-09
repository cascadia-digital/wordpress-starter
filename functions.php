<?php
/**
 * Cascadia Starter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Cascadia_Starter
 */

if ( ! defined( 'CASCADIA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'CASCADIA_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cascadia_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function cascadia_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Cascadia Starter, use a find and replace
		 * to change 'cascadia-starter' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'cascadia-starter', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cascadia-starter' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		// add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add responsive embeds and block editor styles.
		 */
		add_theme_support( 'responsive-embeds' );
		add_theme_support( 'editor-styles' );
		add_editor_style( 'style-editor.css' );

        // remove support for emojis
        // Emoji Scripts
        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');

        // RSS Feed Links
        remove_action('wp_head', 'feed_links', 2);
        remove_action('wp_head', 'feed_links_extra', 3);

        // RSD (Really Simple Discovery) Link
        remove_action('wp_head', 'rsd_link');

        // WLW (Windows Live Writer) Manifest Link
        remove_action('wp_head', 'wlwmanifest_link');

        // Shortlink
        remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

        // REST API Links
        remove_action('wp_head', 'rest_output_link_wp_head', 10);

        // oEmbed Discovery Links
        remove_action('wp_head', 'wp_oembed_add_discovery_links');

        // WP Generator Tag
        remove_action('wp_head', 'wp_generator');

        // JavaScript from HTML5 Galleries
        remove_action('wp_head', 'print_emoji_detection_script', 7);

        // WordPress Version in HTML Meta Tags
        remove_action('wp_head', 'wp_generator');


	}
endif;
add_action( 'after_setup_theme', 'cascadia_setup' );

/**
 * Remove customizer options.
 *
 * @since 1.0.0
 * @param object $wp_customize
 */



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cascadia_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cascadia_content_width', 960 );
}
add_action( 'after_setup_theme', 'cascadia_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cascadia_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cascadia-starter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cascadia-starter' ),
			'before_widget' => '<section id="%1$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2>',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cascadia_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cascadia_scripts() {
	wp_enqueue_style( 'cascadia-starter-style', get_stylesheet_directory_uri() . '/dist/css/app.css', array(), CASCADIA_VERSION );
	wp_enqueue_script( 'cascadia-starter-alpine', get_template_directory_uri() . '/dist/js/app.js', array(), '3.3.2', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cascadia_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * ACF Settings Page.
 */
require get_template_directory() . '/inc/acf-options.php';
