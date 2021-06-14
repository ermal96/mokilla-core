<?php
/**
 * The social links functionality of the plugin.
 *
 * @link       www.crispybacon.it
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/front
 */

namespace mokilla\mokilla_core_front;

/**
 * The social links functionality of the plugin.
 *
 * Create a widget, add the social links and decide to display the logo or the name of the social.
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/front
 * @author     Serxhio Vrapi <v.serxhio@gmail.com>
 */
class Social_Links extends \WP_Widget {

	/**
	 * Singleton instance
	 *
	 * @var Social_Links $instance This instance.
	 */
	private static $instance = null;

	const OPTION_NAME = 'cbwpt_social_links';

	/**
	 * The list of links
	 *
	 * @var array
	 */
	private $links;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		// TODO update the list of links only here.
		$this->links = array(
			'facebook',
			'instagram',
			'pinterest',
			'linkedin',
		);
		$widget_ops  = array(
			'classname'   => 'social_links',
			'description' => 'Social Links',
		);
		parent::__construct( self::OPTION_NAME, 'Social Links', $widget_ops );
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
	 * Register this widget
	 *
	 * @see widgets_init
	 */
	public function register_widget() {
		register_widget( $this );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : null;
		echo $args['before_widget'];

		if ( ! is_null( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		$html_links  = '';
		$format_link = '<li><a href="%s" target="_blank" rel="nofollow">%s</a></li>';
		foreach ( $this->links as $link ) {
			if ( ! empty( $instance[ $link ] ) ) {
				$content = ucfirst( $link );
				if ( ! empty( $instance['display_logo'] ) ) {
					$content = '<img src="' . dirname( plugin_dir_url( __FILE__ ) ) . '/images/' . $link . '-icon.svg' . '">';
				}
				$html_links .= sprintf( $format_link, $instance[ $link ], $content );
			}
		}
		echo '<ul>' . $html_links . '</ul>';

		echo $args['after_widget'];

	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options.
	 */
	public function form( $instance ) {
		$instance        = wp_parse_args(
			(array) $instance,
			array(
				'title'        => '',
				'display_logo' => '',
			)
		);
		$title_id        = $this->get_field_id( 'title' );
		$title_name      = $this->get_field_name( 'title' );
		$check_logo_id   = $this->get_field_id( 'display_logo' );
		$check_logo_name = $this->get_field_name( 'display_logo' );
		$format_title    = '<p><label for="%s">%s</label><input class="widefat" id="%s" name="%s" value="%s"/></p>';
		$format_links    = '<p><label for="%s">%s</label><input class="widefat" id="%s" name="%s" value="%s"/></p>';
		$format_check    = '<p><input type="checkbox" class="checkbox" id="%s" name="%s" %s/><label for="%s">%s</label></p>';

		$html_links = '';
		foreach ( $this->links as $link ) {
			$link_id   = $this->get_field_id( $link );
			$link_name = $this->get_field_name( $link );

			$html_links .= sprintf( $format_links, $link_id, ucfirst( $link ) . ':', $link_id, $link_name, ( isset( $instance[ $link ] ) ) ? $instance[ $link ] : '' );
		}

		echo sprintf( $format_title, $title_id, __( 'Title:', 'mokilla-core' ), $title_id, $title_name, esc_attr( $instance['title'] ) );
		echo $html_links;
		echo sprintf( $format_check, $check_logo_id, $check_logo_name, checked( $instance['display_logo'], true, false ), $check_logo_id, __( 'Display logo instead of name', 'mokilla-core' ) );
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance                 = $old_instance;
		$new_instance             = wp_parse_args(
			(array) $new_instance,
			array(
				'title'        => '',
				'display_logo' => '',
			)
		);
		$instance['title']        = sanitize_text_field( $new_instance['title'] );
		$instance['display_logo'] = $new_instance['display_logo'] ? 1 : 0;
		foreach ( $this->links as $link ) {
			$instance[ $link ] = $new_instance[ $link ];
		}

		return $instance;
	}

}
