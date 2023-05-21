<?php
$slash1_svg =`<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 132.85 84.78"><defs><style>.d{fill:#c4c4c4;}</style></defs><g id="a"/><g id="b"><g id="c"><g><polygon class="d" points="81.77 84.78 49 84.78 100.08 0 132.85 0 81.77 84.78"/><polygon class="d" points="32.77 84.78 0 84.78 51.08 0 83.85 0 32.77 84.78"/></g></g></g></svg>`;
$play1_svg = `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74.12 92.91"><g id="a"/><g id="b"><g id="c"><path d="M0,46.4c0-12.29,0-24.58,0-36.86,0-.84,0-1.68,.08-2.52C.65,1.14,6.16-1.8,11.28,1.17c3.35,1.94,6.53,4.18,9.77,6.3,16.01,10.47,32.01,20.96,48.03,31.42,2.22,1.45,4.19,3.07,4.82,5.8,.79,3.45-.55,6.48-3.97,8.74-8.68,5.73-17.4,11.42-26.11,17.12-10.33,6.76-20.63,13.56-31.01,20.24-1.53,.98-3.35,1.77-5.13,2.05-3.47,.55-6.82-2.26-7.46-5.9-.19-1.08-.21-2.19-.21-3.28C0,71.23,0,58.82,0,46.4Zm11.31,32.01c16.4-10.74,32.47-21.26,48.78-31.95C43.74,35.75,27.65,25.21,11.32,14.52v63.88Z"/></g></g></svg>`;

 function showMiniNavsFunc($atts, $content = null) {
    $cat = 'ocbsa works'; //all works category by default
    $post_count = 50;

    $attrDefaultArr = array(
        "cat" => $cat,
    );

    $attributes = shortcode_atts($attrDefaultArr, $atts);

    $postCount = 0;

    $qryStr = '';

    $qposts = new WP_Query(array(
        'category_name' => $cat,
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => -1,
        'orderby' => 'date', 
        'order' => 'desc', 
    ));

    $posts = $qposts->get_posts();

    foreach( $posts as $post ) { 
        $cat_classes = catClassesStr($post->ID);
        $activClass = ( $postCount == 0) ? '_prevActiv' : '';
        $qryStr .= '<div class="_itm1 _mini ' . $activClass . ' ' . $cat_classes . '" uid="' . $postCount . '"></div>';
        $postCount++;
     }
    return '
        <div class="_mainNavs">
            ' . $qryStr . '
        </div>
    ';
}

add_shortcode('showMiniNavs', 'showMiniNavsFunc');



// function to create play showreel follow button shortcode
function playShowreelFollowBtn($atts, $content = null) {

     // get some home custom fields value
     $homePostID = 14869;
     $playShowreelTxt = get_post_meta($homePostID, 'play_showreel', true);

     return '
        <div id="playShowreelTxt">
            <div class="scroolTxt1">' . $playShowreelTxt . '</div>
            <div class="scroolTxt2">' . $playShowreelTxt . '</div>
        </div>
        <div id="playShowreelBtn">
            <div class="_el1">
                <div class="_circular">★  ' . $playShowreelTxt . '</div>
                <div class="_playBtn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 74.12 92.91"><g id="a"/><g id="b"><g id="c"><path d="M0,46.4c0-12.29,0-24.58,0-36.86,0-.84,0-1.68,.08-2.52C.65,1.14,6.16-1.8,11.28,1.17c3.35,1.94,6.53,4.18,9.77,6.3,16.01,10.47,32.01,20.96,48.03,31.42,2.22,1.45,4.19,3.07,4.82,5.8,.79,3.45-.55,6.48-3.97,8.74-8.68,5.73-17.4,11.42-26.11,17.12-10.33,6.76-20.63,13.56-31.01,20.24-1.53,.98-3.35,1.77-5.13,2.05-3.47,.55-6.82-2.26-7.46-5.9-.19-1.08-.21-2.19-.21-3.28C0,71.23,0,58.82,0,46.4Zm11.31,32.01c16.4-10.74,32.47-21.26,48.78-31.95C43.74,35.75,27.65,25.21,11.32,14.52v63.88Z"/></g></g></svg></div>
            </div>
            <div class="_el2"></div>
        </div>    
        ';
    
}
add_shortcode('playShowreelBtn1', 'playShowreelFollowBtn');




