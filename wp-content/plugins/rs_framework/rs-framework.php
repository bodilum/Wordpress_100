<?php
/**
* Plugin Name: RS Framework
* Plugin URI: https://codecanyon.net/user/rs-theme
* Description: RS Framework plugin for page metabox
* Version: 1.0.1
* Author: RS Theme
* Author URI: http://www.rstheme.com
*/

// don't load directly
if ( ! defined( 'ABSPATH' ) ) {
    die( 'You shouldnt be here' );
}

/**
* Function when plugin is activated
*
* @param void
*
*/
//Including file that manages all template

//All Post type include here

$dir = plugin_dir_path( __FILE__ );
//For team
require_once $dir .'/metaboxes/page-header.php';
require_once $dir .'/metaboxes/rs-functions.php';
require_once $dir .'/metaboxes/cmb2/init.php';

/**
 * Implement widgets
 */
require_once $dir . '/inc/widgets/post_recent_widget.php';
require_once $dir . '/inc/widgets/recent_project_widget.php';
require_once $dir . '/inc/widgets/rs_contact.php';
require_once $dir . '/inc/widgets/rs_cta.php';
require_once $dir . '/inc/widgets/rs_brochures.php';
require_once $dir . '/inc/widgets/rs_contact_me.php';
require_once $dir . '/inc/widgets/rs_contact_off.php';
require_once $dir . '/inc/widgets/rs_flickr.php';
require_once $dir . '/inc/widgets/social-icon.php';


/* extra field at for user profile */

add_action( 'show_user_profile', 'rs_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'rs_show_extra_profile_fields' );

function rs_show_extra_profile_fields( $user ) { ?>
  <h3><?php  esc_html_e('Extra profile information', 'rs');?></h3>
  <table class="form-table">
    <tr>
      <th><label for="designation"><?php esc_html_e('Designation', 'rs');?></label></th>
      <td>
        <input type="text" name="designation" id="designation" value="<?php echo esc_attr( get_the_author_meta( 'designation', $user->ID ) ); ?>" class="regular-text" /><br />       
      </td>
    </tr>
    
  </table>
<?php }
/* update user profile field */
add_action( 'personal_options_update', 'rs_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'rs_save_extra_profile_fields' );

function rs_save_extra_profile_fields( $user_id ) {

  if ( !current_user_can( 'edit_user', $user_id ) )
    return false;
  update_user_meta( $user_id, 'designation', $_POST['designation'] );

}

//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
    }
endif;

function tekhub_file_types_to_uploads($file_types){
  $new_filetypes        = array();
  $new_filetypes['svg'] = 'image/svg+xml';
  $file_types           = array_merge($file_types, $new_filetypes );
  return $file_types;
}
add_filter('upload_mimes', 'tekhub_file_types_to_uploads');