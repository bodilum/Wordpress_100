<?php

/*** Child Theme Function  ***/
function swipy_theme_enqueue_scripts() {
	wp_register_style( 'childstyle', get_template_directory_uri() . '/style.css'  );
	wp_enqueue_style( 'childstyle' );

	$url = get_template_directory_uri() . '/assets/css/swiper-bundle.min.css';
	wp_enqueue_style('swiperStyles', $url);
	$url = get_template_directory_uri() . '/assets/css/locomotive-scroll.css';
	wp_enqueue_style('locomotiveStyles', $url);
	$url = get_template_directory_uri() . '/assets/css/datepicker.min.css';
	wp_enqueue_style('datePickerStyles', $url);
	$url = get_template_directory_uri() . '/assets/css/lc_light.css';
	wp_enqueue_style('lcLightStyles', $url);

}
add_action('wp_enqueue_scripts', 'swipy_theme_enqueue_scripts', 11);


if( !function_exists("ajo_js") ) {
	function ajo_js() {
		// global $post;
		// $post_id = $post->ID;
		// $post_slug = $post->post_name;
		// // $post_tags = get_the_tags( $post_id );
		// $post_tags = wp_get_post_tags($post->ID);
		// $cats = array();

		// $post_categories = wp_get_post_categories( $post_id );

		// // count all posts of post type course that are published
		// // $numOfCourses = wp_count_posts( 'course' ) -> publish;
		// // echo 'Number of courses: ' . $numOfCourses;
			
		// foreach($post_categories as $c){
		// 	$cat = get_category( $c );
		// 	$arr = array( 'name' => $cat->name, 'slug' => $cat->slug );
		// 	array_push($cats, $arr);
		// }

		
		

		add_action('wp_enqueue_scripts', 'ajo_js');
	}
}

/**
 * Ajo Members Custom Post Type
 */
if( !function_exists( 'register_siana_works_cpt' ) ) {

	add_action( 'init', 'register_siana_works_cpt' );
	function register_siana_works_cpt() {

		$labels = array(
			"name" =>  __( "Ajo Members", "swipy" ),
			"singular_name" =>  __( "Ajo Member", "swipy" ),
			"menu_name" =>  __( "Ajo Members", "swipy" ),
			"parent_item_colon" =>  __( "Parent Ajo Member", "swipy" ),
			"all_items" =>  __( "All Ajo Members", "swipy" ),
			"view_item" =>  __( "View Ajo Member", "swipy" ),
			"add_new_item" =>  __( "Add New Ajo Member", "swipy" ),
			"add_new" =>  __( "Add New", "swipy" ),
			"edit_item"  =>  __( "Edit Ajo Member", "swipy" ),
			"update_item" =>  __( "Update Ajo Member", "swipy" ),
			"search_items" =>  __( "Search All Ajo Members", "swipy" ),
			"not_found" =>  __( "Not Found", "swipy" ),
			"not_found_in_trash" =>  __( "Not found in Trash", "swipy" )
		);

		register_post_type('ajo_member', [
			'label'               => __( 'Ajo Members', 'swipy' ),
			'description'         => __( 'All Customers / Members of the Ajo Stockvel Platform.', 'swipy' ),
			'labels'              => $labels,
			'show_in_rest' => true,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'public' => true,
			'has_archive' => true,
			'capability_type' => 'post'
		]);
	}


	//registration of taxonomies
	function ajo_member_taxonomies () {

		//labels array
		
		$labels = array(
		'name' => _x( 'Ajo Member Groups', 'taxonomy general name' ),
		'singular_name' => _x( 'Ajo Member Group', 'taxonomy singular name' ),
		'search_items' => __( 'Search Ajo Member Groups' ),
		'all_items' => __( 'All Ajo Member Groups' ),
		'parent_item' => __( 'Parent Ajo Member Group' ),
		'parent_item_colon' => __( 'Parent Ajo Member Group:' ),
		'edit_item' => __( 'Edit Ajo Member Group' ),
		'update_item' => __( 'Update Ajo Member Group' ),
		'add_new_item' => __( 'Add New Ajo Member Group' ),
		'new_item_name' => __( 'New Ajo Member Group' ),
		'menu_name' => __( ' Ajo Member Groups' ),
		);

		// $labels_ajo_member_prices = array(
		// 'name' => _x( 'Ajo Member Prices', 'taxonomy general name' ),
		// 'singular_name' => _x( 'Ajo Member Price', 'taxonomy singular name' ),
		// 'search_items' => __( 'Search Ajo Member Prices' ),
		// 'all_items' => __( 'All Ajo Member Prices' ),
		// 'parent_item' => __( 'Parent Ajo Member Price' ),
		// 'parent_item_colon' => __( 'Parent Ajo Member Price:' ),
		// 'edit_item' => __( 'Edit Ajo Member Price' ),
		// 'update_item' => __( 'Update Ajo Member Price' ),
		// 'add_new_item' => __( 'Add New Ajo Member Price' ),
		// 'new_item_name' => __( 'New Ajo Member Price' ),
		// 'menu_name' => __( ' Ajo Member Prices' ),
		// );
		
		//args array
		
		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);

		$args_prices = array(
		'labels' => $labels_ajo_member_prices,
		'hierarchical' => true,
		);
		
		register_taxonomy( 'ajo_member_groups', 'ajo_member', $args );
		// register_taxonomy( 'ajo_member_prices', 'ajo_member', $args_prices );
	}
	
	add_action( 'init', 'ajo_member_taxonomies', 0 );

	
}


