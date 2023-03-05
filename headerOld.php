<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section 
 *
 */


 global $post;
 global $wp_query;
 $page_title = $post->post_title;
 $slug = $post->post_name;
 $pg_url = get_home_url() . '/' . $slug . '/';
 $home_url = home_url() . '/';

 // get_post_type( $post );
 $post_type = $post->post_type;

 // WORDPRESS MENU
 $menu_location_name = 'main-nav';
 $all_menu_locations = get_nav_menu_locations();
 $menu_obj = wp_get_nav_menu_object( $all_menu_locations[ $menu_location_name ] );
 $menu_items = wp_get_nav_menu_items( $menu_obj->term_id, array( 'order' => 'DESC' ) );

// // $all_pages = wp_list_pages('depth=1');

// $pgArgs = array(
// 	'post_type' => 'page',
// 	'post_status' => 'publish',
// 	'parent' => 0
// );

// // $all_pages = get_pages($pgArgs);

// $pgBgMaxLen = 8;
// $pgBgTitle = substr($page_title, 0, $pgBgMaxLen) . ((strlen($page_title) > $pgBgMaxLen) ? "..." : "");

// echo $page_title; 
// single_post_title();


?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>
			
	<body id="bodyContent" data-barba="wrapper" <?php body_class(); ?>>

		<!-- ... content that will not be changed starts -->

		<div id="dynamicCss"></div>

		<!-- FOLLOW MOUSE -->
		<div id="followMouse">
		</div>
		<!-- FOLLOW MOUSE END -->

		<!-- WEBSITE INTRO -->
		<div id="mainIntro">
		</div>
		<!-- WEBSITE INTRO ENDS -->

		<!-- PAGE TRANSITION ANIMATION -->
		<div id="pgTransAnim"></div>
		<!-- PAGE TRANSITION ANIMATION ENDS -->


		<!-- ... content that will not be changed ends -->


		<div id="mainApp" data-scroll-container>
		
		<main data-barba="container" data-barba-namespace='<?php echo $slug; ?>'>
	
		<!-- ... content that will changed starts -->














		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" data-off-canvas-content>
				
				<header class="header" role="banner">
							
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
					 <?php //get_template_part( 'parts/nav', 'offcanvas-topbar' ); ?>
	 	
				</header> <!-- end .header -->