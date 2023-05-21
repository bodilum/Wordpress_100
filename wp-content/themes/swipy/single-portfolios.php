<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kulluu
 */

get_header(); ?>

  <?php 
    require get_parent_theme_file_path('inc/portfolio/single-standard.php');
 ?>

<?php dynamic_sidebar('cta_widget'); ?>
<?php
get_footer();