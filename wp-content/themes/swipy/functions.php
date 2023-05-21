<?php
/**
 * @author  rs-theme
 * @since   1.0
 * @version 1.0 
 */

if ( ! function_exists( 'swipy_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 

function swipy_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on swipy, use a find and replace
	 * to change 'swipy' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'swipy', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );	
	
	function swipy_change_excerpt( $text )
	{
		$pos = strrpos( $text, '[');
		if ($pos === false)
		{
			return $text;
		}
		
		return rtrim (substr($text, 0, $pos) ) . '...';
	}
	add_filter('get_the_excerpt', 'swipy_change_excerpt');


	// Limit Excerpt Length by number of Words
	function swipy_custom_excerpt( $limit ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
		}
		function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
		} else {
		$content = implode(" ",$content);
		}
		$content = preg_replace('/[.+]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'swipy' ),
		'menu-2' => esc_html__( 'Single Menu', 'swipy' ),	
		'menu-3' => esc_html__( 'Footer Menu', 'swipy' ),
		'menu-4' => esc_html__( 'Menu Left', 'swipy' ),			
		'menu-5' => esc_html__( 'Menu Right', 'swipy' ),		
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
	add_theme_support( 'custom-background', apply_filters( 'swipy_custom_background_args', array(
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

	//add support posts format
	add_theme_support( 'post-formats', array( 
		'aside', 
		'gallery',
		'audio',
		'video',
		'image',
		'quote',
		'link',
	) );

add_theme_support( 'align-wide' );	
}

endif;
add_action( 'after_setup_theme', 'swipy_setup' );

/**
*Custom Image Size
*/

add_image_size( 'swipy_portfolio-slider', 520, 640, true );
add_image_size( 'swipy_blog-slider', 760, 560, true );
add_image_size( 'swipy_blog-grid', 500, 440, true );
add_image_size( 'swipy_blog-footer', 100, 100, true );
add_image_size( 'swipy_team_size', 310, 270, true );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function swipy_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'swipy_content_width', 640 );
}
add_action( 'after_setup_theme', 'swipy_content_width', 0 );

/**
 * 
 * Add custom shortcodes
 * 
 */
require_once get_template_directory() . '/inc/custom-shortcodes.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 *  Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/template-scripts.php';



/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/template-sidebar.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';


require_once get_template_directory() . '/framework/custom.php';
require_once get_template_directory() . '/libs/theme-option/config.php';

// TGM Plugin Activation
if (is_admin()) {
	require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
	require_once get_template_directory() . '/framework/tgm-config.php';	
}

/**
 * WooCommerce additions.
 */
require_once get_template_directory() . '/inc/woocommerce-functions.php';


function swipy_remove_demo_mode_link() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'swipy_remove_demo_mode_link');


/**
 * Registers an editor stylesheet for the theme.
 */
function swipy_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'swipy_theme_add_editor_styles' );


//remove revolution slid metabox

function swipy_remove_revolution_slider_meta_boxes() {	
	
	remove_meta_box( 'mymetabox_revslider_0', 'teams', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'page', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'post', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'rsclient', 'normal' );
	remove_meta_box( 'mymetabox_revslider_0', 'gallery', 'normal' );
}
add_action( 'do_meta_boxes', 'swipy_remove_revolution_slider_meta_boxes' );	



//------------------------------------------------------------------------
//Organize Comments form field
//-----------------------------------------------------------------------
function swipy_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'swipy_wpb_move_comment_field_to_bottom' );	

add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});


function swipy_comment_textarea_placeholder( $args ) {
	$replace_comment = __('Comment*', 'swipy');
	$args['comment_field']        = str_replace( '<textarea', '<textarea placeholder="'.$replace_comment.'"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'swipy_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function swipy_comment_form_fields( $fields ) {
	$replace_author = __('Name*', 'swipy');
    $replace_email = __('Email*', 'swipy');
    $website_url = __('Website', 'swipy');
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="'.$replace_author.'"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="'.$replace_email.'"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="'.$website_url.'"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'swipy_comment_form_fields' );