function mainHomeNavFunc($atts, $content = null) {
        $cat = 'ocbsa works'; //all works category by default
        $post_count = 40;

        $attrDefaultArr = array(
            "cat" => $cat,
            "count" => $post_count
        );

        $attributes = shortcode_atts($attrDefaultArr, $atts);

        $qposts = new WP_Query(array(
            'category_name' => $cat,
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => $post_count,
            'orderby' => 'date', 
            'order' => 'desc', 
        ));

        $posts = $qposts->get_posts();
        $qryStr1 = '';
        $qryStr2 = '';

        $maxLen = 10;

        $postCount = 0;

        $pfoliotxt1 = '';
        $pfoliotxt2 = '';


        foreach( $posts as $post ) { 
            // $title = substr($post->post_title, 0, $maxLen) . ((strlen($post->post_title) > $maxLen) ? "..." : "");
            $ptitle = $post->post_title;
            $ptitleArr = explode(' ', $ptitle);
            $title = substr($ptitleArr[0], 0, $maxLen);
            $thumb = '';
            $permalink = '';
            $image = '';

            $pfolio1 = get_post_meta($post->ID, 'portfolio_title_1', true);
            $pfolio2 = get_post_meta($post->ID, 'portfolio_title_2', true);

            $pfolioArr1 = explode(' ', $pfolio1);
            $pfolioArr1a = explode(',', $pfolioArr1[0]);
            $pfolioArr1b = (count($pfolioArr1) > 0) ? explode(',', $pfolioArr1[1]) : [];

            $pfoliotxt1_ = '';
            $pfoliotxt2_ = '';

            // compose pfoliotxt1
            foreach($pfolioArr1a as $txt) {
                $pfoliotxt1_ .= '<span>' . $txt . '</span>';
            }
            $pfoliotxt1 .= "<div class='txt1 pfolioTxt_" . $postCount . "'>" . $pfoliotxt1_ . "</div>";

            // compose pfoliotxt2
            foreach($pfolioArr1b as $txt) {
                $pfoliotxt2_ = '<span>' . $txt . '</span>';
            }
            $pfoliotxt2 .= "<div class='txt2 pfolioTxt_" . $postCount . "'>" . $pfoliotxt2_ . "</div>";


            if( $thumb = get_post_thumbnail_id( $post->ID ) )
            {
                $permalink = get_permalink( $post->ID );
                $image = wp_get_attachment_image_src( $thumb );
            }
            $qryStr1 .= '<div class="_itmCard"><div class="_itm swiper-slide"  uid="' . $postCount . '">
                <a>
                    <span class="_img" style="background-image: url(' . $image[0] . ')"></span>
                </a>    
                <div class="_info1">
                    <span>' . $ptitle . '</span>
                </div>
            </div><!-- end of _itm --></div><!-- end of _itmCard -->';

            $postCount++;

         }

        // while ( $posts->have_posts() ) : $posts->the_post(); 
        //     print the_title(); 
        //     the_excerpt(); 
        // <div class="_txt1"><span>ab</span><span>c</span><span>d</span></div>
        //                 <div class="_txt2"><span>efg</span><span>hi</span></div>
        // endwhile;


        return "
        <div id='mainMediaNavMoreInfo'>
            <div class='bigTxt'>
                " . $pfoliotxt1 . "
                " . $pfoliotxt2 . "
            </div>
            <div class='backToHome'>< Back</div>
        </div>

        <div id='mainMediaNav'>
            <div class='_mainContents swiper'>   
            <div class='swiper-wrapper'>
            " . $qryStr1 . "
            </div>
            </div>
        </div>
         ";
    }

    add_shortcode('mainHomeNav', 'mainHomeNavFunc');




