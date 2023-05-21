<?php

/*
Header Style 3
*/
global $swipy_option;
$sticky = $swipy_option['off_sticky']; 
$sticky_menu = ($sticky == 1) ? ' menu-sticky' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if ( !has_nav_menu( 'menu-1' ) ) { 
    $margin_minus = 'margin_minus';
}else{
    $margin_minus = '';
}
?>


<?php 
    //off convas here
    get_template_part('inc/header/off-canvas');
?> 


<!-- Mobile Menu Start -->
    <div class="responsive-menus"><?php require get_parent_theme_file_path('inc/header/responsive-menu.php');?></div>
<!-- Mobile Menu End -->

<header id="rs-header" class="fixed-menu <?php echo esc_attr( $margin_minus );?> mainsmenu<?php echo esc_attr($main_menu_hides);?> <?php echo esc_attr($main_menu_icon);?>">
     
    <div class="header-inner">
        <!-- Logo Area Start -->
        <div class="logo-section">
            <div class="<?php echo esc_attr($header_width);?>">
                <?php  get_template_part('inc/header/logo'); ?>
            </div>
        </div>
        
      <!-- Header Menu Start -->  
      <?php
        $menu_bg_color = !empty($menu_bg) ? 'style=background:'.$menu_bg.'' : '';
        ?>
        <div class="box-layout <?php echo esc_attr($header_width);?>" <?php echo wp_kses($menu_bg_color, 'swipy');?>>
            <?php 
              //include sticky search here
              get_template_part('inc/header/search');
            ?>
        <div class="row-tables"> 
            <div class="menu-area col-cell menu_type_<?php echo esc_attr($main_menu_type);?>">
                <div class="<?php echo esc_attr($header_width);?>">
                    <div class="menu_one">
                        <div class="row-table">               
                            <div id="fixedmenus" class="col-cell menu-responsive">  
                                <?php                  
                                    if(is_page_template('page-single.php')){
                                        require get_parent_theme_file_path('inc/header/menu-single.php'); 
                                    }else{
                                        require get_parent_theme_file_path('inc/header/menu-fixed.php'); 
                                    }               
                                ?>
                            </div>                           

                            <div class="col-cell header-quote"> 
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
            </div>
        </div>
      <!-- Header Menu End --> 
      </div>

      <div class="toolbar-sl-share">
        <?php if(!empty($swipy_option['phone'])) { ?>
        <div class="rs-contact-phone"> 
            <?php esc_attr_e('T:', 'swipy'); ?>                                                                
            <a href="tel:+<?php echo esc_attr(str_replace(" ","",($swipy_option['phone'])))?>"> <?php echo esc_html($swipy_option['phone']); ?></a>                   
        </div>
        <?php } ?>
        <?php if(!empty($swipy_option['top-email'])) { ?>
        <div class="rs-contact-email">
            <?php esc_attr_e('E:', 'swipy'); ?>                                
            <a href="mailto:<?php echo esc_attr($swipy_option['top-email'])?>"><?php echo esc_html($swipy_option['top-email'])?></a>
        </div>
        <?php } ?>
        <ul class="clearfix">
          <?php
          if(!empty($swipy_option['show-social'])){
            $top_social = $swipy_option['show-social']; 
        
              if($top_social == '1'){ 

                if(!empty($swipy_option['facebook'])) { ?>
                <li> <a href="<?php echo esc_url($swipy_option['facebook']);?>" target="_blank"><i class="fa fa-facebook"></i></a> </li>
                <?php } ?>
                <?php if(!empty($swipy_option['twitter'])) { ?>
                <li> <a href="<?php echo esc_url($swipy_option['twitter']);?> " target="_blank"><i class="fa fa-twitter"></i></a> </li>
                <?php } ?>
                <?php if(!empty($swipy_option['rss'])) { ?>
                <li> <a href="<?php  echo esc_url($swipy_option['rss']);?> " target="_blank"><i class="fa fa-rss"></i></a> </li>
                <?php } ?>
                <?php if (!empty($swipy_option['pinterest'])) { ?>
                <li> <a href="<?php  echo esc_url($swipy_option['pinterest']);?> " target="_blank"><i class="fa fa-pinterest-p"></i></a> </li>
                <?php } ?>
                <?php if (!empty($swipy_option['linkedin'])) { ?>
                <li> <a href="<?php  echo esc_url($swipy_option['linkedin']);?> " target="_blank"><i class="fa fa-linkedin"></i></a> </li>
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
                        
                <?php }
                }
             ?>
        </ul>
      </div>
    </div>
</header>

<!-- Slider Start Here -->
<?php  
    get_template_part( 'inc/breadcrumbs' );
    get_template_part('inc/header/slider/slider'); 
?>