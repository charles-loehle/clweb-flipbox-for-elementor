<?php 
/**
 * Plugin Name: CL Web Elementor Flipbox2 
 * Description: This plugin adds a flip box widget to the Elementor page builder plugin.
 * Plugin URI:  https://clwebdevelopment.com
 * Version:    1.0.0
 * Author:      Charles Loehle
 * Author URI:  https://clwebdevelopment.com
 * Text Domain: clweb-elementor-flipbox2 
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

function register_clweb_elementor_flipbox2($widgets_manager) {
	require_once(__DIR__ . '/widgets/clweb-elementor-flipbox2.php');

	$widgets_manager->register(new \CLWeb_Elementor_Flipbox2());
}
add_action('elementor/widgets/register', 'register_clweb_elementor_flipbox2');