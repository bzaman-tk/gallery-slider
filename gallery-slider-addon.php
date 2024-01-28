<?php
/**
 * Plugin Name: Gallery Slider Addon
 * Description: Gallery Slider Addon
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Iftekhar Rahman
 * Author URI:  https://iftekharrahman.com/
 * Text Domain: equity-addon
 * 
 * Elementor tested up to:     3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function gallery_slider_addon() {

	// Load plugin file
	require_once( __DIR__ . '/includes/plugin.php' );

	// Run the plugin
	\Gallery_Slider_Addon\Plugin::instance();

}
add_action( 'plugins_loaded', 'gallery_slider_addon' );