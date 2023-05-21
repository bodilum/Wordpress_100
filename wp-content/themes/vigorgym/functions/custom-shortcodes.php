<?php
/**
 * 
 * File to define all custom shortcodes
 * 
 * Some of these functionalities should be converted to gutumberg blocks or core functionalities
 * 
 */


 // shortcode for Vigor Crossfit Home page
 function homePageFunc ( $atts, $content = null ) {
    $checkMark = '<svg viewBox="0 0 17 13" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
    <g fill-rule="evenodd">
        <g transform="translate(-834.000000, -3287.000000)" fill-rule="nonzero">
            <g transform="translate(0.000000, 2832.000000)">
                <g transform="translate(502.000000, 228.000000)">
                    <path d="M346.674044,227 C344.092616,229.648155 341.123219,232.680322 338.439066,235.430418 L334.120724,231.665948 L332,234.230931 L337.472837,238.993247 L338.627277,240 L339.696177,238.896964 C342.612105,235.905109 346.0786,232.36951 349,229.372333 L346.674044,227 Z" id="Icon/Checkmark/Yellow"></path>
                </g>
            </g>
        </g>
    </g>
</svg>';

    $homePostID = 2;

    $defaultAtt = array(
        'name' => 'home'
    );

    $attributes = shortcode_atts( $defaultAtt, $atts );

    $args = array();

    ////////////////////// GET HOME PAGE HERO SECTION VALUES //////////////////////
    // edit_hero_section
    $hero = get_field('edit_hero_section', $homePostID);

    // get background image
    $bg_img = $hero['background_image'];

    // get heading 
    $heading = $hero['heading'];

    // get description
    $description = $hero['description'];

    // get call_to_action_1
    $call_to_action_1 = $hero['call_to_action_1'];

    // get call_to_action_1_link
    $call_to_action_1_link = $hero['call_to_action_1_link'];

    // get call_to_action_2
    $call_to_action_2 = $hero['call_to_action_2'];

    // get call_to_action_2_link
    $call_to_action_2_link = $hero['call_to_action_2_link'];

    // print_r($hero);
    ////////////////////// GET HOME PAGE HERO SECTION VALUES END //////////////////////

    ////////////////////// GET HOME PAGE SECTION 2 VALUES //////////////////////
    // edit_home_section_2
    $section2 = get_field('edit_home_section_2', $homePostID);

    // get heading 
    $sect2_heading = $section2['heading'];

    // get body
    $sect2_body = $section2['body'];

    ////////////////////// GET HOME PAGE SECTION 2 VALUES //////////////////////

    ////////////////////// GET HOME PAGE SLIDESHOW VALUES //////////////////////
    // edit_home_slideshow
    $slideshow = get_field('edit_home_slideshow', $homePostID);
    $slidesdata = $slideshow['slide_data'];
    $allSlides = '';

    // compose slides html
    foreach( $slidesdata as $slide ) {
        $allSlides .= '
        <div class="swiper-slide" style="background-image: url(' . $slide["slide_background"] . ');">
            <div class="topArea">
                <div class="txt1"><span>' . $slide["heading"] . '</span></div>
                <div class="txt2"><span>' . $slide["description"] . '</span></div>
            </div>
            <div class="bottomArea">
                <div class="txt1"><span>' . $slide["coach_name"] . '</span></div>
                <div class="txt2"><span>' . $slide["coach_awards"] . '</span></div>
            </div>
        </div>';
    }


    ////////////////////// GET HOME PAGE SLIDESHOW VALUES //////////////////////

    ////////////////////// GET HOME PAGE HOME PLANS VALUES //////////////////////
    // edit_home_plans
    $plans = get_field('edit_home_plans', $homePostID);

    // get main plans heading
    $plans_heading = $plans['heading'];

    // get all plans
    $plan_items = $plans['plan_item'];
    $allPlans = '';
    $cntPlans = 0;



    // compose plans html
    foreach( $plan_items as $plan ) {
        // print_r($plan);

        // if recommended add recommended class
        $recommendedClass = ( $plan["recommended"] ) ? " recommended" : "";

        // compose plan value list
        $plan_val_list = '';
        foreach( $plan["plan_item_list"] as $plan_val_item ) {

            $suffix = (( $plan_val_item ["check_mark_color"] == 'orange' ) ? '_y' : ( $plan_val_item ["check_mark_color"] == 'red' )) ? '_r' : ''; // default = yellow

            $plan_val_list .= '
            <div class="itm">
                <div class="title">' . $plan_val_item["title"] . '</div>
                <div class="checkmark' . $suffix . '"><span>' . $checkMark . '</span></div>
            </div>';
        }

        // cta text
        $ctaTxt = (intval( $plan["price_per_month"] ) > 0) ? '$' . intval( $plan["price_per_month"] ) : $plan["price_per_month"];

        $allPlans .= '
        <div class="plan_item' . $cntPlans . $recommendedClass . '">
            <div class="topArea">
                <div class="txt1"><span>' . $plan["heading"] . '</span></div>
            </div>
            <div class="content">
                ' . $plan_val_list . '
            </div>
            <div class="bottomArea">
                <a class="vigorBtn" href=" ' . home_url( $plan["price_per_month_url"] ) . '"><span>' . $ctaTxt . '</span></a>
            </div>
        </div>';

        $cntPlans++;
    }

    ////////////////////// GET HOME PAGE HOME PLANS VALUES //////////////////////

    ////////////////////// GET HOME PAGE MAP SECTION VALUES //////////////////////
    // edit_home_map_section
    $map = get_field('edit_home_map_section', $homePostID);

    // get map heading
    $mapHeading = $map['heading'];

    ////////////////////// GET HOME PAGE MAP SECTION VALUES //////////////////////

    ////////////////////// GET HOME PAGE PRODUCT SECTION VALUES //////////////////////
    // edit_home_product_section
    $products = get_field('edit_home_product_section', $homePostID);

    // get products heading
    $products_heading = $products['heading'];

    // get products description
    $products_description = $products['description'];

    // get call to action title
    $products_btn_title = $products['call_to_action_title'];

    // get products
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => 10,
        'post_status' => 'publish',
        'orderby' => 'publish_date',
        'order' => 'DESC',
    );


    // $product_items = new WP_Query( $args );
    $product_items = wc_get_products( $args );

    // print_r( $product_items[0] );


    // get current woocommerce cart products
    $cart_product_ids = array();
    if ( sizeof( WC()->cart->get_cart() ) > 0 ) {

        foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {

            $_product = $values[ 'data' ];
            $_product_id = $_product->get_id();

            array_push( $cart_product_ids, $_product_id );

        }

    }
    
    
    // compose product listing
    $product_listing = '';
    foreach( $product_items as $product_item ) {
        $product_id = $product_item->get_id();
        $product_link = get_permalink( $product_id );
        $product_title = $product_item-> get_title();
        $product_image = wp_get_attachment_image_src( get_post_thumbnail_id( $product_id ), 'single-post-thumbnail' );
        $product_price = $product_item -> get_price();
        
        $product_listing .= '<div class="product_itm">';
        $product_listing .= '<a class="product_img" href="' . esc_url( $product_link, "vcgc_v1" ) . '" title="' . esc_attr( $product_title, "vcgc_v1" ) . '" style="background-image: url(' . esc_url( $product_image[0], "vcgc_v1" ) .')"></a>';   
        $product_listing .= '<div class="product_footer">
            <div class="_left">
            <span>' . __( $product_title, "vcgc_v1" ) . '</span>
            <span>' . __( $product_price, "vcgc_v1" ) . '</span>
            </div>
            <div class="_right">';
        
        if ( in_array( $product_id, $cart_product_ids ) ) {
            $product_listing .= '<a class="vigorBtn" href="' . home_url("/checkout"). '">Go To Cart</a>';
        } else {
            $product_listing .= '<a class="vigorBtn productBtn1" product-id="' . $product_id . '" product-title="' . $product_title . '" product-price="'. $product_price . '">Buy Now</a>';
        }            
            
        $product_listing .= '</div></div></div>';
    }

    ////////////////////// GET HOME PAGE PRODUCT SECTION VALUES //////////////////////

    $allHomeSectionsHtml = '
    
    <div class="pgSection topSection" style="background-image: url(' . $bg_img . ');">
        <div class="sectionContent">
            <div class="div1">
                <div class="txt1"><span>' . $heading . '</span></div>
                <div class="txt2"><span>' . $description . '</span></div>
                <div class="call_to_actions">
                    <a class="vigorBtn" href="' . home_url( $call_to_action_1_link ) . '"><span>' . $call_to_action_1 . '</span></a>
                    <a class="vigorBtnOutline" href="' . home_url( $call_to_action_2_link ). '"><span>' . $call_to_action_2 . '</span></a>
                </div>
            </div>
            <div class="div2"></div>
        </div>
    </div><!-- end of pgSection -->

    <div class="pgSection2">
        <div class="div1"><span>' . $sect2_heading . '</span></div>
        <div class="div2"><span>' . $sect2_body . '</span></div>       
    </div><!-- end of pgSection -->

    <div class="pgSection homeSlideshow">    
        <div class="swiper">

            <div class="swiper-wrapper">
                ' . $allSlides . '
            </div>
            
            <div class="swiper-pagination"></div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>            

        </div>
        <div class="slideshowFooterTxt"><a>Meet all our coaches</a></div>
    </div><!-- end of pgSection -->





    <div class="pgSection ourPlans"><div class="heading">' . $plans_heading . '</div>' . $allPlans . '</div><!-- end of pgSection -->




    <div class="pgSection ourLocations">
        <div class="div1 vigorGmap"></div>
        <div class="div2 heading"><span>' . $mapHeading . '</span></div>
    </div><!-- end of pgSection -->




    <div class="pgSection ourProducts">
        <div class="div1">
            <div class="heading">' . $products_heading . '</div>
            <div class="desc">' . $products_description . '</div>
            <a href="' . home_url( "/store" ) . '" class="simple_btn1">' . $products_btn_title . '</a>
        </div>
        <div class="div2">
            ' . $product_listing  . '
        </div>
    </div><!-- end of pgSection -->


    ';


    return '
    <div class="homePgSection">        
        ' . $allHomeSectionsHtml . '
    </div>
    ';

 }
 add_shortcode( 'homePageSC', 'homePageFunc' );