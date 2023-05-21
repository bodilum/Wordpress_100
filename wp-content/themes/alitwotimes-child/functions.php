<?php
/**
 * ImaginLabs Alitwotimes child theme function
 * 
 * @link https://www.imaginelabs.design
 * 
 * @package ImaginLabs Themes
 * 
 * 
 */

 if(!function_exists(importThemeStyles)) {
    function importThemeStyles() {

        wp_register_style('main_css', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('main_css');

        wp_register_style('child_css', get_stylesheet_directory_uri() . '/style.css');
        wp_enqueue_style('child_css');
        
    }
    add_action('wp_enqueue_scripts', 'importThemeStyles', 10);
 }