/**
 * Ajo Account Officers Custom Post Type
 */

if ( !function_exists( 'register_account_officer_cpt' ) ) {
	function register_account_officer_cpt() {
		$labels = array(
			"name" =>  __( "Ajo Account Officers", "swipy" ),
			"singular_name" =>  __( "Ajo Account Officer", "swipy" ),
			"menu_name" =>  __( "Ajo Account Officers", "swipy" ),
			"parent_item_colon" =>  __( "Parent Ajo Account Officer", "swipy" ),
			"all_items" =>  __( "All Ajo Account Officers", "swipy" ),
			"view_item" =>  __( "View Ajo Account Officer", "swipy" ),
			"add_new_item" =>  __( "Add New Ajo Account Officer", "swipy" ),
			"add_new" =>  __( "Add New", "swipy" ),
			"edit_item"  =>  __( "Edit Ajo Account Officer", "swipy" ),
			"update_item" =>  __( "Update Ajo Account Officer", "swipy" ),
			"search_items" =>  __( "Search All Ajo Account Officers", "swipy" ),
			"not_found" =>  __( "Not Found", "swipy" ),
			"not_found_in_trash" =>  __( "Not found in Trash", "swipy" )
		);

		register_post_type( 'account_officer', [
			'label'               => __( 'Ajo Account Officers', 'swipy' ),
			'description'         => __( 'All Ajo Account Officers (Standard Admins)', 'swipy' ),
			'labels'              => $labels,
			'show_in_rest' => true,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'public' => true,
			'has_archive' => true,
			'capability_type' => 'post'
		]);

	}
	add_action( 'init', 'register_account_officer_cpt', 0 );



	// taxonomies for Ajo Account Officers
	function account_officer_taxonomies () {

		//labels array
		
		$labels = array(
		'name' => _x( 'Ajo Account Officer Groups', 'taxonomy general name' ),
		'singular_name' => _x( 'Ajo Account Officer Group', 'taxonomy singular name' ),
		'search_items' => __( 'Search Ajo Account Officer Groups' ),
		'all_items' => __( 'All Ajo Account Officer Groups' ),
		'parent_item' => __( 'Parent Ajo Account Officer Group' ),
		'parent_item_colon' => __( 'Parent Ajo Account Officer Group:' ),
		'edit_item' => __( 'Edit Ajo Account Officer Group' ),
		'update_item' => __( 'Update Ajo Account Officer Group' ),
		'add_new_item' => __( 'Add New Ajo Account Officer Group' ),
		'new_item_name' => __( 'New Ajo Account Officer Group' ),
		'menu_name' => __( ' Ajo Account Officer Groups' ),
		);

		// $labels_student_Groups = array(
		// 'name' => _x( 'Ajo Account Officer Groups', 'taxonomy general name' ),
		// 'singular_name' => _x( 'Ajo Account Officer Group', 'taxonomy singular name' ),
		// 'search_items' => __( 'Search Ajo Account Officer Groups' ),
		// 'all_items' => __( 'All Ajo Account Officer Groups' ),
		// 'parent_item' => __( 'Parent Ajo Account Officer Group' ),
		// 'parent_item_colon' => __( 'Parent Ajo Account Officer Group:' ),
		// 'edit_item' => __( 'Edit Ajo Account Officer Group' ),
		// 'update_item' => __( 'Update Ajo Account Officer Group' ),
		// 'add_new_item' => __( 'Add New Ajo Account Officer Group' ),
		// 'new_item_name' => __( 'New Ajo Account Officer Group' ),
		// 'menu_name' => __( ' Ajo Account Officer Groups' ),
		// );
		
		//args array
		$args_Groups = array(
		'labels' => $labels,
		'hierarchical' => true,
		);
		register_taxonomy( 'account_officer_groups', 'account_officer', $args_Groups );
	}
	
	add_action( 'init', 'account_officer_taxonomies', 0 );




}
