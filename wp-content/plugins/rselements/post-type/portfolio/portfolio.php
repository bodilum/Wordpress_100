<?php
/**
 * Team custom post type
 * This file is the basic custom post type for use any where in theme.
 * 
 * @author RS Theme
 * @link http://www.rstheme.com
 */
?>
<?php
class Rsaddon_Elementor_pro_Portfolio{	

	public function __construct() {
		add_action( 'init', array( $this, 'rs_portfolio_register_post_type' ) );		
		add_action( 'init', array( $this, 'tr_create_portfolio' ) );				
	}

	// Register Portfolio Post Type
	function rs_portfolio_register_post_type() {
		$labels = array(
			'name'               => esc_html__( 'Portfolio', 'rsaddons'),
			'singular_name'      => esc_html__( 'Portfolio', 'rsaddons'),
			'add_new'            => esc_html_x( 'Add New Portfolio', 'rsaddons'),
			'add_new_item'       => esc_html__( 'Add New Portfolio', 'rsaddons'),
			'edit_item'          => esc_html__( 'Edit Portfolio', 'rsaddons'),
			'new_item'           => esc_html__( 'New Portfolio', 'rsaddons'),
			'all_items'          => esc_html__( 'All Portfolio', 'rsaddons'),
			'view_item'          => esc_html__( 'View Portfolio', 'rsaddons'),
			'search_items'       => esc_html__( 'Search Portfolio', 'rsaddons'),
			'not_found'          => esc_html__( 'No Portfolio found', 'rsaddons'),
			'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash', 'rsaddons'),
			'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'rsaddons'),
			'menu_name'          => esc_html__( 'Portfolio', 'rsaddons'),
		);
		
		global $swipy_option;
		$portfolio_slug = (!empty($swipy_option['portfolio_slug']))? $swipy_option['portfolio_slug'] :'portfolios';
		$args = array(
			'labels'             => $labels,
			'public'             => true,	
			'show_in_menu'       => true,
			'show_in_admin_bar'  => true,
			'can_export'         => true,
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => 20,		
			'rewrite' => 		 array('slug' => $portfolio_slug,'with_front' => false),
			'menu_icon'          =>  plugins_url( 'img/icon.png', __FILE__ ),
			'supports'           => array( 'title', 'thumbnail','editor' ),		
		);
		register_post_type( 'portfolios', $args );
	}

	function tr_create_portfolio() {
		
		register_taxonomy(
			'portfolio-category',
			'portfolios',
			array(
				'label' => esc_html__( 'Portfolio Categories','rsaddons'),			
				'hierarchical' => true,
				'show_admin_column' => true,
			)
		);
	}
}
new Rsaddon_Elementor_pro_Portfolio();