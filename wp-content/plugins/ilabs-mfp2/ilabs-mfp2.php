<?php
/**
 * Plugin Name:       Ilabs Mouse Follow v2
 * Plugin URI:        imaginelabs.design
 * Description:       Plugin to add nice mouse follow effect to any wordpress theme v2
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.0.1
 * Author:            Bode Chris @ ILABS DESIGN (bodechrisdev@gmail.com)
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       ilabs-mfp2
 * Update URI:        imagine.design
 *
 * @package           ilabs-mfp2-ns
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function ilabs_mfp2_ns_ilabs_mfp2_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'ilabs_mfp2_ns_ilabs_mfp2_block_init' );
