<?php
/**
 * 
 * File to define all custom shortcodes
 * 
 * Some of these functionalities should be converted to gutumberg blocks or core functionalities
 * 
 */

 // $arrow_1 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.93 132.85"><polygon class="d" points="183.93 2.05 178.93 2.05 178.93 123.25 2.87 0 0 4.1 176.36 127.55 1.43 127.55 1.43 132.55 181.43 132.55 181.43 131.1 183.93 132.85 183.93 2.05"/></svg>';



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
        <a href="' . get_permalink( $course->ID ) . '" class="courseItm">  
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


 function formatNum1( $num ) {
    $num = intval( $num );
    $num = ( $num < 10 ) ? '0' . $num : $num;
    return $num;
 }




 // aboutPage ShortCode
 function aboutPageSCFunc( $atts, $content ) {
    $aboutPgPostId = 11;

    $defaultAtt = array(
        'name' => 'about'
    );

    $attributes = shortcode_atts( $defaultAtt, $atts );

    // get featured image
    $featureImgSrc = wp_get_attachment_image_src ( get_post_thumbnail_id( $aboutPgPostId ), 'full' );

    // get image_gallery_1
    $image_gal_1 = get_field( 'image_gallery_1', $aboutPgPostId );


    // get info box contents
    $content_items = get_field( 'content_item', $aboutPgPostId );
    $infoBoxContents = '';
    $cnt = 1;

    foreach( $content_items as $itm ) {
        $infoBoxContents .= '
        <div class="info_bx bx'. $cnt . '">
            <div class="txt">
                <div class="bx num"><span>' . formatNum1( $cnt ) . '</span></div>
                <div class="bx info">
                    <div class="title"><span>' . $itm['heading'] . '</span></div>
                    <div class="desc"><span>' . $itm['description'] . '</span></div>
                </div>
            </div>
            <div class="img"><div class="imgbx"><img loading="lazy" src="' .  $itm['image'] . '" /></div></div>
            <a href="' . home_url( '/apply-now' ) . '" class="apply_now_btn">
                 <span>Apply Now</span>
            </a>
        </div>
    ';
        $cnt++;
    }



    return '
    <div class="aboutPgSection">

        <div class="pgSection topSection">
            
            <div class="heading">
                <div class="txt1"><div class="bx"><span>We\'re</span></div><div class="bx"><span>helping</span></div><div class="bx"><span>beauty</span></div><div class="bx"><span>professionals</span></div><div class="bx"><span>achieve</span></div><div class="bx"><span>their</span></div><div class="bx"><span>dreams.</span></div></div>
                <div class="txt2"><div class="info"><span>Siana Aesthetic Institute &copy 2023</span></div></div>
            </div>
            <div class="description">
                <div class="info_bx">
                    <div class="txt">
                        <span>SIANA AESTHETIC provides students with the opportunity to work on cruise liners and at
                        leading salons and spas in South Africa and beyond.                
                        </span>
                    </div>
                    <div class="txt">
                        <span>Provide experiential learning under the mentorship of a qualified therapist at their fully
                        functional in-house salon.</span>
                    </div>
                    <div class="txt">
                        <span>Skills training is linked to SETA accredited unit standards and learners are uploaded
                        against achieved Unit Standards allowing national recognition of their learning and
                        articulation into full qualifications.</span>
                    </div>
                </div>
            </div>
        </div><!-- end of pgSection -->

        <div class="pgSection section2">
            <img loading="lazy" src="' .  $featureImgSrc[0] . '" />
        </div><!-- end of pgSection -->

        <div class="pgSection imgGal1">
            <div class="div1"><div class="dvBx"><img loading="lazy" src="' .  $image_gal_1["image_1"] . '" /></div></div>
            <div class="div2"><div class="dvBx"><img loading="lazy" src="' .  $image_gal_1["image_2"] . '" /></div></div>
            <div class="div3"><div class="dvBx"><img loading="lazy" src="' .  $image_gal_1["image_3"] . '" /></div></div>
        </div><!-- end of pgSection -->

        <div class="pgSection section3">
            <div class="info_bx">
                <div class="bx"><span>Our courses are delivered by</span></div>
                <div class="bx emphasis1"><span>Top Beauty</span></div><div class="bx emphasis1"><span>Professionals.</span></div>
            </div>
        </div><!-- end of pgSection -->

        <div class="pgSection section4">
            <div class="scrolling_txt">
                <a class="btn" href="' . home_url( "/apply-now" ) . '" title="Click to apply for a beauty course at Siana Aesthetic Institute">Apply now</a>
            </div>
        </div><!-- end of pgSection -->

        <div class="pgSection section5">
            <div class="div1"><span>Here are 10 reasons why you should enroll today</span></div>
            <div class="div2">
                ' . $infoBoxContents . '
            </div>
        </div><!-- end of pgSection -->

    </div>
    ';
 }
 add_shortcode( 'aboutPageSC', 'aboutPageSCFunc' );



 


 // contactPage ShortCode
 function contactPageSCFunc( $atts, $content ) {
    $defaultAtt = array(
        'name' => 'contact'
    );

    $attributes = shortcode_atts( $defaultAtt, $atts );

    return '
    <div class="contactPgSection">
        <h2>Contact Us Page for Siana...from shortcode...</h2>
    </div>
    ';
 }
 add_shortcode( 'contactPageSC', 'contactPageSCFunc' );