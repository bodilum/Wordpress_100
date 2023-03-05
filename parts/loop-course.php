<?php
/**
 * Template part for displaying a course post type
 */


 // get title
 $userTitle = trim(get_field( 'title' ));
 $title = ( $userTitle != '') ? $userTitle : $post -> post_title;

 // get description
 $description = trim(get_field( 'description'));

 // get main image
 $main_img = wp_get_attachment_image_src( get_post_thumbnail_id( $post -> id ) );

 // get course code
 $course_code = trim(get_field( 'course_code'));

 // get course group
 $course_group = trim(get_field( 'course_group'));

 // get course group number
 $course_group_number = ( $course_group != '') ? trim( get_field( 'course_group_number') ) : '';

 // course info
 $course_info = ( $course_group_number != '') ? $course_group . '    |    ' . $course_group_number : $course_group;

 // course-syllabus-items
 $course_syllabus_items = get_field( 'course-syllabus-item' );
 $course_cnt = count( $course_syllabus_items );


 // course syllabus item count
 $course_item_count = formatNum1( $course_cnt );

 // variable to allocate item number to each course item
 $cnt = 0;


 // function to format number as 000, 010, 100;
 function formatNum1( $num ) {
    if ( $num === NULL ) return;

    $formatted_num = 0;

    if ( $num >= 100 ) {
        $formatted_num = $num;
     } else if ( $num >= 10 ) {
        $formatted_num = '0' . $num;
    } else {
         $formatted_num = '00' . $num;
     }

     return $formatted_num;
 }

 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <div class="pg_section top_section">
        <div class="course_title">
            <div class="txt1"><?php echo $title ?></div>
            <div class="super_txt1">
                <div>
                    <span>Course Syllabus</span>
                    <span><?php echo $course_code; ?></span>
                    <span><?php echo $course_info; ?></span>
                </div>
            </div>
        </div>
        <div class="course_desc_img">
            <div class="desc"><?php echo $description; ?></div>
            <div class="img"><img loading="lazy" src="<?php echo $main_img[0]; ?>" /></div>
        </div>
    </div>


    <div class="pg_section course_syllabus">

        <div class="heading">
            <div class="txt1"><span>Course syllabus</span></div>
            <div class="txt2"><span><?php echo $course_item_count; ?></span></div>
        </div>
        <div class="body">
            <div class="indent"></div>
            <div class="content">
                <?php foreach ( $course_syllabus_items as $item ) { $cnt++; ?>
                <div class="itemNo"><span><?php echo formatNum1( $cnt ); ?></span></div>
                <div class="item"><span><?php echo $item[ 'item' ]; ?></span></div>
                <?php } ?>

            </div>
        </div>
        
    </div>

    <div class="pg_section pg_footer">
        <div class="heading1"><span>Are you interested in this course?</span></div>
        <a href="<?php echo home_url() . '/apply_now'; ?>" class="apply_now">
            <div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.93 132.85"><polygon class="d" points="183.93 2.05 178.93 2.05 178.93 123.25 2.87 0 0 4.1 176.36 127.55 1.43 127.55 1.43 132.55 181.43 132.55 181.43 131.1 183.93 132.85 183.93 2.05"/></svg></div>
            <div><span>Apply now</span></div>
        </a>
        <a href="<?php echo home_url() . '/courses'; ?>" class="more_courses">
            <div><span>See all our courses</span></div>
        </a>
    </div>




	<!-- <header class="article-header">	
		<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
		<?php // get_template_part( 'parts/content', 'byline' ); ?>
    </header>  -->
    <!-- end article header -->
					
    <!-- <section class="entry-content" itemprop="text">
		<?php // the_post_thumbnail('full'); ?>
		<?php //the_content(); ?>
	</section>  -->
    <!-- end article section -->
						
	<!-- <footer class="article-footer">
		<?php // wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jointswp' ), 'after'  => '</div>' ) ); ?>
		<p class="tags"><?php // the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>	
	</footer>  -->
    <!-- end article footer -->
						
	<?php // comments_template(); ?>	
													
</article> <!-- end article -->