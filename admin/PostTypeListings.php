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


}
