<?php
    global $swipy_option;    
    $header_width_meta = get_post_meta(get_queried_object_id(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($swipy_option['header-grid']) ? $swipy_option['header-grid'] : '' ;
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }

    $post_menu_type = get_post_meta(get_queried_object_id(), 'menu-type', true);
    $post_meta_data = get_post_meta(get_queried_object_id(), 'banner_image', true);
    $meta_text_alignment = !empty($swipy_option['meta_text_alignment']) ? $swipy_option['meta_text_alignment'] : '' ;
    $content_banner = get_post_meta(get_queried_object_id(), 'content_banner', true); 
    $post_id        = get_the_id();
    $author_id      = get_post_field ('post_author', $post_id);
    $display_name   = get_the_author_meta( 'display_name' , $author_id );
    $text_alignment = !empty($swipy_option['text_alignment']) ? $swipy_option['text_alignment'] : '';
 ?>

<div class="rs-breadcrumbs porfolio-details <?php echo esc_attr($text_alignment); ?>">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $post_meta_data );?>')">
        <div class="<?php echo esc_attr($header_width);?> <?php echo esc_attr($meta_text_alignment);?>">
          <div class="row">
            <?php if( !empty( $swipy_option['footer_icon_animation']['url'])){?>
                <div class="footer-animision-icon">
                    <img src="<?php echo esc_url($swipy_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </div>
            <?php } ?>
            <div class="col-md-12">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                    <?php
                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                                } else{
                                    the_title();
                                }
                            ?>
                        </h1>
                    <?php } 
                        if(!empty($swipy_option['off_breadcrumb'])){
                            $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                            if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                            endif;
                        }
                    ?>  
                    <ul class="breadcrumbs-meta 3">
                        <?php if(!empty($swipy_option['blog-author']) ){ ?>
                          
                        <?php } else { ?>
                            <li>
                                <div class="postedby">                                    
                                    <div class="info">
                                        <span class="name">
                                            <?php echo get_avatar(get_the_author_meta( 'ID' ), 38);?>
                                            <?php 
                                                echo esc_html($display_name);
                                            ?>
                                        </span>                                        
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                        <?php if(!empty($swipy_option['blog-published']) ){ ?>
                          
                        <?php } else { ?> 
                            <li>                                
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                </span>
                            </li>
                        <?php } ?>
                        <?php if(!empty($swipy_option['blog-categories']) ){ ?>
                          
                        <?php } else { ?> 
                        <li>                                                               
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <ul class="single-posts-meta">
                                <li class="post-cate">                                                      
                                    <?php
                                        //tag add
                                        $seperator = ', '; // blank instead of comma
                                        $after = '';
                                        $before = '';
                                        echo '<div class="tag-line">';
                                        ?>                                                
                                        <?php
                                        the_category(', '); 
                                        echo '</div>';
                                      ?> 
                                </li>
                            </ul> 
                        </li>
                        <?php } ?>

                        <?php if(!empty($swipy_option['blog-comments']) ){ ?>
                          
                        <?php } else { ?> 
                        <li>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <?php echo get_comments_number( '0', '1', '%' ); ?>
                            </span>
                        </li>
                        <?php } ?>
                    </ul>     
                </div>
            </div>
          </div>
        </div>
    </div>
<?php }

