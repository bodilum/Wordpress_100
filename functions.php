<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

// make available custom shortcodes
require_once(get_template_directory().'/functions/custom-shortcodes.php');



if( !function_exists('sianaJS') ) {

	function sianaJS() {
		global $post;
		$post_id = $post->ID;
		$post_slug = $post->post_name;
		// $post_tags = get_the_tags( $post_id );
		$post_tags = wp_get_post_tags($post->ID);
		$cats = array();

		$post_categories = wp_get_post_categories( $post_id );

		// count all posts of post type course that are published
		$numOfCourses = wp_count_posts( 'course' ) -> publish;
		// echo 'Number of courses: ' . $numOfCourses;
			
		foreach($post_categories as $c){
			$cat = get_category( $c );
			$arr = array( 'name' => $cat->name, 'slug' => $cat->slug );
			array_push($cats, $arr);
		}

        wp_enqueue_script( 'three-min', get_template_directory_uri() . '/node_modules/three/build/three.min.js', array(), null, false );
        wp_enqueue_script( 'three-main', get_template_directory_uri() . '/assets/scripts/three-main.js' );
		wp_enqueue_script('locomotiveScroll1', get_template_directory_uri() . '/assets/scripts/locomotive-scroll.min.js');
		wp_enqueue_script('gsap_scroll_to_plugin', get_template_directory_uri() . '/assets/scripts/gsap/ScrollToPlugin.min.js');
		wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/assets/scripts/gsap/ScrollTrigger.min.js');
		wp_enqueue_script('CSSRulePlugin', get_template_directory_uri() . '/assets/scripts/gsap/CSSRulePlugin.min.js');
		wp_enqueue_script('TweenMax', get_template_directory_uri() . '/assets/scripts/gsap/TweenMax.min.js');
		wp_enqueue_script('tinycolor', get_template_directory_uri() . '/assets/scripts/tinycolor-min.js');

		wp_enqueue_script('barbajs', get_template_directory_uri() . '/assets/scripts/barba.js');
		wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/scripts/gsap/gsap.min.js');
		
		$url = get_template_directory_uri() . '/assets/scripts/swiper-bundle.min.js';
		wp_enqueue_script('swiper', $url);

		wp_register_script('siana-main-js', get_template_directory_uri() . '/assets/scripts/main.js', [], 20 );
		wp_enqueue_script('siana-main-js');

		wp_localize_script('siana-main-js', 'script_vars', array('post_id' => $post_id, 'pg_slug' => $post_slug, 
		'categories' => $cats, 'tags' => $post_tags, 'post_type' => $post -> post_type, 'num_of_courses' => $numOfCourses ));


		if( $post -> post_type == "course" ) {
			// wp_localize_script('siana-main-js', 'script_var1', array( 'post_type' => $post -> post_type ));
		}


	}
	add_action('wp_enqueue_scripts', 'sianaJS');

}

 /**
 * Load css files
 */

 if( !function_exists('sianaCss') ) {

	function sianaCss() {
		wp_register_style('siana-main-css', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('siana-main-css');

		$url = get_template_directory_uri() . '/assets/styles/swiper-bundle.min.css';
		wp_enqueue_style('swiperStyles', $url);
		$url = get_template_directory_uri() . '/assets/styles/locomotive-scroll.css';
		wp_enqueue_style('locomotiveStyles', $url);
	}
	add_action('wp_enqueue_scripts', 'sianaCss');



    if ( !function_exists ('add_attributes_to_script_tag') ) {
        function add_attributes_to_script_tag ( $tag, $handle, $src ) {

            // if not the expected handle then return
            if( 'three-main' !== $handle ) {
                return $tag;
            }

            // modify script tag add type=module
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
            return $tag;
        }
        add_filter( 'script_loader_tag', 'add_attributes_to_script_tag', 10, 3 );
    }

}


// function theme_prefix_rewrite_flush() {
//     flush_rewrite_rules();
// }
// add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' );


// register_activation_hook( __FILE__, 'your_active_hook' );

// function your_active_hook() {
//     special_media_post();
//     flush_rewrite_rules();
// }