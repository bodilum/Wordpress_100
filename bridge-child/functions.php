<?php

// echo "Stylesheet Dir: " . get_stylesheet_directory();
// echo "Template Dir: " . get_template_directory_uri();

// include_once get_template_directory_uri().'/bodilum/custom_shortcodes.php';

include_once get_template_directory().'/bodilum/custom_shortcodes.php';

if(!function_exists('bridge_qode_child_theme_enqueue_scripts')) {

	Function bridge_qode_child_theme_enqueue_scripts() {
		wp_register_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_style('bridge-childstyle');
	}

	add_action('wp_enqueue_scripts', 'bridge_qode_child_theme_enqueue_scripts', 11);
}



/**
 * enqueue ocb custom css
 */
function ocbCustomCSS()
{
	// $url = get_template_directory_uri() . '/css/bodilum/jquery.mCustomScrollbar.min.css';
	// wp_enqueue_style('mcscroll-styles', $url);
	$url = get_template_directory_uri() . '/css/bodilum/swiper-bundle.min.css';
	wp_enqueue_style('swiperStyles', $url);
	$url = get_template_directory_uri() . '/css/bodilum/locomotive-scroll.min.css';
	wp_enqueue_style('locomotiveScroll-styles', $url);
	$url = get_template_directory_uri() . '/css/bodilum/main_custom_styles.css';
	wp_enqueue_style('ocbCustomStyle', $url);
	$url = get_template_directory_uri() . '/css/bodilum/jBox.all.min.css';
	wp_enqueue_style('jBoxAllStyle', $url);
}
add_action('wp_enqueue_scripts', 'ocbCustomCSS');

/**
 * enqueue ocb custom js
 */
function ocbCustomJS()
{
	global $post;
	$post_id = $post->ID;
	$post_slug = $post->post_name;
	// $post_tags = get_the_tags( $post_id ); 
	$post_tags = wp_get_post_tags($post->ID); 
	$cats = array();

	$post_categories = wp_get_post_categories( $post_id );
		
	foreach($post_categories as $c){
		$cat = get_category( $c );
		$arr = array( 'name' => $cat->name, 'slug' => $cat->slug );
		array_push($cats, $arr);
	}

	wp_enqueue_script( 'tinycolor', get_template_directory_uri() . '/js/bodilum/tinycolor-min.js');
	wp_enqueue_script( 'yt-iframe', 'https://www.youtube.com/iframe_api' );
	wp_enqueue_script('barbajs', get_template_directory_uri() . '/js/bodilum/barba/barba.umd.js');
	wp_enqueue_script('gsap', get_template_directory_uri() . '/js/bodilum/gsap/gsap.min.js');

	wp_enqueue_script('gsap_scroll_to_plugin', get_template_directory_uri() . '/js/bodilum/gsap/ScrollToPlugin.min.js');
	wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/js/bodilum/gsap/ScrollTrigger.min.js');
	wp_enqueue_script('CSSRulePlugin', get_template_directory_uri() . '/js/bodilum/gsap/CSSRulePlugin.min.js');
	wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/bodilum/gsap/TweenMax.min.js');

	wp_enqueue_script('TouchSwipe', get_template_directory_uri() . '/js/bodilum/jquery.touchSwipe.min.js');

	// $url = get_template_directory_uri() . '/js/bodilum/jquery.mCustomScrollbar.concat.min.js';
	// wp_enqueue_script('mcscroll', $url);
	$url = get_template_directory_uri() . '/js/bodilum/swiper-bundle.min.js';
	wp_enqueue_script('swiper', $url);
	$url = get_template_directory_uri() . '/js/bodilum/locomotive-scroll.min.js';
	wp_enqueue_script('locomotiveScroll', $url);
	$url = get_template_directory_uri() . '/js/bodilum/main_custom_scripts.js';
	wp_enqueue_script('ocbCustomScript', $url);
	$url = get_template_directory_uri() . '/js/bodilum/preloadjs.min.js';
	wp_enqueue_script('preloadjs', $url);
	$url = get_template_directory_uri() . '/js/bodilum/jBox.all.min.js';
	wp_enqueue_script('jBoxAll', $url);
	
	$homePostID = 14869;
	$showreelLink = get_post_meta($homePostID, 'showreel_video_link', true);

	wp_localize_script('ocbCustomScript', 'script_vars', array('post_id' => $post_id, 'pg_slug' => $post_slug, 
	'categories' => $cats, 'tags' => $post_tags, 'showreelVidLink' => $showreelLink ));
}
add_action('wp_enqueue_scripts', 'ocbCustomJS');




// Creates Our Works Custom Post Type 
function our_works_init() { 
	$args = array( 
	'label' => 'Our Works', 
	'public' => true, 
	'show_ui' => true, 
	'capability_type' => 'post', 
	'hierarchical' => false, 
	'rewrite' => array('slug' => 'our-works'), 
	'query_var' => true, 
	'menu_icon' => 'dashicons-video-alt', 
	'supports' => array( 
	'title', 
	'editor', 
	'excerpt', 
	'trackbacks', 
	'custom-fields', 
	'comments', 
	'revisions', 
	'thumbnail', 
	'author', 
	'page-attributes',) 
	); 
	register_post_type( 'our-works', $args ); 
	
	} 
	add_action( 'init', 'our_works_init' );

	

	