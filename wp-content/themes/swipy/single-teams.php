<?php
/**
 * @author  rs-theme
 */ 
get_header();
global $swipy_option; ?>

<!-- Main content Start -->
<div class="main-content">  
  <!-- Team Detail Start -->  
    <div class="rs-porfolio-detail single-team-item">
        <div class="container">
            <div id="content">
                <?php the_content(); ?>
            </div>  
        </div>
    </div>
</div>
<!-- Single Team End -->
<?php dynamic_sidebar('cta_widget'); ?>
<?php
get_footer();