<?php

/**
 * Register custom post types
 */
function carpel_anther_custom_type_products()
{
    $labels = array(
        'name'                  => _x('Products', 'Product General Name', 'text_domain'),
        'singular_name'         => _x('Product', 'Product Singular Name', 'text_domain'),
        'menu_name'             => __('Products', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Products', 'text_domain'),
        'description'           => __('Carpel Anther Products', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'rewrite'               => array( 'slug' => 'project', 'with_front' => false ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );
    register_post_type('projects', $args);
}
add_action('init', 'carpel_anther_custom_type_products', 0);

?>
