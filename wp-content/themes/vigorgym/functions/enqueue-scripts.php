<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    // wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );
   
    // Register main stylesheet
    // wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }


}
add_action('wp_enqueue_scripts', 'site_scripts', 999); 




if( !function_exists('vigorgymJS') ) {

	function vigorgymJS() {
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


		wp_enqueue_script('woocommerce-ajax-add-to-cart', get_template_directory_uri() . '/assets/scripts/ajax-add-to-cart.js');
		// empty cart for debug purposes
		if(WC()->cart->get_cart_contents_count() >= 2) {
			WC()->cart->empty_cart();
		}

		
		// localice variables to gmap.js
		wp_localize_script('woocommerce-ajax-add-to-cart', 'add_to_cart_vars', array(
			'nonce' => wp_create_nonce('ajax-nonce'),
		) );



		wp_enqueue_script('locomotiveScroll1', get_template_directory_uri() . '/assets/scripts/locomotive-scroll.min.js');
		wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/assets/scripts/ScrollTrigger.min.js');
		wp_enqueue_script('tinycolor', get_template_directory_uri() . '/assets/scripts/tinycolor-min.js');

		wp_enqueue_script('barbajs', get_template_directory_uri() . '/assets/scripts/barba.js');
		wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/scripts/gsap.min.js');
		
		$url = get_template_directory_uri() . '/assets/scripts/swiper-bundle.min.js';
		wp_enqueue_script('swiper', $url);

		wp_register_script('vigorgym-main-js', get_template_directory_uri() . '/assets/scripts/main.js', [], 20 );
		wp_enqueue_script('vigorgym-main-js');

		// enqueue google maps script only on home page and contact page 
		if ( is_page( 'home' ) || is_page( 'contact' ) ) {

			$homePostID = 2;

			wp_register_script('vigorgym-gmap-js', get_template_directory_uri() . '/assets/scripts/gmap.js', [], 20 );
			wp_enqueue_script('vigorgym-gmap-js');
			wp_register_script('vigorgym-google-maps-api-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDVbeBNUVjpe71OU20t4VIeCVN33sDSs7I&callback=initGmap', [], 20 );
			wp_enqueue_script('vigorgym-google-maps-api-js');

			// let's localize the variables required to show appropriate infos on the info windows
			////////////////////// GET HOME PAGE MAP SECTION VALUES //////////////////////

			// edit_home_map_section
			$map = get_field('edit_home_map_section', $homePostID);

			// get all map location info items
			$mapItems = $map['map_items'];

			// print_r($mapItems);

			// compose json string
			$locations = array();
			
			foreach( $mapItems as $mapItm ) {
				// Main Photo: print_r($mapItm['photos'][0]['url']);
				// Thumbnail: print_r($mapItm['photos'][0]['sizes']['thumbnail']);

				// compose photos and thumbnails
				$photos = array();
				$thumbs = array();
				foreach( $mapItm["photos"] as $photo ) {
					array_push( $photos, $photo['url'] );
					array_push( $thumbs, $photo['sizes']['thumbnail'] );
				}

				// compose open times
				$times = array();
				foreach( $mapItm["open_times"] as $openTime ) {
					array_push( $times, $openTime );
				}

				$arrItm = array(
					"title" => $mapItm['heading'],
					"desc" => $mapItm['description'],
					"addressCode" => array(
						"lat" => $mapItm['lat'],
						"lng" => $mapItm['lng']
					),
					"times" => $times,
					"photos" => $photos,
					"thumbs" => $thumbs
				);

				// store in the $locations object
				array_push( $locations, $arrItm );

			}

			// localize variables to gmap.js
			wp_localize_script('vigorgym-gmap-js', 'locations', $locations );


			////////////////////// GET HOME PAGE MAP SECTION VALUES //////////////////////
			
		}



    ////////////////// CUSTOM JS MODULES ///////////////////////
	wp_register_script('vigorgym-custom-smooth-scroll-js', get_template_directory_uri() . '/assets/scripts/custom-smooth-scroll.js', [], 20 );
	wp_enqueue_script('vigorgym-custom-smooth-scroll-js');
	wp_register_script('vigorgym-custom-page-animations-js', get_template_directory_uri() . '/assets/scripts/custom-page-animations.js', [], 20 );
	wp_enqueue_script('vigorgym-custom-page-animations-js');
	wp_register_script('vigorgym-custom-page-transitions-js', get_template_directory_uri() . '/assets/scripts/custom-page-transitions.js', [], 20 );
	wp_enqueue_script('vigorgym-custom-page-transitions-js');
	wp_register_script('vigorgym-custom-dynamic-css-html-js', get_template_directory_uri() . '/assets/scripts/custom-dynamic-css-html.js', [], 20 );
	wp_enqueue_script('vigorgym-custom-dynamic-css-html-js'); 
    wp_register_script('vigorgym-custom-utilities-js', get_template_directory_uri() . '/assets/scripts/custom-utilities.js', [], 20 );
	wp_enqueue_script('vigorgym-custom-utilities-js');
    ////////////////// CUSTOM JS MODULES ///////////////////////




		wp_localize_script('vigorgym-main-js', 'script_vars', array('post_id' => $post_id, 'pg_slug' => $post_slug, 
		'categories' => $cats, 'tags' => $post_tags, 'post_type' => $post -> post_type ));


	}
	add_action('wp_enqueue_scripts', 'vigorgymJS');

}



/// add defer and async 
function add_defer_async_to_tag( $tag, $handle ) {
	if ( 'vigorgym-google-maps-api-js' !== $handle )
		return $tag;

	return str_replace( ' src', ' async defer="defer" src', $tag );
}
add_filter( 'script_loader_tag', 'add_defer_async_to_tag', 10, 2 );




 /**
 * Load css files
 */

 if( !function_exists('vigorgymCss') ) {

	function vigorgymCss() {
		wp_register_style('vigorgym-main-css', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('vigorgym-main-css');

		$url = get_template_directory_uri() . '/assets/styles/swiper-bundle.min.css';
		wp_enqueue_style('swiperStyles', $url);
		$url = get_template_directory_uri() . '/assets/styles/locomotive-scroll.css';
		wp_enqueue_style('locomotiveStyles', $url);
	}
	add_action('wp_enqueue_scripts', 'vigorgymCss');



if ( !function_exists ('add_attributes_to_script_tag') ) {
	function add_attributes_to_script_tag ( $tag, $handle, $src ) {

		$custom_js_modules = [ 'vigorgym-main-js', 'vigorgym-custom-dynamic-css-html-js', 'vigorgym-custom-easings-js', 'vigorgym-custom-page-animations-js', 'vigorgym-custom-page-transitions-js', 'vigorgym-custom-smooth-scroll-js', 'vigorgym-custom-utilities-js'  ];

		// if not the expected handle then return
		if( ! in_array( $handle, $custom_js_modules) ) {
			return $tag;
		}

		// modify script tag add type=module
		$tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
		return $tag;
	}
	add_filter( 'script_loader_tag', 'add_attributes_to_script_tag', 10, 3 );
}

}