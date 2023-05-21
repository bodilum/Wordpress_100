<?php
/**
 * 
 * ILABS MOUSE FOLLOW PLUGIN
 * 
 * @package         ILABS_MFP
 * @author          Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * 
 * 
 * @version         0.0.1
 * 
 * 
 * 
 */


 // function to add mouse follow plugin menu to wordpress admin menu
 function add_ilabs_mouse_follow_admin_menu() {

    add_menu_page(
        __( 'Ilabs Mouse Follow v0.0.1', 'ilabs_mfp' ),
        __( 'Mouse Follow', 'ilabs_mfp' ),
        'manage_options',
        'ilabs_mfp',
        'settings_page_content',
        'dashicons-wordpress-alt',
        100
    );

 }
 add_action( 'admin_menu', 'add_ilabs_mouse_follow_admin_menu', 10, 1 );


 function settings_page_content() {

    // double check user capabilities
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
?>

<div class="ilabs_admin_header">
    <h1><?php esc_html_e( get_admin_page_title() ); ?></h1>
    <h2><?php echo basename( __FILE__ ); ?></h2>
    <h2><?php echo plugin_basename( __FILE__ ); ?></h2>
    <h2><?php echo plugin_dir_url( __FILE__ ); ?></h2>
    <h2><?php echo plugin_dir_path( __FILE__ ); ?></h2>
    <h2><?php echo plugin_basename( plugin_dir_path( __FILE__ ) ); ?></h2>
    <h2><?php echo plugin_basename( ILABS_MF_PLUGIN ); ?></h2>
    <h2><?php echo ILABS_MF_PLUGIN; ?></h2>
    <h2><?php echo PLUGIN_BASENAME; ?></h2>
    <h2><?php echo PLUGIN_ABSPATH; ?></h2>
    <h2><?php echo get_admin_url(); ?></h2>
    <h4><?php esc_html_e( 'Header description here...', 'ilabs_mfp' ); ?></h4>
</div>


<?php



function remove_footer_admin () {
    echo "Thank you for using Imagine Labs Design Mouse Follow Plugin. It's always our pleasure to serve you!";
  }
add_filter('admin_footer_text', 'remove_footer_admin');


 }