elseif (!empty($swipy_option['blog_banner']['url'])) {?>
<div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $swipy_option['blog_banner']['url'] );?>')">
    <div class="<?php echo esc_attr($header_width);?> <?php echo esc_attr($meta_text_alignment);?>">
        <div class="row">
            <?php if( !empty( $swipy_option['footer_icon_animation']['url'])){?>
                <div class="footer-animision-icon">
                    <img src="<?php echo esc_url($swipy_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                </div>
            <?php } ?>
            <div class="col-md-12">
                <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                    <?php
                    $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                    <?php if( $post_meta_title != 'hide' ){             
                    ?>
                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {
                                the_title();
                            }
                            ?>
                        </h1>
                    <?php } 
                        if(!empty($swipy_option['off_breadcrumb'])){
                            $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                            if( $rs_breadcrumbs != 'hide' ):        
                            if(function_exists('bcn_display')){?>
                                <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                            <?php } 
                            endif;
                        }
                    ?> 
                    <ul class="breadcrumbs-meta 3">
                        <?php if(!empty($swipy_option['blog-author']) ){ ?>
                          
                        <?php } else { ?>
                            <li>
                                <div class="postedby">                                    
                                    <div class="info">
                                        <span class="name">
                                            <?php echo get_avatar(get_the_author_meta( 'ID' ), 38);?>
                                            <?php 
                                                echo esc_html($display_name);
                                            ?>
                                        </span>                                        
                                    </div>
                                </div>
                            </li>
                        <?php } ?>

                        <?php if(!empty($swipy_option['blog-published']) ){ ?>
                          
                        <?php } else { ?> 
                            <li>                                
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                    <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                </span>
                            </li>
                        <?php } ?>
                        <?php if(!empty($swipy_option['blog-categories']) ){ ?>
                          
                        <?php } else { ?> 
                        <li>                                                               
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                            <ul class="single-posts-meta">
                                <li class="post-cate">                                                      
                                    <?php
                                        //tag add
                                        $seperator = ', '; // blank instead of comma
                                        $after = '';
                                        $before = '';
                                        echo '<div class="tag-line">';
                                        ?>                                                
                                        <?php
                                        the_category(', '); 
                                        echo '</div>';
                                      ?> 
                                </li>
                            </ul> 
                        </li>
                        <?php } ?>

                        <?php if(!empty($swipy_option['blog-comments']) ){ ?>
                          
                        <?php } else { ?> 
                        <li>
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                <?php echo get_comments_number( '0', '1', '%' ); ?>
                            </span>
                        </li>
                        <?php } ?>
                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>
    
<?php }else{?>
    <div class="rs-breadcrumbs-inner">
        <div class="container <?php echo esc_attr($meta_text_alignment);?>">
            <div class="row">
                <?php if( !empty( $swipy_option['footer_icon_animation']['url'])){?>
                    <div class="footer-animision-icon">
                        <img src="<?php echo esc_url($swipy_option['footer_icon_animation']['url']);?> " alt="<?php echo esc_attr( get_bloginfo( 'name' )); ?>">
                    </div>
                <?php } ?>
                <div class="col-md-12">
                    <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>"> 
                        <?php
                        $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                        ?>
                            <h1 class="page-title">
                                <?php if($content_banner !=''){
                                    echo esc_html($content_banner);
                                } else {
                                    the_title();
                                }
                                ?>
                            </h1>
                        <?php } 
                            if(!empty($swipy_option['off_breadcrumb'])){
                                $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                                if( $rs_breadcrumbs != 'hide' ):        
                                if(function_exists('bcn_display')){?>
                                    <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                <?php } 
                                endif;
                            }
                        ?> 
                        <ul class="breadcrumbs-meta 3">
                            <?php if(!empty($swipy_option['blog-author']) ){ ?>
                              
                            <?php } else { ?>
                                <li>
                                    <div class="postedby">                                    
                                        <div class="info">
                                            <span class="name">
                                                <?php echo get_avatar(get_the_author_meta( 'ID' ), 38);?>
                                                <?php 
                                                    echo esc_html($display_name);
                                                ?>
                                            </span>                                        
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>

                            <?php if(!empty($swipy_option['blog-published']) ){ ?>
                              
                            <?php } else { ?> 
                                <li>                                
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                    </span>
                                </li>
                            <?php } ?>
                            <?php if(!empty($swipy_option['blog-categories']) ){ ?>
                              
                            <?php } else { ?> 
                            <li>                                                               
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                <ul class="single-posts-meta">
                                    <li class="post-cate">                                                      
                                        <?php
                                            //tag add
                                            $seperator = ', '; // blank instead of comma
                                            $after = '';
                                            $before = '';
                                            echo '<div class="tag-line">';
                                            ?>                                                
                                            <?php
                                            the_category(', '); 
                                            echo '</div>';
                                          ?> 
                                    </li>
                                </ul> 
                            </li>
                            <?php } ?>

                            <?php if(!empty($swipy_option['blog-comments']) ){ ?>
                              
                            <?php } else { ?> 
                            <li>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                    <?php echo get_comments_number( '0', '1', '%' ); ?>
                                </span>
                            </li>
                            <?php } ?>
                        </ul>      
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>