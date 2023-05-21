<?php
/**
 * 
 * ILABS UNSPLASH PHOTOS PLUGIN
 * 
 * @package         ILABS_UPP
 * @author          Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * 
 * 
 * @wordpress-plugin
 * Plugin Name:     Ilabs Unsplash Photos
 * Plugin URI:      imaginelabs.design
 * Description:     Plugin to display unsplash photos from a specified account and number of tweets
 * Version:         0.0.1
 * Author:          Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * Author URI:      imaginelabs.design
 * Contributors:    Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * Licence:         GPLv2 or later
 * Text Domain:     ilabs_upp 
 * 
 * 
 * 
 * 
 */


 // Abort if this file is called directly
 if ( ! defined( 'WPINC' ) ) {
    die;
 }


 include( plugin_dir_path(__FILE__) . 'inc/main.php' );