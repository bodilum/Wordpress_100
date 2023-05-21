<?php
/* joints Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

*/


// let's create the function for the custom type
// function custom_post_example() { 
// 	// creating (registering) the custom type 
// 	register_post_type( 'custom_type', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
// 	 	// let's now add all the options for this post type
// 		array('labels' => array(
// 			'name' => __('Custom Types', 'siana_v1'), /* This is the Title of the Group */
// 			'singular_name' => __('Custom Post', 'siana_v1'), /* This is the individual type */
// 			'all_items' => __('All Custom Posts', 'siana_v1'), /* the all items menu item */
// 			'add_new' => __('Add New', 'siana_v1'), /* The add new menu item */
// 			'add_new_item' => __('Add New Custom Type', 'siana_v1'), /* Add New Display Title */
// 			'edit' => __( 'Edit', 'siana_v1' ), /* Edit Dialog */
// 			'edit_item' => __('Edit Post Types', 'siana_v1'), /* Edit Display Title */
// 			'new_item' => __('New Post Type', 'siana_v1'), /* New Display Title */
// 			'view_item' => __('View Post Type', 'siana_v1'), /* View Display Title */
// 			'search_items' => __('Search Post Type', 'siana_v1'), /* Search Custom Type Title */ 
// 			'not_found' =>  __('Nothing found in the Database.', 'siana_v1'), /* This displays if there are no entries yet */ 
// 			'not_found_in_trash' => __('Nothing found in Trash', 'siana_v1'), /* This displays if there is nothing in the trash */
// 			'parent_item_colon' => ''
// 			), /* end of arrays */
// 			'description' => __( 'This is the example custom post type', 'siana_v1' ), /* Custom Type Description */
// 			'public' => true,
// 			'publicly_queryable' => true,
// 			'exclude_from_search' => false,
// 			'show_ui' => true,
// 			'query_var' => true,
// 			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
// 			'menu_icon' => 'dashicons-book', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
// 			'rewrite'	=> array( 'slug' => 'custom_type', 'with_front' => false ), /* you can specify its url slug */
// 			'has_archive' => 'custom_type', /* you can rename the slug here */
// 			'capability_type' => 'post',
// 			'hierarchical' => false,
// 			/* the next one is important, it tells what's enabled in the post editor */
// 			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
// 	 	) /* end of options */
// 	); /* end of register post type */
	
// 	/* this adds your post categories to your custom post type */
// 	register_taxonomy_for_object_type('category', 'custom_type');
// 	/* this adds your post tags to your custom post type */
// 	register_taxonomy_for_object_type('post_tag', 'custom_type');
	
// } 

// 	// adding the function to the Wordpress init
// 	add_action( 'init', 'custom_post_example');
	
// 	/*
// 	for more information on taxonomies, go here:
// 	http://codex.wordpress.org/Function_Reference/register_taxonomy
// 	*/
	
// 	// now let's add custom categories (these act like categories)
//     register_taxonomy( 'custom_cat', 
//     	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
//     	array('hierarchical' => true,     /* if this is true, it acts like categories */             
//     		'labels' => array(
//     			'name' => __( 'Custom Categories', 'siana_v1' ), /* name of the custom taxonomy */
//     			'singular_name' => __( 'Custom Category', 'siana_v1' ), /* single taxonomy name */
//     			'search_items' =>  __( 'Search Custom Categories', 'siana_v1' ), /* search title for taxomony */
//     			'all_items' => __( 'All Custom Categories', 'siana_v1' ), /* all title for taxonomies */
//     			'parent_item' => __( 'Parent Custom Category', 'siana_v1' ), /* parent title for taxonomy */
//     			'parent_item_colon' => __( 'Parent Custom Category:', 'siana_v1' ), /* parent taxonomy title */
//     			'edit_item' => __( 'Edit Custom Category', 'siana_v1' ), /* edit custom taxonomy title */
//     			'update_item' => __( 'Update Custom Category', 'siana_v1' ), /* update title for taxonomy */
//     			'add_new_item' => __( 'Add New Custom Category', 'siana_v1' ), /* add new title for taxonomy */
//     			'new_item_name' => __( 'New Custom Category Name', 'siana_v1' ) /* name title for taxonomy */
//     		),
//     		'show_admin_column' => true, 
//     		'show_ui' => true,
//     		'query_var' => true,
//     		'rewrite' => array( 'slug' => 'custom-slug' ),
//     	)
//     );   
    
