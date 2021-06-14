<?php
/**
 * The contact-specific functionality of the plugin.
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 */

namespace mokilla\mokilla_core_admin;

/**
 * The contact-specific functionality of the plugin.
 *
 * Creates an option where to save the "from" address email and
 * the from "name" for the emails sent out by WordPress
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 * @author     Serxhio Vrapi <support@crispybacon.it>
 */
class Change_WP_Contacts {

	/**
	 * Singleton instance
	 *
	 * @var Admin $instance This instance.
	 */
	private static $instance = null;

	/**
	 * Holds the values to be used in the fields callbacks
	 *
	 * @var array $options
	 */
	private $options;

	/**
	 * Option name
	 *
	 * @var string $option_name
	 */
	const OPTION_NAME = 'mokilla-change-wp-contacts';

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
	 * @return Change_WP_Contacts
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
			'Change WP Contacts',
			'Change WP Contacts',
			'manage_options',
			self::OPTION_NAME,
			array( $this, 'create_admin_page' ),
			'dashicons-email-alt',
			30
		);
	}

	/**
	 * Options page callback
	 */
	public function create_admin_page() {
		$this->options = get_option( self::OPTION_NAME );
		?>
		<div class="wrap">
			<h1>Change WP Contacts</h1>
			<form method="post" action="options.php">
				<?php
				settings_fields( self::OPTION_NAME . '-group' );
				do_settings_sections( self::OPTION_NAME . '-admin' );
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
			self::OPTION_NAME . '-group', // Option group.
			self::OPTION_NAME, // Option name.
			array( $this, 'sanitize' ) // Sanitize.
		);

		add_settings_section(
			'setting_section_id', // ID.
			'', // Title.
			array( $this, 'print_section_info' ), // Callback.
			self::OPTION_NAME . '-admin' // Page.
		);

		add_settings_field(
			'email', // ID.
			'Email che manda i messaggi dal sito', // Title.
			array( $this, 'email_callback' ), // Callback.
			self::OPTION_NAME . '-admin', // Page.
			'setting_section_id' // Section.
		);

		add_settings_field(
			'name',
			'Nome associato all\'email',
			array( $this, 'name_callback' ),
			self::OPTION_NAME . '-admin',
			'setting_section_id'
		);
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys.
	 *
	 * @return array
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
		print 'Inserire i seguenti dati per sovrascrivere quelli di default di WordPress';
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function email_callback() {
		printf(
			'<input type="text" id="email" style="width: 400px" name="' . self::OPTION_NAME . '[email]" value="%s" required />',
			isset( $this->options['email'] ) ? esc_attr( $this->options['email'] ) : ''
		);
	}

	/**
	 * Get the settings option array and print one of its values
	 */
	public function name_callback() {
		printf(
			'<input type="text" id="name" style="width: 400px" name="' . self::OPTION_NAME . '[name]" value="%s" required />',
			isset( $this->options['name'] ) ? esc_attr( $this->options['name'] ) : ''
		);
	}

	/**
	 * Return the new sender email
	 *
	 * @param string $original_email_address The default email address.
	 *
	 * @return mixed
	 */
	public function sender_email( $original_email_address ) {
		$option = get_option( self::OPTION_NAME );
		if ( isset( $option['email'] ) && ! empty( $option['email'] ) && false !== strpos( $original_email_address, 'wordpress@' ) ) {
			return $option['email'];
		}

		return $original_email_address;
	}

	/**
	 * Return the sender new name
	 *
	 * @param string $original_email_from The default name.
	 *
	 * @return mixed
	 */
	public function sender_name( $original_email_from ) {
		$option = get_option( self::OPTION_NAME );
		if ( isset( $option['name'] ) && ! empty( $option['name'] ) && false !== strpos( $original_email_from, 'WordPress' ) ) {
			return $option['name'];
		}

		return $original_email_from;
	}

}
