<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>

<div class="pg-content">
 
 <div class="pg-inner-content">
 
 <?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

	 <?php get_template_part( 'parts/loop', 'page' ); ?>
 
 <?php endwhile; endif; ?>	

 <?php get_sidebar(); ?>
 
 </div> <!-- end #pg-inner-content --> 
</div> <!-- end #pg-content --> 


<?php get_footer(); ?>