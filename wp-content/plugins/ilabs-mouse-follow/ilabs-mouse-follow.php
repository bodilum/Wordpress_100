<?php
/**
 * 
 * ILABS MOUSE FOLLOW PLUGIN
 * 
 * @package         ILABS_MFP
 * @author          Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * 
 * @version         0.0.1
 * 
 * 
 * @wordpress-plugin
 * Plugin Name:     Ilabs Mouse Follow
 * Plugin URI:      imaginelabs.design
 * Description:     Plugin to add nice mouse follow effect to any wordpress theme
 * Version:         0.0.1
 * Author:          Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * Author URI:      imaginelabs.design
 * Contributors:    Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * Licence:         GPLv2 or later
 * Text Domain:     ilabs_mfp 
 * 
 * 
 * 
 * 
 * 
 * 
 * 
 */


 // Abort if this file is called directly
 if ( ! defined( 'WPINC' ) ) {
    die;
 }

/////////////////////// DEFINE CONSTANTS ///////////////////////////////
define( 'PLUGIN_ABSPATH', plugin_dir_path( __FILE__ ) ); 
define( 'PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'ILABS_MF_PLUGIN', __FILE__ );
/////////////////////// DEFINE CONSTANTS END ///////////////////////////////



//  echo plugin_dir_path(__FILE__) . 'inc/main.php';

 include( plugin_dir_path(__FILE__) . 'inc/main.php' );




// add settings link to plugin install page
function add_settings_link_to_plugin( $links ) {
// $settings_link = "<a href='admin.php?page=ilabs_mfp'>" . __( 'Settings', 'ilabs_mfp' ) . "</a>";
$url = esc_url( add_query_arg(
    'page',
    'ilabs_mfp',
    get_admin_url() . 'admin.php'
) );
// Create the link.
$settings_link = '<a href="' . $url . '">' . __( 'Settings', 'ilabs_mfp' ) . '</a>';
array_push( $links, $settings_link );
return $links;
}
$filter_name = 'plugin_action_links_' . plugin_basename( __FILE__ );
add_filter( $filter_name, 'add_settings_link_to_plugin' );