// function to return all categories as a class string for a postID
function catClassesStr($postID) {
    $cats = get_the_category($postID);
    // $cats = wp_get_post_categories($postID);
    $cat_slugs = array();
    $cat_classes = '';

    foreach ($cats as $c) {
        array_push( $cat_slugs, strtolower($c->slug) );
    }
    $cat_classes = join(' ', $cat_slugs);

    return $cat_classes;
}


function mainHomeNavFunc2() {
    $cat = 'featured work'; //featured works category by default
    $cat1 = 'ocbsa works'; //all works category
    $cat2 = 'ocbsa creators'; //all creators category
    $post_count = 40;

    $attrDefaultArr = array(
        "cat" => $cat,
        "count" => $post_count
    );

    $attributes = shortcode_atts($attrDefaultArr, $atts);

    $qposts = new WP_Query(array(
        'category_name' => $cat,
        'post_status' => 'publish',
        'post_type' => 'post',
        'posts_per_page' => $post_count,
        'orderby' => 'date', 
        'order' => 'desc', 
    ));

    

    $posts = $qposts->get_posts();
    $qryStr1 = '';
    $qryStr2 = '';

    $maxLen = 10;

    $postCount = 0;

    $pfoliotxt1 = '';
    $pfoliotxt2 = '';

    $allBigTxt = '';

    // get some home custome fields value
    $homePostID = 14869;
    $mainCatSel = get_post_meta($homePostID, 'cat_sel', true);
    $mainCatSelArr = explode(',', $mainCatSel);
    $catStr = "";

    foreach( $mainCatSelArr as $cat ) {
        $trimmed = trim($cat);
        $slug = str_replace(' ', '_', $trimmed);
        $catStr .= "<span cat='" . $slug . "'>" . $trimmed . "</span>";
    }

    $catStr = ($catStr != "") ? "<span cat='all' class='_active'>all</span>" . $catStr : "";

    

    foreach( $posts as $post ) { 
        // $title = substr($post->post_title, 0, $maxLen) . ((strlen($post->post_title) > $maxLen) ? "..." : "");
        $ptitle = $post->post_title;
        $ptitleArr = explode(' ', $ptitle);
        $title = substr($ptitleArr[0], 0, $maxLen);

        $thumb = '';
        $permalink = '';
        $image = '';

        $pfolio1 = get_post_meta($post->ID, 'portfolio_title_1', true);
        $pfolio2 = get_post_meta($post->ID, 'portfolio_title_2', true);

        $fgColor = get_post_meta($post->ID, 'fgcolor', true);
        $bgColor = get_post_meta($post->ID, 'bgcolor', true);

        
        $cat_classes = catClassesStr($post->ID);

        // $cats = wp_get_post_categories($post->ID);

        $allBigTxt .= "
        <div class='itm " . $activClass . " " . $cat_classes . "' txt1='" . $pfolio1 . "' txt2='" . $pfolio2 . "'>
            <div class='_top'></div><div class='_btm'></div>
        </div>";


        if( $thumb = get_post_thumbnail_id( $post->ID ) )
        {
            $permalink = get_permalink( $post->ID );
            $image = wp_get_attachment_image_src( $thumb );
        }

        $activClass = ( $postCount == 0 ) ? '_activ' : '';

        $qryStr1 .= "<div class='_itmCard _mini _canHover " . $activClass . " " . $cat_classes . " swiper-slide' 
        uid='" . $postCount . "' fgcolor='" . $fgColor . "' bgcolor='" . $bgColor . "'>
            <div class='_itm'>
                <a>
                    <span class='_img' style='background-image: url(" . $image[0] . ")'></span>
                </a>    
                <div class='_info1'>
                    <span>" . $ptitle . "</span>
                </div>
            </div>
        </div><!-- end of _itmCard -->";
        $postCount++;

        }



        $navWrapperWidth = (80 * $postCount) + 1000 ;


    return "
    <div id='mainMediaNavMoreInfo'>
        <div class='bigTxt'>" . $allBigTxt . "</div>
        <div class='backToHome'>< Back</div>
    </div>

    <div id='mainMediaNav'>

        <div class='_selCat'><div class='_selCatNull1'>" . $catStr . "</div></div>
        <div class='_topArrow'><span>▼</span></div>
        <div class='_mainContents swiper'>                  
            <div class='swiper-wrapper'>
                " . $qryStr1 . "
            </div>
        </div>

    </div>
        ";


    
}
add_shortCode('mainHomeNav2', 'mainHomeNavFunc2');


