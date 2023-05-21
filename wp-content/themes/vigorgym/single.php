<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
			
<div class="pg-content">
		<div class="pg-inner-content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<?php 

			get_template_part( 'parts/loop', 'single' ); 

			?>

			
		<?php endwhile; else : ?>
	
			<?php get_template_part( 'parts/content', 'missing' ); ?>

		<?php endif; ?>

		<?php get_sidebar(); ?>
		
		</div> <!-- end #pg-inner-content --> 
</div> <!-- end #pg-content --> 

<?php get_footer(); ?>