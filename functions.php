<?php
/**
 * Odd Dog SMB functions and definitions
 *
 * @package Odd Dog SMB
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'odddog_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function odddog_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Odd Dog SMB, use a find and replace
	 * to change 'odddog' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'odddog', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'odddog' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'odddog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // odddog_setup
add_action( 'after_setup_theme', 'odddog_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function odddog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'odddog' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	// Footer Widget Setting
	$odd_footer_layout = get_theme_mod( 'odd_footer_layout' );
	if($odd_footer_layout == 'one'):
		$widget_column = 'col-md-12 col-sm-12 col-xs-12';
	elseif($odd_footer_layout == 'two'):
		$widget_column = 'col-md-6 col-sm-6 col-xs-12';
	elseif($odd_footer_layout == 'three'):
		$widget_column = 'col-md-4 col-sm-4 col-xs-12';
	elseif($odd_footer_layout == 'four'):
		$widget_column = 'col-md-3 col-sm-3 col-xs-12';
	else:
		$widget_column = 'hidden';
	endif;

	register_sidebar( array(
		'name'          => __( 'Footer', 'odddog' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s '.$widget_column.'">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'odddog_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function odddog_scripts() {
	wp_enqueue_style( 'odddog-style', get_stylesheet_uri() );
	wp_register_style( 'bootstrap-styles', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '20150414', 'screen' );
	wp_register_style( 'main-styles', get_template_directory_uri() . '/css/main.css', array(), '20150414', 'screen' );
	wp_register_style( 'responsive-styles', get_template_directory_uri() . '/css/responsive.css', array(), '20150414', 'screen' );

	wp_enqueue_style( 'bootstrap-styles' );
	wp_enqueue_style( 'main-styles' );
	wp_enqueue_style( 'responsive-styles' );

	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20150414', true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array(), '20150414', true );
	//wp_enqueue_script( 'odddog-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
}
add_action( 'wp_enqueue_scripts', 'odddog_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Odd Dog Settings to WP Customizer.
 */
require get_template_directory() . '/inc/odddog_settings.php';

/**
 * Load Odd Dog Shortcodes.
 */
require get_template_directory() . '/inc/odddog_shortcodes.php';

/**
 * Load Odd Dog Widgets.
 */
require get_template_directory() . '/inc/odddog_widgets.php';

/**
 * Load Odd Dog VC Elements
 */
require get_template_directory() . '/inc/odddog_vc_elements.php';

/**
 * Register Bootstrap Walker Nav
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

/**
 * Load Odd Dog Meta Boxes
 */
require get_template_directory() . '/inc/odddog_metaboxes.php';
//require get_template_directory() . '/inc/adwords_metaboxes.php';

/*
 * Remove Yoast SEO Schema
 */
add_filter( 'disable_wpseo_json_ld_search', '__return_true' );

/*
 * Redirect non-logged in users who try to access private pages to Login Screen
 */
function redirect_to_login() {
  global $wp_query,$wpdb;
  if (is_404()) {
    $private = $wpdb->get_row($wp_query->request);
    if( 'private' == $private->post_status  ) {
      wp_safe_redirect(home_url('/wp-login.php'));
      die;
    }
  }
}
add_action('template_redirect', 'redirect_to_login');


function add_sitelock_tag() {
    echo "\n" . '<meta name="sitelock-site-verification" content="7463" />' . "\n";
}
add_action('wp_head', 'add_sitelock_tag');

/*
 * Add Widget Area to Top and Bottom of Single Page
 */
function signup_widgets_init() {
    register_sidebar( array(
        'name' => __( 'CTA Widget Area', 'signup' ),
        'id' => 'cta-widget-area',
        'before_widget' => '<div style="text-align:center; padding-bottom: 20px;">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'signup_widgets_init' );
