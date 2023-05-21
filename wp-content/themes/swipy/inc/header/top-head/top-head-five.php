<?php
/* Top Header part for swipy Theme
*/
global $swipy_option;

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');

if($rs_top_bar != 'hide'){
  if(!empty($swipy_option['show-top']) || ($rs_top_bar == 'show')){
       if( !empty($swipy_option['top-email']) || !empty($swipy_option['phone']) || !empty($swipy_option['show-social'])){?> 

          <div class="toolbar-area">
            <div class="container2 <?php echo esc_attr($header_width);?>">
              <div class="row">
                <div class="col-lg-8">
                  <div class="toolbar-contact">
                    <ul class="rs-contact-info">                        

                        <?php if(!empty($swipy_option['top-email'])) { ?>
                        <li class="rs-contact-email">
                            <i class="glyph-icon flaticon-email"></i>                  
                            <a href="mailto:<?php echo esc_attr($swipy_option['top-email'])?>"><?php echo esc_html($swipy_option['top-email'])?></a>                   
                        </li>
                        <?php } ?>

                        <?php if(!empty($swipy_option['phone'])) { ?>
                        <li class="rs-contact-phone">
                            <i class="fa fa-phone"></i>                                      
                            <a href="tel:<?php echo esc_attr(str_replace(" ","",($swipy_option['phone'])))?>"> <?php echo esc_html($swipy_option['phone']); ?></a>               
                        </li>
                        <?php } ?> 
                  </ul>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="toolbar-sl-share">
                    <ul class="clearfix">
                      <?php
                      if(!empty($swipy_option['show-social'])){
                        $top_social = $swipy_option['show-social']; 
                    
                          if($top_social == '1'){ 
                            if(!empty($swipy_option['facebook'])) { ?>
                            <li> <a href="<?php echo esc_url($swipy_option['facebook']);?>" target="_blank"> <i class="fab fa-facebook-f"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($swipy_option['twitter'])) { ?>
                            <li> <a href="<?php echo esc_url($swipy_option['twitter']);?> " target="_blank"> <i class="fab fa-twitter"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($swipy_option['rss'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['rss']);?> " target="_blank"> <i class="fas fa-rss"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($swipy_option['pinterest'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['pinterest']);?> " target="_blank"> <i class="fab fa-pinterest-p"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($swipy_option['linkedin'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['linkedin']);?> " target="_blank"> <i class="fab fa-linkedin-in"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($swipy_option['instagram'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['instagram']);?> " target="_blank"> <i class="fab fa-instagram"></i> </a> </li>
                            <?php } ?>
                            <?php if(!empty($swipy_option['vimeo'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['vimeo']);?> " target="_blank"> <i class="fab fa-vimeo-v"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($swipy_option['tumblr'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['tumblr']);?> " target="_blank"> <i class="fab fa-tumblr"></i> </a> </li>
                            <?php } ?>
                            <?php if (!empty($swipy_option['snapchat'])) { ?>
                                <li> <a href="<?php  echo esc_url($swipy_option['snapchat']);?> " target="_blank"><i class="fab fa-snapchat-ghost"></i></a> </li>
                            <?php } ?>
                            
                            <?php if (!empty($swipy_option['tiktok'])) { ?>
                                <li> <a href="<?php  echo esc_url($swipy_option['tiktok']);?> " target="_blank"><i class="fab fa-tiktok"></i></a> </li>
                            <?php } ?>
                            <?php if (!empty($swipy_option['youtube'])) { ?>
                            <li> <a href="<?php  echo esc_url($swipy_option['youtube']);?> " target="_blank"> <i class="fab fa-youtube"></i> </a> </li>
                            <?php } ?>

                            <?php }
                            }
                         ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
      <?php 
    }
  }
} ?>