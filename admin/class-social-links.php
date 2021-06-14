<?php
/**
 * The social-specific functionality of the plugin.
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 */

namespace mokilla\mokilla_core_admin;

/**
 * The social-specific functionality of the plugin.
 *
 * Creates an option where to save social links of the website.
 * Use the static method to get the data outside of this plugin.
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 * @author     Serxhio Vrapi <v.serxhio@gmail.com>
 */
class Social_Links {

	/**
	 * Singleton instance
	 *
	 * @var Admin $instance This instance.
	 */
	private static $instance = null;

	/**
	 * Holds the values to be used in the fields callbacks
	 *
	 * @var $options
	 */
	private $options;

	/**
	 * Option name
	 *
	 * @var string OPTION_NAME
	 */
	const OPTION_NAME = 'mokilla-social-links';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	private function __construct() {

	}

	/**
	 * Get class instance
	 *
	 * @return Social_Links
	 */
	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			$c              = __CLASS__;
			self::$instance = new $c();
		}

		return self::$instance;
	}

	/**
	 * Add options page
	 */
	public function add_plugin_page() {
		add_menu_page(
			'Social Links Admin',
			'Social Links',
			'manage_options',
			self::OPTION_NAME,
			array( $this, 'create_admin_page' ),
			'dashicons-share',
			30
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		// Set class property.
		$this->options = get_option( self::OPTION_NAME );
		?>
		<div class="wrap">
			<h1>Links</h1>
			<form method="post" action="options.php">
				<?php
				// This prints out all hidden setting fields.
				settings_fields( self::OPTION_NAME . '_group' );
				do_settings_sections( self::OPTION_NAME . '_admin' );
				submit_button();
				?>
			</form>
		</div>
		<?php
	}

	/**
	 * Register and add settings
	 */
	public function page_init() {
		register_setting(
			self::OPTION_NAME . '_group', // Option group.
			self::OPTION_NAME, // Option name.
			array( $this, 'sanitize' ) // Sanitize.
		);

		add_settings_section(
			'setting_section_id', // ID.
			'', // Title.
			array( $this, 'print_section_info' ), // Callback.
			self::OPTION_NAME . '_admin' // Page.
		);

		add_settings_field(
			'facebook', // ID.
			'Facebook', // Title.
			array( $this, 'facebook_callback' ), // Callback.
			self::OPTION_NAME . '_admin', // Page.
			'setting_section_id' // Section.
		);

		add_settings_field(
			'twitter',
			'Twitter',
			array( $this, 'twitter_callback' ),
			self::OPTION_NAME . '_admin',
			'setting_section_id'
		);

		add_settings_field(
			'googleplus',
			'Google+',
			array( $this, 'googleplus_callback' ),
			self::OPTION_NAME . '_admin',
			'setting_section_id'
		);

		add_settings_field(
			'linkedin',
			'Linkedin',
			array( $this, 'linkedin_callback' ),
			self::OPTION_NAME . '_admin',
			'setting_section_id'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys.
	 * @return array $new_input
	 */
	public function sanitize( $input ) {
		$new_input = array();
		foreach ( $input as $key => $value ) {
			$new_input[ $key ] = sanitize_text_field( $value );
		}

		return $new_input;
	}

	/**
	 * Print the Section text
	 */
	public function print_section_info() {
		print 'Inserisci i link per i social:';
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function facebook_callback() {
		printf(
			'<input type="text" id="facebook" style="width: 400px" name="%s[facebook]" value="%s" />',
			self::OPTION_NAME,
			isset( $this->options['facebook'] ) ? esc_attr( $this->options['facebook'] ) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function twitter_callback() {
		printf(
			'<input type="text" id="twitter" style="width: 400px" name="%s[twitter]" value="%s" />',
			self::OPTION_NAME,
			isset( $this->options['twitter'] ) ? esc_attr( $this->options['twitter'] ) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function googleplus_callback() {
		printf(
			'<input type="text" id="googleplus" style="width: 400px" name="%s[googleplus]" value="%s" />',
			self::OPTION_NAME,
			isset( $this->options['googleplus'] ) ? esc_attr( $this->options['googleplus'] ) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function linkedin_callback() {
		printf(
			'<input type="text" id="linkedin" style="width: 400px" name="%s[linkedin]" value="%s" />',
			self::OPTION_NAME,
			isset( $this->options['linkedin'] ) ? esc_attr( $this->options['linkedin'] ) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public static function get_links() {
		return get_option(self::OPTION_NAME);
	}
}
