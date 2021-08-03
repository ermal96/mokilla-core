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

class TaxonomyCountry
{
    const SLUG = 'country';

    /**
     * Singleton instance
     *
     * @var TaxonomyCountry|null $instance This instance.
     */
    private static $instance = null;

    /**
     * TaxonomyCountry constructor.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance
     *
     * @return TaxonomyCountry
     */
    public static function get_instance(): TaxonomyCountry
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }


    /**
     * Creates Tax TaxonomyCountry.
     */
    public function create_tax()
    {

        $labels = array(
            'name'                       => _x( 'Countries', 'Taxonomy General Name', 'mokilla-core' ),
            'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'mokilla-core' ),
            'menu_name'                  => __( 'Countries', 'mokilla-core' ),
            'all_items'                  => __( 'All Countries', 'mokilla-core' ),
            'parent_item'                => __( 'Parent Country', 'mokilla-core' ),
            'parent_item_colon'          => __( 'Parent Country:', 'mokilla-core' ),
            'new_item_name'              => __( 'New Country Name', 'mokilla-core' ),
            'add_new_item'               => __( 'Add New Country', 'mokilla-core' ),
            'edit_item'                  => __( 'Edit Country', 'mokilla-core' ),
            'update_item'                => __( 'Update Country', 'mokilla-core' ),
            'view_item'                  => __( 'View Country', 'mokilla-core' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'mokilla-core' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'mokilla-core' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'mokilla-core' ),
            'popular_items'              => __( 'Popular Countries', 'mokilla-core' ),
            'search_items'               => __( 'Search Countries', 'mokilla-core' ),
            'not_found'                  => __( 'Not Found', 'mokilla-core' ),
            'no_terms'                   => __( 'No items', 'mokilla-core' ),
            'items_list'                 => __( 'Countries list', 'mokilla-core' ),
            'items_list_navigation'      => __( 'Countries list navigation', 'mokilla-core' ),
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
