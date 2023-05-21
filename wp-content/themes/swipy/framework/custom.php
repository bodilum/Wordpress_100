<?php
/*
dynamic css file. please don't edit it. it's update automatically when settins changed
*/
add_action('wp_head', 'swipy_custom_colors', 160);
function swipy_custom_colors() { 
global $swipy_option;	
/***styling options
------------------*/
	if(!empty($swipy_option['body_bg_color']))
	{
	 $body_bg          = $swipy_option['body_bg_color'];
	
	$body_color       = $swipy_option['body_text_color'];	
	$site_color       = $swipy_option['primary_color'];
	$secondary_color  = $swipy_option['secondary_color'];
	$third_color  	  = $swipy_option['third_color'];
	$link_color       = $swipy_option['link_text_color'];	
	$link_hover_color = $swipy_option['link_hover_text_color'];	
	$footer_bgcolor   = $swipy_option['footer_bg_color'];
	$gradient_fst     = $swipy_option['gradient_first_color'];
	$gradient_snd     = $swipy_option['gradient_snd_color'];

	if(!empty($swipy_option['menu_text_color'])){		
		$menu_text_color         = $swipy_option['menu_text_color'];
	}
	if(!empty($swipy_option['menu_text_hover_color'])){		
		$menu_text_hover_color   = $swipy_option['menu_text_hover_color'];
	}
	if(!empty($swipy_option['menu_text_active_color'])){		
		$menu_active_color       = $swipy_option['menu_text_active_color'];
	}
	
	if(!empty($swipy_option['menu_text_hover_bg'])){		
		$menu_text_hover_bg      = $swipy_option['menu_text_hover_bg'];
	}
	if(!empty($swipy_option['menu_text_active_bg'])){		
		$menu_text_active_bg     = $swipy_option['menu_text_active_bg'];
	}
	
	if(!empty($swipy_option['drop_text_color'])){		
		$dropdown_text_color     = $swipy_option['drop_text_color'];
	}
	
	if(!empty($swipy_option['drop_text_hover_color'])){		
		$drop_text_hover_color   = $swipy_option['drop_text_hover_color'];
	}			
	
	if(!empty($swipy_option['drop_text_hoverbg_color'])){		
		$drop_text_hoverbg_color = $swipy_option['drop_text_hoverbg_color'];
	}
	
	if(!empty($swipy_option['drop_down_bg_color'])){		
		$drop_down_bg_color = $swipy_option['drop_down_bg_color'];
	}	
	
	$rs_top_style = get_post_meta(get_the_ID(), 'topbar-color', true);
    if($rs_top_style =='toplight' || $rs_top_style==''){
		$toolbar_bg    = $swipy_option['toolbar_bg_color'];
		$toolbar_text  = $swipy_option['toolbar_text_color'];
		$toolbar_link  = $swipy_option['toolbar_link_color'];
		$toolbar_hover = $swipy_option['toolbar_link_hover_color'];
	} else{
		$toolbar_bg    = $swipy_option['toolbar_bg_color2'];
		$toolbar_text  = $swipy_option['toolbar_text_color2'];
		$toolbar_link  = $swipy_option['toolbar_link_color2'];
		$toolbar_hover = $swipy_option['toolbar_link_hover_color2'];
    }

	//typography extract for body
	
	if(!empty($swipy_option['opt-typography-body']['color']))
	{
		$body_typography_color=$swipy_option['opt-typography-body']['color'];
	}
	if(!empty($swipy_option['opt-typography-body']['line-height']))
	{
		$body_typography_lineheight=$swipy_option['opt-typography-body']['line-height'];
	}
		
	$body_typography_font      =$swipy_option['opt-typography-body']['font-family'];
	$body_typography_font_size =$swipy_option['opt-typography-body']['font-size'];

	//typography extract for menu
	$menu_typography_color       =$swipy_option['opt-typography-menu']['color'];	
	$menu_typography_weight      =$swipy_option['opt-typography-menu']['font-weight'];	
	$menu_typography_font_family =$swipy_option['opt-typography-menu']['font-family'];
	$menu_typography_font_fsize  =$swipy_option['opt-typography-menu']['font-size'];
		
	if(!empty($swipy_option['opt-typography-menu']['line-height']))
	{
		$menu_typography_line_height=$swipy_option['opt-typography-menu']['line-height'];
	}
	
	//typography extract for heading
	
	$h1_typography_color=$swipy_option['opt-typography-h1']['color'];		
	if(!empty($swipy_option['opt-typography-h1']['font-weight']))
	{
		$h1_typography_weight=$swipy_option['opt-typography-h1']['font-weight'];
	}
		
	$h1_typography_font_family=$swipy_option['opt-typography-h1']['font-family'];
	$h1_typography_font_fsize=$swipy_option['opt-typography-h1']['font-size'];	
	if(!empty($swipy_option['opt-typography-h1']['line-height']))
	{
		$h1_typography_line_height=$swipy_option['opt-typography-h1']['line-height'];
	}
	
	$h2_typography_color=$swipy_option['opt-typography-h2']['color'];	

	$h2_typography_font_fsize=$swipy_option['opt-typography-h2']['font-size'];	
	if(!empty($swipy_option['opt-typography-h2']['font-weight']))
	{
		$h2_typography_font_weight=$swipy_option['opt-typography-h2']['font-weight'];
	}	
	$h2_typography_font_family=$swipy_option['opt-typography-h2']['font-family'];
	$h2_typography_font_fsize=$swipy_option['opt-typography-h2']['font-size'];	
	if(!empty($swipy_option['opt-typography-h2']['line-height']))
	{
		$h2_typography_line_height=$swipy_option['opt-typography-h2']['line-height'];
	}
	
	$h3_typography_color=$swipy_option['opt-typography-h3']['color'];	
	if(!empty($swipy_option['opt-typography-h3']['font-weight']))
	{
		$h3_typography_font_weightt=$swipy_option['opt-typography-h3']['font-weight'];
	}	
	$h3_typography_font_family = $swipy_option['opt-typography-h3']['font-family'];
	$h3_typography_font_fsize  = $swipy_option['opt-typography-h3']['font-size'];	
	if(!empty($swipy_option['opt-typography-h3']['line-height']))
	{
		$h3_typography_line_height = $swipy_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color = $swipy_option['opt-typography-h4']['color'];	
	if(!empty($swipy_option['opt-typography-h4']['font-weight']))
	{
		$h4_typography_font_weight = $swipy_option['opt-typography-h4']['font-weight'];
	}	
	$h4_typography_font_family = $swipy_option['opt-typography-h4']['font-family'];
	$h4_typography_font_fsize  = $swipy_option['opt-typography-h4']['font-size'];	
	if(!empty($swipy_option['opt-typography-h4']['line-height']))
	{
		$h4_typography_line_height = $swipy_option['opt-typography-h4']['line-height'];
	}
	
	$h5_typography_color = $swipy_option['opt-typography-h5']['color'];	
	if(!empty($swipy_option['opt-typography-h5']['font-weight']))
	{
		$h5_typography_font_weight = $swipy_option['opt-typography-h5']['font-weight'];
	}	
	$h5_typography_font_family = $swipy_option['opt-typography-h5']['font-family'];
	$h5_typography_font_fsize  = $swipy_option['opt-typography-h5']['font-size'];	
	if(!empty($swipy_option['opt-typography-h5']['line-height']))
	{
		$h5_typography_line_height = $swipy_option['opt-typography-h5']['line-height'];
	}
	
	$h6_typography_color = $swipy_option['opt-typography-6']['color'];	
	if(!empty($swipy_option['opt-typography-6']['font-weight']))
	{
		$h6_typography_font_weight = $swipy_option['opt-typography-6']['font-weight'];
	}
	$h6_typography_font_family = $swipy_option['opt-typography-6']['font-family'];
	$h6_typography_font_fsize  = $swipy_option['opt-typography-6']['font-size'];	
	if(!empty($swipy_option['opt-typography-6']['line-height']))
	{
		$h6_typography_line_height = $swipy_option['opt-typography-6']['line-height'];
	}
?>

<!-- Typography -->
<?php if(!empty($body_color)){
	global $swipy_option;
	$hex = $site_color;
	list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");
	$site_color_rgb = "$r, $g, $b";


	$hex2 = $secondary_color;
	list($r, $g, $b) = sscanf($hex2, "#%02x%02x%02x");
	$second_color_rgb = "$r, $g, $b";

?>

<style>	
	
	body{
		background:<?php echo sanitize_hex_color($body_bg); ?>;
		color:<?php echo sanitize_hex_color($body_color); ?> !important;
		font-family: <?php echo esc_attr($body_typography_font);?> !important;    
	    font-size: <?php echo esc_attr($body_typography_font_size);?> !important;
	}

	<?php if(!empty($swipy_option['team_single_bg_color']))
		{
			$team_single_bg_color = $swipy_option['team_single_bg_color'];
		?>
		body.single-teams{
			background:<?php echo sanitize_hex_color($team_single_bg_color); ?>;
		}
	<?php } ?>


	h1,
	.rs-breadcrumbs .page-title{
		color:<?php echo sanitize_hex_color($h1_typography_color);?>;
		font-family:<?php echo esc_attr($h1_typography_font_family);?>;
		font-size:<?php echo esc_attr($h1_typography_font_fsize);?>;
		<?php if(!empty($h1_typography_weight)){
		?>
		font-weight:<?php echo esc_attr($h1_typography_weight);?>;
		<?php }?>
		
		<?php if(!empty($h1_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h1_typography_line_height);?>;
		<?php }?>		
	}

	h2{
		color:<?php echo sanitize_hex_color($h2_typography_color);?>; 
		font-family:<?php echo esc_attr($h2_typography_font_family);?>;
		font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
		<?php if(!empty($h2_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h2_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h2_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h2_typography_line_height);?>
		<?php }?>
	}
	.single-teams .title-bg-gray,
	.bs-sidebar .wp-block-search__label, 
	.bs-sidebar .widget_block h2, 
	.prelements-heading .title-inner .title,
	.bs-sidebar .widget-title,
	.full-blog-content .blog-title a,
	.bs-sidebar .recent-post-widget .post-desc a{
		color:<?php echo sanitize_hex_color($h2_typography_color);?> ;
	}
	.prelements-heading .title-inner .title{
		font-weight:<?php echo esc_attr($h2_typography_font_weight);?>;
	}

	h3{
		color:<?php echo sanitize_hex_color($h3_typography_color);?> ;
		font-family:<?php echo esc_attr($h3_typography_font_family);?>;
		font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
		<?php if(!empty($h3_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h3_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h3_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h3_typography_line_height);?>;
		<?php }?>
	}

	h4{
		color:<?php echo sanitize_hex_color($h4_typography_color);?>;
		font-family:<?php echo esc_attr($h4_typography_font_family);?>;
		font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;
		<?php if(!empty($h4_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h4_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h4_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h4_typography_line_height);?>;
		<?php }?>
		
	}

	h5{
		color:<?php echo sanitize_hex_color($h5_typography_color);?>;
		font-family:<?php echo esc_attr($h5_typography_font_family);?>;
		font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;
		<?php if(!empty($h5_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h5_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h5_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h5_typography_line_height);?>;
		<?php }?>
	}

	h6{
		color:<?php echo sanitize_hex_color($h6_typography_color);?> ;
		font-family:<?php echo esc_attr($h6_typography_font_family);?>;
		font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;
		<?php if(!empty($h6_typography_font_weight)){ ?>
		font-weight:<?php echo esc_attr($h6_typography_font_weight);?>;
		<?php }
		if(!empty($h6_typography_line_height)){ ?>
			line-height:<?php echo esc_attr($h6_typography_line_height);?>;
		<?php }?>
	}

	.menu-area .navbar ul li > a,
	.sidenav .widget_nav_menu ul li a{
		font-weight:<?php echo esc_attr($menu_typography_weight); ?>;
		font-family:<?php echo esc_attr($menu_typography_font_family); ?>;
		font-size:<?php echo esc_attr($menu_typography_font_fsize); ?>;
	}

	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li,
	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a, 
	#rs-header .toolbar-area .toolbar-contact ul li a,
	#rs-header .toolbar-area .toolbar-contact ul li, #rs-header .toolbar-area{
		color:<?php echo sanitize_hex_color($toolbar_text); ?>;
	}


	<?php
		if(!empty($swipy_option['transparent_toolbar_text_color'])){?>
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li,
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li i,
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li a,
			#rs-header.header-style-4 .btn_quote .toolbar-sl-share ul li a
			{
				color: <?php echo sanitize_hex_color($swipy_option['transparent_toolbar_text_color']);?>
			}
		<?php } 
	
		if(!empty($swipy_option['transparent_toolbar_link_hover_color'])){?>
			#rs-header.header-transparent .toolbar-area .toolbar-contact ul.rs-contact-info li:hover a,
			#rs-header.header-style-4 .btn_quote .toolbar-sl-share ul li a:hover{
			color: <?php echo sanitize_hex_color($swipy_option['transparent_toolbar_link_hover_color']);?>
		}
		<?php } 
	?>
	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a,
	#rs-header .toolbar-area .toolbar-contact ul li a,
	#rs-header .toolbar-area .toolbar-sl-share ul li a i{
		color:<?php echo sanitize_hex_color($toolbar_link); ?> !important;
	}

	#rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a:hover,
	#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons:hover,
	#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons:before,
	#rs-header .toolbar-area .toolbar-contact ul li a:hover,
	#rs-header .toolbar-area .toolbar-sl-share ul li a i:hover{
		color:<?php echo sanitize_hex_color($toolbar_hover); ?>;
	}	
	.mobile-menu-container div ul > li.current_page_parent > a,
	#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor a, 
	#rs-header.header-transparent .menu-area .navbar ul li.current_page_item a,
	.menu-area .navbar ul.menu > li.current_page_item > a,
	.menu-area .navbar ul li.current-menu-ancestor a, .menu-area .navbar ul li.current_page_item a,
	.menu-area .navbar ul li ul.sub-menu > li.menu-item-has-children > a:before{
		color: <?php echo sanitize_hex_color( $menu_active_color ); ?>;
	}
	
	.menu-area .navbar ul > li.menu-item-has-children.hover-minimize > a:after{
		background: <?php echo sanitize_hex_color( $menu_active_color ); ?> !important;
	}
	.menu-area .navbar ul > li.menu-item-has-children.hover-minimize:hover > a:after{
		background: <?php echo sanitize_hex_color( $menu_text_hover_color ); ?> !important;
	}
	.menu-area .navbar ul li:hover a:before{
		color: <?php echo sanitize_hex_color( $menu_active_color ); ?>;
	}
	.menu-area .navbar ul li:hover > a,	
	.mobile-menu-container div ul li a:hover,	
	#rs-header.header-style5 .header-inner.menu-sticky.sticky .menu-area .navbar ul li:hover > a,
	#rs-header.header-style-4 .menu-area .menu li:hover > a,
	#rs-header.header-style-3.header-style-2 .sticky-wrapper .menu-area .navbar ul li:hover > a{
		color: <?php echo sanitize_hex_color( $menu_text_hover_color ); ?>;
	}
	.menu-area .navbar ul li a,
	#rs-header .sticky_search,
	#rs-header .menu-responsive .sidebarmenu-search .sticky_search{
		color: <?php echo sanitize_hex_color( $menu_text_color ); ?>; 
	}

	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li.current_page_item > a::before, 
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li.current_page_item > a::after, 
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li > a::before,
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li > a::after,
	#rs-header.header-transparent .menu-area.dark .navbar ul.menu > li > a,	
	#rs-header.header-transparent .menu-area.dark .menu-responsive .sidebarmenu-search .sticky_search .fa{
		color: <?php echo sanitize_hex_color( $menu_text_color ); ?> !important;
	}	
	#rs-header.header-transparent .menu-area.dark ul.offcanvas-icon .nav-link-container .nav-menu-link span{
		background: <?php echo sanitize_hex_color( $menu_text_color ); ?> !important;
	}
	<?php if(!empty($swipy_option['transparent_menu_text_color'])) : ?>
		.header-style5 .menu-area .navbar ul > li > a, 
		.header-style5 .menu-responsive .sidebarmenu-search .sticky_search,
		#rs-header.header-transparent .menu-area .navbar ul li a, 
		#rs-header.header-transparent .menu-responsive .sidebarmenu-search .sticky_search,
		#rs-header.header-transparent .menu-responsive .sidebarmenu-search .sticky_search .fa,
		#rs-header.header-transparent .menu-area.dark .navbar ul > li > a,
		#rs-header.header-transparent .menu-area .navbar ul li:hover > a{
			color:<?php echo sanitize_hex_color($swipy_option['transparent_menu_text_color']); ?> 
	}
	<?php endif; ?>

	<?php if(!empty($swipy_option['transparent_menu_hover_color'])) : ?>
		#rs-header.header-style5 .header-inner .menu-area .navbar ul li:hover > a{
			color:<?php echo sanitize_hex_color($swipy_option['transparent_menu_hover_color']); ?> 
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['toolbar_bg_color'])) : ?>
		#rs-header .toolbar-area{			
			background:<?php echo sanitize_hex_color($swipy_option['toolbar_bg_color']); ?> 
		}
	<?php endif; ?>
	<?php if(!empty($swipy_option['transparent_menu_hover_color'])) : ?>
		#rs-header.header-style5 .header-inner .menu-area .navbar ul > li.menu-item-has-children.hover-minimize:hover > a:after{
			background:<?php echo sanitize_hex_color($swipy_option['transparent_menu_hover_color']); ?> !important;  
		}
	<?php endif; ?>
	<?php if(!empty($swipy_option['transparent_menu_active_color'])) : ?>
		#rs-header.header-style5 .header-inner .menu-area .navbar ul > li.menu-item-has-children.hover-minimize > a:after{
			background:<?php echo sanitize_hex_color($swipy_option['transparent_menu_active_color']); ?> !important; 
		}
	<?php endif; ?>
	<?php if(!empty($swipy_option['transparent_menu_active_color'])) : ?>
	#rs-header.header-style5 .menu-area .navbar ul > li.current-menu-ancestor > a, 
	#rs-header.header-style5 .header-inner .menu-area .navbar ul > li.current-menu-ancestor > a,
	#rs-header.header-style5 .header-inner.menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a{
			color:<?php echo sanitize_hex_color($swipy_option['transparent_menu_active_color']); ?> !important; 
		}
	<?php endif; ?>
	<?php if(!empty($swipy_option['transparent_menu_text_color'])) : ?> 
		.header-style-4 .menu-cart-area span.icon-num, 
		.header-style5 .menu-cart-area span.icon-num
		{
			background: <?php echo sanitize_hex_color($swipy_option['transparent_menu_text_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_area_bg_color'])) : ?>
		#rs-header.header-style5 .header-inner .menu-area, 
		#rs-header .menu-sticky .menu-area,
		#rs-header.header-style8 .rs-full-menuarea,
		#rs-header .menu-sticky .menu-area,
		#rs-header.header-style-3.header-style-2 .sticky-wrapper .header-inner .box-layout{
		background:<?php echo sanitize_hex_color($swipy_option['menu_area_bg_color']); ?> 
	}
	<?php endif; ?>
	<?php if(!empty($swipy_option['transparent_menu_text_color'])) : ?>
		#rs-header.header-transparent .menu-area.dark ul.offcanvas-icon .nav-link-container .nav-menu-link span{
			background:<?php echo sanitize_hex_color($swipy_option['transparent_menu_text_color']); ?> 
		}
	<?php endif; ?>
	<?php if(!empty($swipy_option['offcanvas_bg_color'])) : ?>
		ul.offcanvas-icon .nav-link-container a{
			background:<?php echo sanitize_hex_color($swipy_option['offcanvas_bg_color']); ?> 
		}
	<?php endif; ?>	
	<?php if(!empty($swipy_option['offcanvas_bg_hover'])) : ?>
		ul.offcanvas-icon .nav-link-container a:hover{
			background:<?php echo sanitize_hex_color($swipy_option['offcanvas_bg_hover']); ?> 
		}
	<?php endif; ?>	
	<?php if(!empty($swipy_option['offcanvas_background_color'])) : ?>
		ul.offcanvas-icon .nav-link-container a,
		#rs-header.header-transparent ul.offcanvas-icon .nav-link-container .nav-menu-link span, 
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span,
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span,
		#rs-header.header-transparent ul.offcanvas-icon .nav-link-container .nav-menu-link span, 
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span{
			background:<?php echo sanitize_hex_color($swipy_option['offcanvas_background_color']); ?> !important;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['offcanvas_icons_color'])) : ?>
		#rs-header.header-transparent ul.offcanvas-icon .nav-link-container .nav-menu-link span, 
		.nav-link-container .nav-menu-link span,
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span,
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span,
		#rs-header.header-transparent ul.offcanvas-icon .nav-link-container .nav-menu-link span, 
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span{
			background:<?php echo sanitize_hex_color($swipy_option['offcanvas_icons_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcanvas_dots_close_secondary_color'])) : ?>
		.flaticon-cross.closes:before{
			color:<?php echo sanitize_hex_color($swipy_option['offcanvas_dots_close_secondary_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['transparent_menu_hover_color'])) : ?>
		#rs-header.header-transparent .menu-area .navbar ul > li > a:hover,
		#rs-header.header-transparent .menu-area .navbar ul li:hover > a,
		#rs-header.header-transparent .menu-area.dark .navbar ul > li:hover > a,
		#rs-header.header-style-4 .header-inner .menu-area .navbar ul li:hover a,
		#rs-header.header-style-4 .menu-area .navbar ul li:hover a:before{
			color:<?php echo sanitize_hex_color($swipy_option['transparent_menu_hover_color']); ?> 
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['transparent_menu_active_color'])) : ?>
		#rs-header.header-transparent .menu-area .navbar ul > li.current_page_item > a,
		#rs-header.header-style-4 .menu-area .menu > li.current-menu-ancestor > a,
		#rs-header.header-transparent .menu-area .navbar ul > li.current-menu-ancestor > a,
		#rs-header.header-style-4 .menu-area .menu > li.current_page_item > a{
			color:<?php echo sanitize_hex_color($swipy_option['transparent_menu_active_color']); ?> !important; 
		}
	<?php endif; ?>

	#rs-header.header-transparent .menu-area .navbar ul.menu > li.current_page_item > a::before,
	#rs-header.header-transparent .menu-area .navbar ul.menu > li.current_page_item > a::after, 
	#rs-header.header-transparent .menu-area .navbar ul.menu > li > a::after{
		color:<?php echo sanitize_hex_color($swipy_option['transparent_menu_active_color']); ?> !important; 
	}

	<?php if(!empty($swipy_option['transparent_menu_text_color'])) : ?>		
		#rs-header.header-transparent ul.offcanvas-icon .nav-link-container .nav-menu-link span,
		#rs-header.header-style5 .menu-responsive ul.offcanvas-icon .nav-link-container .nav-menu-link span{
			background:<?php echo sanitize_hex_color($swipy_option['transparent_menu_text_color']); ?> 
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['drop_text_color'])) : ?>
		.menu-area .navbar ul li .sub-menu li a,
		#rs-header .menu-area .navbar ul li.mega ul li a,
		#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a,
		#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor li a{
			color:<?php echo sanitize_hex_color($swipy_option['drop_text_color']); ?> !important;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['drop_text_hover_color'])) : ?>
		.menu-area .navbar ul li ul.sub-menu li.current_page_item > a,
		.menu-area .navbar ul li ul.sub-menu li.current-menu-item > a,
		#rs-header.header-style5 .menu-area .navbar ul > li.current_page_item ul > a,
		#rs-header .menu-area .navbar ul li.mega ul > li > a:hover,
		.menu-area .navbar ul li ul.sub-menu li > a:hover,
		body .header-style1 .menu-area .navbar ul li ul.sub-menu li > a:hover,
		body #rs-header .menu-area .navbar ul li.mega ul.sub-menu li a:hover,
		#rs-header.header-style5 .header-inner .menu-area .navbar ul li .sub-menu > li > a:hover,
		#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li:hover > a,
		#rs-header .menu-area .navbar ul li.mega ul li a:hover,
		#rs-header.header-style-4 .menu-area .menu .sub-menu li:hover > a,
		#rs-header.header-style3 .menu-area .navbar ul li .sub-menu li > a:hover,
		#rs-header .menu-area .navbar ul li.mega ul > li.current-menu-item > a,
		.menu-sticky.sticky .menu-area .navbar ul li ul li a:hover,
		#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a, #rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current_page_item > a,
		#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor li a:hover{
			color:<?php echo sanitize_hex_color($swipy_option['drop_text_hover_color']); ?> !important;
		}
	<?php endif; ?>



	<?php if(!empty($swipy_option['drop_down_bg_color'])) : ?>
		.menu-area .navbar ul li .sub-menu{
			background:<?php echo sanitize_hex_color($swipy_option['drop_down_bg_color']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['toolbar_text_size'])) : ?>
		#rs-header .toolbar-area .toolbar-contact ul li,
		#rs-header .toolbar-area a,
		#rs-header .toolbar-area .toolbar-sl-share ul li{
			font-size:<?php echo esc_attr($swipy_option['toolbar_text_size']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_text_trasform'])) : ?>
		.menu-area .navbar ul > li > a,
		#rs-header .menu-area .navbar ul > li.mega > ul > li > a{
			text-transform:uppercase;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_text_trasform2'])) : ?>
		.menu-area .navbar ul.sub-menu  li  a{
			text-transform:uppercase !important;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['toolbar_icon_color'])) : ?>
		#rs-header .toolbar-area .opening i,
		#rs-header .toolbar-area .toolbar-contact ul li i{
			color:<?php echo sanitize_hex_color($swipy_option['toolbar_icon_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['copyright_bg_border'])) : ?>
		.footer-bottom .container{
			border-color:<?php echo esc_attr($swipy_option['copyright_bg_border']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['copyright_text_color'])) : ?>
		.footer-bottom .copyright p{
			color:<?php echo sanitize_hex_color($swipy_option['copyright_text_color']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['footer_text_size'])) : ?>
		.rs-footer, .rs-footer h3, .rs-footer a, 
		.rs-footer .fa-ul li a, 
		.rs-footer .widget.widget_nav_menu ul li a{
			font-size:<?php echo esc_attr($swipy_option['footer_text_size']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['footer_h3_size'])) : ?>
		.rs-footer h3, .rs-footer .footer-top h3.footer-title{
			font-size:<?php echo esc_attr($swipy_option['footer_h3_size']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['footer_link_size'])) : ?>
		.rs-footer a{
			font-size:<?php echo esc_attr($swipy_option['footer_link_size']); ?>;
		}
	<?php endif; ?>	

	<?php if(!empty($swipy_option['footer_text_color'])) : ?>
		.rs-footer, .rs-footer .footer-top h3.footer-title, .rs-footer a, .rs-footer .fa-ul li a,
		.rs-footer .widget.widget_nav_menu ul li a
		{
			color:<?php echo sanitize_hex_color($swipy_option['footer_text_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['footer_title_color'])) : ?>
		.rs-footer .footer-top h3.footer-title
		{
			color:<?php echo sanitize_hex_color($swipy_option['footer_title_color']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['footer_icon_color'])) : ?>
		.rs-footer .fa-ul li i,
		.rs-footer .footer-2 .widget_nav_menu ul li a:before
		{
			color:<?php echo sanitize_hex_color($swipy_option['footer_icon_color']); ?>;
		}
	<?php endif; ?>

	
	<?php if(!empty($swipy_option['footer_link_color'])) : ?>
		.rs-footer a:hover, .rs-footer .widget.widget_nav_menu ul li a:hover,
		.rs-footer .fa-ul li a:hover,
		.rs-footer .widget.widget_pages ul li a:hover, .rs-footer .widget.widget_recent_comments ul li a:hover, .rs-footer .widget.widget_archive ul li a:hover, .rs-footer .widget.widget_categories ul li a:hover,
		.rs-footer .widget a:hover{
			color:<?php echo sanitize_hex_color($swipy_option['footer_link_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['foot_social_color'])) : ?>	
		#rs-footer ul.footer_social > li > a,
		.rs-footer .widget ul.footer_social li i{
			color:<?php echo sanitize_hex_color($swipy_option['foot_social_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['foot_social_hover'])) : ?>	
		#rs-footer ul.footer_social > li > a:hover,
		.rs-footer .widget ul.footer_social li i:hover{
			color:<?php echo sanitize_hex_color($swipy_option['foot_social_hover']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['footer_input_bg_color'])) : ?>
		.footer-subscribe input[type=submit],
		.rs-footer .footer-top .mc4wp-form-fields input[type="submit"],
		.footer-btn-wrap .footer-btn{
			background:<?php echo sanitize_hex_color($swipy_option['footer_input_bg_color']); ?>
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['footer_input_hover_color'])) : ?>
		.footer-btn-wrap .footer-btn:hover,.footer-subscribe input[type=submit]:hover{
			background:<?php echo sanitize_hex_color($swipy_option['footer_input_hover_color']); ?>;
		}
	<?php endif; ?>
	
	<?php if(!empty($swipy_option['footer_input_border_color'])) : ?>
		.rs-footer .footer-top .mc4wp-form-fields input[type="email"]{
			background:<?php echo esc_attr($swipy_option['footer_input_border_color']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['footer_input_text_color'])) : ?>
		.rs-footer .footer-top .mc4wp-form-fields input[type="submit"],
		.rs-footer .footer-top .mc4wp-form-fields i{
			color:<?php echo sanitize_hex_color($swipy_option['footer_input_text_color']); ?>;
		}
	<?php endif; ?>

	.rs-services-default .services-wrap .services-item .services-icon i,	
	.rs-blog .blog-item .blog-slidermeta span.category a:hover,
	.btm-cate li a:hover,	
	.ps-navigation ul a:hover span,	
	.rs-portfolio-style5 .portfolio-item .portfolio-content a,
	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i:hover,
	.rs-services1.services-right .services-wrap .services-item .services-icon i:hover,
	.rs-galleys .galley-img .zoom-icon:hover,
	#about-history-tabs ul.tabs-list_content li:before,
	#rs-header.header-style-3 .header-inner .logo-section .toolbar-contact-style4 ul li i,
	#sidebar-services .widget.widget_nav_menu ul li.current-menu-item a,
	#sidebar-services .widget.widget_nav_menu ul li a:hover,
	#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a, 
	#rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current_page_item > a,
	rs-heading .title-inner .title,
	.team-grid-style1 .team-item .team-content1 h3.team-name a, 
	.rs-team-grid.team-style5 .team-item .normal-text .person-name a,
	.rs-team-grid.team-style4 .team-wrapper .team_desc .name a,
	.rs-team-grid.team-style4 .team-wrapper .team_desc .name .designation,	
	.contact-page1 .form-button .submit-btn i:before,	
	.woocommerce nav.woocommerce-pagination ul li span.current, 
	.woocommerce nav.woocommerce-pagination ul li a:hover,
	ul.check-icon li:before,
	.rs-project-section .project-item .project-content .title a:hover,
	.subscribe-text i, .subscribe-text .title, .subscribe-text span a:hover,
	.timeline-icon,
	#rs-header.header-style8 .rs-address-area .info-icon i,
	.service-carousels .services-sliders3 span.num,
	.service-readons:before,
	.full-blog-content .btm-cate .postedby .info .name svg,
	.btm-cate .tag-line a:hover,
	ul.stylelisting li:before,
	.rs-pricing-table-features-list li i,
	.services-sliders4:hover .services-desc h4.services-title a,	
	.rs-footer.footerlight .footer_social li a .fa,
	#rs-header .menu-area .navbar ul > li.active a,
	.rs-footer .recent-post-widget .show-featured .post-desc i
	{
		color:<?php echo sanitize_hex_color($secondary_color); ?>;
	}
	.portfolio-slider-data .slick-next, 
	.portfolio-slider-data .slick-prev,
	.ps-navigation ul a:hover span,
	ul.chevron-right-icon li:before,
	.bs-sidebar ul.footer_social li a:hover,
	.bs-search button:hover,
	.single-teams .ps-informations ul li.phone i, 
	.single-teams .ps-informations ul li.email i,
	.woocommerce div.product p.price, .woocommerce div.product span.price,
	.rs-portfolio.style2 .portfolio-slider .portfolio-item .portfolio-content h3.p-title a:hover,
	#rs-header.header-style5 .stuck.sticky .menu-area .navbar ul > li.active a,	
	.rs-breadcrumbs .breadcrumbs-inner .cate-single .post-categories a:hover,
	.woocommerce-message::before, .woocommerce-info::before,
	.rs-sl-social-icons a:hover,
	.rs-portfolio.vertical-slider.style4 .portfolio-slider .portfolio-item:hover .p-title a{
		color:<?php echo sanitize_hex_color($secondary_color); ?> !important;
	}

	.transparent-btn:hover,
	blockquote,
	.rs-portfolio-style2 .portfolio-item .portfolio-img .read_more:hover,
	.service-carousel .owl-dots .owl-dot.active,
	.service-carousel .owl-dots .owl-dot,
	.sidenav .offcanvas_social li a i:hover,
	.rs-footer.footerlight .footer-top .mc4wp-form-fields input[type="email"],
	.rs-blog-details .bs-info.tags a:hover,
	.single-teams .team-skill .rs-progress
	{
		border-color:<?php echo esc_attr($secondary_color); ?> !important;
	}
	
	.owl-carousel .owl-nav [class*="owl-"],
	html input[type="button"]:hover, input[type="reset"]:hover,
	.rs-video-2 .popup-videos:before,
	.sidenav .widget-title:before,
	.rs-team-grid.team-style5 .team-item .team-content,
	.rs-team-grid.team-style4 .team-wrapper .team_desc::before,
	.rs-team .team-item .team-social .social-icon,
	.rs-services-style4:hover .services-icon i,
	.team-grid-style1 .team-item .social-icons1 a:hover i,
	.loader__bar,
	blockquote:before,
	.rs-portfolio-style2 .portfolio-item:before,
	.rs-blog-grid .blog-img a.float-cat,
	#sidebar-services .download-btn ul li,
	.transparent-btn:hover,
	.rs-portfolio-style2 .portfolio-item .portfolio-img .read_more:hover,
	.rs-video-2 .popup-videos,
	.rs-blog-details .blog-item.style2 .category a, .rs-blog .blog-item.style2 .category a, .blog .blog-item.style2 .category a,
	.rs-blog-details .blog-item.style1 .category a, .rs-blog .blog-item.style1 .category a, .blog .blog-item.style1 .category a,	
	.icon-button a,
	.team-grid-style1 .team-item .image-wrap .social-icons1, .team-slider-style1 .team-item .image-wrap .social-icons1,
	.rs-heading.style8 .title-inner:after,
	.rs-heading.style8 .description:after,
	#slider-form-area .form-area input[type="submit"],
	.services-style-5 .services-item:hover .services-title,
	#sidebar-services .rs-heading .title-inner h3:before,	
	#rs-contact .contact-address .address-item .address-icon::before,
	.team-slider-style4 .team-carousel .team-item:hover,
	#rs-header.header-transparent .btn_quote a:hover,
	.rs-heading.style2:after,
	.mfp-close-btn-in .mfp-close,
	.top-services-dark .rs-services .services-style-7.services-left .services-wrap .services-item,
	.single-teams .team-inner h3:before,
	.single-teams .team-detail-wrap-btm.team-inner,
	::selection,
	.rs-heading.style2 .title:after,
	.rs-blog-details #reply-title:before,
	.rs-cta .style2 .title-wrap .exp-title:after,
	.rs-project-section .project-item .project-content .p-icon,
	.proces-item.active:after, .proces-item:hover:after,
	.subscribe-text .mc4wp-form input[type="submit"],
	.rs-footer #wp-calendar th,
	.service-carousel.services-dark .services-sliders2 .services-desc:before, 
	.service-carousels.services-dark .services-sliders2 .services-desc:before,
	.rs-services .services-style-9 .services-wrap:after,
	.portfolio-slider-data .slick-dots li.slick-active, 
	.portfolio-slider-data .slick-dots li:hover,
	.rs-portfolio.vertical-slider.style4 .portfolio-slider .portfolio-item .p-title a:before,
	.rs-team-grid.team-style4 .team-wrapper:hover .team_desc,
	.rs-heading.style6 .title-inner .sub-text:after,
	.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
	.woocommerce span.onsale,
	.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
	.bs-sidebar .widget-title:after,
	.breadcrumbs-inner .page-title:after,
	.prelements-heading.style4 .title-inner .title:before,	
	#scrollUp i,
	.rs-blog-details .bs-info.tags a,
	.bs-sidebar .wp-block-search__label:after, 
	.bs-sidebar .widget_block h2:after, 
	.bs-sidebar .widget-title:after,
	.prelements-heading .pre-heading-line1:before,
	.prelements-heading .pre-heading-line1:after,
	.prelements-heading .pre-heading-line1:after,
	.elementor-widget-container:hover .pre-heading-line1:after,
	blockquote cite:before,
	#page #rs-header.header-style9 .rs-full-menuarea .rs-contact-info i,
	.comments-area .comment-list li.comment .reply a,
	.sidenav .offcanvas_social li a i:hover,
	.elementor-widget-container:hover .pre-heading-line1:before,
	.rs-porfolio-details .ps-informations .info-title:after,
	.menu-wrap-off .inner-offcan .nav-link-container .close-button span{
		background:<?php echo sanitize_hex_color($secondary_color); ?>;
	}
	.woocommerce span.onsale, .woocommerce ul.products li a.fa, .woocommerce ul.products li .glyph-icon,
	.home5__brl__0 .elementor-accordion-item .elementor-tab-title.elementor-active{
		background:<?php echo sanitize_hex_color($secondary_color); ?> !important;
	}

	.woocommerce #respond input#submit:hover, 
	.comment-respond .form-submit #submit:hover,
	.portfolio-slider-data .slick-dots li{
		background:<?php echo sanitize_hex_color($site_color); ?>;
	}
	#rs-header.header-style-3.header-style-three .menu_one:before,
	.rs-porfolio-details .ps-informations, 
	.rs-porfolio-details .information-sidebar .widget_nav_menu li.current-menu-item a,
	.single-teams .team-skill .rs-progress .progress-bar,
	.comment-respond .form-submit #submit,
	#scrollUp i,
	.readon,
	.blog .rs-blog .blog-item .blog-img .tag-line .post-categories li a, 
	.archive .rs-blog .blog-item .blog-img .tag-line .post-categories li a,	
	.cta-widget,
	.cta-widget .title-cta a.cta-button,
	.rs-porfolio-details .widget_custom_html, .rs-porfolio-details .contact-me-widget,
	.bs-sidebar.dynamic-sidebar .service-singles .menu li.current-menu-item a {
	    background:<?php echo sanitize_hex_color($secondary_color); ?>;
	}
	.rs-porfolio-details .information-sidebar .widget_nav_menu li:hover a, 
	.cta-widget .title-cta a.cta-button:hover,
	.readon:hover,
	.blog .rs-blog .blog-item .blog-img .tag-line .post-categories li a:hover, 
	.archive .rs-blog .blog-item .blog-img .tag-line .post-categories li a:hover,
	.bs-sidebar.dynamic-sidebar .service-singles .menu li a:hover{
	    background:<?php echo sanitize_hex_color($secondary_color); ?>;
	}
	.sidenav .widget_nav_menu ul li a:hover,
	.rs-blog .blog-item .blog-meta .blog-date i, .full-blog-content .author i,
	.full-blog-content .btm-cate .tag-line i,
	.full-blog-content .blog-title a:hover,
	.bs-sidebar .recent-post-widget .post-desc span i,
	.single-post .single-posts-meta li span i,
	.single-posts-meta .tag-line i,
	.single-post .single-posts-meta .fa-comments-o:before{
		color:<?php echo sanitize_hex_color($secondary_color); ?> !important;
	}
	.team-slider-style1 .team-item .team-content1 h3.team-name a:hover,
	.rs-service-grid .service-item .service-content .service-button .readon.rs_button:hover:before,
	.rs-heading.style6 .title-inner .sub-text,
	.rs-heading.style7 .title-inner .sub-text,
	.rs-portfolio-style1 .portfolio-item .portfolio-content .pt-icon-plus:before,
	.team-grid-style1 .team-item .team-content1 h3.team-name a, 
	.service-readons:hover,
	.service-readons:before:hover
	{
		color:<?php echo sanitize_hex_color($secondary_color); ?> !important;
	}	

	.rs-services-style3 .bg-img a,
	.rs-services-style3 .bg-img a:hover,
	.wp-block-file .wp-block-file__button
	{
		background:<?php echo sanitize_hex_color($secondary_color); ?>;
		border-color: <?php echo esc_attr($secondary_color); ?>;
	}
	.rs-service-grid .service-item .service-content .service-button .readon.rs_button:hover{
		border-color: <?php echo esc_attr($secondary_color); ?>;;
		color: <?php echo sanitize_hex_color($secondary_color); ?>;
	}
	.woocommerce div.product p.price ins, .woocommerce div.product span.price ins,
	.woocommerce div.product p.price, .woocommerce div.product span.price, 
	.cd-timeline__content .short-info h2, .cd-timeline__content .short-info h3{
		color: <?php echo sanitize_hex_color($secondary_color); ?>!important;
	}
	.rs-slider-video:before,
	.team-grid-style3 .team-img .team-img-sec:before,
	#loading,	
	#sidebar-services .bs-search button:hover, 
	.team-slider-style3 .team-img .team-img-sec:before,
	.rs-blog-details .blog-item.style2 .category a:hover, 
	.rs-blog .blog-item.style2 .category a:hover, 
	.blog .blog-item.style2 .category a:hover,
	.icon-button a:hover,
	.rs-blog-details .blog-item.style1 .category a:hover, 
	.rs-blog .blog-item.style1 .category a:hover, 
	.blog .blog-item.style1 .category a:hover,
	.skew-style-slider .revslider-initialised::before,
	.top-services-dark .rs-services .services-style-7.services-left .services-wrap .services-item:hover,
	.icon-button a:hover,
	.fullwidth-services-box .services-style-2:hover,
	#rs-header.header-style-4 .logo-section:before,
	.post-meta-dates,
	.rs-footer .widget ul li .fa:hover,
	 .woocommerce ul.products li.product .price ins,
	.cd-timeline__img.cd-timeline__img--picture,
	.rs-portfolio-style4 .portfolio-item .portfolio-img:before,
	.rs-portfolio-style3 .portfolio-item .portfolio-img:before,
	.rs-skill-bar .skillbar .skillbar-bar
	{
		background: <?php echo sanitize_hex_color($secondary_color); ?>;
	}

	html input[type="button"], input[type="reset"], input[type="submit"]{
		background: <?php echo sanitize_hex_color($secondary_color); ?>;
	}


	.round-shape:before{
		border-top-color: <?php echo sanitize_hex_color($site_color); ?>;
		border-left-color: <?php echo sanitize_hex_color($site_color); ?>;
	}
	.round-shape:after{
		border-bottom-color: <?php echo sanitize_hex_color($site_color); ?>;
		border-right-color: <?php echo sanitize_hex_color($site_color); ?>;
	}

	#sidebar-services .download-btn,
	.rs-video-2 .overly-border,
	.woocommerce-error, .woocommerce-info, .woocommerce-message{
		border-color:<?php echo esc_attr($secondary_color); ?> !important;
	}

	.portfolio-filter button:hover, 
	.portfolio-filter button.active,
	.team-grid-style1 .team-item .team-content1 h3.team-name a:hover,
	.rs-blog-details .bs-img .blog-date span.date, .rs-blog .bs-img .blog-date span.date, .blog .bs-img .blog-date span.date, .rs-blog-details .blog-img .blog-date span.date, .rs-blog .blog-img .blog-date span.date, .blog .blog-img .blog-date span.date,	
	.rs-portfolio-style5 .portfolio-item .portfolio-content a:hover,
	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i,
	.rs-services1.services-right .services-wrap .services-item .services-icon i,
	.rs-portfolio.style2 .portfolio-slider .portfolio-item .portfolio-img .portfolio-content .categories a:hover,
	.woocommerce ul.products li.product .price,
	#rs-services-slider .menu-carousel .heading-block h4 a:hover,
	.rs-team-grid.team-style5 .team-item .normal-text .person-name a:hover,
	.service-readons:hover, .service-readons:hover:before,
	.single-teams .designation-info,
	ul.unorder-list li:before,
	.rs-footer .widget.widget_pages ul li a:before, .rs-footer .widget.widget_archive ul li a:before, .rs-footer .widget.widget_categories ul li a:before
	{
		color: <?php echo sanitize_hex_color($secondary_color); ?>;
	}
	.rs-team-grid.team-style4 .team-wrapper .team_desc:before,
	.rs-team-grid.team-style5 .team-item .normal-text .team-text:before,
	.rs-services3 .slick-arrow,
	.single-teams .ps-image .ps-informations,
	.slidervideo .slider-videos,
	.slidervideo .slider-videos:before,
	.service-readon,
	.service-carousel .owl-dots .owl-dot.active,	
	.rs-blog-details .bs-img .categories .category-name a, .rs-blog .bs-img .categories .category-name a, .blog .bs-img .categories .category-name a, .rs-blog-details .blog-img .categories .category-name a, .rs-blog .blog-img .categories .category-name a, .blog .blog-img .categories .category-name a{
		background: <?php echo sanitize_hex_color($secondary_color); ?>;
	}

	.rs-blog-details .bs-img .blog-date:before, .rs-blog .bs-img .blog-date:before, .blog .bs-img .blog-date:before, .rs-blog-details .blog-img .blog-date:before, .rs-blog .blog-img .blog-date:before, .blog .blog-img .blog-date:before{		
		border-bottom: 0 solid;
    	border-bottom-color: <?php echo sanitize_hex_color($secondary_color); ?>;
    	border-top: 80px solid transparent;
    	border-right-color: <?php echo sanitize_hex_color($secondary_color); ?>;
    }
	.team-grid-style3 .team-img:before, .team-slider-style3 .team-img:before{
		border-bottom-color: <?php echo sanitize_hex_color($secondary_color); ?>;   			
	}
	.team-grid-style3 .team-img:after, .team-slider-style3 .team-img:after{
		border-top-color: <?php echo sanitize_hex_color($secondary_color); ?>;   	
	}

	.woocommerce-info,
	.timeline-alter .divider:after,
	body.single-services blockquote,	
	.rs-porfolio-details.project-gallery .file-list-image .p-zoom:hover
	{
		border-color: <?php echo esc_attr($secondary_color); ?>;  
	}
	
	.slidervideo .slider-videos i,
	.list-style li::before,
	.slidervideo .slider-videos i:before,
	#team-list-style .team-name a{
		color: <?php echo sanitize_hex_color($link_color); ?>;
	}

	.rs-blog .blog-meta .blog-title a:hover
	.about-award a:hover,
	#team-list-style .team-name a:hover,
	#team-list-style .team-social i:hover,
	#team-list-style .social-info .phone a:hover,
	.woocommerce ul.products li .woocommerce-loop-product__title a:hover,
	#rs-contact .contact-address .address-item .address-text a:hover,
	a,.bs-sidebar .recent-post-widget .post-desc a:hover,
	.rs-blog .blog-meta .blog-title a:hover,
	.rs-blog .blog-item .blog-meta .categories a:hover,
	.bs-sidebar ul a:hover{
		color: <?php echo sanitize_hex_color($link_hover_color); ?>;
	}

	
	.rs-blog-details .bs-img .categories .category-name a:hover, .rs-blog .bs-img .categories .category-name a:hover, .blog .bs-img .categories .category-name a:hover, .rs-blog-details .blog-img .categories .category-name a:hover, .rs-blog .blog-img .categories .category-name a:hover, .blog .blog-img .categories .category-name a:hover,
	#rs-header.header-style-4 .logo-section .times-sec{
		background: <?php echo sanitize_hex_color($secondary_color); ?>;
	}

	
	.rs-heading.style3 .description:after,
	.team-grid-style1 .team-item .social-icons1 a i, .team-slider-style1 .team-item .social-icons1 a i,
	.owl-carousel .owl-nav [class*="owl-"]:hover,
	button, html input[type="button"], input[type="reset"],
	.rs-service-grid .service-item .service-img:before,
	.rs-service-grid .service-item .service-img:after,
	#rs-contact .contact-address .address-item .address-icon::after,
	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i:hover,
	.rs-services1.services-right .services-wrap .services-item .services-icon i:hover,
	.rs-service-grid .service-item .service-content::before,
	.rs-services-style4 .services-item .services-icon i,
	#rs-services-slider .img_wrap:before,
	#rs-services-slider .img_wrap:after,
	.rs-galleys .galley-img:before,
	.woocommerce-MyAccount-navigation ul li:hover,
	.woocommerce-MyAccount-navigation ul li.is-active,
	.rs-galleys .galley-img .zoom-icon,
	.team-grid-style2 .team-item-wrap .team-img .team-img-sec::before,
	.services-style-5 .services-item .icon_bg,
	.contact-sec .contact:before, .contact-sec .contact:after,
	.contact-sec .contact2:before,
	.team-grid-style2 .team-item-wrap .team-img .team-img-sec:before,
	.rs-porfolio-details.project-gallery .file-list-image:hover .p-zoom:hover,	
	.team-slider-style2 .team-item-wrap .team-img .team-img-sec:before,
	.rs-team-grid.team-style5 .team-item .normal-text .social-icons a i:hover
	{
		background: <?php echo sanitize_hex_color($secondary_color); ?>;
	}

	#rs-header.header-style-4 .logo-section .times-sec:after{
		border-bottom-color: <?php echo sanitize_hex_color($secondary_color); ?>;
	}
	
	#rs-header .toolbar-area .toolbar-contact ul li,
	#rs-header .toolbar-area .opening{
		border-right-color:<?php echo sanitize_hex_color($secondary_color); ?>;
	}

	.footer-bottom .container-fluid{
		border-color:<?php echo esc_attr($secondary_color); ?>;
	}

	.rs-services1.services-left.border_style .services-wrap .services-item .services-icon i,
	.rs-services1.services-right .services-wrap .services-item .services-icon i,
	.team-grid-style2 .team-item-wrap .team-img img, .team-slider-style2 .team-item-wrap .team-img img{
		border-color: <?php echo esc_attr($secondary_color); ?> !important;
	}

	<?php 
		if(!empty($swipy_option['link_hover_text_color'])){
			?>
			#rs-services-slider .item-thumb .owl-dot.service_icon_style.active .tile-content a, 
			#rs-services-slider .item-thumb .owl-dot.service_icon_style:hover .tile-content a,
			.team-grid-style2 .appointment-bottom-area .app_details:hover a, .team-slider-style2 .appointment-bottom-area .app_details:hover a{
				color: <?php echo sanitize_hex_color($swipy_option['link_hover_text_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php 
		if(!empty($swipy_option['stiky_menu_area_bg_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area,
			#rs-header.header-style-3.header-style-2 .sticky-wrapper .header-inner.sticky .box-layout{
				background: <?php echo sanitize_hex_color($swipy_option['stiky_menu_area_bg_color']); ?> !important;	
			}
		<?php
		}
	?>


	<?php 
		if(!empty($swipy_option['stikcy_menu_text_color'])){
			?>
			#rs-header.header-style-4 .header-inner.sticky .nav-link-container .nav-menu-link span{
				background: <?php echo sanitize_hex_color($swipy_option['stikcy_menu_text_color']); ?>;	
			}
		<?php
		}
	?>


	<?php 
		if(!empty($swipy_option['stikcy_menu_text_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li a,
			#rs-header .menu-sticky.sticky .sticky_search,
			#rs-header.header-style-4 .header-inner.sticky .sidebarmenu-search i,
			#rs-header.header-style-4 .header-inner.sticky .btn_quote .toolbar-sl-share ul li a{
				color: <?php echo sanitize_hex_color($swipy_option['stikcy_menu_text_color']); ?>;
			}
		<?php
		}
	?>	

	<?php 
		if(!empty($swipy_option['stikcy_menu_text_active_color'])){
			?>
			 #rs-header.header-transparent .menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a,
			#rs-header.header-style8 .menu-sticky.sticky .menu-area .navbar ul li.active a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul#single-menu li.active a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current-menu-item page_item a,
			#rs-header.header-style-4 .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a,
			#rs-header.header-style-4 .menu-sticky.sticky .menu-area .menu > li.current-menu-ancestor > a{
				color: <?php echo sanitize_hex_color($swipy_option['stikcy_menu_text_active_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php if(!empty($swipy_option['sticky_drop_down_bg_color'])) : ?>
		.menu-sticky.sticky .menu-area .navbar ul li .sub-menu{
			background:<?php echo sanitize_hex_color($swipy_option['sticky_drop_down_bg_color']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['sticky_menu_text_hover_color'])) : ?>
		#rs-header.header-style-4 .header-inner.sticky .nav-link-container .nav-menu-link:hover span{
			background:<?php echo sanitize_hex_color($swipy_option['sticky_menu_text_hover_color']); ?>;
		}
	<?php endif; ?>

	<?php 
		if(!empty($swipy_option['sticky_menu_text_hover_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul > li:hover > a,
			#rs-header.header-style-4 .header-inner.sticky .btn_quote .toolbar-sl-share ul > li a:hover,
			#rs-header.header-style-4 .header-inner.sticky .sidebarmenu-search i:hover,			
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li ul.submenu > li.current-menu-ancestor > a{
				color: <?php echo sanitize_hex_color($swipy_option['sticky_menu_text_hover_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php
		if(!empty($swipy_option['toolbar_link_color'])){?>
			#rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons{
			color: <?php echo sanitize_hex_color($swipy_option['toolbar_link_color']);?>
		}
		<?php } 
	?>	

	<?php 
		if(!empty($swipy_option['stikcy_drop_text_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li a{
				color: <?php echo sanitize_hex_color($swipy_option['stikcy_drop_text_color']); ?> !important;	
			}
		<?php
		}
	?>

	<?php 
		if(!empty($swipy_option['sticky_drop_text_hover_color'])){
			?>
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li a:hover,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current-menu-item page_item a,
			#rs-header .menu-sticky.sticky .menu-area .navbar ul  li .sub-menu li.current_page_item > a
			{
				color: <?php echo sanitize_hex_color($swipy_option['sticky_drop_text_hover_color']); ?> !important;	
			}
		<?php
		}
	?>	

	<?php 
		if(!empty($swipy_option['footer_bg_color'])){?>
		.rs-footer{
			background: <?php echo sanitize_hex_color($swipy_option['footer_bg_color']); ?>;
			background-size: cover;
		}
		<?php
	}
?>


	<?php if(!empty($swipy_option['btn_icon_bg_color'])) : ?>
		.rs-btn.style3 a:after{
			background:<?php echo esc_attr($swipy_option['btn_icon_bg_color']); ?>;	
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['btn_bg_color'])) : ?>
		.wpcf7-submit,
		.comments-area .comment-list li.comment .reply a,
		.comment-respond .form-submit #submit,
		wp-block-file .wp-block-file__button,
		#rs-header .btn_quote a,
		.rs-btn a{
			background:<?php echo esc_attr($swipy_option['btn_bg_color']); ?>;	
		}
		.wp-block-file .wp-block-file__button{
			border-color:<?php echo esc_attr($swipy_option['btn_bg_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['btn_border_radius'])) : ?>
		.rs-blog-details .bs-info.tags a,
		.wpcf7-submit,
		.comments-area .comment-list li.comment .reply a,
		.comment-respond .form-submit #submit,
		wp-block-file .wp-block-file__button,
		#rs-header .btn_quote a,
		.rs-btn a{
			border-radius:<?php echo esc_attr($swipy_option['btn_border_radius']); ?>;	
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['toolbar_bg_skew_color'])) : ?>		
		#rs-header.header-style7 .toolbar-area:after{
			background:<?php echo sanitize_hex_color($swipy_option['toolbar_bg_skew_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_phone_number_color'])) : ?>		
		#page #rs-header.header-style9 .rs-full-menuarea .rs-contact-info a,
		#page #rs-header.header-style9 .rs-full-menuarea .rs-contact-info span{
			color:<?php echo sanitize_hex_color($swipy_option['menu_phone_number_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['btn_bg_hover_border'])) : ?>
		.woocommerce #respond input#submit.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce .wc-forward:hover, .woocommerce a.button.alt:hover, .woocommerce a.button:hover, .woocommerce button.button.alt:hover, .woocommerce button.button:hover, .woocommerce input.button.alt:hover, .woocommerce input.button:hover{
			border:1px solid <?php echo esc_attr($swipy_option['btn_bg_hover_border']); ?>;			
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['btn_bg_hover'])) : ?>
		.rs-btn a:hover,
		#rs-header .btn_quote a:hover,
		.comment-respond .form-submit #submit:hover,
		.rs-blog-details .bs-info.tags a:hover,
		.woocommerce #respond input#submit.alt:hover, 
		.woocommerce #respond input#submit:hover, 
		.woocommerce .wc-forward:hover, 
		.woocommerce a.button.alt:hover, 
		.woocommerce a.button:hover, 
		.woocommerce button.button.alt:hover, 
		.woocommerce button.button:hover, 
		.woocommerce input.button.alt:hover, 
		.woocommerce input.button:hover,
		.comments-area .comment-list li.comment .reply a:hover,
		#rs-header .btn_quote a:hover{
		background:<?php echo esc_attr($swipy_option['btn_bg_hover']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['btn_text_color'])) : ?>
		.wpcf7-submit,
		.comments-area .comment-list li.comment .reply a,
		wp-block-file .wp-block-file__button,
		.comment-respond .form-submit #submit,
		#rs-header .btn_quote a,
		.rs-btn a,
		.submit-btn .wpcf7-submit{
			color:<?php echo sanitize_hex_color($swipy_option['btn_text_color']); ?>;			
		}
	<?php endif; ?>

	 <?php if(!empty($swipy_option['border_width_header'])) { ?>
	 	.show-header-border #rs-header .menu-sticky .menu-area{
	 		border-width: <?php echo esc_html($swipy_option['border_width_header']) ;?>
	 	}
	 <?php }?>

	 <?php if(!empty($swipy_option['gap_header'])) { ?>
	 	#rs-header .menu-sticky .menu-area{
	 		padding-top: <?php echo esc_html($swipy_option['gap_header']) ;?>;
	 		padding-bottom: <?php echo esc_html($swipy_option['gap_header']) ;?>
	 	}
	 <?php }?> 
	
	.woocommerce button.button,
	.woocommerce button.button.alt,  
	.woocommerce ul.products li a.button,
	.woocommerce .wc-forward,
	.woocommerce #respond input#submit, 
	.woocommerce a.button, 
	.woocommerce .wc-forward, 
	.woocommerce button.button, 
	.woocommerce input.button, 
	.woocommerce #respond input#submit.alt, 
	.woocommerce a.button.alt, 
	.woocommerce button.button.alt, 
	.woocommerce input.button.alt,
	.woocommerce a.button, 
	.menu-sticky.sticky .quote-button,
	#rs-header.header-style-3 .btn_quote .quote-button,
	.wp-block-file .wp-block-file__button,
	.wp-block-button__link{
		background:<?php echo sanitize_hex_color($secondary_color); ?>;
	}
	

	<?php if(!empty($swipy_option['btn_text_color'])) : ?>		
		.woocommerce button.button,
		.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce .wc-forward, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,
		.woocommerce a.button,
		.woocommerce .wc-forward,
		.woocommerce button.button.alt,   
		.woocommerce ul.products li a.button,
		.menu-sticky.sticky .quote-button:hover,
		#rs-header.header-style-3 .btn_quote .quote-button,
		#rs-header .btn_quote a{
			color:<?php echo sanitize_hex_color($swipy_option['btn_text_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['btn_txt_hover_color'])) : ?>
		.rs-btn a:hover,
		#rs-header .btn_quote a:hover,
		.submit-btn .wpcf7-submit:hover, 
		#rs-header.header-style-3 .btn_quote .quote-button:hover{
			color:<?php echo sanitize_hex_color($swipy_option['btn_txt_hover_color']); ?>;
		}
	<?php endif; ?>

	.woocommerce a.button:hover,
	.woocommerce a.button:hover, 
	.woocommerce .wc-forward:hover, .woocommerce button.button:hover, 
	.woocommerce input.button, .woocommerce #respond input#submit.alt:hover,
	.woocommerce ul.products li:hover a.button,
	.menu-sticky.sticky .quote-button:hover,
	#rs-header.header-transparent .btn_quote a:hover,
	#rs-header.header-style-3 .btn_quote .quote-button:hover,
	.readon:before,
	.submit-btn:before,
	.woocommerce #respond input#submit:before, .woocommerce a.button:before, 
	.woocommerce .wc-forward:before, .woocommerce button.button:before, 
	.woocommerce input.button:before, .woocommerce #respond input#submit.alt:before, 
	.woocommerce a.button.alt:before, .woocommerce button.button.alt:before, .woocommerce input.button.alt:before{
		background:<?php echo sanitize_hex_color($secondary_color); ?>;			
	}


	<?php if(!empty($swipy_option['container_size'])) : ?>
		@media only screen and (min-width: 1300px) {
			.container{
				max-width:<?php echo esc_attr($swipy_option['container_size']); ?>;
			}
		}
	<?php endif; ?>



	<?php if(!empty($swipy_option['logo-height-mobile'])) : ?>
		@media only screen and (max-width: 991px) {
			#rs-header .logo-area a img, #rs-header .mobile-logos img{
				max-height:<?php echo esc_attr($swipy_option['logo-height-mobile']); ?> !important;
			}
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_item_gap'])) : ?>
		.menu-area .navbar ul li{
			padding-left:<?php echo esc_attr($swipy_option['menu_item_gap']); ?>;
			padding-right:<?php echo esc_attr($swipy_option['menu_item_gap']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_item_gap2'])) : ?>
		.menu-area .navbar ul > li,
		.menu-cart-area,
		#rs-header .menu-responsive .sidebarmenu-search .sticky_search{
			padding-top:<?php echo esc_attr($swipy_option['menu_item_gap2']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['menu_item_gap3'])) : ?>
		.menu-area .navbar ul > li,
		.menu-cart-area,
		#rs-header .menu-responsive .sidebarmenu-search .sticky_search{
			padding-bottom:<?php echo esc_attr($swipy_option['menu_item_gap3']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['dropdown_menu_item_gap'])) : ?>
		.menu-area .navbar ul li ul.sub-menu li a{
			padding-left:<?php echo esc_attr($swipy_option['dropdown_menu_item_gap']); ?>;
			padding-right:<?php echo esc_attr($swipy_option['dropdown_menu_item_gap']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['dropdown_menu_item_gap2'])) : ?>
		.menu-area .navbar ul li ul.sub-menu{
			padding-top:<?php echo esc_attr($swipy_option['dropdown_menu_item_gap2']); ?>;
			padding-bottom:<?php echo esc_attr($swipy_option['dropdown_menu_item_gap2']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['dropdown_menu_item_separate'])) : ?>
		.menu-area .navbar ul li ul.sub-menu li a{
			padding-top:<?php echo esc_attr($swipy_option['dropdown_menu_item_separate']); ?>;
			padding-bottom:<?php echo esc_attr($swipy_option['dropdown_menu_item_separate']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['meaga_menu_item_gap'])) : ?>
		#rs-header .menu-area .navbar ul > li.mega > ul{
			padding-left:<?php echo esc_attr($swipy_option['meaga_menu_item_gap']); ?>;
			padding-right:<?php echo esc_attr($swipy_option['meaga_menu_item_gap']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['mega_menu_item_gap2'])) : ?>
		#rs-header .menu-area .navbar ul > li.mega > ul{
			padding-top:<?php echo esc_attr($swipy_option['mega_menu_item_gap2']); ?>;
			padding-bottom:<?php echo esc_attr($swipy_option['mega_menu_item_gap2']); ?>;
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['mega_menu_item_separate'])) : ?>
		#rs-header .menu-area .navbar ul li.mega ul.sub-menu li a{
			padding-top:<?php echo esc_attr($swipy_option['mega_menu_item_separate']); ?>;
			padding-bottom:<?php echo esc_attr($swipy_option['mega_menu_item_separate']); ?>;
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['breadcrumb_bg_color'])) : ?>
		.rs-breadcrumbs{
			background:<?php echo sanitize_hex_color($swipy_option['breadcrumb_bg_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['breadcrumb_seperator_color'])) : ?>
		.rs-breadcrumbs .breadcrumbs-title span a:after,
		.breadcrumbs-title span:after, 
		.rs-breadcrumbs .breadcrumbs-title span a:before,
		.rs-breadcrumbs .breadcrumbs-title a:before{
			background-color:<?php echo sanitize_hex_color($swipy_option['breadcrumb_seperator_color']); ?>;			
		}
	<?php endif; ?>
	


	<?php if(!empty($swipy_option['offcanvas_close_color'])) : ?>
		.sidenav li.nav-link-container a span.dot1,
		.sidenav li.nav-link-container a span.dot3,
		.sidenav li.nav-link-container a span.dot5,
		.sidenav li.nav-link-container a span.dot7,
		.sidenav li.nav-link-container a span.dot9,
		.menu-wrap-off .inner-offcan .nav-link-container .close-button span.dot1,
		.menu-wrap-off .inner-offcan .nav-link-container .close-button span.dot3,
		.menu-wrap-off .inner-offcan .nav-link-container .close-button span.dot5,
		.menu-wrap-off .inner-offcan .nav-link-container .close-button span.dot7,
		.menu-wrap-off .inner-offcan .nav-link-container .close-button span.dot9
		{
			background:<?php echo sanitize_hex_color($swipy_option['offcanvas_close_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcanvas_close_hover_color'])) : ?>
		.sidenav li.nav-link-container:hover a.close-button span,
		.menu-wrap-off .inner-offcan .nav-link-container .close-button:hover span{
			background:<?php echo sanitize_hex_color($swipy_option['offcanvas_close_hover_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcan_bgs_color'])) : ?>
		.menu-wrap-off, body.page-template-page-single2 .mobile-menu-container, body.page-template-page-single .mobile-menu-container{
			background:<?php echo sanitize_hex_color($swipy_option['offcan_bgs_color']); ?>;			
		}
	<?php endif; ?>


	<?php if(!empty($swipy_option['offcan_txt_color'])) : ?>
		.sidenav p, .sidenav{
			color:<?php echo sanitize_hex_color($swipy_option['offcan_txt_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcan_txt_color'])) : ?>
		body .sidenav .widget .widget-title{
			color:<?php echo sanitize_hex_color($swipy_option['offcan_txt_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcan_link_color'])) : ?>
		.sidenav .widget_nav_menu ul li a,
		.sidenav.offcanvas-icon .rs-offcanvas-right a,
		.sidenav .menu > li.menu-item-has-children:before,
		.sidenav a{
			color:<?php echo sanitize_hex_color($swipy_option['offcan_link_color']); ?>;			
		}
	<?php endif; ?>
	

	<?php if(!empty($swipy_option['offcan_link_social_color'])) : ?>
		ul.sidenav .menu > li.menu-item-has-children:before, 
		.sidenav .offcanvas_social li a i{
			color:<?php echo sanitize_hex_color($swipy_option['offcan_link_social_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcan_border_color'])) : ?>
		.sidenav.offcanvas-icon .rs-offcanvas-right{
			border-color:<?php echo esc_attr($swipy_option['offcan_border_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcan_link_hovers_color'])) : ?>
		.sidenav .widget_nav_menu ul li a:hover, 
		body.page-template-page-single .mobile-menu-container ul li a:hover, body.body.page-template-page-single2 .mobile-menu-container ul li a:hover,
		.sidenav a:hover{
			color:<?php echo sanitize_hex_color($swipy_option['offcan_link_hovers_color']); ?>;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['offcan_link_bg_color'])) : ?>
		.sidenav .offcanvas_social li a i,
		ul.sidenav .menu > li.menu-item-has-children::before{
			background:<?php echo sanitize_hex_color($swipy_option['offcan_link_bg_color']); ?>;			
		}
	<?php endif; ?>

	

	<?php if(!empty($swipy_option['breadcrumb_text_color'])) : ?>
		.rs-breadcrumbs .page-title,
		.rs-breadcrumbs ul li.trail-begin a:before,
		.rs-breadcrumbs .breadcrumbs-inner p,
		.rs-breadcrumbs h6.intro-title,
		.rs-breadcrumbs .breadcrumbs-title a,
		.rs-breadcrumbs .breadcrumbs-title .current-item,
		.rs-breadcrumbs .breadcrumbs-title span a span{
			color:<?php echo sanitize_hex_color($swipy_option['breadcrumb_text_color']); ?> !important;			
		}
	<?php endif; ?>	

	<?php if(!empty($swipy_option['breadcrumb_border_color'])) : ?>
		.rs-breadcrumbs .page-title::before{
			background:<?php echo sanitize_hex_color($swipy_option['breadcrumb_border_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['breadcrumb_icon_color'])) : ?>
		.rs-breadcrumbs .breadcrumbs-meta li svg.feather-file{
			color:<?php echo sanitize_hex_color($swipy_option['breadcrumb_icon_color']); ?> !important;			
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['breadcrumb_top_gap']) && !empty($swipy_option['breadcrumb_bottom_gap'])) : ?>
		.rs-breadcrumbs .breadcrumbs-inner,
		#rs-header.header-style-3 .rs-breadcrumbs .breadcrumbs-inner{
			padding-top:<?php echo esc_attr($swipy_option['breadcrumb_top_gap']); ?>;			
			padding-bottom:<?php echo esc_attr($swipy_option['breadcrumb_bottom_gap']); ?>;			
	}
	<?php endif; ?>
	<?php if(!empty($swipy_option['breadcrumb_top_gap_mobile']) && !empty($swipy_option['breadcrumb_bottom_gap_mobile'])) : ?>
		@media only screen and (max-width: 767px) {
				body .rs-breadcrumbs .breadcrumbs-inner,
				body #rs-header.header-style-3 .rs-breadcrumbs .breadcrumbs-inner{
					padding-top:<?php echo esc_attr($swipy_option['breadcrumb_top_gap_mobile']); ?> !important;			
					padding-bottom:<?php echo esc_attr($swipy_option['breadcrumb_bottom_gap_mobile']); ?> !important;			
			}
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['blog_bg_color'])) : ?>
		body.single-post, body.blog, body.archive, body.single-services, body.single-mp-event{
			background:<?php echo sanitize_hex_color($swipy_option['blog_bg_color']); ?>;					
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['breadcrumb_max_width'])) : ?>
		.rs-breadcrumbs .breadcrumbs-inner,
		.single-teams .rs-breadcrumbs .breadcrumbs-inner,
		.rs-breadcrumbs.text-center .breadcrumbs-inner{
			max-width:<?php echo esc_attr($swipy_option['breadcrumb_max_width']); ?>;					
		}
	<?php endif; ?>

		<?php if(!empty($swipy_option['preloader_text_color'])) : ?>
		.loader .loader-container:before{
			border-top-color: <?php echo sanitize_hex_color($swipy_option['preloader_text_color']); ?> !important; 
		}		
	<?php endif; ?>

		<?php if(!empty($swipy_option['preloader_animate_color'])) : ?>
		.loader .loader-container{
			border-color: <?php echo sanitize_hex_color($swipy_option['preloader_animate_color']); ?> !important; 
		}		
	<?php endif; ?>

	<?php if(!empty($swipy_option['preloader_bg_color'])) : ?>
		#pre-load{
			background: <?php echo sanitize_hex_color($swipy_option['preloader_bg_color']); ?> !important;  
		}
	<?php endif; ?>

	<?php if(!empty($swipy_option['text_color'])) : ?>
		.page-error.coming-soon .countdown-inner .time_circles div,
		.page-error.coming-soon .content-area h3,
		.page-error.coming-soon .content-area h3 span,
		.page-error.coming-soon .follow-us-sbuscribe p,
		.page-error.coming-soon .follow-us-sbuscribe ul li a,
		.page-error.coming-soon .countdown-inner .time_circles div h4,
		.page-error.coming-soon .countdown-inner .time_circles div span{
			color: <?php echo esc_attr($swipy_option['text_color']); ?>
		}
		.page-error.coming-soon .countdown-inner .time_circles div{
			border-color: <?php echo esc_attr($swipy_option['circle_border_color']); ?>
		}

	<?php endif; ?>

	<?php if(!empty($swipy_option['circle_primary_color'])) : ?>
		
		.page-error.coming-soon .countdown-inner .time_circles div{
			background:  <?php echo esc_attr($swipy_option['circle_primary_color']);?>
		}		
		
	<?php endif; ?>	
</style>

<?php
	}
	 if ( class_exists( 'WooCommerce' ) && is_shop() || class_exists( 'WooCommerce' ) && is_product_tag()  || class_exists( 'WooCommerce' ) && is_product_category()  ) {
			$swipy_shop_id        = get_option( 'woocommerce_shop_page_id' );
			$padding_top           = get_post_meta($swipy_shop_id, 'content_top', true);
			$padding_bottom        = get_post_meta($swipy_shop_id, 'content_bottom', true);			
			$f_padding_top        = get_post_meta($swipy_shop_id, 'footer__top__padding', true);	
  		if($padding_top != '' || $padding_bottom != '' || $f_padding_top != ''){
	  	?>



	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}
	  	  	<?php if(!empty($f_padding_top)): ?>
		  	  	.rs-footer .footer-top{
		  	  		padding-top:<?php echo esc_attr($f_padding_top); ?> !important;
		  	  	}
		  	<?php endif; ?>
	  	  </style>	


	  	  <?php
	 	}
	}
	elseif(is_home() && !is_front_page() || is_home() && is_front_page()){
		$padding_top    = get_post_meta(get_queried_object_id(), 'content_top', true);
		$padding_bottom = get_post_meta(get_queried_object_id(), 'content_bottom', true);
		$f_padding_top = get_post_meta(get_queried_object_id(), 'footer__top__padding', true);
  		if($padding_top != '' || $padding_bottom != '' || $f_padding_top != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}
	  	  	<?php if(!empty($f_padding_top)): ?>
	  	  	.rs-footer .footer-top{
	  	  		padding-top:<?php echo esc_attr($f_padding_top); ?> !important;
	  	  	} 
	  	  	<?php endif; ?>
	  	  </style>	
	  	<?php
	  }
  }
  	else{
		$padding_top    = get_post_meta(get_the_ID(), 'content_top', true);
		$padding_bottom = get_post_meta(get_the_ID(), 'content_bottom', true);
		$f_padding_top = get_post_meta(get_the_ID(), 'footer__top__padding', true);

  		if($padding_top != '' || $padding_bottom != '' || $f_padding_top != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?> !important;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?> !important;
	  	  	}

	  	  	<?php if(!empty($f_padding_top)): ?>
	  	  	.rs-footer .footer-top{
	  	  		<?php if(!empty($f_padding_top)): ?>padding-top:<?php echo esc_attr($f_padding_top); endif;?> !important;
	  	  	}  
	  	  	<?php endif; ?>	  	
	  	  </style>	
	  	<?php
	  }
  	}


  	if(!is_search()){
		$menu_texts_colors              = get_post_meta(get_the_ID(), 'menu-text-color', true);
		$menu_texts_hover_colors        = get_post_meta(get_the_ID(), 'menu-text-hover-color', true);
		$topbar_area_bg                 = get_post_meta(get_the_ID(), 'topbar-area-bg', true);
		$topbar_text_color              = get_post_meta(get_the_ID(), 'topbar-text-color', true);
		$topbar_link_hovercolors        = get_post_meta(get_the_ID(), 'topbar_link_hovercolor', true);
		$topbar_border_color            = get_post_meta(get_the_ID(), 'topbar-border-color', true);
		$search_icon_color              = get_post_meta(get_the_ID(), 'search_icon_color', true);
		$search_icon_sticky_color              = get_post_meta(get_the_ID(), 'search_icon_sticky_color', true);
		$he_soci_icon_color              = get_post_meta(get_the_ID(), 'social-icon-color', true);
		$cart_icon_color                = get_post_meta(get_the_ID(), 'cart_icon_color', true);
		$footer_btn_text_colors         = get_post_meta(get_the_ID(), 'footer_btn_text_color', true);
		$scrollUp_icon         = get_post_meta(get_the_ID(), 'scrollUp_icon', true);
		
		$menu_bg_sbg                    = get_post_meta(get_the_ID(), 'menu-type-bg', true);
		$menu_border_colors             = get_post_meta(get_the_ID(), 'menu_border_color', true);
		$menu_bg_dropdowncolors         = get_post_meta(get_the_ID(), 'menu_bg_dropdowncolor', true);
		$menu_text_dropdowncolors       = get_post_meta(get_the_ID(), 'menu_text_dropdowncolor', true);
		
		
		$menu_sticky_bgcolors           = get_post_meta(get_the_ID(), 'menu_sticky_bgcolor', true);
		$menu_sticky_txtcolors          = get_post_meta(get_the_ID(), 'menu_sticky_txtcolor', true);
		$menu_sticky_txt_hovercolors    = get_post_meta(get_the_ID(), 'menu_sticky_txt_hovercolor', true);
		
		$header_hamburger_colors           = get_post_meta(get_the_ID(), 'head_hamburger_color', true);
		$header_hamburger_colors2          = get_post_meta(get_the_ID(), 'head_hamburger_colors2', true);
		$footer_title_color                = get_post_meta(get_the_ID(), 'footer_title_color', true);
		$footer_links_colors               = get_post_meta(get_the_ID(), 'footer_link_colorss', true);
		$footer_arrows_color               = get_post_meta(get_the_ID(), 'footer_in_bg_color', true);
		$footer_in_btn_color               = get_post_meta(get_the_ID(), 'footer_in_btn_color', true);
		$footer_placeholders               = get_post_meta(get_the_ID(), 'footer_placeholder_color', true);
		$footer_in_shadow_color            = get_post_meta(get_the_ID(), 'footer_in_shadow_color', true);
		$footer_top_border_color           = get_post_meta(get_the_ID(), 'footer_top_border_color', true);

		$sticky_hamburgers_icons_color = get_post_meta(get_the_ID(), 'sticky_hamburgers_icons_color', true);
		
		$sticky_hamburgers_bg_color = get_post_meta(get_the_ID(), 'sticky_hamburgers_bg_color', true);

		$copyright_border_color            = get_post_meta(get_the_ID(), 'copyright_border', true);
		$footer_primary_hover              = get_post_meta(get_the_ID(), 'footer_primary_hover_color', true);
		$footer_border_color               = get_post_meta(get_the_ID(), 'footer_border_color', true);
		$footer_all_is_colors              = get_post_meta(get_the_ID(), 'footer_all_icon_colors', true);
		$footer_socials_bg_colorss         = get_post_meta(get_the_ID(), 'footer_socials_bg_colors', true);
		$footer_socials_ic_colors          = get_post_meta(get_the_ID(), 'footer_socials_icon_colors', true);
		
		$footer_txt_colors                 = get_post_meta(get_the_ID(), 'footer_texts_color', true);
		$footer_in_icon_colors             = get_post_meta(get_the_ID(), 'footer_in_icon_color', true);
		$footer_btn_bg_colors              = get_post_meta(get_the_ID(), 'footer_btn_bg_color', true);
		$primary_colors                    = get_post_meta(get_the_ID(), 'primary-colors', true);
		
		$quote_button_bg_colors            = get_post_meta(get_the_ID(), 'quote_button_bg_color', true);
		$quote_button_colors               = get_post_meta(get_the_ID(), 'quote_button_color', true);
		$quote_button_bg_hover_colors      = get_post_meta(get_the_ID(), 'quote_button_bg_hover_color', true);
		$quote_button_hover_colors         = get_post_meta(get_the_ID(), 'quote_button_hover_color', true);
		$menu_text_hover_dropdowncolors    = get_post_meta(get_the_ID(), 'menu_text_hover_dropdowncolor', true);
		$main_menu_top    				   = get_post_meta(get_the_ID(), 'main_menu_top', true);
		$main_menu_bottom    			   = get_post_meta(get_the_ID(), 'main_menu_bottom', true);
		$header_menu_top    			   = get_post_meta(get_the_ID(), 'header_menu_top', true);
		$header_menu_bottom    			   = get_post_meta(get_the_ID(), 'header_menu_bottom', true);
		$left_header_menu    			   = get_post_meta(get_the_ID(), 'left_header_menu', true);
		$right_header_menu    			   = get_post_meta(get_the_ID(), 'right_header_menu', true);
		$sticky_main_menu_top    		   = get_post_meta(get_the_ID(), 'sticky_main_menu_top', true);
		$sticky_main_menu_bottom    	   = get_post_meta(get_the_ID(), 'sticky_main_menu_bottom', true);
	}


	if( empty($swipy_option['enable_global'])) :

	
	?>

	  	<style>

	  		<?php 
	  		if(!empty($footer_links_colors)): ?>
	  			body .rs-footer a, 
	  			body .rs-footer .fa-ul li a, 
	  			body .rs-footer .widget.widget_nav_menu ul li a{
	  				color:<?php echo sanitize_hex_color($footer_links_colors);?>;
	  			}
	  		<?php endif; ?>

	  		<?php 
	  	  		if(!empty($footer_arrows_color)): ?>
		  	  	body .rs-footer .footer-top .mc4wp-form-fields input[type="email"]{			  	  		
	  	  			background:<?php echo sanitize_hex_color($footer_arrows_color);?>;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($footer_in_btn_color)): ?>
		  	  	.rs-footer .footer-top .mc4wp-form-fields input[type="submit"]{			 
	  	  			color:<?php echo sanitize_hex_color($footer_in_btn_color);?>;
		  	  	}
			<?php endif;?>



	  		<?php 
	  	  		if(!empty($menu_border_colors)): ?>
	  	  		body #rs-header .header-inner,
		  	  	body #rs-header.header-style-3 .header-inner .box-layout{			  	  		
	  	  			border-color:<?php echo esc_attr($menu_border_colors);?>;
		  	  	}
			<?php endif;?>


	  		<?php 
	  	  		if(!empty($footer_in_icon_colors)): ?>
		  	  	body .footer-subscribe .paper-plane:before{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_in_icon_colors);?>;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($footer_btn_bg_colors)): ?>
		  	  	body .footer-btn-wrap .footer-btn,
		  	  	body ul.footer_social li{			  	  		
	  	  			background:<?php echo sanitize_hex_color($footer_btn_bg_colors);?>;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($footer_btn_text_color)): ?>
		  	  	body .footer-btn-wrap .footer-btn,
		  	  	body .rs-footer .widget ul li .fa{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_btn_text_color);?>;
		  	  	}
			<?php endif;?>			

	  		<?php 
	  	  		if(!empty($menu_bg_dropdowncolors)): ?>
		  	  	body .menu-area .navbar ul li ul.sub-menu{			  	  		
	  	  			background:<?php echo sanitize_hex_color($menu_bg_dropdowncolors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($primary_colors)): ?>
	  	  		#scrollUp i:hover,
	  	  		body .sidenav .offcanvas_social li a i:hover,
	  	  		.rs-footer .footer-top h3.footer-title:after,
	  	  		#rs-header.header-style8 .btn_quote a,
	  	  		.woocommerce a.button, .woocommerce .wc-forward,
	  	  		#rs-header.header-style7 .menu-cart-area:before,
	  	  		#rs-header.header-style7 .toolbar-area:after,	
		  	  	body #scrollUp i, body .spinner,
		  	  	.mfp-close-btn-in .mfp-close,
		  	  	body .rs-footer ul.footer_social li a:hover,		  	  	
				.rs-footer .footer-top .widget:hover h3.footer-title:after,
				.rs-footer .footer-top .widget:hover h3.footer-title:before,
		  	  	body #rs-header .sticky_form,
		  	  	body .rs-footer .footer-top .mc4wp-form-fields input[type="submit"],
		  	  	body .rev-scroll-btn span,
				body #page #rs-header.header-style9 .rs-full-menuarea .rs-contact-info i,
		  	  	body .home5__brl__0 .elementor-accordion-item .elementor-tab-title.elementor-active,
		  	  	body .rs-footer .widget ul li .fa:hover{			  	  		
	  	  			background:<?php echo sanitize_hex_color($primary_colors);?> !important;
		  	  	}
			<?php endif;?>
	  		<?php 
	  	  		if(!empty($primary_colors)): ?>
	  	  		body #page #rs-header.header-style9 .rs-full-menuarea .rs-contact-info a:hover,
	  	  		body #rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a:hover, 
	  	  		body #rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons:hover, 
	  	  		body #rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons:before, 
	  	  		body #rs-header .toolbar-area .toolbar-contact ul li a:hover, 
	  	  		body #rs-header .toolbar-area .toolbar-sl-share ul li a i:hover,	
	  	  		body .mobile-topnars .rs-address-area .rs-address-list i:before,	
	  	  		body .header-style8 .rs-address-area .info-icon i,
	  	  		body .rs-testimonial-dots-style2 .slick-arrow:hover:before,	
	  	  		body #rs-header.header-style7 .toolbar-area .toolbar-contact ul li i,	
	  	  		body .rs-portfolio-slider.slider-style-5 .rs-addon-slider .slick-arrow:hover:before,
				body #rs-header .toolbar-area .opening i, 
				body .rs-footer .fa-ul li i, 
				body .rs-footer .widget.widget_nav_menu ul li a:before,
				body #rs-header .toolbar-area .toolbar-contact ul li i,
				body #rs-header .toolbar-area .opening i,
		  	  	body .rs-footer a:hover, .rs-footer .widget.widget_nav_menu ul li a:hover,
		  	  	body .rs-footer .recent-post-widget .show-featured .post-desc i{			  	  		
	  	  			color:<?php echo sanitize_hex_color($primary_colors);?> !important;
		  	  	}
			<?php endif;?>
	  		<?php 
	  	  		if(!empty($primary_colors)): ?>
	  	  		body .sidenav .offcanvas_social li a i:hover,
	  	  		body .wpcf7 form.invalid .wpcf7-response-output, 
				body .wpcf7 form.unaccepted .wpcf7-response-output,
	  	  		.woocommerce a.button, .woocommerce .wc-forward{			  	  		
	  	  			border-color:<?php echo esc_attr($primary_colors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($menu_sticky_bgcolors)): ?>	
		  	  	body #rs-header .menu-sticky.sticky .menu-area, 
		  	  	body #rs-header.header-style-3 .header-inner.sticky .box-layout,
		  	  	body #rs-header.header-style-3 .header-inner.sticky,
		  	  	body #rs-header.header-style-3.header-style-2 .sticky-wrapper .header-inner.sticky .box-layout{  		
	  	  			background:<?php echo sanitize_hex_color($menu_sticky_bgcolors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($menu_sticky_txtcolors)): ?>
	  	  		#rs-header.header-style-6 .header-inner.sticky .rs-contact-location .contact-inf .phone-line, #rs-header.header-style-6 .header-inner.sticky .rs-contact-location .contact-inf a,
	  	  		#rs-header.header-style-6 .header-inner.sticky .rs-contact-location i.phone-icon:before,	
		  	  	body #rs-header .menu-sticky.sticky .menu-area .navbar ul li a, 
		  	  	body #rs-header.header-style-4 .header-inner.sticky .menu-cart-area i, 
		  	  	body #rs-header.header-style-4 .header-inner.sticky .sidebarmenu-search i,
		  	  	body #rs-header.header-style-4 .header-inner.sticky .btn_quote .toolbar-sl-share ul li a{
	  	  			color:<?php echo sanitize_hex_color($menu_sticky_txtcolors);?> !important;
		  	  	}
			<?php endif;?>


			<?php 
	  	  		if(!empty($footer_all_is_colors)): ?>
		  	  	body .rs-footer .fa-ul li i:before,
		  	  	body .rs-footer .recent-post-widget .show-featured .post-desc i{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_all_is_colors);?> !important;
		  	  	}
			<?php endif;?>

	  		

	  		<?php 
	  	  		if(!empty($menu_sticky_txt_hovercolors)): ?>
	  	  		#rs-header.header-style-6 .header-inner.sticky .rs-contact-location .contact-inf a:hover,
	  	  		body.page-template-page-single .menu-area .navbar ul > li.active a,
	  	  		body.page-template-page-single #rs-header .menu-sticky.sticky .menu-area .navbar ul#single-menu li.active a,
	  	  		body.page-template-page-single #rs-header .menu-sticky.sticky .menu-area .navbar ul > li.active a,
	  	  		#rs-header.header-transparent .menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a, #rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a, #rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a, #rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current-menu-item page_item a, #rs-header.header-style-4 .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a, #rs-header.header-style-4 .menu-sticky.sticky .menu-area .menu > li.current-menu-ancestor > a,
	  	  		#rs-header.header-style5 .menu-area .navbar ul > li.current-menu-ancestor > a, #rs-header.header-style5 .header-inner .menu-area .navbar ul > li.current-menu-ancestor > a, #rs-header.header-style5 .header-inner.menu-sticky.sticky .menu-area .navbar ul > li.current-menu-ancestor > a,
	  	  		#rs-header .menu-sticky.sticky .menu-area .navbar ul > li.current_page_item > a,
		  	  	#rs-header .menu-sticky.sticky .menu-area .navbar ul > li:hover > a, #rs-header.header-style-4 .header-inner.sticky .btn_quote .toolbar-sl-share ul > li a:hover, #rs-header.header-style-4 .header-inner.sticky .menu-cart-area i:hover, #rs-header.header-style-4 .header-inner.sticky .sidebarmenu-search i:hover, #rs-header .menu-sticky.sticky .menu-area .navbar ul li ul.submenu > li.current-menu-ancestor > a{
	  	  			color:<?php echo sanitize_hex_color($menu_sticky_txt_hovercolors);?> !important;
		  	  	}
			<?php endif;?>

			
			<?php 
	  	  		if(!empty($menu_sticky_txt_hovercolors)): ?>
		  	  	body #rs-header.header-style5 .header-inner.menu-sticky.stuck.sticky .navbar ul > li.menu-item-has-children.hover-minimize:hover > a:after,
		  	  	body #rs-header .header-inner.menu-sticky.stuck.sticky .navbar ul > li.menu-item-has-children.hover-minimize > a:after
		  	  	{			  	  		
	  	  			background:<?php echo sanitize_hex_color($menu_sticky_txt_hovercolors);?> !important;
		  	  	}
			<?php endif;?>


	  		<?php 
	  	  		if(!empty($menu_text_dropdowncolors)): ?>
		  	  	body .menu-area .navbar ul > li ul.sub-menu li > a,

		  	  	body #rs-header .menu-area .navbar ul li.mega ul li a, 
		  	  	body #rs-header.header-transparent .menu-area .navbar ul li .sub-menu li.current-menu-ancestor > a, 
		  	  	body #rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor li a,
		  	  	body #rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li a{
	  	  			color:<?php echo sanitize_hex_color($menu_text_dropdowncolors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($menu_text_hover_dropdowncolors)): ?>
	  	  		body .menu-area .navbar ul.sub-menu > li.current-menu-ancestor > a,
	  	  		body .menu-area .navbar ul li ul.sub-menu li:hover > a,	
	  	  		body #rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li.current_page_item > a,
	  	  		#rs-header .menu-area .navbar ul li ul.sub-menu li.current_page_item > a,	  
		  	  	body #rs-header.single-header.header-style5 .menu-area .navbar ul li ul.sub-menu li > a:hover,
		  	  	body #rs-header .menu-sticky.sticky .menu-area .navbar ul li .sub-menu li a:hover,
		  	  	body #rs-header.header-style-4 .header-inner .menu-area .navbar ul > li:hover > a{
	  	  			color:<?php echo sanitize_hex_color($menu_text_hover_dropdowncolors);?> !important;
		  	  	}

			<?php endif;?>



	  		<?php 
	  	  		if(!empty($topbar_area_bg)): ?>
		  	  	body #rs-header .toolbar-area{			  	  		
	  	  			background:<?php echo sanitize_hex_color($topbar_area_bg);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($he_soci_icon_color)): ?>
		  	  	body #rs-header.header-style8.header-style9 .rs-full-menuarea .toolbar-sl-share ul li a{			  	  		
	  	  			color:<?php echo sanitize_hex_color($he_soci_icon_color);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($topbar_text_color)): ?>
		  	  	body #rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a, 
		  	  	body #rs-header .toolbar-area .toolbar-contact ul li a, 
		  	  	body #rs-header .toolbar-area .toolbar-contact ul li,
		  	  	#rs-header .toolbar-area .toolbar-sl-share ul li,
		  	  	body #rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons,
		  	  	body #rs-header.header-style5 .toolbar-area .opening,
		  	  	body #rs-header .toolbar-area .toolbar-sl-share .opening i,
		  	  	body #rs-header .toolbar-area .toolbar-contact ul li i, 
		  	  	body #rs-header .toolbar-area .toolbar-sl-share ul li a.quote-buttons::before,
		  	  	body #rs-header .toolbar-area .toolbar-sl-share ul li a i{			  	  		
	  	  			color:<?php echo sanitize_hex_color($topbar_text_color);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($topbar_link_hovercolors)): ?>
		  	  	body #rs-header .toolbar-area .toolbar-contact ul.rs-contact-info li a:hover, 
		  	  	body #rs-header .toolbar-area .toolbar-contact ul li a:hover, 
		  	  	body #rs-header .toolbar-area .toolbar-contact ul li i:hover, 
		  	  	body #rs-header .toolbar-area .toolbar-sl-share ul li a i:hover{			  	  		
	  	  			color:<?php echo sanitize_hex_color($topbar_link_hovercolors);?> !important;
		  	  	}
			<?php endif;?>


	  		<?php 
	  	  		if(!empty($topbar_border_color)): ?>
	  	  		body #rs-header .toolbar-area .toolbar-contact ul li a, 
	  	  		body #rs-header .toolbar-area .opening em,
		  	  	body #rs-header .toolbar-area .toolbar-contact ul li,
		  	  	body #rs-header .toolbar-area .opening,
		  	  	body #rs-header.header-style5 .toolbar-area .opening{			  	  		
	  	  			border-color:<?php echo esc_attr($topbar_border_color);?> !important;
		  	  	}
			<?php endif;?>


	  		<?php 
	  	  		if(!empty($menu_texts_colors)): ?>
		  	  	body .menu-area .navbar ul > li > a,
		  	  	#rs-header.header-style-6 .rs-contact-location i.phone-icon:before,
		  	  	#rs-header.header-style-6 .rs-contact-location .contact-inf a, 
		  	  	#rs-header.header-style-6 .rs-contact-location .contact-inf .phone-line,
		  	  	body #rs-header.header-style-3 .rs-contact-location i.phone-icon::before,
		  	  	body #rs-header.header-style-3 .rs-contact-location .contact-inf a,
		  	  	body #rs-header .sticky_search i::before,
		  	  	body #rs-header.header-style5 .sticky_search i::before{			  	  		
	  	  			color:<?php echo sanitize_hex_color($menu_texts_colors);?> !important;
		  	  	}
			<?php endif;?>
			

	  		<?php 
	  	  		if(!empty($menu_texts_hover_colors)): ?>
		  	  	#rs-header.header-style-6 .rs-contact-location .contact-inf a:hover, 
		  	  	body .menu-area .navbar ul > li:hover > a,
		  	  	#rs-header.header-style5 .menu-area .navbar ul > li.current_page_item ul > a, 
		  	  	#rs-header .menu-area .navbar ul li.mega ul > li > a:hover, 
		  	  	.menu-area .navbar ul li ul.sub-menu li:hover > a, 
		  	  	#rs-header.header-style5 .stuck.sticky .menu-area .navbar ul > li.active a, 
		  	  	#rs-header .menu-area .navbar ul > li.active a,
		  	  	#rs-header .menu-area .navbar ul li.mega ul li a:hover, 
		  	  	body .menu-area .navbar ul > li.current-menu-ancestor > a,
		  	  	#rs-header.header-style5 .menu-area .navbar ul > li.current-menu-ancestor > a, #rs-header.header-style5 .header-inner .menu-area .navbar ul > li.current-menu-ancestor > a, 
		  	  	#rs-header .menu-area .navbar ul li.mega ul > li.current-menu-item > a,  
		  	  	#rs-header.header-transparent .menu-area .navbar ul li.current-menu-ancestor li a:hover,
		  	  	body #rs-header.header-style-4 .menu-area .menu > li.current_page_item > a,
		  	  	body #rs-header.header-style-3 .rs-contact-location .contact-inf a:hover,
		  	  	body #rs-header .menu-area .menu > li.current_page_item > a
		  	  	{			  	  		
	  	  			color:<?php echo sanitize_hex_color($menu_texts_hover_colors);?> !important;
		  	  	}
			<?php endif;?>				

	  		<?php 
	  	  		if(!empty($menu_texts_hover_colors)): ?>
		  	  	#rs-header .menu-area .navbar ul#single-menu > li a:hover
		  	  	{			  	  		
	  	  			color:<?php echo sanitize_hex_color($menu_texts_hover_colors);?>;
		  	  	}
				<?php endif;?>				

	  		<?php 
	  	  		if(!empty($menu_texts_hover_colors)): ?>
		  	  	body #rs-header.header-style5 .header-inner .menu-area .navbar ul > li.menu-item-has-children.hover-minimize:hover > a:after,
		  	  	body #rs-header .menu-area .navbar ul > li.menu-item-has-children.hover-minimize > a:after
		  	  	{			  	  		
	  	  			background:<?php echo sanitize_hex_color($menu_texts_hover_colors);?> !important;
		  	  	}
			<?php endif;?>			

	  		<?php 
	  	  		if(!empty($footer_socials_bg_colorss)): ?>
		  	  	body #rs-footer ul.footer_social li a
		  	  	{			  	  		
	  	  			background:<?php echo sanitize_hex_color($footer_socials_bg_colorss);?> !important;
		  	  	}
			<?php endif;?>	

	  		<?php 
	  	  		if(!empty($footer_socials_ic_colors)): ?>
		  	  	body #rs-footer ul.footer_social li a
		  	  	{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_socials_ic_colors);?> !important;
		  	  	}
			<?php endif;?>			


	  		<?php 
	  	  		if(!empty($quote_button_bg_colors)): ?>
	  	  		body #rs-header.header-style8 .btn_quote a,
		  	  	body #rs-header .btn_quote a{			  	  		
	  	  			background:<?php echo sanitize_hex_color($quote_button_bg_colors);?> !important;
	  	  			border-color:<?php echo esc_attr($quote_button_bg_colors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($quote_button_colors)): ?>
		  	  	body #rs-header .btn_quote a,
		  	  	body #rs-header.header-style8 .btn_quote a{			  	  		
	  	  			color:<?php echo sanitize_hex_color($quote_button_colors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($quote_button_bg_hover_colors)): ?>
		  	  	body #rs-header .btn_quote a:hover,
		  	  	body #rs-header.header-style8 .btn_quote a:hover{			  	  		
	  	  			background:<?php echo sanitize_hex_color($quote_button_bg_hover_colors);?> !important;
	  	  			border-color:<?php echo esc_attr($quote_button_bg_hover_colors);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($quote_button_hover_colors)): ?>
		  	  	body #rs-header .btn_quote a:hover,
		  	  	body #rs-header.header-style8 .btn_quote a:hover{			  	  		
	  	  			color:<?php echo sanitize_hex_color($quote_button_hover_colors);?> !important;
		  	  	}
			<?php endif;?>
			
	  		<?php 
	  	  		if(!empty($search_icon_color)): ?>
		  	  	body #page #rs-header .sticky_search i:before{			  	  		
	  	  			color:<?php echo sanitize_hex_color($search_icon_color);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($search_icon_sticky_color)): ?>
		  	  	body #page #rs-header .sticky .sticky_search i:before{			  	  		
	  	  			color:<?php echo sanitize_hex_color($search_icon_sticky_color);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($cart_icon_color)): ?>
		  	  	.menu-cart-area i{			  	  		
	  	  			color:<?php echo sanitize_hex_color($cart_icon_color);?> !important;
		  	  	}
			<?php endif;?>



	  		<?php 
	  	  		if(!empty($main_menu_top)): ?>
		  	  	.menu-area .navbar .menu-main-menu-container > ul > li,
		  	  	.menu-area .navbar .menu-single-menu-container > ul > li,
		  	  	.menu-area .navbar .menu-menu-single-two-container > ul > li,
		  	  	#rs-header.header-style8 .rs-full-menuarea .menu-cart-area{			  	  		
	  	  			padding-top:<?php echo esc_attr($main_menu_top);?> !important;
		  	  	}
			<?php endif;?>


	  		<?php 
	  	  		if(!empty($main_menu_bottom)): ?>
		  	  	.menu-area .navbar .menu-main-menu-container > ul > li,
		  	  	.menu-area .navbar .menu-single-menu-container > ul > li,
		  	  	.menu-area .navbar .menu-menu-single-two-container > ul > li,
		  	  	#rs-header.header-style8 .rs-full-menuarea .menu-cart-area{			  	  		
	  	  			padding-bottom:<?php echo esc_attr($main_menu_bottom);?> !important;
		  	  	}
			<?php endif;?>



	  		<?php 
	  	  		if(!empty($sticky_main_menu_top)): ?>
	  	  		.menu-sticky.sticky .btn_quote,
		  	  	.sticky .menu-area .navbar .menu-main-menu-container > ul > li,
		  	  	.sticky .menu-area .navbar .menu-menu-single-two-container > ul > li,
		  	  	#rs-header.header-style8 .sticky .rs-full-menuarea .menu-cart-area{			  	  		
	  	  			padding-top:<?php echo esc_attr($sticky_main_menu_top);?> !important;
		  	  	}
			<?php endif;?>


	  		<?php 
	  	  		if(!empty($sticky_main_menu_bottom)): ?>
	  	  		.menu-sticky.sticky .btn_quote,
		  	  	.sticky .menu-area .navbar .menu-main-menu-container > ul > li,
		  	  	.sticky .menu-area .navbar .menu-menu-single-two-container > ul > li,
		  	  	#rs-header.header-style8 .sticky .rs-full-menuarea .menu-cart-area{			  	  		
	  	  			padding-bottom:<?php echo esc_attr($sticky_main_menu_bottom);?> !important;
		  	  	}
			<?php endif;?>
	  		<?php 
	  	  		if(!empty($header_menu_top)): ?>
		  	  	#rs-header .header-inner .menu-area > div{			  	  		
	  	  			margin-top:<?php echo esc_attr($header_menu_top);?> !important;
		  	  	}
			<?php endif;?>
	  		<?php 
	  	  		if(!empty($left_header_menu)): ?>
		  	  	#rs-header .header-inner .menu-area > div{			  	  		
	  	  			padding-left:<?php echo esc_attr($left_header_menu);?> !important;
		  	  	}
			<?php endif;?>
			

	  		<?php 
	  	  		if(!empty($right_header_menu)): ?>
		  	  	#rs-header .header-inner .menu-area > div{			  	  		
	  	  			padding-right:<?php echo esc_attr($right_header_menu);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($header_hamburger_colors)): ?>

	  	  			body ul.offcanvas-icon .nav-link-container a{
	  	  				background:<?php echo sanitize_hex_color($header_hamburger_colors);?> !important;
		  	  		}
			<?php endif;?>

			<?php 
	  	  		if(!empty($header_hamburger_colors2)): ?>
	  	  			body ul.offcanvas-icon .nav-link-container a span
			  	  	{
		  	  			background:<?php echo sanitize_hex_color($header_hamburger_colors2);?> !important;
			  	  	}
			<?php endif;?>


			<?php 
	  	  		if(!empty($sticky_hamburgers_icons_color)): ?>
	  	  			#rs-header .sticky ul.offcanvas-icon .nav-link-container a span
			  	  	{
		  	  			background:<?php echo sanitize_hex_color($sticky_hamburgers_icons_color);?> !important;
			  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($sticky_hamburgers_bg_color)): ?>
	  	  			#rs-header .sticky ul.offcanvas-icon .nav-link-container a
			  	  	{
		  	  			background:<?php echo sanitize_hex_color($sticky_hamburgers_bg_color);?> !important;
			  	  	}
			<?php endif;?>



			<?php 
	  	  		if(!empty($footer_title_color)): ?>
		  	  	body .rs-footer .footer-top h3.footer-title,
		  	  	body .footer-subscribe .newsletter-title
		  	  	{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_title_color);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($footer_border_color)): ?>
		  	  	body .rs-footer .footer-top .mc4wp-form-fields input[type="email"]{			  	  		
	  	  			border-color:<?php echo esc_attr($footer_border_color);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($footer_in_shadow_color)): ?>
		  	  	body .rs-footer .footer-top .mc4wp-form-fields input[type="email"]{			  	  		
	  	  			box-shadow:0 0 25px <?php echo esc_attr($footer_in_shadow_color);?> !important;
		  	  	}
			<?php endif;?>

	  		<?php 
	  	  		if(!empty($footer_placeholders)): ?>
		  	  	body .rs-footer .footer-top input[type="email"]::placeholder,
		  	  	body .rs-footer .footer-top .mc4wp-form-fields input[type="email"]{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_placeholders);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($footer_top_border_color)): ?>
		  	  	body .footer-subscribe .subscribe-bg,
		  	  	body .footer-bottom .container
		  	  	{			  	  		
	  	  			border-color:<?php echo esc_attr($footer_top_border_color);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($footer_border_color)): ?>
		  	  	body .footer-subscribe input[type="email"]{			  	  		
	  	  			border-color:<?php echo esc_attr($footer_border_color);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($footer_txt_colors)): ?>
		  	  	body .rs-footer .footer-top, 
		  	  	body .footer-bottom .copyright p,
		  	  	body .rs-footer .footer-top .mc4wp-form-fields i,		  	  	
		  	  	.footer-top ul.footer_social > li > a,
		  	  	.rs-footer .recent-post-widget .show-featured .post-desc a,
		  	  	.rs-footer .recent-post-widget .show-featured .post-desc span,
		  	  	body .rs-footer{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_txt_colors);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($footer_btn_text_colors)): ?>
		  	  	body #rs-footer .footer-btn-wrap a.footer-btn{			  	  		
	  	  			color:<?php echo sanitize_hex_color($footer_btn_text_colors);?> !important;
		  	  	}
			<?php endif;?>

			<?php 
	  	  		if(!empty($scrollUp_icon)): ?>
		  	  	#scrollUp i{			  	  		
	  	  			color:<?php echo sanitize_hex_color($scrollUp_icon);?> !important;
		  	  	}
			<?php endif;?>

			


			<?php 
	  	  		if(!empty($copyright_border_color)): ?>	
	  	  		.footer-bottom .rows{			  	  		
	  	  			border-color:<?php echo esc_attr($copyright_border_color);?> !important;
		  	  	}
			<?php endif;?>

			

	  	  	<?php 
  	  		if(!empty($footer_primary_hover)): ?>
				.footer-top ul.footer_social > li > a:hover,
				.rs-blog .blog-meta .blog-title a:hover,
				.rs-footer.footerdark .footer-top .widget.widget_nav_menu ul li a:hover,
				.rs-footer a:hover,
				.rs-footer .widget a:hover,
				body .rs-footer .recent-post-widget .show-featured .post-desc a:hover,
				.rs-footer .fa-ul li a:hover,
				.rs-footer.footerdark .footer-bottom .copyright p a:hover,
				.rs-footer.footerdark .footer-top .fa-ul li a:hover,
				.rs-footer.footerdark .footer_social li a:hover .fa,
				ul.unorder-list li:before {					
		  	  		color:<?php echo sanitize_hex_color($footer_primary_hover);?> !important;
				}
			<?php endif; ?>	 	
		  	</style>
	<?php endif;
		}
} ?>