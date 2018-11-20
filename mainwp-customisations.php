<?php
/**
 * Plugin Name:       MainWP Customisations
 * Plugin URI:        https://mainwp.com
 * Description:       The purpose of this pulugin is to contain your customisation snippets for the MainWP Dashboard plugin, in order to avoid creting a custom extensions or using the functions.php file of your theeme. This plugi will help you to keep all your changes in one location and independent of the other components. This will enable you to safly updates of your plugins and themes without of worry of losing your modifications as well as deactivating your customizations if needed for troubleshooting.
 * Version:           1.0
 * Author:            MainWP
 * Author URI:        https://maiwnp.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Requires at least: 3.6
 * Tested up to:      5.0
 *  
 ************************************************************
 * This plugin has been inpired and built on:				*
 * Theme Customisations by WooThemes						*
 * https://github.com/woocommerce/theme-customisations		*
 ************************************************************
 *
 * @package	MainWP_Customisations
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main MainWP_Customisations Class
 *
 * @class MainWP_Customisations
 * @version	1.0
 * @since 1.0
 * @package	MainWP_Customisations
 */
final class MainWP_Customisations {

	/**
	 * Set up the plugin
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'mainwp_customisations_setup' ), -1 );
		require_once( 'custom/functions.php' );
	}

	/**
	 * Setup everything
	 */
	public function mainwp_customisations_setup() {
		add_action( 'admin_enqueue_scripts', array( $this, 'mainwp_customisations_css' ), 999 );
		add_action( 'admin_enqueue_scripts', array( $this, 'mainwp_customisations_js' ) );
	}

	/**
	 * Enqueue the Custom CSS
	 *
	 * @return void
	 */
	public function mainwp_customisations_css() {
		wp_enqueue_style( 'mainwp-custom-style', plugins_url( '/custom/mainwp-custom-style.css', __FILE__ ) );
	}

	/**
	 * Enqueue the Custom Javascript
	 *
	 * @return void
	 */
	public function mainwp_customisations_js() {
		wp_enqueue_script( 'custom-mainwp-js', plugins_url( '/custom/mainwp-custom-js.js', __FILE__ ), array( 'jquery' ) );
	}

} // End Class

/**
 * Main function
 *
 * @return void
 */
function start_mainwp_customisations() {
	new MainWP_Customisations();
}

/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', 'start_mainwp_customisations' );
