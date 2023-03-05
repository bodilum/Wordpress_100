<?php
global $post;

$cats = get_the_category($post->ID);
$allCats = [];

foreach( $cats as $cat ) {
	array_push( $allCats, strtolower($cat -> name ) );
}

$isWorksPost = in_array( 'ocbsa works', $allCats);

if ($isWorksPost) {
	$imgStr = get_field( 'images', $post->ID);
	$imgArr = explode(',', $imgStr );
// 	print_r($imgArr);
// 	echo $imgStr;
?>

<!-- Slider main container -->
<a id="backToProject">
	<div class="_closeBtn"><span class="close-thin-3"></span></div>
	<div class="_backToProjectsBtn"><span>Projects</span></div>
</a>
<div id="ocbSingleWorkSwiper">
	<div class="allSlides">
		<div class="slide slide1"></div>
		<div class="slide slide2"></div>
	</div>
</div>

<div id="ocbSingleWorkSwiperSideBar">
	<div class="_highlighter"></div>
	<div class="_holder">
	<div class="sideBarSwiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
<?php
		if( count($imgArr) > 0 ) {
		$cnt1 = 0;
		foreach( $imgArr as $imgID ) {
			$imgUrl = wp_get_attachment_url( $imgID );

?>
		<div class="_thumb swiper-slide" style="background-image: url(<?php echo $imgUrl; ?>)" uid="<?php echo $cnt1; ?>" imgurl="<?php echo $imgUrl; ?>"></div>
<?php 
			$cnt1++;
			
		}
	}
?>
	  
	  </div>

	  <!-- If we need navigation buttons -->
	  <div class="swiper-button-prev"></div>
	  <div class="swiper-button-next"></div>
	</div>
		
		
	</div> <!-- end of holder -->
</div>

<a href="" id="visitSiteBtn" target="_blank">
	<div class="_arrow"><span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z"/></svg></span></div>
	<div class="_txt1"><span><b>Visit site</b></span></div>
</a>





<?php
}


// print_r (wp_get_post_categories($post->ID));
// $post_categories = wp_get_post_categories( $post->ID );
// $categories = get_the_category($post_categories[1]);
// var_dump($categories);
?>



<?php  extract(bridge_qode_get_blog_single_params()); ?>

<?php get_header(); ?>


<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

	<?php get_template_part( 'title' ); ?>
	<?php get_template_part( 'slider' ); ?>
				<?php if($single_type == 'image-title-post') : //this post type is full width ?>
					<div class="full_width" <?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
						<?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
							<div class="overlapping_content"><div class="overlapping_content_inner">
						<?php } ?>
						<div class="full_width_inner" <?php bridge_qode_inline_style($content_style_spacing); ?>>
				<?php else : // post type ?>
					<div class="container"<?php if($background_color != "") { echo " style='background-color:". $background_color ."'";} ?>>
						<?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
							<div class="overlapping_content"><div class="overlapping_content_inner">
						<?php } ?>
								<div class="container_inner default_template_holder" <?php bridge_qode_inline_style($content_style_spacing); ?>>
				<?php endif; // post type end ?>
					<?php if(($sidebar == "default")||($sidebar == "")) : ?>
						<div <?php bridge_qode_class_attribute(implode(' ', $single_class)) ?>>
						<?php 
							get_template_part('templates/' . $single_loop, 'loop');
						?>
						<?php if($single_grid == 'no'): ?>
							<div class="grid_section">
								<div class="section_inner">
						<?php endif; ?>
							<?php
								if($blog_hide_comments != "yes"){
									comments_template('', true);
								}else{
									echo "<br/><br/>";
								}
							?>
						<?php if($single_grid == 'no'): ?>
								</div>
							</div>
						<?php endif; ?>
                        </div>

                    <?php elseif($sidebar == "1" || $sidebar == "2"): ?>
						<?php if($sidebar == "1") : ?>	
							<div class="two_columns_66_33 background_color_sidebar grid2 clearfix">
							<div class="column1">
						<?php elseif($sidebar == "2") : ?>	
							<div class="two_columns_75_25 background_color_sidebar grid2 clearfix">
								<div class="column1">
						<?php endif; ?>
					
									<div class="column_inner">
										<div <?php bridge_qode_class_attribute(implode(' ', $single_class)) ?>>
											<?php
											get_template_part('templates/' . $single_loop, 'loop');
											?>
										</div>
										
										<?php
											if($blog_hide_comments != "yes"){
												comments_template('', true); 
											}else{
												echo "<br/><br/>";
											}
										?> 
									</div>
								</div>	
								<div class="column2"> 
									<?php get_sidebar(); ?>
								</div>
							</div>
						<?php elseif($sidebar == "3" || $sidebar == "4"): ?>
							<?php if($sidebar == "3") : ?>	
								<div class="two_columns_33_66 background_color_sidebar grid2 clearfix">
								<div class="column1"> 
									<?php get_sidebar(); ?>
								</div>
								<div class="column2">
							<?php elseif($sidebar == "4") : ?>	
								<div class="two_columns_25_75 background_color_sidebar grid2 clearfix">
									<div class="column1"> 
										<?php get_sidebar(); ?>
									</div>
									<div class="column2">
							<?php endif; ?>
							
										<div class="column_inner">
											<div <?php bridge_qode_class_attribute(implode(' ', $single_class)) ?>>
												<?php
												get_template_part('templates/' . $single_loop, 'loop');
												?>
											</div>
											<?php
												if($blog_hide_comments != "yes"){
													comments_template('', true); 
												}else{
													echo "<br/><br/>";
												}
											?> 
										</div>
									</div>	
									
								</div>
						<?php endif; ?>
					</div>
                <?php if(isset($bridge_qode_options['overlapping_content']) && $bridge_qode_options['overlapping_content'] == 'yes') {?>
                    </div></div>
                <?php } ?>
                 </div>
<?php endwhile; ?>
<?php endif; ?>	


<?php get_footer(); ?>	