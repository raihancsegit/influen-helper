<?php
//service post type
function influen_register_service_type()
{
    $labels = array(
        'name'                  => esc_html_x('Services', 'Services', 'influen'),
        'singular_name'         => esc_html_x('Service', 'Service', 'influen'),
        'menu_name'             => esc_html__('Services', 'influen'),
        'name_admin_bar'        => esc_html__('Services', 'influen'),
        'parent_item_colon'     => esc_html__('Parent Service:', 'influen'),
        'all_items'             => esc_html__('All Services', 'influen'),
        'add_new_item'          => esc_html__('Add New Service', 'influen'),
        'add_new'               => esc_html__('Add Service', 'influen'),
        'new_item'              => esc_html__('New Service', 'influen'),
        'edit_item'             => esc_html__('Edit Service', 'influen'),
        'update_item'           => esc_html__('Update Service', 'influen'),
        'view_item'             => esc_html__('View Service', 'influen'),
        'search_items'          => esc_html__('Search Service', 'influen'),
        'not_found'             => esc_html__('Not found', 'influen'),
        'not_found_in_trash'    => esc_html__('Not found in Trash', 'influen'),
        'items_list'            => esc_html__('Services list', 'influen'),
        'items_list_navigation' => esc_html__('Services list navigation', 'influen'),
        'filter_items_list'     => esc_html__('Filter Services list', 'influen'),
    );

    $args = array(
        'label'               => esc_html__('Service', 'influen'),
        'description'         => esc_html__('Service Post Type', 'influen'),
        'labels'              => $labels,
        'supports'            => array('title', 'editor', 'thumbnail'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 22,
        'menu_icon'           => 'dashicons-admin-page',
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'exclude_from_search' => true,
        'capability_type'     => 'post',
    );

    register_post_type('service', $args);
}
add_action('init','influen_register_service_type');


function influen_register_service_category()
{
    $labels = array(
        'name' => esc_html_x('Service Categories', 'Taxonomy General Name', 'influen'),
        'singular_name' => esc_html_x('Service Category ', 'Taxonomy Singular Name', 'influen'),
        'menu_name' => esc_html__('Service Category', 'influen'),
        'all_items' => esc_html__('All Categories', 'influen'),
        'parent_item' => esc_html__('Parent Category', 'influen'),
        'parent_item_colon' => esc_html__('Parent Category:', 'influen'),
        'new_item_name' => esc_html__('New Category Name', 'influen'),
        'add_new_item' => esc_html__('Add New Category', 'influen'),
        'edit_item' => esc_html__('Edit Category', 'influen'),
        'update_item' => esc_html__('Update Category', 'influen'),
        'view_item' => esc_html__('View Category', 'influen'),
        'separate_items_with_commas' => esc_html__('Separate category with commas', 'influen'),
        'add_or_remove_items' => esc_html__('Add or remove category', 'influen'),
        'choose_from_most_used' => esc_html__('Choose from the most used', 'influen'),
        'popular_items' => esc_html__('Popular Category', 'influen'),
        'search_items' => esc_html__('Search Category', 'influen'),
        'not_found' => esc_html__('Not Found', 'influen'),
        'no_terms' => esc_html__('No Category', 'influen'),
        'items_list' => esc_html__('Category list', 'influen'),
        'items_list_navigation' => esc_html__('Category list navigation', 'influen'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );
    register_taxonomy('service-category', array('service'), $args);
}
add_action('init', 'influen_register_service_category');


//team post type
function influen_register_team_type()
{
    $labels = array(
        'name'                  => esc_html_x('Team', 'Team', 'influen'),
        'singular_name'         => esc_html_x('Team', 'Team', 'influen'),
        'menu_name'             => esc_html__('Team', 'influen'),
        'name_admin_bar'        => esc_html__('Team', 'influen'),
        'parent_item_colon'     => esc_html__('Parent Team:', 'influen'),
        'all_items'             => esc_html__('All Team', 'influen'),
        'add_new_item'          => esc_html__('Add New Team', 'influen'),
        'add_new'               => esc_html__('Add Team', 'influen'),
        'new_item'              => esc_html__('New Team', 'influen'),
        'edit_item'             => esc_html__('Edit Team', 'influen'),
        'update_item'           => esc_html__('Update Team', 'influen'),
        'view_item'             => esc_html__('View Team', 'influen'),
        'search_items'          => esc_html__('Search Team', 'influen'),
        'not_found'             => esc_html__('Not found', 'influen'),
        'not_found_in_trash'    => esc_html__('Not found in Trash', 'influen'),
        'items_list'            => esc_html__('Team list', 'influen'),
        'items_list_navigation' => esc_html__('Team list navigation', 'influen'),
        'filter_items_list'     => esc_html__('Filter Team list', 'influen'),
    );

    $args = array(
        'label'               => esc_html__('Team', 'influen'),
        'description'         => esc_html__('Team Post Type', 'influen'),
        'labels'              => $labels,
        'supports'            => array('title', 'thumbnail'),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 22,
        'menu_icon'           => 'dashicons-admin-page',
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'exclude_from_search' => true,
        'capability_type'     => 'post',
    );

    register_post_type('team', $args);
}
add_action('init','influen_register_team_type');


function influen_register_team_category()
{
    $labels = array(
        'name' => esc_html_x('Team Categories', 'Taxonomy General Name', 'influen'),
        'singular_name' => esc_html_x('Team Category ', 'Taxonomy Singular Name', 'influen'),
        'menu_name' => esc_html__('Team Category', 'influen'),
        'all_items' => esc_html__('All Categories', 'influen'),
        'parent_item' => esc_html__('Parent Category', 'influen'),
        'parent_item_colon' => esc_html__('Parent Category:', 'influen'),
        'new_item_name' => esc_html__('New Category Name', 'influen'),
        'add_new_item' => esc_html__('Add New Category', 'influen'),
        'edit_item' => esc_html__('Edit Category', 'influen'),
        'update_item' => esc_html__('Update Category', 'influen'),
        'view_item' => esc_html__('View Category', 'influen'),
        'separate_items_with_commas' => esc_html__('Separate category with commas', 'influen'),
        'add_or_remove_items' => esc_html__('Add or remove category', 'influen'),
        'choose_from_most_used' => esc_html__('Choose from the most used', 'influen'),
        'popular_items' => esc_html__('Popular Category', 'influen'),
        'search_items' => esc_html__('Search Category', 'influen'),
        'not_found' => esc_html__('Not Found', 'influen'),
        'no_terms' => esc_html__('No Category', 'influen'),
        'items_list' => esc_html__('Category list', 'influen'),
        'items_list_navigation' => esc_html__('Category list navigation', 'influen'),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => false,
        'show_tagcloud' => false,
    );
    register_taxonomy('team-category', array('team'), $args);
}
add_action('init', 'influen_register_team_category');



