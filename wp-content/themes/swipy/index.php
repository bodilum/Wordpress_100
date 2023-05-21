<?php
    get_header(); 
?>
<div id="rs-blog" class="rs-blog blog-page">
   <?php
        //checking blog layout form option  
        $col         = '';
        $blog_layout = ''; 
        $column      = ''; 
        $blog_grid   = '';
        if(!empty($swipy_option['blog-layout']) || !is_active_sidebar( 'sidebar-1' )){
            $blog_layout = !empty($swipy_option['blog-layout']) ? $swipy_option['blog-layout'] : '';
            $blog_grid   = !empty($swipy_option['blog-grid']) ? $swipy_option['blog-grid'] : '';
            $blog_grid = !empty($blog_grid) ? $blog_grid : '12';
            if($blog_layout == 'full' || !is_active_sidebar( 'sidebar-1' )){
                $layout ='full-layout';
                $col    = '-full';
                $column = 'sidebar-none';  
            }          
            elseif($blog_layout == '2left'){
                $layout = 'full-layout-left';  
            }    
            elseif($blog_layout == '2right'){
                $layout = 'full-layout-right'; 
            } 
            else{
                $col = '';
                $blog_layout = ''; 
            }
        }
        else{
            $col         ='';
            $blog_layout =''; 
            $layout      ='';
            $blog_grid   ='12';
        }
    ?>
    <div class="container">
        <div id="content">
            <div class="row padding-<?php echo esc_attr( $layout) ?>">       
                <div class="contents-sticky col-md-12 col-lg-8<?php echo esc_attr($col); ?> <?php echo esc_attr($layout); ?>"> 
                   
                    <div class="row">            
                        <?php
                        if ( have_posts() ) :           
                            /* Start the Loop */
                            while ( have_posts() ) : the_post();                             
                            $post_id        = get_the_id();
                            $author_id      = get_post_field ('post_author', $post_id);
                            $display_name   = get_the_author_meta( 'display_name' , $author_id );                     
                            $no_thumb = "";
                            if ( !has_post_thumbnail() ) {
                              $no_thumb = "no-thumbs";
                            }
                        ?>
                        <div class="col-sm-<?php echo esc_attr($blog_grid);?> col-xs-12">
                            <article <?php post_class();?>>
                                <div class="blog-item <?php echo esc_attr($no_thumb); ?>">
                                <?php if ( has_post_thumbnail() ) {?>
                                    <div class="blog-img">
                                       <a href="<?php the_permalink();?>">
                                        <?php
                                          the_post_thumbnail();
                                        ?>
                                      </a>                                  
                                    
                                    </div><!-- .blog-img -->
                                <?php }       
                                ?> 

                                <div class="full-blog-content">
                                    <div class="title-wrap">                                                                      
                                        
                                        <div class="blog-meta">
                                            <ul class="btm-cate">
                                                <?php if(!empty($swipy_option['blogpage-blog-author']) ){ ?>                                                  
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

                                                    <?php if(!empty($swipy_option['blog-date']) ){ ?>                                                  
                                                    <?php } else { ?>
                                                        <li>
                                                            <div class="blog-date">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> <?php $post_date = get_the_date(); echo esc_attr($post_date);?>
                                                            </div>                                              
                                                        </li>
                                                    <?php } ?>

                                                    <?php if(!empty($swipy_option['blogpage-category']) ){ ?>                                                  
                                                    <?php } else { 
                                                        if(get_the_category()):
                                                            $seperator = ', '; // blank instead of comma
                                                            $after = '';
                                                            $before = '';
                                                            echo '<li><div class="tag-line">';
                                                            ?>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                                            <?php
                                                            the_category(', '); 
                                                            echo '</div> </li>';
                                                        endif;
                                                    } ?>
                                                </ul>                                                         
                                            </div>
                                        </div>

                                        <h3 class="blog-title">
                                            <a href="<?php the_permalink();?>">
                                                <?php the_title();?>
                                            </a>
                                        </h3>

                                        <div class="blog-desc">   
                                            <?php echo swipy_custom_excerpt(50);?>                                     
                                        </div>

                                        <?php 
                                            $no_view = "";
                                            if ( !empty($swipy_option['view-comments']) && $swipy_option['view-comments'] == 'hide'){
                                                $no_view = "left-btn";
                                            }
                                            if(!empty($swipy_option['blog_readmore'])):?>
                                                <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                                    <a href="<?php the_permalink();?>">
                                                        <?php echo esc_html($swipy_option['blog_readmore']); ?>
                                                    </a>
                                                </div>
                                        <?php endif; ?>

                                      <?php if(empty($swipy_option['blog_readmore'])):?>
                                          <div class="blog-button <?php echo esc_attr($no_view); ?>">
                                            <a href="<?php the_permalink();?>"><?php esc_html_e('Continue Reading', 'swipy');?></a>
                                          </div>
                                      <?php endif; ?>

                                </div>
                              </div>
                            </article>
                        </div>
                        
                        <?php  
                          endwhile;                        
                        ?>
                    </div>
                    <div class="pagination-area">
                        <?php
                            the_posts_pagination();
                        ?>
                    </div>
                    <?php
                    else :
                    get_template_part( 'template-parts/content', 'none' );
                    endif; ?> 
                </div>
            <?php if( $layout != 'full-layout' ):     
               get_sidebar();    
             endif;
            ?>
          </div>
        </div>
    </div>
</div>

<?php
get_footer();