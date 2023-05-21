<?php

/*
Header Style 8
*/

global $swipy_option;

$sticky      = !empty($swipy_option['off_sticky']) ? $swipy_option['off_sticky'] : ''; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky stuck' : '';
$logo_height = !empty($swipy_option['logo-height']) ? 'style = "max-height: '.$swipy_option['logo-height'].'"' : '';
// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

//off convas here
get_template_part('inc/header/off-canvas');
$btn_text_page = get_post_meta(get_the_ID(), 'quote_btn_text', true);
?> 


<!-- Mobile Menu Start -->
<div class="responsive-menus"><?php require get_parent_theme_file_path('inc/header/responsive-menu.php');?></div>
<!-- Mobile Menu End -->

<header id="rs-header" class="single-header header-style8 rs-header_8 mainsmenu<?php echo esc_attr($main_menu_hides);?> <?php echo esc_attr($main_menu_center);?> <?php echo esc_attr($main_menu_icon);?>">
    
    <div class="header-inner <?php echo esc_attr($sticky_menu);?>">
        <!-- Toolbar Start -->
        <?php       
           get_template_part('inc/header/top-head/top-head','one');
        ?>
        <!-- Toolbar End -->
        
        <!-- Header Menu Start -->
        <?php
            $menu_bg_color = !empty($menu_bg) ? 'style = background:'.$menu_bg.'' : '';
        ?>
        <div class="rs-middel-header menu_type_<?php echo esc_attr($main_menu_type);?>">
            <div class="<?php echo esc_attr($header_width);?>">

                <div class="row-table">
                    <div class="col-cell header-logo">
                        <?php get_template_part('inc/header/logo');  ?>
                    </div>

                    <div class="col-cell header-quote">  
                        
                        <?php if(!empty($swipy_option['top_address'])) { ?>
                        <div class="rs-address-area">
                            <div class="rs-address-list">
                                <div class="info-icon">
                                    <i class="fi fi-rr-map-marker-home"></i>
                                </div>
                                <div class="info-title">
                                    <?php if (!empty($swipy_option['address__text'])) { ?>
                                        <?php echo esc_html($swipy_option['address__text'])?>
                                    <?php } else { ?>
                                        <?php echo esc_html("Location", "swipy"); ?>
                                    <?php } ?>
                                </div>
                                <div class="info-des">
                                    <?php echo esc_html($swipy_option['top_address']); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 

                        <?php if(!empty($swipy_option['top-email'])) { ?>
                        <div class="rs-address-area">
                            <div class="rs-address-list">
                                <div class="info-icon">
                                    <i class="fi fi-rr-envelope-plus"></i>
                                </div>
                                <div class="info-title">
                                    <?php if (!empty($swipy_option['email__text'])) { ?>
                                        <?php echo esc_html($swipy_option['email__text'])?>
                                    <?php } else { ?>
                                        <?php echo esc_html("Mail us", "swipy"); ?>
                                    <?php } ?>
                                </div>
                                <div class="info-des">
                                    <a href="mailto:<?php echo esc_attr($swipy_option['top-email'])?>"><?php echo esc_html($swipy_option['top-email'])?></a> 
                                </div>
                            </div>
                        </div> 
                        <?php } ?>


                        <?php if(!empty($swipy_option['phone'])) { ?>
                        <div class="rs-address-area">
                            <div class="rs-address-list">
                                <div class="info-icon">
                                    <i class="fi fi-rr-phone-call"></i>
                                </div>
                                <div class="info-title">
                                    <?php if (!empty($swipy_option['phone_line'])) { ?>
                                        <?php echo esc_html($swipy_option['phone_line'])?>
                                    <?php } else { ?>
                                        <?php echo esc_html("Call us", "swipy"); ?>
                                    <?php } ?>
                                </div>
                                <div class="info-des">
                                    <?php echo esc_html($swipy_option['phone']); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?> 
                               
                    </div>
                </div>
            </div> 
        </div>

        <div class="rs-full-menuarea menu-area" <?php echo wp_kses($menu_bg_color, 'swipy');?>>
            <div class="<?php echo esc_attr($header_width);?>">
                <?php 
                  //include sticky search here
                  get_template_part('inc/header/search');
                ?>
                <div class="row-table">
                    <?php 
                    
                    $has_mobile_logo = !empty($swipy_option['logo-mobile']['url'] ) ? 'has-mobile-logo' : ''; ?>

                    <div class="col-cell header-logo <?php echo esc_attr($has_mobile_logo);?>">
                        <?php get_template_part('inc/header/logo');  ?>
                    </div>
                    <div class="col-cell menu-responsive">  
                        <?php
                           if (!empty( $swipy_option['logo-mobile']['url'] ) ) { ?>
                          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="mobile-logos"><img <?php echo wp_kses($logo_height, 'swipy');?> src="<?php echo esc_url( $swipy_option['logo-mobile']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
                        <?php } else{?>
                            
                            <div class="site-title mobile-logos"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>   
                           
                           <?php  } 
                        ?> 
                        <?php              
                        if(is_page_template('page-single.php')){
                            require get_parent_theme_file_path('inc/header/menu-single.php'); 
                        }
                        elseif(is_page_template('page-single2.php')){
                            require get_parent_theme_file_path('inc/header/menu-single2.php'); 
                        }
                        else{
                            require get_parent_theme_file_path('inc/header/menu.php'); 
                        }?>
                    </div>
                    <div class="rs-rightbar-menu">
                        <div class="toolbar-sl-share">
                            <ul class="clearfix">
                            <?php
                              if(!empty($swipy_option['show-social'])){
                                $top_social = $swipy_option['show-social']; 
                                if($top_social == '1'){            
                                    if(!empty($swipy_option['facebook'])) { ?>
                                    <li> <a href="<?php echo esc_url($swipy_option['facebook']);?>" target="_blank"><i class="fab fa-facebook-f"></i></a> </li>
                                    <?php } ?>
                                    <?php if(!empty($swipy_option['twitter'])) { ?>
                                    <li> <a href="<?php echo esc_url($swipy_option['twitter']);?> " target="_blank"><i class="fab fa-twitter"></i></a> </li>
                                    <?php } ?>
                                    <?php if(!empty($swipy_option['rss'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($swipy_option['pinterest'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($swipy_option['linkedin'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['linkedin']);?> " target="_blank"><i class="fab fa-linkedin-in"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($swipy_option['google'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['google']);?> " target="_blank"><i class="fa fa-google-plus-square"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($swipy_option['instagram'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['instagram']);?> " target="_blank"><i class="fa fa-instagram"></i></a> </li>
                                    <?php } ?>
                                    <?php if(!empty($swipy_option['vimeo'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['vimeo']);?> " target="_blank"><i class="fa fa-vimeo"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($swipy_option['tumblr'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['tumblr']);?> " target="_blank"><i class="fa fa-tumblr"></i></a> </li>
                                    <?php } ?>
                                    <?php if (!empty($swipy_option['youtube'])) { ?>
                                    <li> <a href="<?php  echo esc_url($swipy_option['youtube']);?> " target="_blank"><i class="fa fa-youtube"></i></a> </li>
                                    <?php } ?>
                                            <?php if(is_active_sidebar('language-widget')){?>                                 
                                                <?php dynamic_sidebar('language-widget');?>                             
                                            <?php }?>
                                        <?php }
                                    }
                                 ?>
                            </ul>
                        </div> 
                        <?php if($rs_top_search != 'hide'){
                            if(!empty($swipy_option['off_search'])): ?>
                                <div class="sidebarmenu-search text-right">
                                    <div class="sidebarmenu-search">
                                        <div class="sticky_search"> 
                                          <i class="flaticon-search"></i> 
                                        </div>
                                    </div>
                                </div>                        
                            <?php endif; 
                        }

                        //include Cart here 
                        if($rs_show_cart != 'hide'){
                            if(!empty($swipy_option['wc_cart_icon']) || ($rs_show_cart == 'show') ) {
                              get_template_part('inc/header/cart');
                            }
                        } 

                        if($rs_show_quote != 'hide'){
                            if(!empty($swipy_option['quote_btns']) || ($rs_show_quote == 'show') ){ ?>
                            <div class="btn_quote"><a href="<?php echo esc_url($swipy_option['quote_link']); ?>" class="quote-button">

                                
                                <?php if($btn_text_page !=''){

                                    echo esc_html($btn_text_page); 

                                }else{
                                    echo esc_html($swipy_option['quote']);
                                } ?>

                                 <i class="eicon-arrow-right"></i></a></div>
                        <?php } } ?>
                        <div class="sidebarmenu-area text-right mobilehum">                
                            <ul class="offcanvas-icon">
                                <li class="nav-link-container"> 
                                    <a href='#' class="nav-menu-link menu-button">
                                        <span class="dot1"></span>
                                        <span class="dot2"></span>
                                        <span class="dot3"></span>
                                        <span class="dot4"></span>
                                        <span class="dot5"></span>
                                        <span class="dot6"></span>
                                        <span class="dot7"></span>
                                        <span class="dot8"></span>
                                        <span class="dot9"></span>
                                    </a> 
                                </li>
                            </ul>                                       
                        </div>  
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Menu End -->
    </div>
     <!-- End Slider area  -->
   <?php 
    get_template_part( 'inc/breadcrumbs' );
  ?>
</header>

<?php  
    get_template_part('inc/header/slider/slider');
?>
