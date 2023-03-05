<?php
/**
 * ImaginLabs functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/ 
 *
 * @package ImagineLabs
 * @since 1.0.0
 */

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '0.0.' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-update.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-pb-compatibility.php';

/**
 * Load theme hooks
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';
/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

if ( is_admin() ) {

	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/notices/class-astra-notices.php';

	/**
	 * Metabox additions.
	 */
	require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';
}

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';


/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';


/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymus functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';


/**
 * include shortcodes
 */
include_once ASTRA_THEME_DIR . 'inc/custom-shortcodes.php';


/**
 * Mogul Works Custom Post Type
 */
if( !function_exists( 'register_mogul_works_cpt' ) ) {

	add_action( 'init', 'register_mogul_works_cpt' );
	function register_mogul_works_cpt() {

		$labels = array(
			"name" =>  __( "Mogul Works", "alitwotimes" ),
			"singular_name" =>  __( "Mogul Work", "alitwotimes" ),
			"menu_name" =>  __( "Mogul Works", "alitwotimes" ),
			"parent_item_colon" =>  __( "Parent Mogul Work", "alitwotimes" ),
			"all_items" =>  __( "All Mogul Works", "alitwotimes" ),
			"view_item" =>  __( "View Mogul Work", "alitwotimes" ),
			"add_new_item" =>  __( "Add New Mogul Work", "alitwotimes" ),
			"add_new" =>  __( "Add New", "alitwotimes" ),
			"edit_item"  =>  __( "Edit Mogul Work", "alitwotimes" ),
			"update_item" =>  __( "Update Mogul Work", "alitwotimes" ),
			"search_items" =>  __( "Search Mogul Work", "alitwotimes" ),
			"not_found" =>  __( "Not Found", "alitwotimes" ),
			"not_found_in_trash" =>  __( "Not found in Trash", "alitwotimes" )
		);

		register_post_type('mogul_works', [
			'label'               => __( 'mogul works', 'alitwotimes' ),
			'description'         => __( 'All creative works of Mogul Pictures studio', 'alitwotimes' ),
			'labels'              => $labels,
			'show_in_rest' => true,
			'supports' => ['editor'],
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'public' => true,
			'capability_type' => 'post'
		]);
	}
}


/**
 * Mogul Videos Custom Post Type
 */
if( !function_exists( 'register_mogul_videos_cpt' ) ) {

	add_action( 'init', 'register_mogul_videos_cpt' );
	function register_mogul_videos_cpt() {

		$labels = array(
			"name" =>  __( "Mogul Videos", "alitwotimes" ),
			"singular_name" =>  __( "Mogul Work", "alitwotimes" ),
			"menu_name" =>  __( "Mogul Videos", "alitwotimes" ),
			"parent_item_colon" =>  __( "Parent Mogul Work", "alitwotimes" ),
			"all_items" =>  __( "All Mogul Videos", "alitwotimes" ),
			"view_item" =>  __( "View Mogul Work", "alitwotimes" ),
			"add_new_item" =>  __( "Add New Mogul Work", "alitwotimes" ),
			"add_new" =>  __( "Add New", "alitwotimes" ),
			"edit_item"  =>  __( "Edit Mogul Work", "alitwotimes" ),
			"update_item" =>  __( "Update Mogul Work", "alitwotimes" ),
			"search_items" =>  __( "Search Mogul Work", "alitwotimes" ),
			"not_found" =>  __( "Not Found", "alitwotimes" ),
			"not_found_in_trash" =>  __( "Not found in Trash", "alitwotimes" )
		);

		register_post_type('mogul_videos', [
			'label'               => __( 'mogul videos', 'alitwotimes' ),
			'description'         => __( 'All creative videos of Mogul Pictures studio', 'alitwotimes' ),
			'labels'              => $labels,
			'show_in_rest' => true,
			'supports' => ['editor'],
			// Features this CPT supports in Post Editor
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'public' => true,
			'capability_type' => 'post'
		]);
	}
}










/**
 * Load javascript files
 */

if( !function_exists('locoScrollPolyFills') ) {
	function locoScrollPolyFills() {
		?>
		<script nomodule src="https://cdnjs.cloudflare.com/ajax/libs/babel-polyfill/7.6.0/polyfill.min.js" crossorigin="anonymous"></script>
<script nomodule src="https://polyfill.io/v3/polyfill.min.js?features=Object.assign%2CElement.prototype.append%2CNodeList.prototype.forEach%2CCustomEvent%2Csmoothscroll" crossorigin="anonymous"></script>
		<?php
	}
	add_action( 'wp_head', 'locoScrollPolyFills' );
}

if( !function_exists('mogulJS') ) {

	function mogulJS() {
		global $post;
		$post_id = $post->ID;
		$post_slug = $post->post_name;
		// $post_tags = get_the_tags( $post_id );
		$post_tags = wp_get_post_tags($post->ID);
		$cats = array();

		$post_categories = wp_get_post_categories( $post_id );
			
		foreach($post_categories as $c){
			$cat = get_category( $c );
			$arr = array( 'name' => $cat->name, 'slug' => $cat->slug );
			array_push($cats, $arr);
		}

		wp_enqueue_script('locomotiveScroll1', get_template_directory_uri() . '/assets/js/locomotive-scroll.min.js');
		wp_enqueue_script('gsap_scroll_to_plugin', get_template_directory_uri() . '/assets/js/gsap/ScrollToPlugin.min.js');
		wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/assets/js/gsap/ScrollTrigger.min.js');
		wp_enqueue_script('CSSRulePlugin', get_template_directory_uri() . '/assets/js/gsap/CSSRulePlugin.min.js');
		wp_enqueue_script('TweenMax', get_template_directory_uri() . '/assets/js/gsap/TweenMax.min.js');

		wp_enqueue_script('barbajs', get_template_directory_uri() . '/assets/js/barba.js');
		wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/gsap/gsap.min.js');
		
		$url = get_template_directory_uri() . '/assets/js/swiper-bundle.min.js';
		wp_enqueue_script('swiper', $url);

		$url = get_template_directory_uri() . '/assets/js/jBox.all.min.js';
		wp_enqueue_script('jBoxAll', $url);

		wp_register_script('mogul-main-js', get_template_directory_uri() . '/assets/js/main.js', [], 20 );
		wp_enqueue_script('mogul-main-js');

		wp_localize_script('mogul-main-js', 'script_vars', array('post_id' => $post_id, 'pg_slug' => $post_slug, 
		'categories' => $cats, 'tags' => $post_tags ));
	}
	add_action('wp_enqueue_scripts', 'mogulJS');

}

 /**
 * Load css files
 */

 if( !function_exists('mogulCss') ) {

	function mogulCss() {
		wp_register_style('mogul-main-css', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style('mogul-main-css');

		$url = get_template_directory_uri() . '/assets/css/swiper-bundle.min.css';
		wp_enqueue_style('swiperStyles', $url);
		$url = get_template_directory_uri() . '/assets/css/jBox.all.min.css';
		wp_enqueue_style('jBoxAllStyle', $url);
		$url = get_template_directory_uri() . '/assets/css/locomotive-scroll.min.css';
		wp_enqueue_style('locomotiveStyles', $url);
	}
	add_action('wp_enqueue_scripts', 'mogulCss');

}



@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );





// add_action('init', 'register_bodilum_cpt');
// function register_bodilum_cpt() {
// 	register_post_type('bodi', [
// 		'label' => 'BodiBodi',
// 		'public' => true,
// 		'capability_type' => 'post'
// 	])
// }