// 	// now let's add custom tags (these act like categories)
//     register_taxonomy( 'custom_tag', 
//     	array('custom_type'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
//     	array('hierarchical' => false,    /* if this is false, it acts like tags */                
//     		'labels' => array(
//     			'name' => __( 'Custom Tags', 'siana_v1' ), /* name of the custom taxonomy */
//     			'singular_name' => __( 'Custom Tag', 'siana_v1' ), /* single taxonomy name */
//     			'search_items' =>  __( 'Search Custom Tags', 'siana_v1' ), /* search title for taxomony */
//     			'all_items' => __( 'All Custom Tags', 'siana_v1' ), /* all title for taxonomies */
//     			'parent_item' => __( 'Parent Custom Tag', 'siana_v1' ), /* parent title for taxonomy */
//     			'parent_item_colon' => __( 'Parent Custom Tag:', 'siana_v1' ), /* parent taxonomy title */
//     			'edit_item' => __( 'Edit Custom Tag', 'siana_v1' ), /* edit custom taxonomy title */
//     			'update_item' => __( 'Update Custom Tag', 'siana_v1' ), /* update title for taxonomy */
//     			'add_new_item' => __( 'Add New Custom Tag', 'siana_v1' ), /* add new title for taxonomy */
//     			'new_item_name' => __( 'New Custom Tag Name', 'siana_v1' ) /* name title for taxonomy */
//     		),
//     		'show_admin_column' => true,
//     		'show_ui' => true,
//     		'query_var' => true,
//     	)
//     ); 
    
    /*
    	looking for custom meta boxes?
    	check out this fantastic tool:
    	https://github.com/CMB2/CMB2
    */



/**
 * Siana Courses Custom Post Type
 */
