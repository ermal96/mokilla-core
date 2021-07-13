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

class PostTypeListings
{
    const SLUG = 'listings';
    const ACF_PHONE_NUMBER = 'mokilla_phone_number';
    const ACF_EMAIL = 'mokilla_email';
    const ACF_WEBSITE = 'mokilla_website';
    const ACF_PRICE = 'mokilla_price';
    const ACF_AVAILABILITY_TIME = 'mokilla_availability_time';
    const ACF_MONDAY = 'mokilla_monday';
    const ACF_TUESDAY = 'mokilla_tuesday';
    const ACF_WEDNESDAY = 'mokilla_wednesday';
    const ACF_THURSDAY = 'mokilla_thursday';
    const ACF_FRIDAY = 'mokilla_friday';
    const ACF_SATURDAY = 'mokilla_saturday';
    const ACF_SUNDAY = 'mokilla_sunday';
    const ACF_PARKING = 'mokilla_parking_capacity';
    const ACF_PETS = 'mokilla_pets_allowed';
    const ACF_ADDRESS = 'mokilla_address';

    /**
     * Singleton instance
     *
     * @var PostTypeListings|null $instance This instance.
     */
    private static $instance = null;

    /**
     * PostTypeListings constructor.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance
     *
     * @return PostTypeListings
     */
    public static function get_instance(): PostTypeListings
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }


    /**
     * Creates custom post type ListingPostType.
     */
    public function create_cpt()
    {
        register_post_type(
            self::SLUG,
            array(
                'labels'              => array(
                    'name'                  => __('Listings', 'mokilla-core'),
                    'singular_name'         => __('Listings', 'mokilla-core'),
                    'edit_item'             => __('Edit Listing', 'mokilla-core'),
                    'new_item'              => __('Add Listing', 'mokilla-core'),
                    'view_item'             => __('View Listing', 'mokilla-core'),
                    'search_items'          => __('Search Listing', 'mokilla-core'),
                    'not_found'             => __('Listing Not Found', 'mokilla-core'),
                    'all_items'             => __('All Listings', 'mokilla-core'),
                    'archives'              => __('Listings Archives', 'mokilla-core'),
                    'attributes'            => __('Listings Attributes', 'mokilla-core'),
                    'insert_into_item'      => __('Insert Into Listings', 'mokilla-core'),
                    'featured_image'        => __('Image Listing', 'mokilla-core'),
                    'set_featured_image'    => __('Set Listing Image', 'mokilla-core'),
                    'remove_featured_image' => __('Remove Listing Image', 'mokilla-core'),
                    'item_published'        => __('Listing Published', 'mokilla-core'),
                    'item_updated'          => __('Listing Updated', 'mokilla-core'),
                ),
                'menu_icon'                 => 'dashicons-grid-view',
                'show_in_rest'              => true,
                'public'                    => true,
                'has_archive'               => true,
                'with_front'                => true,
                'publicly_queryable'        => true,
                'exclude_from_search'       => false,
                'taxonomies'                => array('category', 'post_tag'),
                'supports'                  => array(
                    'title',
                    'editor',
                    'thumbnail',
                    'revisions',
                    'custom-fields',
                    'page-attributes',
                    'post-formats',
                    'excerpt',
                ),
            )
        );
    }


    public function init_acf_fields() {
        if( function_exists('acf_add_local_field_group') ):

            acf_add_local_field_group(array(
                'key' => 'group_60edd0fc3e5db',
                'title' => 'Listing Options',
                'fields' => array(
                    array(
                        'key' => 'field_60edd1460a4d4',
                        'label' => 'Phone Number',
                        'name' => self::ACF_PHONE_NUMBER,
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_60edd16cd870a',
                        'label' => 'Email',
                        'name' => self::ACF_EMAIL,
                        'type' => 'email',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                    ),
                    array(
                        'key' => 'field_60edd18425128',
                        'label' => 'Website',
                        'name' => self::ACF_WEBSITE,
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_60edd1c6ec993',
                        'label' => 'Price',
                        'name' => self::ACF_PRICE,
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_60edd21272217',
                        'label' => 'Availability Time',
                        'name' => self::ACF_AVAILABILITY_TIME,
                        'type' => 'group',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'layout' => 'block',
                        'sub_fields' => array(
                            array(
                                'key' => 'field_60edd23572218',
                                'label' => 'Monday',
                                'name' => self::ACF_MONDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60edd24572219',
                                'label' => 'Tuesday',
                                'name' => self::ACF_TUESDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60edd2567221a',
                                'label' => 'Wednesday',
                                'name' => self::ACF_WEDNESDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60edd2657221b',
                                'label' => 'Thursday',
                                'name' => self::ACF_THURSDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60edd2747221c',
                                'label' => 'Friday',
                                'name' => self::ACF_FRIDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60edd2847221d',
                                'label' => 'Saturday',
                                'name' => self::ACF_SATURDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                            array(
                                'key' => 'field_60edd29a7221e',
                                'label' => 'Sunday',
                                'name' => self::ACF_SUNDAY,
                                'type' => 'text',
                                'instructions' => '',
                                'required' => 0,
                                'conditional_logic' => 0,
                                'wrapper' => array(
                                    'width' => '',
                                    'class' => '',
                                    'id' => '',
                                ),
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'maxlength' => '',
                            ),
                        ),
                    ),
                    array(
                        'key' => 'field_60edd30f1eed7',
                        'label' => 'Parking Capacity',
                        'name' => self::ACF_PARKING,
                        'type' => 'number',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'min' => '',
                        'max' => '',
                        'step' => '',
                    ),
                    array(
                        'key' => 'field_60edd32c7d775',
                        'label' => 'Pets Allowed',
                        'name' => self::ACF_PETS,
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui' => 1,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ),
                    array(
                        'key' => 'field_60edd54ed522f',
                        'label' => 'Address',
                        'name' => self::ACF_ADDRESS,
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'listings',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'side',
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
