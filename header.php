<?php
/**
 * The header for Alitwotimes Theme.  
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alitwotimes
 * @since 1.0.0
 */

 $logo1 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 637.51 115.72">
 <polygon class="_letterM" points="115.72 115.72 115.72 0 57.86 57.86 0 0 0 115.72 115.72 115.72"/>
 <path class="_letterO" d="M188.31,115.72c31.95,0,57.86-25.9,57.86-57.86S220.26,0,188.31,0s-57.86,25.91-57.86,57.86,25.91,57.86,57.86,57.86"/>
 <path class="_letterG" d="M318.76,0h0C286.8,0,260.9,25.91,260.9,57.86s25.9,57.86,57.86,57.86,57.86-25.9,57.86-57.86h-57.86V0Z"/>
 <path class="_letterU" d="M507.07,57.85V0h-115.72V57.86h0c0,31.96,25.91,57.86,57.86,57.86s57.86-25.9,57.86-57.86h0Z"/>
 <polyline class="_letterL" points="579.65 57.86 521.79 0 521.79 115.72 637.51 115.72"/>
 </svg>';
 $logo2 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 637.51 192.36"><polygon class="d" points="115.72 115.72 115.72 0 57.86 57.86 0 0 0 115.72 115.72 115.72"/>
 <path class="d" d="M188.31,115.72c31.95,0,57.86-25.9,57.86-57.86S220.26,0,188.31,0s-57.86,25.91-57.86,57.86,25.91,57.86,57.86,57.86"/>
 <path class="d" d="M318.76,0h0C286.8,0,260.9,25.91,260.9,57.86s25.9,57.86,57.86,57.86,57.86-25.9,57.86-57.86h-57.86V0Z"/>
 <path class="d" d="M507.07,57.85V0h-115.72V57.86h0c0,31.96,25.91,57.86,57.86,57.86s57.86-25.9,57.86-57.86h0Z"/>
 <polyline class="d" points="579.65 57.86 521.79 0 521.79 115.72 637.51 115.72"/>
 <path class="d" d="M436.86,192.36c6.68,0,11.39-3.59,11.39-9.47,0-6.42-5.29-8.07-10.27-9.65-4.76-1.44-5.97-2.47-5.97-4.4,0-1.79,1.52-3.14,4.13-3.14,3.18,0,4.89,1.66,6.01,4.04l5.2-3.01c-2.11-4.4-6.06-7.04-11.21-7.04s-10.32,3.41-10.32,9.33,4.67,7.98,9.46,9.38c4.67,1.35,6.77,2.24,6.77,4.58,0,1.75-1.3,3.32-5.03,3.32s-6.1-1.88-7.22-4.8l-5.29,3.09c1.7,4.67,5.92,7.76,12.34,7.76m-36.83-6.55v-7.04h11.89v-5.83h-11.89v-6.69h13.01v-5.92h-19.2v31.4h19.43v-5.92h-13.23Zm-36.07-19.69h6.37c2.33,0,4.26,2.02,4.26,4.62s-1.93,4.67-4.26,4.67h-6.37v-9.29Zm11.04,25.62h6.68l-6.95-11.84c3.59-1.66,6.06-5.2,6.06-9.15,0-5.74-4.67-10.41-10.45-10.41h-12.56v31.4h6.19v-10.9h4.71l6.33,10.9Zm-43.34,.63c6.91,0,12.02-4.13,12.02-10.9v-21.13h-6.19v20.64c0,3.05-1.62,5.34-5.83,5.34s-5.83-2.29-5.83-5.34v-20.64h-6.15v21.13c0,6.77,5.11,10.9,11.98,10.9m-23.69-32.03h-23.11v5.92h8.44v25.48h6.19v-25.48h8.48v-5.92Zm-46.48,32.03c5.79,0,10.86-2.92,13.5-7.4l-5.34-3.09c-1.48,2.74-4.57,4.44-8.16,4.44-6.15,0-10.19-4.26-10.19-10.27s4.04-10.32,10.19-10.32c3.59,0,6.64,1.71,8.16,4.49l5.34-3.09c-2.69-4.49-7.76-7.4-13.5-7.4-9.51,0-16.33,7.13-16.33,16.33s6.82,16.33,16.33,16.33m-35.44-.63h6.19v-31.4h-6.19v31.4Zm-23.28-16.11h-5.52v-9.51h5.52c2.65,0,4.58,2.02,4.58,4.76s-1.93,4.76-4.58,4.76m0-15.3h-11.71v31.4h6.19v-10.32h5.52c6.06,0,10.72-4.67,10.72-10.54s-4.67-10.54-10.72-10.54"/></g></g></svg>
 ';
 $logo_icon1 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.72 115.72">
 <polygon class="d" points="115.72 115.72 115.72 0 57.86 57.86 0 0 0 115.72 115.72 115.72"/></svg>';
 $arrow1_svg = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 51.58 51.65"><g id="a"/><g id="b"><g id="c"><path class="d" d="M42.46,14.95c-4.41,4.41-8.83,8.83-13.24,13.24-6.75,6.75-13.5,13.5-20.25,20.25-2.15,2.15-4.44,4.89-7.54,1.89-3.09-2.99-.53-5.38,1.65-7.56,10.13-10.12,20.25-20.25,30.37-30.37,1.05-1.05,2.11-2.11,4-4-2.45-.11-3.95-.21-5.45-.22-4.23-.03-8.45,.01-12.68-.04-2.52-.03-4.28-1.23-4.39-3.86C14.83,1.66,16.42,.08,18.95,.06,29.69-.04,40.43,.01,51.5,.01c.03,11.27,.2,22.14-.09,33-.03,1.26-2.44,3.25-3.98,3.51-2.53,.43-3.94-1.61-3.92-4.14,.04-5.69,.24-11.38,.38-17.08l-1.42-.36Z"/></g></g></svg>';


 $play1 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 643.26 643.3"><path class="f" d="M309.02,0c-1.37,1.91-3.31,1.15-5.11,1.09-.35-.27-.46-.52-.32-.75C303.74,.11,303.87,0,304,0h5.03Z"/><path class="i" d="M643.26,310.37c-1.93-1.34-1.13-3.3-1.15-5.07,.4-.54,.79-.5,1.15,.04v5.03Z"/><path class="i" d="M642.15,338.07c-.04-1.78-.82-3.73,1.11-5.08v5.03c-.34,.55-.72,.56-1.11,.05Z"/><path class="i" d="M336.72,1.07c-1.42,.15-2.9,.54-3.82-1.07h3.77c.39,.22,.53,.45,.42,.7-.12,.25-.24,.37-.37,.37Z"/><path class="h" d="M304,0c.01,.37-.02,.73-.08,1.09-1.02,.11-2.12,.4-2.43-1.09h2.51Z"/><path class="d" d="M336.72,1.07c-.03-.36-.05-.71-.05-1.07h2.51c.39,.21,.52,.43,.42,.68-.11,.25-.22,.38-.35,.38l-2.54,.02Z"/><path class="h" d="M339.25,1.05c-.04-.35-.07-.7-.07-1.05h2.51c-.3,1.53-1.41,1.21-2.44,1.05Z"/><path class="e" d="M642.17,302.76c-.09-1.02-.47-2.16,1.09-2.44v2.51c-.4,.6-.77,.54-1.09-.07Z"/><path class="g" d="M642.17,302.76c.36,.05,.73,.07,1.09,.07v2.51c-.39,.01-.77,0-1.15-.04,.02-.85,.04-1.7,.06-2.54Z"/><path class="g" d="M642.15,338.07c.37-.04,.74-.05,1.11-.05v2.51c-.33,.55-.69,.55-1.09,.07l-.03-2.53Z"/><path class="e" d="M642.18,340.6c.36-.04,.72-.07,1.09-.07v2.51c-1.58-.27-1.2-1.41-1.09-2.44Z"/><path d="M643.26,296.55c-1.39-11.98-1.67-24.07-4.11-35.95-14.95-73.03-50.16-134.29-106.47-183.26C487.03,37.63,434.18,13.06,374.63,2.74c-9.66-1.67-19.48-1.4-29.16-2.74h-3.77c-.8,.86-1.86,.58-2.85,.65-.77,0-1.53,0-2.3,0-1.23-.15-2.59,.42-3.65-.65h-23.87c-1.38,1.2-3.05,.42-4.57,.65-1.02-.08-2.13,.26-2.97-.65h-5.03c-.47,1.75-1.96,1.16-3.08,1.27-28.24,2.54-55.72,8.55-82.33,18.38C56.69,76.67-29.7,239.15,9.35,398.92c41.19,168.53,211.12,274.15,381.15,236.9,130.4-28.57,230.45-136.12,249.36-267.89,.95-6.64,.62-13.54,3.41-19.88v-5.03c-.91-.84-.57-1.95-.65-2.97,0-.8,0-1.6,0-2.41,.23-1.56-.56-3.25,.65-4.67v-22.62c-1.21-1.42-.42-3.12-.65-4.67,0-.8,0-1.61,0-2.41,.08-1.02-.26-2.13,.65-2.97v-3.77Zm-321.59,325.39c-165.3,.09-300.26-134.79-300.35-300.18C21.24,156.46,156.12,21.5,321.5,21.41c165.3-.09,300.26,134.79,300.35,300.18,.09,165.3-134.79,300.26-300.18,300.35Z"/><path d="M235.9,321.7c0-52.55-.01-105.1,.01-157.65,0-9.05,3.88-13.92,10.82-13.79,3.54,.07,6.25,2.01,9.04,3.91,76.52,52.17,153.05,104.3,229.58,156.46,10.52,7.17,10.54,14.9,.04,22.05-69.78,47.57-139.58,95.12-209.37,142.68-6.91,4.71-13.86,9.36-20.69,14.18-4.35,3.06-8.83,4.98-13.96,2.22-4.94-2.66-5.52-7.34-5.51-12.41,.06-52.55,.04-105.1,.04-157.65Z"/></svg>';
 $play2 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 643.26 643.3"><path class="f" d="M309.02,0c-1.37,1.91-3.31,1.15-5.11,1.09-.35-.27-.46-.52-.32-.75C303.74,.11,303.87,0,304,0h5.03Z"/><path class="i" d="M643.26,310.37c-1.93-1.34-1.13-3.3-1.15-5.07,.4-.54,.79-.5,1.15,.04v5.03Z"/><path class="i" d="M642.15,338.07c-.04-1.78-.82-3.73,1.11-5.08v5.03c-.34,.55-.72,.56-1.11,.05Z"/><path class="i" d="M336.72,1.07c-1.42,.15-2.9,.54-3.82-1.07h3.77c.39,.22,.53,.45,.42,.7-.12,.25-.24,.37-.37,.37Z"/><path class="h" d="M304,0c.01,.37-.02,.73-.08,1.09-1.02,.11-2.12,.4-2.43-1.09h2.51Z"/><path class="d" d="M336.72,1.07c-.03-.36-.05-.71-.05-1.07h2.51c.39,.21,.52,.43,.42,.68-.11,.25-.22,.38-.35,.38l-2.54,.02Z"/><path class="h" d="M339.25,1.05c-.04-.35-.07-.7-.07-1.05h2.51c-.3,1.53-1.41,1.21-2.44,1.05Z"/><path class="e" d="M642.17,302.76c-.09-1.02-.47-2.16,1.09-2.44v2.51c-.4,.6-.77,.54-1.09-.07Z"/><path class="g" d="M642.17,302.76c.36,.05,.73,.07,1.09,.07v2.51c-.39,.01-.77,0-1.15-.04,.02-.85,.04-1.7,.06-2.54Z"/><path class="g" d="M642.15,338.07c.37-.04,.74-.05,1.11-.05v2.51c-.33,.55-.69,.55-1.09,.07l-.03-2.53Z"/><path class="e" d="M642.18,340.6c.36-.04,.72-.07,1.09-.07v2.51c-1.58-.27-1.2-1.41-1.09-2.44Z"/><path d="M643.26,296.55c-1.39-11.98-1.67-24.07-4.11-35.95-14.95-73.03-50.16-134.29-106.47-183.26C487.03,37.63,434.18,13.06,374.63,2.74c-9.66-1.67-19.48-1.4-29.16-2.74h-3.77c-.8,.86-1.86,.58-2.85,.65-.77,0-1.53,0-2.3,0-1.23-.15-2.59,.42-3.65-.65h-23.87c-1.38,1.2-3.05,.42-4.57,.65-1.02-.08-2.13,.26-2.97-.65h-5.03c-.47,1.75-1.96,1.16-3.08,1.27-28.24,2.54-55.72,8.55-82.33,18.38C56.69,76.67-29.7,239.15,9.35,398.92c41.19,168.53,211.12,274.15,381.15,236.9,130.4-28.57,230.45-136.12,249.36-267.89,.95-6.64,.62-13.54,3.41-19.88v-5.03c-.91-.84-.57-1.95-.65-2.97,0-.8,0-1.6,0-2.41,.23-1.56-.56-3.25,.65-4.67v-22.62c-1.21-1.42-.42-3.12-.65-4.67,0-.8,0-1.61,0-2.41,.08-1.02-.26-2.13,.65-2.97v-3.77Zm-321.59,325.39c-165.3,.09-300.26-134.79-300.35-300.18C21.24,156.46,156.12,21.5,321.5,21.41c165.3-.09,300.26,134.79,300.35,300.18,.09,165.3-134.79,300.26-300.18,300.35Z"/><path d="M485.34,310.63c-76.52-52.16-153.06-104.29-229.58-156.46-2.79-1.9-5.49-3.84-9.04-3.91-6.94-.13-10.82,4.73-10.82,13.79-.02,52.55-.01,105.1-.01,157.65,0,52.55,.02,105.1-.04,157.65,0,5.07,.57,9.74,5.51,12.41,5.12,2.77,9.61,.84,13.96-2.22,6.84-4.81,13.78-9.47,20.69-14.18,69.79-47.56,139.59-95.11,209.37-142.68,10.49-7.15,10.48-14.88-.04-22.05Zm-26.34,14.12c-66.54,45.24-132.98,90.62-199.46,135.95-.32,.22-.75,.28-1.66,.59V181.56c39.18,26.71,77.66,52.95,116.14,79.19,28.32,19.31,56.59,38.69,85.01,57.86,3.86,2.6,3.7,3.6-.03,6.14Z"/></svg>';
 $pause1 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 643.26 643.3"><g id="a"/><path d="M643.26,296.55c-1.39-11.98-1.67-24.07-4.11-35.95-14.95-73.03-50.16-134.29-106.47-183.26C487.03,37.63,434.18,13.06,374.63,2.74c-9.66-1.67-19.48-1.4-29.16-2.74h-49.01c-.47,1.75-1.96,1.16-3.08,1.27-28.24,2.54-55.72,8.55-82.33,18.38C56.69,76.67-29.7,239.15,9.35,398.92c41.19,168.53,211.12,274.15,381.15,236.9,130.4-28.57,230.45-136.12,249.36-267.89,.95-6.64,.62-13.54,3.41-19.88v-5.03h0v-10.05h0v-22.62h0v-10.05h0v-3.77Zm-321.59,325.39c-165.3,.09-300.26-134.79-300.35-300.18C21.24,156.46,156.12,21.5,321.5,21.41c165.3-.09,300.26,134.79,300.35,300.18,.09,165.3-134.79,300.26-300.18,300.35Z"/><rect x="240.63" y="148.65" width="66" height="346" rx="15.28" ry="15.28"/><rect x="336.63" y="148.65" width="66" height="346" rx="15.28" ry="15.28"/></svg>';


