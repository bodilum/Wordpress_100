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



add_action( 'wp_ajax_add_product_to_cart', 'handle_add_product_to_cart' );
add_action( 'wp_ajax_nopriv_add_product_to_cart', 'handle_add_product_to_cart' );

// function to process apply form submission
function handle_add_product_to_cart() {

    if( isset($_POST) ) {

        // check the nonce
        // if ( check_ajax_referer( 'ajax-nonce', $_POST['nonce'], false ) == false ) {
        //     wp_send_json_error();
        // }

        // check_ajax_referer( 'ajax-nonce', 'nonce' );
    
        if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )) { wp_send_json_error( json_encode( array( 'message' => "Access Denied!" ) ) ); }



        $product_id = $_POST['product_id']; // Product ID
		$product_found = false;

		//check if product already in cart
		if ( sizeof( WC()->cart->get_cart() ) > 0 ) {

            // WC()->cart->empty_cart(); // debug purpose to clear the cart so we can test for as long as we want

			foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {

				$_product = $values[ 'data' ];

				if ( $_product->get_id() == $product_id )
					$product_found = true;
			}
			if ( ! $product_found ){
				WC()->cart->add_to_cart( $product_id );
			}

		} else { 

			WC()->cart->add_to_cart( $product_id );

		}

        $cart_count = WC()->cart->get_cart_contents_count();


        // res
        $res = ($product_found) ? array( 'cart_count' => $cart_count, 'product_added' => false, 'message' => "Product already added" ) : array( 'cart_count' => $cart_count, 'product_added' => true,'message' => "Product added!" );
		wp_send_json_success( json_encode( $res ) );



    }


}


add_action( 'wp_ajax_empty_cart', 'handle_empty_cart' );
add_action( 'wp_ajax_nopriv_empty_cart', 'handle_empty_cart' );

// function to process apply form submission
function handle_empty_cart() {

    if( isset($_POST) ) {
    
        if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )) { wp_send_json_error( json_encode( array( 'message' => "Access Denied!" ) ) ); }

        WC()->cart->empty_cart();


        // res
        $res = array( 'cart_count' => 0 );
		wp_send_json_success( json_encode( $res ) );

    }


}