if( !function_exists( 'register_siana_works_cpt' ) ) {

	add_action( 'init', 'register_siana_works_cpt' );
	function register_siana_works_cpt() {

		$labels = array(
			"name" =>  __( "Siana Courses", "siana_v1" ),
			"singular_name" =>  __( "Siana Course", "siana_v1" ),
			"menu_name" =>  __( "Siana Courses", "siana_v1" ),
			"parent_item_colon" =>  __( "Parent Siana Course", "siana_v1" ),
			"all_items" =>  __( "All Siana Courses", "siana_v1" ),
			"view_item" =>  __( "View Siana Course", "siana_v1" ),
			"add_new_item" =>  __( "Add New Siana Course", "siana_v1" ),
			"add_new" =>  __( "Add New", "siana_v1" ),
			"edit_item"  =>  __( "Edit Siana Course", "siana_v1" ),
			"update_item" =>  __( "Update Siana Course", "siana_v1" ),
			"search_items" =>  __( "Search All Siana Courses", "siana_v1" ),
			"not_found" =>  __( "Not Found", "siana_v1" ),
			"not_found_in_trash" =>  __( "Not found in Trash", "siana_v1" )
		);

		register_post_type('course', [
			'label'               => __( 'Siana Courses', 'siana_v1' ),
			'description'         => __( 'All courses offered by Siana Beauty Academy', 'siana_v1' ),
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
	function siana_course_taxonomies () {

		//labels array
		
		$labels = array(
		'name' => _x( 'Siana Course Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Siana Course Category', 'taxonomy singular name' ),
		'search_items' => __( 'Search Siana Course Categories' ),
		'all_items' => __( 'All Siana Course Categories' ),
		'parent_item' => __( 'Parent Siana Course Category' ),
		'parent_item_colon' => __( 'Parent Siana Course Category:' ),
		'edit_item' => __( 'Edit Siana Course Category' ),
		'update_item' => __( 'Update Siana Course Category' ),
		'add_new_item' => __( 'Add New Siana Course Category' ),
		'new_item_name' => __( 'New Siana Course Category' ),
		'menu_name' => __( ' Siana Course Categories' ),
		);

		$labels_course_prices = array(
		'name' => _x( 'Siana Course Prices', 'taxonomy general name' ),
		'singular_name' => _x( 'Siana Course Price', 'taxonomy singular name' ),
		'search_items' => __( 'Search Siana Course Prices' ),
		'all_items' => __( 'All Siana Course Prices' ),
		'parent_item' => __( 'Parent Siana Course Price' ),
		'parent_item_colon' => __( 'Parent Siana Course Price:' ),
		'edit_item' => __( 'Edit Siana Course Price' ),
		'update_item' => __( 'Update Siana Course Price' ),
		'add_new_item' => __( 'Add New Siana Course Price' ),
		'new_item_name' => __( 'New Siana Course Price' ),
		'menu_name' => __( ' Siana Course Prices' ),
		);
		
		//args array
		
		$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		);

		$args_prices = array(
		'labels' => $labels_course_prices,
		'hierarchical' => true,
		);
		
		register_taxonomy( 'course_category', 'course', $args );
		register_taxonomy( 'course_prices', 'course', $args_prices );
	}
	
	add_action( 'init', 'siana_course_taxonomies', 0 );

	
}


/**
 * Siana Students Custom Post Type
 */

if ( !function_exists( 'register_siana_students_cpt' ) ) {
	function register_siana_students_cpt() {
		$labels = array(
			"name" =>  __( "Siana Students", "siana_v1" ),
			"singular_name" =>  __( "Siana Student", "siana_v1" ),
			"menu_name" =>  __( "Siana Students", "siana_v1" ),
			"parent_item_colon" =>  __( "Parent Siana Student", "siana_v1" ),
			"all_items" =>  __( "All Siana Students", "siana_v1" ),
			"view_item" =>  __( "View Siana Student", "siana_v1" ),
			"add_new_item" =>  __( "Add New Siana Student", "siana_v1" ),
			"add_new" =>  __( "Add New", "siana_v1" ),
			"edit_item"  =>  __( "Edit Siana Student", "siana_v1" ),
			"update_item" =>  __( "Update Siana Student", "siana_v1" ),
			"search_items" =>  __( "Search All Siana Students", "siana_v1" ),
			"not_found" =>  __( "Not Found", "siana_v1" ),
			"not_found_in_trash" =>  __( "Not found in Trash", "siana_v1" )
		);

		register_post_type( 'student', [
			'label'               => __( 'Siana Students', 'siana_v1' ),
			'description'         => __( 'All Students that applied to Siana Beauty Academy (Registered & unregistered)', 'siana_v1' ),
			'labels'              => $labels,
			'show_in_rest' => true,
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'public' => true,
			'has_archive' => true,
			'capability_type' => 'post'
		]);

	}
	add_action( 'init', 'register_siana_students_cpt', 0 );



	// taxonomies for Siana Students
	function siana_student_taxonomies () {

		//labels array
		
		$labels = array(
		'name' => _x( 'Siana Student Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Siana Student Category', 'taxonomy singular name' ),
		'search_items' => __( 'Search Siana Student Categories' ),
		'all_items' => __( 'All Siana Student Categories' ),
		'parent_item' => __( 'Parent Siana Student Category' ),
		'parent_item_colon' => __( 'Parent Siana Student Category:' ),
		'edit_item' => __( 'Edit Siana Student Category' ),
		'update_item' => __( 'Update Siana Student Category' ),
		'add_new_item' => __( 'Add New Siana Student Category' ),
		'new_item_name' => __( 'New Siana Student Category' ),
		'menu_name' => __( ' Siana Student Categories' ),
		);

		$labels_student_categories = array(
		'name' => _x( 'Siana Student Categories', 'taxonomy general name' ),
		'singular_name' => _x( 'Siana Student Category', 'taxonomy singular name' ),
		'search_items' => __( 'Search Siana Student Categories' ),
		'all_items' => __( 'All Siana Student Categories' ),
		'parent_item' => __( 'Parent Siana Student Category' ),
		'parent_item_colon' => __( 'Parent Siana Student Category:' ),
		'edit_item' => __( 'Edit Siana Student Category' ),
		'update_item' => __( 'Update Siana Student Category' ),
		'add_new_item' => __( 'Add New Siana Student Category' ),
		'new_item_name' => __( 'New Siana Student Category' ),
		'menu_name' => __( ' Siana Student Categories' ),
		);
		
		//args array
		$args_categories = array(
		'labels' => $labels_student_categories,
		'hierarchical' => true,
		);
		register_taxonomy( 'Student_categories', 'student', $args_categories );
	}
	
	add_action( 'init', 'siana_Student_taxonomies', 0 );




}




