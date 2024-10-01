<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ieproductions.com
 * @since      1.0.0
 *
 * @package    Ie_Acf_Display_By_Id
 * @subpackage Ie_Acf_Display_By_Id/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ie_Acf_Display_By_Id
 * @subpackage Ie_Acf_Display_By_Id/public
 * @author     Ariel Cruz <ariel@ieproductions.com>
 */
class Ie_Acf_Display_By_Id_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ie_Acf_Display_By_Id_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ie_Acf_Display_By_Id_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ie-acf-display-by-id-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ie_Acf_Display_By_Id_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ie_Acf_Display_By_Id_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ie-acf-display-by-id-public.js', array( 'jquery' ), $this->version, false );

	}

	public function enqueue_shortcode() {

		add_shortcode( 'ie-post-id', array($this, 'display_post_id') );

	}

	// Get the post id from the current post
	public function display_post_id() {
		return get_the_ID();
	}

	function acf_display_by_id() {

		wp_register_script($this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ie-acf-display-by-id-public.js', array( 'jquery' ), $this->version, false);
		wp_enqueue_script($this->plugin_name);

		$field_value_data = array(
			'is_ie_product' => false,
		);

		if (strpos($_SERVER['REQUEST_URI'], '/request-quote/') !== false && isset($_GET['product_id'])) {
			$product_id = intval($_GET['product_id']); // Sanitize the product ID
			$acf_field_name_title = 'title'; // Replace with your actual ACF field name
			$acf_field_name_desc = 'description'; // Replace with your actual ACF field name
			$acf_field_name_beds = 'beds'; // Replace with your actual ACF field name
			$acf_field_name_baths = 'baths'; // Replace with your actual ACF field name
			$acf_field_name_sq_ft = 'sq_ft'; // Replace with your actual ACF field name
	
			$field_value_data = array(
				'is_ie_product' => true,
				'ie_title' => get_field($acf_field_name_title, $product_id), 
				'ie_desc' => get_field($acf_field_name_desc, $product_id), 
				'ie_beds' => get_field($acf_field_name_beds, $product_id), 
				'ie_baths' => get_field($acf_field_name_baths, $product_id), 
				'ie_sq_ft' => get_field($acf_field_name_sq_ft, $product_id), 
			);

			
		}

		wp_localize_script($this->plugin_name, 'ie_product_info', $field_value_data);
	}
}
