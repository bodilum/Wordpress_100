<?php

if(!function_exists('bridge_qode_child_theme_enqueue_scripts')) {

	Function bridge_qode_child_theme_enqueue_scripts() {
		wp_register_style('bridge-childstyle', get_stylesheet_directory_uri() . '/style.css');
		wp_enqueue_style('bridge-childstyle');
	}

	add_action('wp_enqueue_scripts', 'bridge_qode_child_theme_enqueue_scripts', 11);
}

// function to add custom css
if( !function_exists('mogulCustomCss') ) {

	function mogulCustomCss() {
		wp_register_style('mogul-main-css', get_template_directory_uri() . '/css/bodilum/main_custom_styles.css' );
		wp_enqueue_style('mogul-main-css');

		$url = get_template_directory_uri() . '/css/bodilum/swiper-bundle.min.css';
		wp_enqueue_style('swiperStyles', $url);
		$url = get_template_directory_uri() . '/css/bodilum/main_custom_styles.css';
		wp_enqueue_style('ocbCustomStyle', $url);
		$url = get_template_directory_uri() . '/css/bodilum/jBox.all.min.css';
		wp_enqueue_style('jBoxAllStyle', $url);
	}
	add_action('wp_enqueue_scripts', 'mogulCustomCss');

}


// add_action('init', 'register_bodilum_cpt');
// function register_bodilum_cpt() {
// 	register_post_type('bodi', [
// 		'label' => 'BodiBodi',
// 		'public' => true,
// 		'capability_type' => 'post'
// 	])
// }



// function to add custom js
if( !function_exists('mogulCustomJs') ) {

	function mogulCustomJs() {
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

		wp_enqueue_script('gsap_scroll_to_plugin', get_template_directory_uri() . '/js/bodilum/gsap/ScrollToPlugin.min.js');
		wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/js/bodilum/gsap/ScrollTrigger.min.js');
		wp_enqueue_script('CSSRulePlugin', get_template_directory_uri() . '/js/bodilum/gsap/CSSRulePlugin.min.js');
		wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/bodilum/gsap/TweenMax.min.js');

		wp_enqueue_script('barbajs', get_template_directory_uri() . '/js/bodilum/barba.js');
		wp_enqueue_script('gsap', get_template_directory_uri() . '/js/bodilum/gsap/gsap.min.js');
		
		$url = get_template_directory_uri() . '/js/bodilum/swiper-bundle.min.js';
		wp_enqueue_script('swiper', $url);

		$url = get_template_directory_uri() . '/js/bodilum/jBox.all.min.js';
		wp_enqueue_script('jBoxAll', $url);

		wp_register_script('mogul-main-js', get_template_directory_uri() . '/js/bodilum/main_custom_scripts.js', [], 20 );
		wp_enqueue_script('mogul-main-js');

		wp_localize_script('mogulCustomScript', 'script_vars', array('post_id' => $post_id, 'pg_slug' => $post_slug, 
		'categories' => $cats, 'tags' => $post_tags ));
	}
	add_action('wp_enqueue_scripts', 'mogulCustomjs');

}