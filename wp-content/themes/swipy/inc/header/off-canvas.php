<?php 
global $swipy_option;
$rs_offcanvas = get_post_meta(get_the_ID(), 'show-off-canvas', true);
$logo_height = !empty($swipy_option['logo-height']) ? 'style = "max-height: '.$swipy_option['logo-height'].'"' : '';
    //off convas here
?>
    
<nav class="menu-wrap-off nav-container nav menu-ofcn">       
<div class="inner-offcan">
    <div class="nav-link-container">  
        <a href='#' class="nav-menu-link close-button" id="close-button2">              
            <i class="fi-rr-cross closes"></i>
        </a> 
    </div> 
    <div class="sidenav offcanvas-icon">        
        
        <div id="mobile_menu" class="rs-offcanvas-inner-left">
            <?php
                if(is_page_template('page-single.php')){
                    if ( has_nav_menu( 'menu-2' ) ):
                        // User has assigned menu to this location;
                        // output it
                        ?>                                
                            <div class="widget widget_nav_menu mobile-menus">      
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-2',
                                        'menu_id'        => 'single-menu2',
                                    ) );
                                ?>
                            </div>                                
                        <?php
                    endif;
                } else {

                    if ( has_nav_menu( 'menu-1' ) ):
                        // User has assigned menu to this location;
                        // output it
                        ?>                                
                            <div class="widget widget_nav_menu mobile-menus">      
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'menu-1',
                                        'menu_id'        => 'primary-menu-single1',
                                    ) );
                                ?>
                            </div>                                
                        <?php
                    endif;
                }
            ?>
        </div> 

        <?php 
        if(!empty( $swipy_option['off_canvas'] ) || ($rs_offcanvas == 'show') ){
            $off = $swipy_option['off_canvas'];
            if( ($off == 1) || ($rs_offcanvas == 'show')){?>            
            <div class="rs-innner-offcanvas-contents">
                <?php $offcanvas_logo_height = !empty($swipy_option['offcanvas_logo_height']) ? 'style="height: '.$swipy_option['offcanvas_logo_height'].'"' : '';

                if (!empty( $swipy_option['offcanvas_logo']['url'] ) ) { ?>
                    <div
                     class="offcanvas_logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img <?php echo wp_kses($offcanvas_logo_height, 'educavo');?> src="<?php echo esc_url( $swipy_option['offcanvas_logo']['url']); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"></a>
                    </div>
                <?php }

                dynamic_sidebar('sidebarcanvas-1');?>
            </div>            
            <?php }
        }?>

        <div class="mobile-topnars">
            <div class="mobile-topnar">  
                <?php if(!empty($swipy_option['top_address'])) { ?>
                <div class="rs-address-area">
                    <div class="rs-address-list">
                        <div class="info-icon">
                            <i class="glyph-icon flaticon-address"></i>
                        </div>
                        <div class="info-title">
                            <?php if (!empty($swipy_option['address__text'])) { ?>
                                <b><?php echo esc_html($swipy_option['address__text'])?></b>
                            <?php } else { ?>
                                <b><?php echo esc_html("Address", "swipy"); ?></b>
                            <?php } ?>
                            <em><?php echo esc_html($swipy_option['top_address']); ?></em>
                        </div>
                    </div>
                </div>
                <?php } ?> 

                <?php if(!empty($swipy_option['top-email'])) { ?>
                <div class="rs-address-area">
                    <div class="rs-address-list">
                        <div class="info-icon">
                            <i class="glyph-icon flaticon-email"></i>
                        </div>
                        <div class="info-title">
                            <?php if (!empty($swipy_option['email__text'])) { ?>
                                <b><?php echo esc_html($swipy_option['email__text'])?></b>
                            <?php } else { ?>
                                <b><?php echo esc_html("Email", "swipy"); ?></b>
                            <?php } ?>
                            <em><a href="mailto:<?php echo esc_attr($swipy_option['top-email'])?>"><?php echo esc_html($swipy_option['top-email'])?></a></em> 
                        </div>
                    </div>
                </div> 
                <?php } ?>


                <?php if(!empty($swipy_option['phone'])) { ?>
                <div class="rs-address-area">
                    <div class="rs-address-list">
                        <div class="info-icon">
                            <i class="glyph-icon flaticon-call"></i>
                        </div>
                        <div class="info-title">
                            <?php if (!empty($swipy_option['phone_line'])) { ?>
                                <b><?php echo esc_html($swipy_option['phone_line'])?></b>
                            <?php } else { ?>
                                <b><?php echo esc_html("Phone", "swipy"); ?></b>
                            <?php } ?>
                            <em><?php echo esc_html($swipy_option['phone']); ?></em>
                        </div>
                    </div>
                </div>
                <?php } ?>                              
            </div>
        </div>

        <?php 
        if(!empty( $swipy_option['off_canvas'] ) || ($rs_offcanvas == 'show') ){
            $off = $swipy_option['off_canvas'];
            if( ($off == 1) || ($rs_offcanvas == 'show')){?>            
            <div class="rs-innner-offcanvas-contents"> 
                <?php get_template_part( 'inc/header/offcanvas-content' ); ?>
            </div>            
            <?php }
        }?>

    </div>
    </div>
</nav>