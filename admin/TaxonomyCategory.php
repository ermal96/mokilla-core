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

class TaxonomyCategory
{
    const SLUG = 'cat';

    /**
     * Singleton instance
     *
     * @var TaxonomyCategory|null $instance This instance.
     */
    private static $instance = null;

    /**
     * TaxonomyCategory constructor.
     */
    private function __construct()
    {
    }

    /**
     * Get the singleton instance
     *
     * @return TaxonomyCategory
     */
    public static function get_instance(): TaxonomyCategory
    {
        if (is_null(self::$instance)) {
            $c              = __CLASS__;
            self::$instance = new $c();
        }

        return self::$instance;
    }


    /**
     * Creates Tax TaxonomyCategory.
     */
    public function create_tax()
    {

        $labels = array(
            'name'                       => _x( 'Categories', 'Taxonomy General Name', 'mokilla-core' ),
            'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'mokilla-core' ),
            'menu_name'                  => __( 'Categories', 'mokilla-core' ),
            'all_items'                  => __( 'All Categories', 'mokilla-core' ),
            'parent_item'                => __( 'Parent Category', 'mokilla-core' ),
            'parent_item_colon'          => __( 'Parent Category:', 'mokilla-core' ),
            'new_item_name'              => __( 'New Category Name', 'mokilla-core' ),
            'add_new_item'               => __( 'Add New Category', 'mokilla-core' ),
            'edit_item'                  => __( 'Edit Category', 'mokilla-core' ),
            'update_item'                => __( 'Update Category', 'mokilla-core' ),
            'view_item'                  => __( 'View Category', 'mokilla-core' ),
            'separate_items_with_commas' => __( 'Separate items with commas', 'mokilla-core' ),
            'add_or_remove_items'        => __( 'Add or remove items', 'mokilla-core' ),
            'choose_from_most_used'      => __( 'Choose from the most used', 'mokilla-core' ),
            'popular_items'              => __( 'Popular Categories', 'mokilla-core' ),
            'search_items'               => __( 'Search Categories', 'mokilla-core' ),
            'not_found'                  => __( 'Not Found', 'mokilla-core' ),
            'no_terms'                   => __( 'No items', 'mokilla-core' ),
            'items_list'                 => __( 'Categories list', 'mokilla-core' ),
            'items_list_navigation'      => __( 'Categories list navigation', 'mokilla-core' ),
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
