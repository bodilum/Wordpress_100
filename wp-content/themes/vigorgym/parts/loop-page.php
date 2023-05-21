<?php
/**
 * Template part for displaying page content in page.php
 */

  // get main image
  
  $main_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> id ) );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
	
	<?php if ( !is_home() && !is_front_page()) : ?>

		<header class="article-header" style="background-image: url(<?php echo $main_img[0]; ?>)">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> 
		<!-- end article header -->

	<?php endif ?>
					
    <section class="entry-content" itemprop="text">
	    <?php the_content(); ?>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		 <?php wp_link_pages(); ?>
	</footer> <!-- end article footer -->
						    
	<?php // comments_template(); ?>
					
</article> <!-- end article -->