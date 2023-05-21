<?php 
/**
 * The template for displaying search results pages
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 */
 	
get_header(); ?>
			
	<div class="pg-content">
		<div class="pg-inner-content">
		
		<header>
			<h1 class="archive-title"><?php _e( 'Search Results for:', 'siana_v1' ); ?> <?php echo esc_attr(get_search_query()); ?></h1>
		</header>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<!-- To see additional archive styles, visit the /parts directory -->
			<?php get_template_part( 'parts/loop', 'archive' ); ?>
			
		<?php endwhile; ?>	

			<?php joints_page_navi(); ?>
			
		<?php else : ?>
		
			<?php get_template_part( 'parts/content', 'missing' ); ?> 
				
		<?php endif; ?>

		<?php get_sidebar(); ?>
		
		</div> <!-- end #pg-inner-content --> 
	</div> <!-- end #pg-content --> 

<?php get_footer(); ?> 
