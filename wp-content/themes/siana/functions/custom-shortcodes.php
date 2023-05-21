<?php
/**
 * 
 * File to define all custom shortcodes
 * 
 * Some of these functionalities should be converted to gutumberg blocks or core functionalities
 * 
 */

 $arrow_1 = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.93 132.85"><polygon class="d" points="183.93 2.05 178.93 2.05 178.93 123.25 2.87 0 0 4.1 176.36 127.55 1.43 127.55 1.43 132.55 181.43 132.55 181.43 131.1 183.93 132.85 183.93 2.05"></polygon></svg>';
 $svg_loading_1 = '<svg version="1.1" id="L3" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
<circle fill="none" stroke="#ccc" stroke-width="4" cx="50" cy="50" r="44" style="opacity:0.5;"/>
 <circle fill="#ccc" stroke="#222" stroke-width="3" cx="8" cy="54" r="6" >
   <animateTransform
     attributeName="transform"
     dur="2s"
     type="rotate"
     from="0 50 48"
     to="360 50 52"
     repeatCount="indefinite" />
   
 </circle>
</svg>';

 // shortcode for Siana Courses Page
 function allCoursesPage ( $atts, $content = null ) {

    $defaultAtt = array(
        'name' => 'courses'
    );

    $attributes = shortcode_atts( $defaultAtt, $atts );

    $args = array( 
        'post_type'         => 'course',
        'orderby'           => 'meta_value',
        'order'             => 'DESC',
        'post_status'       => 'publish',
        'no_found_rows'     => true
    );

    // $all_courses = get_posts( $args );
    // $num_of_courses = wp_count_posts( 'course' ) -> publish;

    $all_courses = new WP_Query( $args );

    // var_dump( $all_courses );

    // print_r($all_courses);

    $all_coursesHtml = '';

    // loop through all courses and generate html
    if( $all_courses -> posts ) {
        foreach( $all_courses->posts as $key => $course ) {
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



 // contactPage ShortCode
 function contactPageSCFunc( $atts, $content = null ) {
    $defaultAtt = array(
        'name' => 'contact'
    );

    $attributes = shortcode_atts( $defaultAtt, $atts );

    return '
    <div class="contactPgSection">
        <div class="pgSection topSection">
            <h2>We\'ll love to read from you!</h2>
            <h4>Send us a message using the contact form below and we\'ll get back to you as soon as possible.</h4>
        </div><!-- end of pgSection -->

        <div class="pgSection">
            ' . do_shortcode( "[contact-form-7 id=\"5\" title=\"Siana Contact Form\"]" ) . '
        </div><!-- end of pgSection -->
    </div>
    ';
 }
 add_shortcode( 'contactPageSC', 'contactPageSCFunc' );



//  function formatNum1( $num ) {
//     $num = intval($num);
//     // $num = ( $num < 10 ) ? ('0' . $num) : $num;
//     return $num;
//  }


 // aboutPage ShortCode
 function aboutPageSCFunc( $atts, $content = null ) {
    $aboutPgPostId = 11;

    global $arrow_1;

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

    $formattedNum = '';

    foreach( $content_items as $itm ) {

        $formattedNum = intval($cnt);
        $formattedNum = ( $formattedNum < 10 ) ? ('0' . $formattedNum) : $formattedNum;

        $infoBoxContents .= '
        <div class="info_bx bx'. $cnt . '">
            <div class="txt">
                <div class="bx num"><span>' . $formattedNum .  '</span></div>
                <div class="bx info">
                    <div class="title"><span>' . $itm['heading'] . '</span></div>
                    <div class="desc"><span>' . $itm['description'] . '</span></div>
                </div>
            </div>
            <div class="img"><div class="imgbx"><img loading="lazy" src="' .  $itm['image'] . '" /></div></div>
            <a href="' . home_url( '/apply-now' ) . '" class="apply_now_btn">
                ' . $arrow_1 . '
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
                <div class="txt1"><div class="bx"><span>TRANSFORM</span></div><div class="bx"><span>YOUR</span></div><div class="bx"><span>PASSION</span></div><div class="bx"><span>INTO</span></div><div class="bx"><span>A</span></div><div class="bx"><span>PROFESSION</span></div><div class="bx"><span>WITH</span></div><div class="bx"><span>OUR</span></div><div class="bx"><span>TOP</span></div><div class="bx"><span>NOTCH</span></div><div class="bx"><span>TRAINING.</span></div></div>
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



// shortcode function for registration and payment journeys
function applyNowSCFunc( $atts, $content = null ) {
    global $svg_loading_1;

    // $categories = get_categories( array(
    //     'post_type' => 'course',
    //     'orderby' => 'name',
    //     'order'   => 'DESC'
    // ) );
    $course_price_taxonomy = get_categories( 'taxonomy=course_prices&type=course' );

    // var_dump($course_price_taxonomy);
    
    $courses_n_prices = '';
    $full_package_opt = '';
    $full_p_pattern = "/full package/i";

    foreach( $course_price_taxonomy as $term ) {
        $is_full_package = preg_match( $full_p_pattern, $term -> name);

        if($is_full_package) {
            $full_package_opt .= '<option value="'. $term -> slug . '">' . $term -> name . '</option>';
        } else {
            $courses_n_prices .= '<option value="'. $term -> slug . '">' . $term -> name . '</option>';
        }
    }

    $courses_n_prices = $full_package_opt . $courses_n_prices;


    return '
    <div class="applyNowPgSection">
        <div class="pgSection topSection">
            <h2>Siana Aesthetics Application Form</h2>
            <h4>Fill in your details below and choose the course you\'d like to study at Siana Aesthetics Institute.</h4>
        </div>
            
        <div class="pgSection applicationForm">
            <div class="form_header">
                <div class="step__numbers">
                    <div class="step"><span>1</span></div>
                    <div class="step"><span>2</span></div>
                    <div class="step"><span>3</span></div>
                </div>
                <div class="step__titles">
                    <div class="step__title"><span>Student details</span></div>
                    <div class="step__title"><span>Confirm Details</span></div>
                    <div class="step__title"><span>Complete Payment</span></div>
                </div>
            </div>
            <div class="form_body">
                <div class="status_screen">
                    <div class="content">
                        ' . $svg_loading_1 . '
                        <span>Processing...</span>
                    </div>
                </div>
                <div class="form_screen application_form">
                    <div class="form-errors form-status"></div>
                    <div class="form-errors student-names-errors"></div>
                    <div class="form-section student-names">
                        <div class="form-field">
                            <label for="first-name">Student\'s first name *</label>
                            <input name="first-name" id="first-name" placeholder="Enter your firstname" />
                        </div>
                        <div class="form-field">
                            <label for="last-name">Student\'s last name *</label>
                            <input name="last-name" id="last-name" placeholder="Enter your lastname" />
                        </div>
                    </div>
                    <div class="form-errors dob-errors"></div>
                    <div class="form-section">
                        <div class="form-field">
                            <label for="date-of-birth">Date of birth *</label>
                            <input name="date-of-birth" id="date-of-birth" placeholder="Enter your date of birth" />
                        </div>
                    </div>
                    
                    <div class="form-errors student-gender-errors"></div>
                    <div class="form-section student-gender">                        
                        <div class="form-field">                            
                            <div class="form-field-group">
                                <input type="radio" id="female" name="gender" value="female">
                                <label for="female">Female</label>
                            </div>
                            <div class="form-field-group">
                                <input type="radio" id="male" name="gender" value="male">
                                <label for="male">Male</label>
                            </div>
                            <div class="form-field-group">
                                <input type="radio" id="rather-not-say" name="gender" value="">
                                <label for="rather-not-say">Rather not say</label>
                            </div>
                        </div>
                    </div>

                    <div class="form-errors student-courses-errors"></div>
                    <div class="form-section student-courses">
                        <div class="form-field">
                            <label for="select-study-courses" id="select-study-courses-title">Select course(s) to study</label>
                            <select multiple name="select-study-courses" id="select-study-courses">
                                ' .  $courses_n_prices  . '
                            </select> 
                        </div>
                    </div>
                    <div class="form-errors student-email-errors"></div>
                    <div class="form-section">
                        <div class="form-field">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="">
                        </div>
                    </div>
                    <div class="form-errors student-id-num-errors"></div>
                    <div class="form-section">
                        <div class="form-field">
                            <label for="id-number">Id number</label>
                            <input type="text" id="id-number" name="id-number" value="">
                        </div>
                    </div>
                    <div class="form-errors student-phone-num-errors"></div>
                    <div class="form-section">
                        <div class="form-field">
                            <label for="phone-number">Phone number</label>
                            <input type="text" id="phone-number" name="phone-number" value="">
                        </div>
                    </div>
                    <div class="form-errors student-address-errors"></div>
                    <div class="form-section">
                        <div class="form-field">
                            <div class="form-field-group">
                                <label for="address-line-1">Address Line 1</label>
                                <input type="text" id="address-line-1" name="address-line-1" value="">
                            </div>
                            <div class="form-field-group">
                                <label for="address-line-2">Address Line 2</label>
                                <input type="text" id="address-line-2" name="address-line-2" value="">
                            </div>
                            <div class="form-field-group">
                                <label for="city">City *</label>
                                <input type="text" id="city" name="city" value="">
                            </div>
                            <div class="form-field-group">
                                <label for="state-province-region">State / Province / Region *</label>
                                <input type="text" id="state-province-region" name="state-province-region" value="">
                            </div>
                            <div class="form-field-group">
                                <label for="postal-code">Postal Code</label>
                                <input type="text" id="postal-code" name="postal-code" value="">
                            </div>                            
                            <div class="form-field-group">
                                <label for="select-study-country">Select country *</label>
                                <select name="select-study-country" id="select-study-country">
                                <option value="Afghanistan">Afghanistan</option>
                                <option value="Åland Islands">Åland Islands</option>
                                <option value="Albania">Albania</option>
                                <option value="Algeria">Algeria</option>
                                <option value="American Samoa">American Samoa</option>
                                <option value="Andorra">Andorra</option>
                                <option value="Angola">Angola</option>
                                <option value="Anguilla">Anguilla</option>
                                <option value="Antarctica">Antarctica</option>
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                <option value="Argentina">Argentina</option>
                                <option value="Armenia">Armenia</option>
                                <option value="Aruba">Aruba</option>
                                <option value="Australia">Australia</option>
                                <option value="Austria">Austria</option>
                                <option value="Azerbaijan">Azerbaijan</option>
                                <option value="Bahamas">Bahamas</option>
                                <option value="Bahrain">Bahrain</option>
                                <option value="Bangladesh">Bangladesh</option>
                                <option value="Barbados">Barbados</option>
                                <option value="Belarus">Belarus</option>
                                <option value="Belgium">Belgium</option>
                                <option value="Belize">Belize</option>
                                <option value="Benin">Benin</option>
                                <option value="Bermuda">Bermuda</option>
                                <option value="Bhutan">Bhutan</option>
                                <option value="Bolivia">Bolivia</option>
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                <option value="Botswana">Botswana</option>
                                <option value="Bouvet Island">Bouvet Island</option>
                                <option value="Brazil">Brazil</option>
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                <option value="Bulgaria">Bulgaria</option>
                                <option value="Burkina Faso">Burkina Faso</option>
                                <option value="Burundi">Burundi</option>
                                <option value="Cambodia">Cambodia</option>
                                <option value="Cameroon">Cameroon</option>
                                <option value="Canada">Canada</option>
                                <option value="Cape Verde">Cape Verde</option>
                                <option value="Cayman Islands">Cayman Islands</option>
                                <option value="Central African Republic">Central African Republic</option>
                                <option value="Chad">Chad</option>
                                <option value="Chile">Chile</option>
                                <option value="China">China</option>
                                <option value="Christmas Island">Christmas Island</option>
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                <option value="Colombia">Colombia</option>
                                <option value="Comoros">Comoros</option>
                                <option value="Congo">Congo</option>
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                <option value="Cook Islands">Cook Islands</option>
                                <option value="Costa Rica">Costa Rica</option>
                                <option value="Cote D\'ivoire">Cote D\'ivoire</option>
                                <option value="Croatia">Croatia</option>
                                <option value="Cuba">Cuba</option>
                                <option value="Cyprus">Cyprus</option>
                                <option value="Czech Republic">Czech Republic</option>
                                <option value="Denmark">Denmark</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominica">Dominica</option>
                                <option value="Dominican Republic">Dominican Republic</option>
                                <option value="Ecuador">Ecuador</option>
                                <option value="Egypt">Egypt</option>
                                <option value="El Salvador">El Salvador</option>
                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                <option value="Eritrea">Eritrea</option>
                                <option value="Estonia">Estonia</option>
                                <option value="Ethiopia">Ethiopia</option>
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                <option value="Faroe Islands">Faroe Islands</option>
                                <option value="Fiji">Fiji</option>
                                <option value="Finland">Finland</option>
                                <option value="France">France</option>
                                <option value="French Guiana">French Guiana</option>
                                <option value="French Polynesia">French Polynesia</option>
                                <option value="French Southern Territories">French Southern Territories</option>
                                <option value="Gabon">Gabon</option>
                                <option value="Gambia">Gambia</option>
                                <option value="Georgia">Georgia</option>
                                <option value="Germany">Germany</option>
                                <option value="Ghana">Ghana</option>
                                <option value="Gibraltar">Gibraltar</option>
                                <option value="Greece">Greece</option>
                                <option value="Greenland">Greenland</option>
                                <option value="Grenada">Grenada</option>
                                <option value="Guadeloupe">Guadeloupe</option>
                                <option value="Guam">Guam</option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernsey">Guernsey</option>
                                <option value="Guinea">Guinea</option>
                                <option value="Guinea-bissau">Guinea-bissau</option>
                                <option value="Guyana">Guyana</option>
                                <option value="Haiti">Haiti</option>
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                <option value="Honduras">Honduras</option>
                                <option value="Hong Kong">Hong Kong</option>
                                <option value="Hungary">Hungary</option>
                                <option value="Iceland">Iceland</option>
                                <option value="India">India</option>
                                <option value="Indonesia">Indonesia</option>
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                <option value="Iraq">Iraq</option>
                                <option value="Ireland">Ireland</option>
                                <option value="Isle of Man">Isle of Man</option>
                                <option value="Israel">Israel</option>
                                <option value="Italy">Italy</option>
                                <option value="Jamaica">Jamaica</option>
                                <option value="Japan">Japan</option>
                                <option value="Jersey">Jersey</option>
                                <option value="Jordan">Jordan</option>
                                <option value="Kazakhstan">Kazakhstan</option>
                                <option value="Kenya">Kenya</option>
                                <option value="Kiribati">Kiribati</option>
                                <option value="Korea, Democratic People\'s Republic of">Korea, Democratic People\'s Republic of</option>
                                <option value="Korea, Republic of">Korea, Republic of</option>
                                <option value="Kuwait">Kuwait</option>
                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                <option value="Lao People\'s Democratic Republic">Lao People\'s Democratic Republic</option>
                                <option value="Latvia">Latvia</option>
                                <option value="Lebanon">Lebanon</option>
                                <option value="Lesotho">Lesotho</option>
                                <option value="Liberia">Liberia</option>
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                <option value="Liechtenstein">Liechtenstein</option>
                                <option value="Lithuania">Lithuania</option>
                                <option value="Luxembourg">Luxembourg</option>
                                <option value="Macao">Macao</option>
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                <option value="Madagascar">Madagascar</option>
                                <option value="Malawi">Malawi</option>
                                <option value="Malaysia">Malaysia</option>
                                <option value="Maldives">Maldives</option>
                                <option value="Mali">Mali</option>
                                <option value="Malta">Malta</option>
                                <option value="Marshall Islands">Marshall Islands</option>
                                <option value="Martinique">Martinique</option>
                                <option value="Mauritania">Mauritania</option>
                                <option value="Mauritius">Mauritius</option>
                                <option value="Mayotte">Mayotte</option>
                                <option value="Mexico">Mexico</option>
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                <option value="Monaco">Monaco</option>
                                <option value="Mongolia">Mongolia</option>
                                <option value="Montenegro">Montenegro</option>
                                <option value="Montserrat">Montserrat</option>
                                <option value="Morocco">Morocco</option>
                                <option value="Mozambique">Mozambique</option>
                                <option value="Myanmar">Myanmar</option>
                                <option value="Namibia">Namibia</option>
                                <option value="Nauru">Nauru</option>
                                <option value="Nepal">Nepal</option>
                                <option value="Netherlands">Netherlands</option>
                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                <option value="New Caledonia">New Caledonia</option>
                                <option value="New Zealand">New Zealand</option>
                                <option value="Nicaragua">Nicaragua</option>
                                <option value="Niger">Niger</option>
                                <option value="Nigeria">Nigeria</option>
                                <option value="Niue">Niue</option>
                                <option value="Norfolk Island">Norfolk Island</option>
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                <option value="Norway">Norway</option>
                                <option value="Oman">Oman</option>
                                <option value="Pakistan">Pakistan</option>
                                <option value="Palau">Palau</option>
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                <option value="Panama">Panama</option>
                                <option value="Papua New Guinea">Papua New Guinea</option>
                                <option value="Paraguay">Paraguay</option>
                                <option value="Peru">Peru</option>
                                <option value="Philippines">Philippines</option>
                                <option value="Pitcairn">Pitcairn</option>
                                <option value="Poland">Poland</option>
                                <option value="Portugal">Portugal</option>
                                <option value="Puerto Rico">Puerto Rico</option>
                                <option value="Qatar">Qatar</option>
                                <option value="Reunion">Reunion</option>
                                <option value="Romania">Romania</option>
                                <option value="Russian Federation">Russian Federation</option>
                                <option value="Rwanda">Rwanda</option>
                                <option value="Saint Helena">Saint Helena</option>
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                <option value="Saint Lucia">Saint Lucia</option>
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                <option value="Samoa">Samoa</option>
                                <option value="San Marino">San Marino</option>
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                <option value="Saudi Arabia">Saudi Arabia</option>
                                <option value="Senegal">Senegal</option>
                                <option value="Serbia">Serbia</option>
                                <option value="Seychelles">Seychelles</option>
                                <option value="Sierra Leone">Sierra Leone</option>
                                <option value="Singapore">Singapore</option>
                                <option value="Slovakia">Slovakia</option>
                                <option value="Slovenia">Slovenia</option>
                                <option value="Solomon Islands">Solomon Islands</option>
                                <option value="Somalia">Somalia</option>
                                <option selected=true value="South Africa">South Africa</option>
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                <option value="Spain">Spain</option>
                                <option value="Sri Lanka">Sri Lanka</option>
                                <option value="Sudan">Sudan</option>
                                <option value="Suriname">Suriname</option>
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                <option value="Swaziland">Swaziland</option>
                                <option value="Sweden">Sweden</option>
                                <option value="Switzerland">Switzerland</option>
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                <option value="Taiwan">Taiwan</option>
                                <option value="Tajikistan">Tajikistan</option>
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                <option value="Thailand">Thailand</option>
                                <option value="Timor-leste">Timor-leste</option>
                                <option value="Togo">Togo</option>
                                <option value="Tokelau">Tokelau</option>
                                <option value="Tonga">Tonga</option>
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                <option value="Tunisia">Tunisia</option>
                                <option value="Turkey">Turkey</option>
                                <option value="Turkmenistan">Turkmenistan</option>
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                <option value="Tuvalu">Tuvalu</option>
                                <option value="Uganda">Uganda</option>
                                <option value="Ukraine">Ukraine</option>
                                <option value="United Arab Emirates">United Arab Emirates</option>
                                <option value="United Kingdom">United Kingdom</option>
                                <option value="United States">United States</option>
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                <option value="Uruguay">Uruguay</option>
                                <option value="Uzbekistan">Uzbekistan</option>
                                <option value="Vanuatu">Vanuatu</option>
                                <option value="Venezuela">Venezuela</option>
                                <option value="Viet Nam">Viet Nam</option>
                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                <option value="Western Sahara">Western Sahara</option>
                                <option value="Yemen">Yemen</option>
                                <option value="Zambia">Zambia</option>
                                <option value="Zimbabwe">Zimbabwe</option>
                                </select> 
                            </div><!-- field group -->
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="form-field">
                            <button id="submit-application" class="form-submit-btn">Submit Application</button>
                        </div>
                    </div>
                </div>
                <div class="form_screen view_info">
                    
                    <h4>Please Confirm your student details</h4>
                    <div class="student_info">
                        <div class="title">First name</div><div class="field-content" id="view-student-info__first-name"></div>
                        <div class="title">Last name</div><div class="field-content" id="view-student-info__last-name"></div>
                        <div class="title">Date of birth</div><div class="field-content" id="view-student-info__dob"></div>
                        <div class="title">Gender</div><div class="field-content" id="view-student-info__gender"></div>
                        <div class="title">Course(s) to study</div><div class="field-content" id="view-student-info__selected-courses"></div>
                        <div class="title">Course fees</div><div class="field-content" id="view-student-info__fees"></div>
                        <div class="title">Email</div><div class="field-content" id="view-student-info__email"></div>
                        <div class="title">ID Number</div><div class="field-content" id="view-student-info__id-number"></div>
                        <div class="title">Phone number</div><div class="field-content" id="view-student-info__phone-number"></div>
                        <div class="title">Address</div><div class="field-content" id="view-student-info__address"></div>
                    </div>
                    <div class="student_info_footer">
                        <div class="main_buttons">
                            <button id="confirm_n_pay_btn">confirm & pay</button>                                                        
                        </div>
                        <div class="other_buttons">
                            <button id="go_back_to_apply_form_btn">back to application form</button>                          
                            <button class="not_me_reset_apply_form_btn" id="not_me_reset_apply_form_btn">Not me. Reset form</button>
                        </div>
                        
                    </div>
                </div>
                <div class="form_screen processing_payment">
                    <div class="payment_status">
                        ' . $svg_loading_1 . '
                        <h2>Redirecting to secure payment page to complete payment...</h2>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    ';
}
add_shortcode( 'applyNowSC', 'applyNowSCFunc' );


