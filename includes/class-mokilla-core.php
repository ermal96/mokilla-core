<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       v.serxhio@gmail.com
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/includes
 */

namespace mokilla\mokilla_core_includes;

use mokilla\mokilla_core_admin\Social_Links;
use mokilla\mokilla_core_admin\CategoryAcf;
use mokilla\mokilla_core_admin\PostTypeListings;
use mokilla\mokilla_core_admin\TaxonomyLocation;
use mokilla\mokilla_core_admin\TaxonomyFeature;
use mokilla\mokilla_core_admin\TaxonomyCity;
use mokilla\mokilla_core_admin\TaxonomyCategory;
use mokilla\mokilla_core_admin\TaxonomyCountry;

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/includes
 * @author     Serxhio Vrapi <v.serxhio@gmail.com>
 */
class Mokilla_Core {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Loader $loader Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $plugin_name The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string $version The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'MOKILLA_CORE_VERSION' ) ) {
			$this->version = MOKILLA_CORE_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'mokilla-core';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_front_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		$this->loader = new Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the I18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_social     		= Social_Links::get_instance();
		$plugin_category   		= CategoryAcf::get_instance();
		$plugin_cpt_listings  	= PostTypeListings::get_instance();
		$plugin_tax_location   	= TaxonomyLocation::get_instance();
		$plugin_tax_feature   	= TaxonomyFeature::get_instance();
		$plugin_tax_city   		= TaxonomyCity::get_instance();
		$plugin_tax_category   	= TaxonomyCategory::get_instance();
		$plugin_tax_country   	= TaxonomyCountry::get_instance();

		$this->loader->add_action( 'admin_menu', $plugin_social, 'add_plugin_page' );
		$this->loader->add_action( 'admin_init', $plugin_social, 'page_init' );
		$this->loader->add_action( 'init', $plugin_cpt_listings, 'create_cpt' );
		$this->loader->add_action( 'init', $plugin_tax_country, 'create_tax' );
		$this->loader->add_action( 'init', $plugin_tax_city, 'create_tax' );
		$this->loader->add_action( 'init', $plugin_tax_location, 'create_tax' );
		$this->loader->add_action( 'init', $plugin_tax_category, 'create_tax' );
		$this->loader->add_action( 'init', $plugin_tax_feature, 'create_tax' );
		
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_front_hooks() {

		$plugin_social_links = \mokilla\mokilla_core_front\Social_Links::get_instance();

		$this->loader->add_action( 'widgets_init', $plugin_social_links, 'register_widget' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
