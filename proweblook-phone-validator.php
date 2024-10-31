<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
/**
 * The Proweblook phone validator start file. Here we do initialize the plugin.
 *
 * Plugin Name: Proweblook Phone Validator
 * Plugin URI: https://proweblook.com/phone-number-validator
 * Description: Phone validation plugin. Works with Contact Form 7, Gravity Forms, WPForms, Ninja Forms and WooCommerce. For other 3rd party forms: add class='propp-phone' to all input fields you want to validate.
 * Version: 1.4.1
 * License: GPL2
 * Author: Proweblook
 * Author URI: https://proweblook.com/
 * Text Domain: proweblook-phone-validator
 * Domain Path: /languages
 *
 * @package Plugins
 **/

require_once(dirname(__FILE__) . '/src/functions.php');
require_once(dirname(__FILE__) . '/src/class-prop-plugin.php');
add_action('after_setup_theme', 'PROP_load', 11);

$plugin_data = get_file_data(__FILE__, array('Version' => 'Version'), false);
$plugin_version = $plugin_data['Version'];

define('PROP_PLUGIN_CURRENT_VERSION', $plugin_version);

/**
 * Initialize the plugin
 *
 * @return void
 */
function PROP_load()
{

	$plugin = PROP_Plugin::get_instance();
	$plugin->plugin_setup();
}
