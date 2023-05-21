<?php 
    $cat = $settings['portfolio_category']; 

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if(empty($cat)){
    	$best_wp = new wp_Query(array(
			'post_type'      => 'portfolios',
			'posts_per_page' => $settings['per_page'],
			'orderby'           => array( $settings['pre_posts_order_by'] => $settings['pre_posts_sort'] ),								
		));	  
    }   
    else{
    	$best_wp = new wp_Query(array(
				'post_type'      => 'portfolios',
				'posts_per_page' => $settings['per_page'],
				'orderby'           => array( $settings['pre_posts_order_by'] => $settings['pre_posts_sort'] ),				
				'tax_query'      => array(
			        array(
						'taxonomy' => 'portfolio-category',
						'field'    => 'slug', //can be set to ID
						'terms'    => $cat //if field is ID you can reference by cat/term number
			        ),
			    )
		));	  
    }

	while($best_wp->have_posts()): $best_wp->the_post();			
		$cats_show = get_the_term_list( $best_wp->ID, 'portfolio-category', ' ', '<span class="separator">,</span> ');							
	?>	
	<div class="swiper-slide portfolio-item content-overlay">
		<?php if(has_post_thumbnail()): ?>
            <div class="portfolio-img">
            	<?php  the_post_thumbnail($settings['thumbnail_size']);?>
            </div>
        <?php endif;?>
        <div class="portfolio-content">
        	<div class="content-details">
            	<?php if(get_the_title()):?>
            		<h3 class="p-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            	<?php endif;?>
            	<div class="svg-icon">
            		<a href="<?php the_permalink();?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up-right"><line x1="7" y1="17" x2="17" y2="7"></line><polyline points="7 7 17 7 17 17"></polyline></svg></a>
            	</div>
            </div>
        </div>
    </div>
	<?php	
	endwhile;
	wp_reset_query();  
 ?>  
