<?php
/**
 * The social-specific functionality of the plugin.
 *
 * @link       v.serxhio@gmail.com
 * @since      1.0.0
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/admin
 */


namespace mokilla\mokilla_core_admin;


/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mokilla_Core
 * @subpackage Mokilla_Core/Admin
 * @author     Serxhio Vrapi <v.serxhio@gmail.com>
 */
class CategoryAcf
{

    /**
     * Singleton instance
     *
     * @var CategoryAcf $instance This instance.
     */
    private static $instance = null;

    /**
     * Constants
     */
    const ACF_CAT_IMAGE = 'mokilla_category_image';

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    private function __construct()
    {
       $this->create_acf_group();
    }

    /**
     * Get class instance
     *
     * @return CategoryAcf
     */
    public static function get_instance()
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }

    /**
     * Creates ACF service group
     *
     * @return void
     */
    public function create_acf_group()
    {
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_60c9f2328988d',
                'title' => 'Category Options',
                'fields' => array(
                    array(
                        'key' => 'field_60c9f24923514',
                        'label' => 'Category Image',
                        'name' => self::ACF_CAT_IMAGE,
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'medium',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'taxonomy',
                            'operator' => '==',
                            'value' => 'category',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen' => '',
                'active' => true,
                'description' => '',
            ));
            
            endif;
    }
}
