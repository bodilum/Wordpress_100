<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */			
	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php'); 

// Register sidebars/widget areas
require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
require_once(get_template_directory().'/functions/comments.php'); 

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Adds support for multiple languages
require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php'); 

// make available custom shortcodes
require_once(get_template_directory().'/functions/custom-shortcodes.php');







if( !function_exists('sianaJS') ) {

	function sianaJS() {
		global $post;
		$post_id = $post->ID;
		$post_slug = $post->post_name;
		// $post_tags = get_the_tags( $post_id );
		$post_tags = wp_get_post_tags($post->ID);
		$cats = array();

		$post_categories = wp_get_post_categories( $post_id );

		// count all posts of post type course that are published
		$numOfCourses = wp_count_posts( 'course' ) -> publish;
		// echo 'Number of courses: ' . $numOfCourses;
			
		foreach($post_categories as $c){
			$cat = get_category( $c );
			$arr = array( 'name' => $cat->name, 'slug' => $cat->slug );
			array_push($cats, $arr);
		}

		wp_enqueue_script('locomotiveScroll1', get_template_directory_uri() . '/assets/scripts/locomotive-scroll.min.js');
		wp_enqueue_script('gsap_scroll_to_plugin', get_template_directory_uri() . '/assets/scripts/gsap/ScrollToPlugin.min.js');
		wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/assets/scripts/gsap/ScrollTrigger.min.js');
		wp_enqueue_script('CSSRulePlugin', get_template_directory_uri() . '/assets/scripts/gsap/CSSRulePlugin.min.js');
		wp_enqueue_script('TweenMax', get_template_directory_uri() . '/assets/scripts/gsap/TweenMax.min.js');
		wp_enqueue_script('tinycolor', get_template_directory_uri() . '/assets/scripts/tinycolor-min.js');
		wp_enqueue_script('multi_select', get_template_directory_uri() . '/assets/scripts/lc_select.min.js');
		wp_enqueue_script('date_picker', get_template_directory_uri() . '/assets/scripts/datepicker.min.js');

		wp_enqueue_script('barbajs', get_template_directory_uri() . '/assets/scripts/barba.js');
		wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/scripts/gsap/gsap.min.js');
		
		$url = get_template_directory_uri() . '/assets/scripts/swiper-bundle.min.js';
		wp_enqueue_script('swiper', $url);

		wp_register_script('siana-main-js', get_template_directory_uri() . '/assets/scripts/main.js', [], 20 );
		wp_enqueue_script('siana-main-js');

		wp_localize_script('siana-main-js', 'script_vars', array('post_id' => $post_id, 'pg_slug' => $post_slug, 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'nonce' => wp_create_nonce('ajax-nonce'), 'categories' => $cats, 'tags' => $post_tags, 'post_type' => $post -> post_type, 'num_of_courses' => $numOfCourses )); 


		if( $post -> post_type == "course" ) {
			// wp_localize_script('siana-main-js', 'script_var1', array( 'post_type' => $post -> post_type ));
		}


	}
	add_action('wp_enqueue_scripts', 'sianaJS');



	add_action( 'wp_ajax_submit_apply_form', 'handle_apply_form_submission' );
	add_action( 'wp_ajax_nopriv_submit_apply_form', 'handle_apply_form_submission' );
	// function to process apply form submission
	function handle_apply_form_submission() {
		// echo '<h2>Process apply form submission</h2>';

		if( isset($_POST) ) {

			// check the nonce
			// if ( check_ajax_referer( 'ajax-nonce', $_POST['nonce'], false ) == false ) {
			//     wp_send_json_error();
			// }

			// check_ajax_referer( 'ajax-nonce', 'nonce' );
		
			if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )) { wp_send_json_error( json_encode( array( 'message' => "Access Denied!" ) ) ); }

			// {
			// 	"action": "submit_apply_form",
			// 	"first_name": "fsdfsfd",
			// 	"last_name": "sdfsdf",
			// 	"date_of_birth": "fgsdfgsdf",
			// 	"selected_courses": "advanced nail tech,facials,laser technician",
			// 	"fees": 11500,
			// 	"email": "info@biznesxpo.com",
			// 	"id_number": "fsdgfsdfs",
			// 	"phone_number": "dfgsfgsdfg",
			// 	"address": "dfdsfgsdf, fsfsdfsd, dfsfsfg, gsgfsg, dfgsgsd, South Africa",
			// 	"nonce": "sfasdsd"
			//   }
		
			// clean data & store as student post_type
			$student_full_names = $_POST['first_name'] . ' ' . $_POST['last_name'];
			$student_details = array(
				'first_name' => $_POST['first_name'],
				'last_name' => $_POST['last_name'],
				'date_of_birth' => $_POST['date_of_birth'],
				'email' => $_POST['email'],
				'phone_number' => $_POST['phone_number'],
				'id_number' => $_POST['id_number'],
				'address' => $_POST['address'],
				'selected_courses' => $_POST['selected_courses'],
				'fees' => $_POST['fees'],
				'currency' => 'ZAR',
				'payment_status' => 'not_paid',
				'verified_email' => false,
			);
			$student_details_html = "
				<b>First name:  </b>" . $_POST['first_name'] . "<br />
				<b>Last name:  </b>" . $_POST['last_name'] . "<br />
				<b>Date of birth:  </b>" . $_POST['date_of_birth'] . "<br />
				<b>Email:  </b>" . $_POST['email'] . "<br />
				<b>Phone number:  </b>" . $_POST['phone_number'] . "<br />
				<b>ID number:  </b>" . $_POST['id_number'] . "<br />
				<b>Address:  </b>" . $_POST['address'] . "<br />
				<b>Selected Courses:  </b>" . $_POST['selected_courses'] . "<br />
				<b>Course Fees:  </b>R " . $_POST['fees'] . "<br />
			";


			$post_id = wp_insert_post(array (
				'post_content' => '',
				'post_title' => $student_full_names,
				'post_type' => 'student',
				'post_status' => 'publish',	
				'comment_status' => 'closed',
    			'ping_status' => 'closed',   
				// some simple key / value array
				'meta_input' => $student_details
			));
			
			if (!$post_id)  wp_send_json_error( json_encode( array( 'message' => "There was an error submitting your application. Kindly refresh the application page and resubmit your application" ) ) );

			// inserting data worked :)

			// send email to admin
			$admin_email = get_bloginfo('admin_email');
			$admin_email = 'support@sianainstitute.co.za';

			$subject = 'Student Application on Siana Aesthetics Academy Website For ' . $student_full_names;

			$body = '<h2>'. $student_full_names . '</h2> just registered on Siana Aesthetics Institute Website. <br /><br />
			<h4>Here are the detials: </h4> <br/><br />' . $student_details_html;

			$headers = array('Content-Type: text/html; charset=UTF-8');

			// wp_mail( $to, $subject, $body, $headers );

			wp_mail( $admin_email, $subject, $body, $headers );

			// send email to student
			$student_email = sanitize_email($_POST['email']);

			$subject = 'Welcome to Siana Aesthetics Institute ' . $student_full_names . "!";

			$body = 'Congratulations ' . $student_full_names . '.  <br /><br />Your application for ' . $_POST['selected_courses'] . '</br> beauty courses have been accepted!<br />
			<h5>Here are your application details: </h5> <br /><br />' . $student_details_html . '
			<br /><br />
			<b>Kindly complete your payment to reserve your spot!</b>
			<br /><br />
			We\'re looking forward to having you in our Beauty Academy!
			<br /><br />
			
			<b>Kind regards,<br />
			Andrew Moyo,<br />
			Founder, Siana Aesthetics Academy.</b><br /><br />
			';

			wp_mail( $student_email, $subject, $body, $headers );

			// wp_mail( 'admin@ema.il', 'Bug report in post: ' . $post_title, sanitize_text_field( $data['report'] ) );
			
		
		
			// res
			wp_send_json_success( $admin_email );
		}


		wp_send_json_error( json_encode( array( 'message' => "There was an error submitting your application details. Kindly refresh the application page and resubmit your application" ) ) );

		wp_die();
	}





	// function to make payment using ozow
	add_action( 'wp_ajax_nopriv_ozow_pay', 'ozow_payment_processing' );
	add_action( 'wp_ajax_ozow_pay', 'ozow_payment_processing' );
	function ozow_payment_processing() {

		if( isset($_POST) ) {


			global $wpdb;	
			
			// $siteCode = 'ODE-ODE-001';
			// $privateKey = 'qcr3oL0Grey9e5TLpAknXvd135rANKq0';
			// $apiKey = 'L7G0XuzM8gxzjRzxRBbHUu2bZ3svxkRI';

			// Private Key
			// 8aa114af1e744daa948224ad8d721a73 
			// API Key
			// 06ca3e7819424ff5a32604ba3ed0454d 


		
			if ( !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )) { wp_send_json_error( json_encode( array( 'message' => "Access Denied!" ) ) ); }
			
				
			$siteCode = "MAZ-MAZ-004";
			// $siteCode = 'TSTSTE0001';

			$privateKey = "8aa114af1e744daa948224ad8d721a73";
			$apiKey = "06ca3e7819424ff5a32604ba3ed0454d";
			
			$fees = floatval( $_POST['fees'] );	
				
			$ref = strtoupper(substr( sanitize_text_field($_POST['first_name']), 0, 1 ) . substr( sanitize_text_field($_POST['last_name']), 0, 1 ). substr(md5(time()), 0, 5));

			
			$countryCode = "ZA";
			$currencyCode = "ZAR";
			$amount = $fees;
			$transactionReference = $ref;
			$bankReference = $ref;
			$optional1 = sanitize_text_field($_POST['first_name']) . ' | ' . sanitize_text_field($_POST['last_name']);
			$optional2 = sanitize_text_field($_POST['email']);
			$optional3 = sanitize_text_field($_POST['id_number']);
			$optional4 = $_POST['selected_courses'];
			$optional5 = $_POST['fees'];
			$cancelUrl = 'https://sianainstitute.co.za/cancelled';
			$errorUrl = 'https://sianainstitute.co.za/error';
			$successUrl = 'https://sianainstitute.co.za/success';
			$notifyUrl = 'https://sianainstitute.co.za/notification';
				
			$isTest = 'false';
				
			$inputString = $siteCode . $countryCode . $currencyCode . $amount . $transactionReference . $bankReference . $optional1 . $optional2 . $optional3 .	$optional4 . $optional5 . $cancelUrl . $errorUrl . $successUrl . $notifyUrl . $isTest . $privateKey;

			// maz-maz-004zazar11500kt8a61bkt8a61bhttps://sianainstitute.co.za/cancelledhttps://sianainstitute.co.za/errorhttps://sianainstitute.co.za/successhttps://sianainstitute.co.za/notification8aa114af1e744daa948224ad8d721a73

			// maz-maz-004zazar8500kt32980kt32980https://sianainstitute.co.za/cancelledhttps://sianainstitute.co.za/errorhttps://sianainstitute.co.za/successhttps://sianainstitute.co.za/notificationfalse8aa114af1e744daa948224ad8d721a73

			// tstste0001zazar25.00123abc123[http://demo.ozow.com/cancel.aspxhttp://demo.ozow.com/cancel.aspxht]http://demo.ozow.com/success.aspx(http://demo.ozow.com/notify.aspxfalse[your private key]
			
			$calculatedHashResult = generate_request_hash_check($inputString);		
			
			// $calculatedHashResult = hash('sha512', $inputString);

			$postData  = [
				"countryCode" => "ZA",
				"amount" => $fees,
				"transactionReference" => $ref,
				"bankReference" => $ref,
				"Optional1" => $optional1,
				"Optional2" => $optional2,
				"Optional3" => $optional3,
				"Optional4" => $optional4,
				"Optional5" => $optional5,
				"cancelUrl" => "https://sianainstitute.co.za/cancelled",
				"currencyCode" => "ZAR",
				"errorUrl" => "https://sianainstitute.co.za/error",
				"isTest" => 'false',
				"notifyUrl" => "https://sianainstitute.co.za/notification",
				"siteCode" => $siteCode,
				"successUrl" => "https://sianainstitute.co.za/success",
				"hashCheck" => $calculatedHashResult
			];


			// $postData  = [
			// 	"CountryCode" => "ZA",
			// 	"Amount" => $fees,
			// 	"TransactionReference" => $ref,
			// 	"BankReference" => $ref,
			// 	"CancelUrl" => "https://sianainstitute.co.za/cancelled",
			// 	"CurrencyCode" => "ZAR",
			// 	"ErrorUrl" => "https://sianainstitute.co.za/error",
			// 	"IsTest" => false,
			// 	"NotifyUrl" => "https://sianainstitute.co.za/notification",
			// 	"SiteCode" => $siteCode,
			// 	"SuccessUrl" => "https://sianainstitute.co.za/success",
			// 	"HashCheck" => $calculatedHashResult
			// ];


			$ozowResult = getPaymentLinkModel($postData, $apiKey);

			// send student an email with the payment link			
			$student_email = sanitize_email($_POST['email']);

			$student_full_names = $_POST['first_name'] . ' ' . $_POST['last_name'];

			$subject = 'Your Payment link for Beauty Courses on Siana Aesthetics Institute ';

			$headers = array('Content-Type: text/html; charset=UTF-8');

			$body = '<b>Hi ' . $_POST['first_name'] . ',</b> <br /><br />
			<p>Kindly click on the link below to complete your payment for <b>' . $_POST['selected_courses'] . '</b> beauty courses on Siana Aesthetics Institute with a total course fees of <b>R' . $fees . '</b>.</p> 
			<br />
			<b><a href="' . $ozowResult -> url . '" title="Siana Aesthetics Institute Course Payment LInk">' . $ozowResult -> url . '</a></b>
			<br />
			Your payment reference is : <b>' . $ref . '</b>
			<br /><br />
			We\'re looking forward to having you in our Beauty Academy!
			<br /><br />
			
			<b>Kind regards,<br />
			Andrew Moyo,<br />
			Founder, Siana Aesthetics Academy.</b><br /><br />
			';

			wp_mail( $student_email, $subject, $body, $headers );
				
			$data = array(
				'ref' => $ref,
				'status' => 'success',
				'fees' => $fees,
				'result' => $ozowResult,
				'url' => $ozowResult -> url
			);
			wp_send_json_success( json_encode($data) );

		}

			wp_send_json_error( json_encode( array( 'message' => "Your payment details are invalid. Kindly refresh the application page and resubmit your application" ) ) );
		
			wp_die();  //die();
	}



	function generate_request_hash_check($inputString) {
		$stringToHash = strtolower($inputString);
		// echo "Before Hashcheck: " . $stringToHash . "\n";
		return get_sha512_hash($stringToHash);
	}
	
	function get_sha512_hash($stringToHash) {
		$bytes = hash('sha512', $stringToHash, true);
		$hex = bin2hex($bytes);
		return $hex;
	}
	
	
	function getPaymentLinkModel($postData, $apiKey)
	{

		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_URL, 'https://api.ozow.com/postpaymentrequest');
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_ENCODING, '');
		curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
		curl_setopt($ch, CURLOPT_TIMEOUT, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_POSTREDIR, 3);
		curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Accept: application/json',
			'ApiKey:' . $apiKey,
			'Content-Type: application/json'
		));


		// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

		$error_message = '';



		//for debug only!
// curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);





		
		
		// curl_setopt_array($ch, array(
		//   CURLOPT_URL => "https://api.ozow.com/postpaymentrequest",
		//   CURLOPT_RETURNTRANSFER => true,
		//   CURLOPT_ENCODING => "",
		//   CURLOPT_MAXREDIRS => 10,
		//   CURLOPT_TIMEOUT => 0,
		//   CURLOPT_FOLLOWLOCATION => true,
		//   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		//   CURLOPT_CUSTOMREQUEST => "POST",
		//   CURLOPT_POSTFIELDS => json_encode($postData),
		//   CURLOPT_HTTPHEADER => array(
		// 	"Accept: application/json",
		// 	"ApiKey:",
		// 	"Content-Type: application/json"
		//   )
		// ));

		$requestResult = curl_exec($ch);
		curl_close($ch);

		
		// if($errno = curl_errno($ch)) {
		// 	$error_message = curl_strerror($errno);
		// 	// echo "cURL error ({$errno}):\n {$error_message}";
		// }

		// return json_decode($requestResult);

		$res = json_decode( $requestResult );
		// $res["error"] = $error_message;

		return $res;

	}






}

 /**
 * Load css files
 */

 if( !function_exists('sianaCss') ) {

	function sianaCss() {
		wp_register_style('siana-main-css', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('siana-main-css');

		$url = get_template_directory_uri() . '/assets/styles/swiper-bundle.min.css';
		wp_enqueue_style('swiperStyles', $url);
		$url = get_template_directory_uri() . '/assets/styles/locomotive-scroll.css';
		wp_enqueue_style('locomotiveStyles', $url);
		$url = get_template_directory_uri() . '/assets/styles/datepicker.min.css';
		wp_enqueue_style('datePickerStyles', $url);
		$url = get_template_directory_uri() . '/assets/styles/lc_light.css';
		wp_enqueue_style('lcLightStyles', $url);
	}
	add_action('wp_enqueue_scripts', 'sianaCss');



    if ( !function_exists ('add_attributes_to_script_tag') ) {
        function add_attributes_to_script_tag ( $tag, $handle, $src ) {

            // if not the expected handle then return
            if( 'three-main' !== $handle ) {
                return $tag;
            }

            // modify script tag add type=module
            $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
            return $tag;
        }
        add_filter( 'script_loader_tag', 'add_attributes_to_script_tag', 10, 3 );
    }

}




// function theme_prefix_rewrite_flush() {
//     flush_rewrite_rules();
// }
// add_action( 'after_switch_theme', 'theme_prefix_rewrite_flush' );


// register_activation_hook( __FILE__, 'your_active_hook' );

// function your_active_hook() {
//     special_media_post();
//     flush_rewrite_rules();
// }