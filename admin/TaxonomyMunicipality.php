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

class TaxonomyMunicipality
{
    const SLUG = 'municipality';

    /**
     * Singleton instance
     *
     * @var TaxonomyMunicipality|null $instance This instance.
     */
    private static $instance = null;

    /**
     * TaxonomyMunicipality constructor.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance
     *
     * @return TaxonomyMunicipality
     */
    public static function get_instance(): TaxonomyMunicipality
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }


    /**
     * Creates Tax TaxonomyMunicipality.
     */
    public function create_tax()
    {

        $labels = array(
            'name'                       => _x( 'Municipalitys', 'Taxonomy General Name', 'mokilla-core' ),
            'singular_name'              => _x( 'Municipality', 'Taxonomy Singular Name', 'mokilla-core' ),
            'menu_name'                  => __( 'Municipalitys', 'mokilla-core' ),
            'all_items'                  => __( 'All Municipalitys', 'mokilla-core' ),
            'parent_item'                => __( 'Parent Municipality', 'mokilla-core' ),
            'parent_item_colon'          => __( 'Parent Municipality:', 'mokilla-core' ),
            'new_item_name'              => __( 'New Municipality Name', 'mokilla-core' ),
            'add_new_item'               => __( 'Add New Municipality', 'mokilla-core' ),
            'edit_item'                  => __( 'Edit Municipality', 'mokilla-core' ),
            'update_item'                => __( 'Update Municipality', 'mokilla-core' ),
            'view_item'                  => __( 'View Municipality', 'mokilla-core' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'mokilla-core' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'mokilla-core' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'mokilla-core' ),
            'popular_items'              => __( 'Popular Municipalitys', 'mokilla-core' ),
            'search_items'               => __( 'Search Municipalitys', 'mokilla-core' ),
            'not_found'                  => __( 'Not Found', 'mokilla-core' ),
            'no_terms'                   => __( 'No items', 'mokilla-core' ),
            'items_list'                 => __( 'Municipalitys list', 'mokilla-core' ),
            'items_list_navigation'      => __( 'Municipalitys list navigation', 'mokilla-core' ),
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
