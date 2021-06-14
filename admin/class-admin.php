<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 */

namespace mokilla\mokilla_core_admin;

use const mokilla\mokilla_core\PLUGIN_NAME;

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 * @author     Serxhio Vrapi <support@crispybacon.it>
 */
class Admin {

	/**
	 * Singleton instance
	 *
	 * @var Admin $instance This instance.
	 */
	private static $instance = null;

	/**
	 * Administration page title
	 *
	 * @var string
	 */
	private $page_title;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	private function __construct() {
		$this->page_title  = 'Mokilla Core';
	}

	/**
	 * Get class instance
	 *
	 * @return Admin
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style(
			PLUGIN_NAME,
			plugin_dir_url( __FILE__ ) . 'css/admin.css',
			array(),
			filemtime( plugin_dir_path( __FILE__ ) . 'css/admin.css' ),
			'all'
		);

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script(
			PLUGIN_NAME,
			plugin_dir_url( __FILE__ ) . 'js/admin.js',
			array( 'jquery' ),
			filemtime( plugin_dir_path( __FILE__ ) . 'js/admin.js' ),
			true
		);

	}

	/**
	 * Add options page
	 */
	public function add_admin_page() {
		add_menu_page(
			$this->page_title,
			$this->page_title,
			'edit_posts',
			PLUGIN_NAME,
			array( $this, 'create_admin_page' ),
			'dashicons-admin-generic',
			31
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		include plugin_dir_path( __FILE__ ) . '/partials/admin-display.php';
	}

}
