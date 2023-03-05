<?php
/**
 * 
 * File to define all custom shortcodes
 * 
 * Some of these functionalities should be converted to gutumberg blocks or core functionalities
 * 
 */


 // shortcode for Siana Courses Page
 function allCoursesPage ( $atts, $content = null ) {

    $defaultAtt = array(
        'name' => 'courses'
    );

    $attributes = shortcode_atts( $defaultAtt, $atts );

    $args = array( 
        'post_type' => 'course',
        'numberposts' => 30
    );

    $all_courses = get_posts( $args );
    // $num_of_courses = wp_count_posts( 'course' ) -> publish;

    $all_coursesHtml = '';

    // loop through all courses and generate html
    foreach( $all_courses as $course ) {
        $all_coursesHtml .= '
        <a href="' . get_permalink( $course -> ID ) . '" class="courseItm">  
            <div class="heading">
            <div class="txt1" title="' . $course -> post_title . '">
                <div class="arrow1"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.93 132.85"><polygon class="d" points="183.93 2.05 178.93 2.05 178.93 123.25 2.87 0 0 4.1 176.36 127.55 1.43 127.55 1.43 132.55 181.43 132.55 181.43 131.1 183.93 132.85 183.93 2.05"/></svg></div>
                <div class="_txt">' . get_field( "short_title", $course -> ID ) . '</div>
                <div class="see_more"><div class="mask-bx"><span>See</span></div> <div class="mask-bx"><span>course</span></div> <div class="mask-bx"><span>syllabus</span></div></div>
            </div><!-- txt1 ends -->
            </div><!-- heading ends -->
        </a>
        ';
    }

    return '
    <div class="coursesPgSection">

        <div class="pgSection topSection">
        ' . $all_coursesHtml . '
        </div><!-- end of pgSection -->

    </div>
    ';

 }
 add_shortcode( 'coursesPage', 'allCoursesPage' );