function showcaseOCBWorks($atts, $content = null) {
    $title1 = get_field('portfolio_title_1');
    $title2 = get_field('portfolio_title_2');

    $attrDefaultArr = array(
        "images" => "images here...", // single id or comma separated ids 
        "videos" => "videos here...", // single id or comma separated ids , colon separated for video types. if none is specified local & utube types will be checked
    );

    $attributes = shortcode_atts($attrDefaultArr, $atts);

    return "<div>OCB custom shortcode for OCB Works. 
    Portfolio Title 1: " . $title1 . "
    Portfolio Title 2: " . $title2 . "
    images: " . $attributes["images"] . "
    videos: " . $attributes["videos"] . "
    </div>";
}

add_shortcode('ocbshowcase', 'showcaseOCBWorks');


//     // create a custom wordpress query
// query_posts(“cat=$cat_id&post_per_page=100″);

    function listOCBDirectors($atts, $content = null) {
        $dircat = 'ocbsa director'; //all director category by default
        $post_count = 20;

        $attrDefaultArr = array(
            "cat" => $dircat,
            "count" => $post_count
        );

        $attributes = shortcode_atts($attrDefaultArr, $atts);

        $qposts = new WP_Query(array(
            'category_name' => $dircat,
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => $post_count,
            'orderby' => 'date', 
            'order' => 'desc', 
        ));

        $posts = $qposts->get_posts();
        $qryStr = '';

        $maxLen = 7;
        

        

        foreach( $posts as $post ) { 
            // $title = substr($post->post_title, 0, $maxLen) . ((strlen($post->post_title) > $maxLen) ? "..." : "");
            $ptitle = $post->post_title;
            $ptitleArr = explode(' ', $ptitle);
            $title = substr($ptitleArr[0], 0, $maxLen);
            $thumb = '';
            $permalink = '';
            $image = '';

            if( $thumb = get_post_thumbnail_id( $post->ID ) )
            {
                $permalink = get_permalink( $post->ID );
                $image = wp_get_attachment_image_src( $thumb );
            }
            $qryStr .= "<a class='contentItm' href='".$permalink."'>
            <div class='img' style='background-image: url(".$image[0].")'>
            </div>  <div class='txt'>" . $title . "</div> </a>";
         }

        // while ( $posts->have_posts() ) : $posts->the_post(); 
        //     print the_title(); 
        //     the_excerpt(); 
        // endwhile;


        return "
        <div id='ocbDirectorList'>
            <div class='content'>
                {$qryStr}
            </div>
        </div>
        ";
    }

    add_shortcode('ocbdirlist', 'listOCBDirectors');



    function listOCBWorks($atts, $content = null) {
        $cat = 'ocbsa works'; //all ocbsa works category by default
        $post_count = 50;

        $client = '';
        $title = '';
        $director = '';
        $desc = '';

        $attrDefaultArr = array(
            "cat" => $cat,
            "count" => $post_count
        );

        $attributes = shortcode_atts($attrDefaultArr, $atts);

        $qposts = new WP_Query(array(
            'category_name' => $cat,
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => $post_count,
            'orderby' => 'date', 
            'order' => 'desc', 
        ));

        $posts = $qposts->get_posts();
        $qryStr = '';

        $maxLen = 7;
        

        

        foreach( $posts as $post ) { 
            // $title = substr($post->post_title, 0, $maxLen) . ((strlen($post->post_title) > $maxLen) ? "..." : "");
            $ptitle = $post->post_title;
            $ptitleArr = explode(' ', $ptitle);
            $title = substr($ptitleArr[0], 0, $maxLen);
            $thumb = '';
            $permalink = '';
            $image = '';

            if( $thumb = get_post_thumbnail_id( $post->ID ) )
            {
                $permalink = get_permalink( $post->ID );
                $image = wp_get_attachment_image_src( $thumb );
            }

            $client = get_post_meta($post->ID, 'client', true);
            $director = get_post_meta($post->ID, 'director', true);
            $desc = get_post_meta($post->ID, 'portfolio_desc', true);

            $qryStr .= "
            <a class='contentItm' href='".$permalink."'>
                <div class='_info'>
                    <div class='_comp'>// " . $client . "</div> 
                    <div class='_campaign_title'>" . $ptitle . "</div> 
                    <div class='_otherInfo'><span>// " . $director . "</span></div> 
                </div>
                <div class='_bgOvly'></div>
                <div class='img' style='background-image: url(".$image[0].")'></div>                  
            </a>";
         }

        // while ( $posts->have_posts() ) : $posts->the_post(); 
        //     print the_title(); 
        //     the_excerpt(); 
        // endwhile;


        return "
        <div id='ocbWorksList1'>
            <div class='content'>
                {$qryStr}
            </div>
        </div>
        ";
    }

    add_shortcode('ocbworkslist', 'listOCBWorks');




    function listOCBTeam($atts, $content = null) {
        $dircat = 'ocbsa team'; //all director category by default
        $post_count = 50;

        $attrDefaultArr = array(
            "cat" => $dircat,
            "count" => $post_count
        );

        $attributes = shortcode_atts($attrDefaultArr, $atts);

        $team_mem_pos = '';

        $qposts = new WP_Query(array(
            'category_name' => $dircat,
            'post_status' => 'publish',
            'post_type' => 'post',
            'posts_per_page' => $post_count,
            'orderby' => 'date', 
            'order' => 'desc', 
        ));

        $posts = $qposts->get_posts();
        $qryStr = '';

        $maxLen = 7;

        foreach( $posts as $post ) { 
            $ptitle = $post->post_title;
            // $ptitleArr = explode(' ', $ptitle);
            // $title = substr($ptitleArr[0], 0, $maxLen);
            $thumb = '';
            $permalink = '';
            $image = '';

            $team_mem_pos = get_post_meta($post->ID, 'team_member_position', true);

            if( $thumb = get_post_thumbnail_id( $post->ID ) )
            {
                $permalink = get_permalink( $post->ID );
                $image = wp_get_attachment_image_src( $thumb );
            }
            $qryStr .= '<div class="swiper-slide">
            <div>
                <div class="_img" style="background-image: url(' . $image[0] . ')"></div>
                <div class="_info">
                    <h5>' . $ptitle . '</h5>
                    <h6>' . $team_mem_pos . '</h6>
                </div>
            </div>
            </div>';
         }

        $attributes = shortcode_atts($attrDefaultArr, $atts);

        return '<!-- Slider main container -->
        <div id="ocbTeamList">
        <div class="swiper">
          <!-- Additional required wrapper -->
          <div class="swiper-wrapper">
            <!-- Slides -->
            ' . $qryStr . '
          </div>
          
        </div>
        </div>';
    }

    add_shortcode('ocbteamlist', 'listOCBTeam');



    ////////// OCB QUICK LIST 1 ///////////////////
    function ocbQuickListFunc($atts, $content = null) {
        $cats = ''; // comma separated list of categories. the first will be treated as the main category
        $tags = ''; // comma separated list of tags.
        $style = 1; // default style is 1;
        $perpg = 20;

        $attrDefaultArr = array(
            "cats" => "cats here...", // single id or comma separated ids 
            "tags" => "tags here...", // single id or comma separated ids , colon separated for video types. if none is specified local & utube types will be checked
            "style" => $style,
            "perpg" => $perpg
        );

        $attributes = shortcode_atts($attrDefaultArr, $atts);

        return "<div>OCB custom shortcode for OCB Quick list For Director Works. 
        categories: " . $attributes["cats"] . "
        perpg: " . $attributes["perpg"] . "
        style: " . $attributes["style"] . "
        tags: " . $attributes["tags"] . "
        </div>";
    }

    add_shortcode('ocbquicklist', 'ocbQuickListFunc');

?>