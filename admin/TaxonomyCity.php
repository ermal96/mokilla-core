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

class TaxonomyCity
{
    const SLUG = 'city';

    /**
     * Singleton instance
     *
     * @var TaxonomyCity|null $instance This instance.
     */
    private static $instance = null;

    /**
     * TaxonomyCity constructor.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance
     *
     * @return TaxonomyCity
     */
    public static function get_instance(): TaxonomyCity
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }


    /**
     * Creates Tax TaxonomyCity.
     */
    public function create_tax()
    {

        $labels = array(
            'name'                       => _x( 'Cities', 'Taxonomy General Name', 'mokilla-core' ),
            'singular_name'              => _x( 'City', 'Taxonomy Singular Name', 'mokilla-core' ),
            'menu_name'                  => __( 'Cities', 'mokilla-core' ),
            'all_items'                  => __( 'All Cities', 'mokilla-core' ),
            'parent_item'                => __( 'Parent City', 'mokilla-core' ),
            'parent_item_colon'          => __( 'Parent City:', 'mokilla-core' ),
            'new_item_name'              => __( 'New City Name', 'mokilla-core' ),
            'add_new_item'               => __( 'Add New City', 'mokilla-core' ),
            'edit_item'                  => __( 'Edit City', 'mokilla-core' ),
            'update_item'                => __( 'Update City', 'mokilla-core' ),
            'view_item'                  => __( 'View City', 'mokilla-core' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'mokilla-core' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'mokilla-core' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'mokilla-core' ),
            'popular_items'              => __( 'Popular Cities', 'mokilla-core' ),
            'search_items'               => __( 'Search Cities', 'mokilla-core' ),
            'not_found'                  => __( 'Not Found', 'mokilla-core' ),
            'no_terms'                   => __( 'No items', 'mokilla-core' ),
            'items_list'                 => __( 'Cities list', 'mokilla-core' ),
            'items_list_navigation'      => __( 'Cities list navigation', 'mokilla-core' ),
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
