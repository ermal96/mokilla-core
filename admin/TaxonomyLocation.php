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

use mokilla\mokilla_core_admin\PostTypeListings;

class TaxonomyLocation
{
    const SLUG = 'location';

    /**
     * Singleton instance
     *
     * @var TaxonomyLocation|null $instance This instance.
     */
    private static $instance = null;

    /**
     * TaxonomyLocation constructor.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance
     *
     * @return TaxonomyLocation
     */
    public static function get_instance(): TaxonomyLocation
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }


    /**
     * Creates Tax TaxonomyLocation.
     */
    public function create_tax()
    {

        $labels = array(
            'name'                       => _x( 'Locations', 'Taxonomy General Name', 'mokilla-core' ),
            'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'mokilla-core' ),
            'menu_name'                  => __( 'Locations', 'mokilla-core' ),
            'all_items'                  => __( 'All Locations', 'mokilla-core' ),
            'parent_item'                => __( 'Parent Location', 'mokilla-core' ),
            'parent_item_colon'          => __( 'Parent Location:', 'mokilla-core' ),
            'new_item_name'              => __( 'New Location Name', 'mokilla-core' ),
            'add_new_item'               => __( 'Add New Location', 'mokilla-core' ),
            'edit_item'                  => __( 'Edit Location', 'mokilla-core' ),
            'update_item'                => __( 'Update Location', 'mokilla-core' ),
            'view_item'                  => __( 'View Location', 'mokilla-core' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'mokilla-core' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'mokilla-core' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'mokilla-core' ),
            'popular_items'              => __( 'Popular Locations', 'mokilla-core' ),
            'search_items'               => __( 'Search Locations', 'mokilla-core' ),
            'not_found'                  => __( 'Not Found', 'mokilla-core' ),
            'no_terms'                   => __( 'No items', 'mokilla-core' ),
            'items_list'                 => __( 'Locations list', 'mokilla-core' ),
            'items_list_navigation'      => __( 'Locations list navigation', 'mokilla-core' ),
        );
            $args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
            );
            register_taxonomy( self::SLUG, array( PostTypeListings::SLUG ), $args );

    }

    

}
