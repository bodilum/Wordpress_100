<?php 
/**
 * 
 * The template for displaying all single Siana Course Post Type and attachments
 * 
 */

//  $args = array( "post_type" => "course" );
//  $allCourses = new WP_Query($args);

// global $post;
// global $wp_query;

$imgSrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> id ), "full");

// PAGE COLORS
$fg_color = get_field( 'foreground_color' );
$bg_color = get_field( 'background_color' );

// var_dump($wp_query->current_post);
// var_dump($post->current_post);
// var_dump($post);


get_header(); ?>

<div class="pg-content" data-img-src="<?php echo $imgSrc[0]; ?>" data-colors="<?php echo $fg_color . ',' . $bg_color; ?>">
		<div class="pg-inner-content">
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


			<?php 

			  get_template_part( 'parts/loop', 'course' ); 
			
			?>

			
		<?php endwhile; else : ?>
	
			<?php get_template_part( 'parts/content', 'missing' ); ?>

		<?php endif; ?>

		<?php // get_sidebar(); ?>
		
	</div> <!-- end #pg-inner-content --> 
</div> <!-- end #pg-content --> 

<?php get_footer(); ?> 