<?php
    global $swipy_option;    
    $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($swipy_option['header-grid']) ? $swipy_option['header-grid'] : '';
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
?>

<?php 
    $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true); 
    $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
    $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true); 
    $text_alignment = !empty($swipy_option['text_alignment']) ? $swipy_option['text_alignment'] : '';
?>

<div class="rs-breadcrumbs  porfolio-details is-shop-hide <?php echo esc_attr($text_alignment); ?>">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="<?php echo esc_attr($header_width);?>">
          <div class="row">
            <?php if( !empty( $swipy_option['footer_icon_animation']['url'])){?>
                <div class="footer-animision-icon">
                    <img src="<?php echo esc_url($swipy_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </div>
            <?php } ?>
            <div class="col-md-12">
              <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                <?php 
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_banner !=''){
                           echo esc_html($content_banner);
                            } else {                              
                                
                                if(!empty($swipy_option['blog_title'])) { ?>
                                    <?php echo esc_html($swipy_option['blog_title']);?>
                                    <?php }
                                    else{
                                     esc_html_e('Blog','swipy');
                                } 
                            }
                        ?>
                    </h1>
                    <?php } 
                     if(!empty($swipy_option['blog_desc'])){ ?>
                    <p> <?php echo wp_kses_post($swipy_option['blog_desc']);?></p>
                <?php }
                    if(!empty($swipy_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                        endif;
                    }
                ?>    
              </div>
            </div>
          </div>
        </div>
    </div>
<?php }
    elseif(!empty($swipy_option['blog_banner_main']['url'])) { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url($swipy_option['blog_banner_main']['url']);?>')">
      <div class="<?php echo esc_attr($header_width);?>">
        <div class="row">
        <?php if( !empty( $swipy_option['footer_icon_animation']['url'])){?>
            <div class="footer-animision-icon">
                <img src="<?php echo esc_url($swipy_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
            </div>
        <?php } ?>
          <div class="col-md-12">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <?php 
                    $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                    ?>
                    <h1 class="page-title">
                        <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {                                
                                 
                            if(!empty($swipy_option['blog_title'])) { ?>
                                <?php echo esc_html($swipy_option['blog_title']);?>
                                <?php }
                                else{
                                 esc_html_e('Blog','swipy');
                                } 
                            }
                        ?>
                    </h1>

                    <?php } 
                     if(!empty($swipy_option['blog_desc'])){ ?>
                    <p> <?php echo wp_kses_post($swipy_option['blog_desc']);?></p>
                <?php }
                    if(!empty($swipy_option['off_breadcrumb'])){
                        $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                        if( $rs_breadcrumbs != 'hide' ):        
                        if(function_exists('bcn_display')){?>
                            <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                        <?php } 
                        endif;
                    }
                ?>            
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } else {   
  ?>
  <div class="rs-breadcrumbs-inner">  
    <div class="<?php echo esc_attr($header_width);?>">
      <div class="row">
        <?php if( !empty( $swipy_option['footer_icon_animation']['url'])){?>
            <div class="footer-animision-icon">
                <img src="<?php echo esc_url($swipy_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
            </div>
        <?php } ?>
        <div class="col-md-12">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <?php 
                      $post_meta_title = get_post_meta(get_queried_object_id(), 'select-title', true);?>
                      <?php if( $post_meta_title != 'hide' ){             
                      ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                                } else {                                
                                  
                                  if(!empty($swipy_option['blog_title'])) { ?>
                                      <?php echo esc_html($swipy_option['blog_title']);?>
                                      <?php }
                                      else{
                                       esc_html_e('Blog','swipy');
                                    } 
                                }
                            ?>
                        </h1>
                        <?php } 
                         if(!empty($swipy_option['blog_desc'])){ ?>
                    <p> <?php echo wp_kses_post($swipy_option['blog_desc']);?></p>
                <?php }
                        if(!empty($swipy_option['off_breadcrumb'])){
                            $rs_breadcrumbs = get_post_meta(get_queried_object_id(), 'select-bread', true);
                            if( $rs_breadcrumbs != 'hide' ):        
                                if(function_exists('bcn_display')){?>
                                    <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                <?php } 
                            endif;
                        }
                ?>            
            </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  }
?>  
</div>