global $post;
global $wp_query;
$page_title = $wp_query->post->post_title;
// $pgBgMaxLen = 8;
// $pgBgTitle = substr($page_title, 0, $pgBgMaxLen) . ((strlen($page_title) > $pgBgMaxLen) ? "..." : "");

// echo $page_title; 
// single_post_title();
$slug = $post->post_name;
$page_url = get_home_url() .'/' . $slug . '/';
$home_url = home_url() . '/';

// get_post_type( $post );

$post_type = $post->post_type;

// wordpress menu
$menu_name = 'primary'; //menu slug
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

// $all_pages = wp_list_pages('depth=1');

$pgArgs = array(
	'post_type' => 'page',
	'post_status' => 'publish',
	'parent' => 0
);

// $all_pages = get_pages($pgArgs);


?><!DOCTYPE html>
<?php astra_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
<?php astra_head_top(); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="https://gmpg.org/xfn/11">

<?php wp_head(); ?>
<?php astra_head_bottom(); ?>
</head>

<body id="bodyContent" data-barba="wrapper" <?php astra_schema_body(); ?> <?php body_class(); ?>>

	<div id="dynamicCss"></div>

   	<!-- ... content that will not be changed -->
	<!-- WEBSITE NOISE -->
	<canvas id="overlayWebsiteNoise" class="overlayWebsiteNoise"></canvas>
	<!-- WEBSITE NOISE END -->

	<!-- CUSTOM VIDEO PLAYER -->
	<div id="mogulVidPlayer1">
		<div class="vidPlayerBg1"></div>
		<div class="vidPlayerMain">
			<video autoplay playsinline muted loop preload control='false'>
				<source src="https://mogulpictures.co.za/wp-content/uploads/2023/01/bud-light-millenial-beach.mp4" />
			</video>	
			<div class="vidPlayerControls">
				<div class="_main">
					<div class="pausePlayBtn">
						<span class="_play"><?php echo $play1; ?></span>
						<span clas="_pause"><?php echo $pause1; ?></span>
					</div>
					<div class="seekBar">
						<span class="bar"></span>
						<span class="head"></span>
						<span class="playTime">00:00</span>
					</div>
					<div class="moreInfo"><span>↓</span> <span>info</span></div>
				</div>
			</div>
			<div class="vidMoreContent"></div>
		</div>
	</div>
	<!-- CUSTOM VIDEO PLAYER END -->

	<!-- FOLLOW MOUSE -->
	<div id="followMouse">
		<div class="_circle"></div>
		<div class="_playShowReelBtn"><?php echo $play1; ?></div>
	</div>
	<!-- FOLLOW MOUSE END -->

	<!-- WEBSITE INTRO -->
	<div id="mainIntro">
		<div class="content">
			<div class="clipDiv1">
				<video autoplay playsinline muted loop preload>
					<source src="https://mogulpictures.co.za/wp-content/uploads/2023/01/bud-light-millenial-beach.mp4" />
				</video>				
			</div>
			<svg>
			<defs>
				<clipPath id="clip-path1">
					<text x="50%" y="50%" class="txt1" text-anchor="middle">Mogul</text>
					<text x="50%" y="54%" class="txt2" text-anchor="middle">Pictures</text>
				</clipPath>
			</defs>
			</svg>

			<!-- <svg width="10%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 637.51 192.36">
					<defs>
						<clipPath id="clip-path1">
							<polygon class="d" points="115.72 115.72 115.72 0 57.86 57.86 0 0 0 115.72 115.72 115.72"/>
				 <path d="M188.31,115.72c31.95,0,57.86-25.9,57.86-57.86S220.26,0,188.31,0s-57.86,25.91-57.86,57.86,25.91,57.86,57.86,57.86"/>
				 <path d="M318.76,0h0C286.8,0,260.9,25.91,260.9,57.86s25.9,57.86,57.86,57.86,57.86-25.9,57.86-57.86h-57.86V0Z"/>
				 <path d="M507.07,57.85V0h-115.72V57.86h0c0,31.96,25.91,57.86,57.86,57.86s57.86-25.9,57.86-57.86h0Z"/>
				 <polyline points="579.65 57.86 521.79 0 521.79 115.72 637.51 115.72"/>
				 <path d="M436.86,192.36c6.68,0,11.39-3.59,11.39-9.47,0-6.42-5.29-8.07-10.27-9.65-4.76-1.44-5.97-2.47-5.97-4.4,0-1.79,1.52-3.14,4.13-3.14,3.18,0,4.89,1.66,6.01,4.04l5.2-3.01c-2.11-4.4-6.06-7.04-11.21-7.04s-10.32,3.41-10.32,9.33,4.67,7.98,9.46,9.38c4.67,1.35,6.77,2.24,6.77,4.58,0,1.75-1.3,3.32-5.03,3.32s-6.1-1.88-7.22-4.8l-5.29,3.09c1.7,4.67,5.92,7.76,12.34,7.76m-36.83-6.55v-7.04h11.89v-5.83h-11.89v-6.69h13.01v-5.92h-19.2v31.4h19.43v-5.92h-13.23Zm-36.07-19.69h6.37c2.33,0,4.26,2.02,4.26,4.62s-1.93,4.67-4.26,4.67h-6.37v-9.29Zm11.04,25.62h6.68l-6.95-11.84c3.59-1.66,6.06-5.2,6.06-9.15,0-5.74-4.67-10.41-10.45-10.41h-12.56v31.4h6.19v-10.9h4.71l6.33,10.9Zm-43.34,.63c6.91,0,12.02-4.13,12.02-10.9v-21.13h-6.19v20.64c0,3.05-1.62,5.34-5.83,5.34s-5.83-2.29-5.83-5.34v-20.64h-6.15v21.13c0,6.77,5.11,10.9,11.98,10.9m-23.69-32.03h-23.11v5.92h8.44v25.48h6.19v-25.48h8.48v-5.92Zm-46.48,32.03c5.79,0,10.86-2.92,13.5-7.4l-5.34-3.09c-1.48,2.74-4.57,4.44-8.16,4.44-6.15,0-10.19-4.26-10.19-10.27s4.04-10.32,10.19-10.32c3.59,0,6.64,1.71,8.16,4.49l5.34-3.09c-2.69-4.49-7.76-7.4-13.5-7.4-9.51,0-16.33,7.13-16.33,16.33s6.82,16.33,16.33,16.33m-35.44-.63h6.19v-31.4h-6.19v31.4Zm-23.28-16.11h-5.52v-9.51h5.52c2.65,0,4.58,2.02,4.58,4.76s-1.93,4.76-4.58,4.76m0-15.3h-11.71v31.4h6.19v-10.32h5.52c6.06,0,10.72-4.67,10.72-10.54s-4.67-10.54-10.72-10.54"/>
						</clipPath>
					</defs>
			</svg> -->

			


			<div class="progressBar1"></div>
		</div>
	</div>
	<!-- WEBSITE INTRO ENDS -->

	<!-- PAGE TRANSITION ANIMATION -->
	<div id="pgTransAnim"></div>
	<!-- PAGE TRANSITION ANIMATION ENDS -->

	<!-- PAGE TRANSITION ANIMATION -->
	<!-- PAGE TRANSITION ANIMATION ENDS -->


	<!-- DYNAMIC CONTENTS -->
	<!-- DYNAMIC CONTENTS END -->

	<div id="mogulFooter">
		<div class="_left"><span>&copy 2023 Mogul Pictures</span></div>
		<div class="_right">
			<a href="mailto:info@mogulpictures.co.za?subject=Hi Mogul Pictures!">Mail</a>
			<a href="https://www.vimeo.com" target="_blank">Vimeo</a>
			<a href="https://www.instagram.com" target="_blank">Instagram</a>
		</div>
	</div>

	<div id="mogulHeader1">
		<a href="<?php echo home_url() ?>" class="_left">
			<div class="_mainLogo"><?php echo $logo1; ?></div>
			<div class="_mobileLogo"><?php echo $logo_icon1; ?></div>			
		</a>
		<div class="_center"></div>
		<div class="_right">
			<div class="_mainMenu">
                <?php foreach($menuitems as $menuItm) {
                    ?>
				<?php $canSetActiv = (is_front_page()) ? (($menuItm->url == $page_url || $menuItm->url == $home_url) ? true : false ) : (($menuItm->url == $page_url) ? true : false); ?>  
                    <a href="<?php echo $menuItm->url; ?>" class="<?php if($canSetActiv) echo '_activ'; ?>" 
                    title="<?php echo $menuItm->description; ?>">
                        <?php echo $menuItm->title; echo $menuItm->slug; ?>
                    </a>
                <?php } ?>
            </div>
            <div class="_mobileMenu">
                <div class="_topArea">
                    <div class="_toggleMMBtn">
                        <span class="_bar1"></span><span class="_bar2"></span>
                    </div>
                </div>
                <div class="_body">
                    <?php foreach($menuitems as $menuItm) { ?>
                        <a href="<?php echo $menuItm->url; ?>" 
                        class="<?php if($menuItm->url == $page_url) echo '_activ'; ?> _arrowLink1" 
                        title="<?php echo $menuItm->description; ?>">
							<span class="_arrow1"><?php echo $arrow1_svg; ?> </span>
                            <?php echo $menuItm->title;?>
                        </a>
                    <?php } ?>

					<div class="_footer">
						<div class="_logo"><?php echo $logo_icon1; ?></div>
						<div class="_links">
							<a href="mailto:info@mogulpictures.co.za?subject=Hi Mogul Pictures!">Mail</a>
							<a href="https://www.vimeo.com" target="_blank">Vimeo</a>
							<a href="https://www.instagram.com" target="_blank">Instagram</a>
						</div>
						<div class="_txt1"><span>&copy 2023 Mogul Pictures</span></div>
					</div>
                </div>
            </div>

		</div>
	</div>

	

   	<!-- ... content that will not be changed ends -->


	<div id="mainApp" data-scroll-container>
	
   	<main data-barba="container" data-barba-namespace='<?php echo $slug; ?>'>
	
	<!-- ... content to be changed -->

<?php astra_body_top(); ?>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php echo esc_html( astra_default_strings( 'string-header-skip-link', false ) ); ?></a>

	<?php // astra_header_before(); ?>

	<?php // astra_header(); ?>

	<?php // astra_header_after(); ?>


	<?php astra_content_before(); ?>

	<div id="content" class="site-content">

		<div class="ast-container">

		<?php astra_content_top(); ?>
