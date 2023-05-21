<?php 
    /**
    * Sample template tag function for outputting a cmb2 file_list
    *
    * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
    * @param  string  $img_size           Size of image to show
    */ 
?>
<!-- Portfolio Detail Start -->
<div class="container">
    <div id="content">
    <!-- Portfolio Detail Start -->
    <div class="rs-porfolio-details">
 
        <?php while ( have_posts() ) : the_post();
            $post_client        = get_post_meta( get_the_ID(), 'client', true );
            $post_location      = get_post_meta( get_the_ID(), 'location', true );
            $post_surface_area  = get_post_meta( get_the_ID(), 'surface_area', true );
            $post_date          = get_post_meta( get_the_ID(), 'date', true );
            $post_project_value = get_post_meta( get_the_ID(), 'project_value', true );
            $post_created       = get_post_meta( get_the_ID(), 'created', true );
        ?>
        <div class="project-desc">
            <?php the_content();?>
        </div>  

      <?php endwhile;
        wp_reset_postdata();
      ?>   
       
      </div>
    </div>
</div>

<!-- Portfolio Detail End -->