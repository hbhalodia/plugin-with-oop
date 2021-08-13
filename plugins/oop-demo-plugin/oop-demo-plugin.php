<?php
/**
 * OOP Demo Plugin
 *
 * @package           oop-demo-plugin
 * @author            Hit Bhalodia
 * @copyright         2021 rtCamp
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 *
 * Plugin Name:       OOP Demo Plugin
 * Plugin URI:        https://example.com/plugin-name
 * Description:       This plugin is developed to test the OOP concepts.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Hit Bhalodia
 * Author URI:        https://example.com
 * Text Domain:       oop-demo-plugin
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

defined( 'ABSPATH' ) || die( 'Hey You are not supposed to do it here !' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Defining the constant
 */
define( 'OOP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'OOP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_NAME', plugin_basename( __FILE__ ) );
define( 'OOP_SCRIPT_STYLE_VERSION', '1.0.0' );

/**
 * Function to register the Activation hook.
 *
 * @return void
 */
function oop_activate_plugin() {

	require_once OOP_PLUGIN_PATH . 'inc/base/class-activate.php';
	Activate::activate();

}

register_activation_hook( __FILE__, 'oop_activate_plugin' );

/**
 * Function to register the Deactivation hook.
 *
 * @return void
 */
function oop_deactivate_plugin() {

	require_once OOP_PLUGIN_PATH . 'inc/base/class-deactivate.php';
	Deactivate::deactivate();

}

register_deactivation_hook( __FILE__, 'oop_deactivate_plugin' );


if ( ! class_exists( 'Init' ) ) {

	require_once OOP_PLUGIN_PATH . 'inc/class-init.php';

	Init::register_services();

}


