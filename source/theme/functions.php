<?php
/**
 * Carpel Anther functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Carpel_Anther
 */

if ( ! function_exists( 'carpel_anther_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function carpel_anther_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Carpel Anther, use a find and replace
		 * to change 'carpel-anther' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'carpel-anther', get_template_directory() . '/languages' );

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
    // add_image_size('blog-thumb', 626, 352, true);
    // add_image_size('admin-thumb', 150, 150, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'carpel-anther' ),
			'menu-2' => esc_html__( 'Secondary', 'carpel-anther' ),
			'menu-3' => esc_html__( 'Mobile', 'carpel-anther' ),
		) );

		/*
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

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'carpel_anther_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'carpel_anther_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function carpel_anther_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'carpel_anther_content_width', 640 );
}
add_action( 'after_setup_theme', 'carpel_anther_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function carpel_anther_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'carpel-anther' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'carpel-anther' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'carpel_anther_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function carpel_anther_scripts() {
	wp_enqueue_style( 'carpel-anther-style', get_stylesheet_uri() );

	wp_enqueue_style('carpel-anther-google-fonts', 'https://fonts.googleapis.com/css?family=Fjalla+One|Open+Sans:400,600,700|Raleway:400,500,700', false);

	wp_enqueue_script('carpel-anther-main-scripts', get_template_directory_uri() . '/js/main.js', array('jquery'), '', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'carpel_anther_scripts' );

/**
 * Register custom post types
 */
require get_template_directory() . '/inc/register-custom-types.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Modifications for WordPress admin
 */
require get_template_directory() . '/inc/admin-modifications.php';

/**
 * Custom options for Advanced Custom Fields (ACF)
 */
require get_template_directory() . '/inc/acf-custom-options.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
