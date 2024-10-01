<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://ieproductions.com
 * @since      1.0.0
 *
 * @package    Ie_Acf_Display_By_Id
 * @subpackage Ie_Acf_Display_By_Id/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ie_Acf_Display_By_Id
 * @subpackage Ie_Acf_Display_By_Id/includes
 * @author     Ariel Cruz <ariel@ieproductions.com>
 */
class Ie_Acf_Display_By_Id_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ie-acf-display-by-id',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
