<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ieproductions.com
 * @since             1.0.0
 * @package           Ie_Acf_Display_By_Id
 *
 * @wordpress-plugin
 * Plugin Name:       IE ACF Display by ID
 * Plugin URI:        https://ieproductions.com
 * Description:       Creating a simple WordPress plugin to retrieve and display ACF field values based on a product_id URL parameter
 * Version:           1.0.0
 * Author:            Ariel Cruz
 * Author URI:        https://ieproductions.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ie-acf-display-by-id
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'IE_ACF_DISPLAY_BY_ID_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ie-acf-display-by-id-activator.php
 */
function activate_ie_acf_display_by_id() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ie-acf-display-by-id-activator.php';
	Ie_Acf_Display_By_Id_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ie-acf-display-by-id-deactivator.php
 */
function deactivate_ie_acf_display_by_id() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ie-acf-display-by-id-deactivator.php';
	Ie_Acf_Display_By_Id_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ie_acf_display_by_id' );
register_deactivation_hook( __FILE__, 'deactivate_ie_acf_display_by_id' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ie-acf-display-by-id.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ie_acf_display_by_id() {

	$plugin = new Ie_Acf_Display_By_Id();
	$plugin->run();

}
run_ie_acf_display_by_id();
