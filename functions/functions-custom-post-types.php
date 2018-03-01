<?php

/******************************************************************************
Custom Post Type: Developments
******************************************************************************/
function register_property_development_posttype() {
    $labels = array(
        'name' 				=> _x( 'Developments', 'post type general name' ),
        'singular_name'		=> _x( 'Development', 'post type singular name' ),
        'add_new' 			=> __( 'Add New' ),
        'add_new_item' 		=> __( 'Add New Development' ),
        'edit_item' 		=> __( 'Edit Development' ),
        'new_item' 			=> __( 'New Development' ),
        'view_item' 		=> __( 'View Development' ),
        'search_items' 		=> __( 'Search Developments' ),
        'not_found' 		=> __( 'No Developments found' ),
        'not_found_in_trash'=> __( 'No Developments found in the trash' ),
        'parent_item_colon' => __( '' ),
        'menu_name'			=> __( 'Developments' )
    );

    $taxonomies = array('category');

	$rewrite = array(
		'slug'                  => 'development',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);

    $supports = array('title','page-attributes');

    $post_type_args = array(
        'labels' 			=> $labels,
        'singular_label' 	=> __('Development'),
        'public' 			=> true,
        'show_ui' 			=> true,
        'publicly_queryable'=> true,
        'query_var'			=> true,
        'exclude_from_search'=> false,
        'show_in_nav_menus'	=> false,
        'capability_type' 	=> 'post',
        'has_archive' 		=> false,
        'hierarchical' 		=> true,
        'rewrite' 			=> array('slug' => 'development', 'with_front' => false ),
        'supports' 			=> $supports,
        'menu_position' 	=> 15,
        'menu_icon' 		=> 'dashicons-building',
        'taxonomies'		=> $taxonomies
     );
     register_post_type('property_development',$post_type_args);
}

add_action('init', 'register_property_development_posttype');


/******************************************************************************
Custom Post Type: Map Pins
******************************************************************************/
function register_map_pin_posttype() {
    $labels = array(
        'name' 				=> _x( 'Map Pins', 'post type general name' ),
        'singular_name'		=> _x( 'Map Pin', 'post type singular name' ),
        'add_new' 			=> __( 'Add New' ),
        'add_new_item' 		=> __( 'Add New Pin' ),
        'edit_item' 		=> __( 'Edit Pin' ),
        'new_item' 			=> __( 'New Pin' ),
        'view_item' 		=> __( 'View Pin' ),
        'search_items' 		=> __( 'Search Map Pins' ),
        'not_found' 		=> __( 'No Map Pins found' ),
        'not_found_in_trash'=> __( 'No Map Pins found in the trash' ),
        'parent_item_colon' => __( '' ),
        'menu_name'			=> __( 'Map Pins' )
    );

    $taxonomies = array('category');

    $supports = array('title','page-attributes');

    $post_type_args = array(
        'labels' 			=> $labels,
        'singular_label' 	=> __('Map Pins'),
        'public' 			=> true,
        'show_ui' 			=> true,
        'publicly_queryable'=> false,
        'query_var'			=> true,
        'exclude_from_search'=> false,
        'show_in_nav_menus'	=> false,
        'capability_type' 	=> 'post',
        'has_archive' 		=> false,
        'hierarchical' 		=> true,
        'rewrite' 			=> array('slug' => 'map-pin', 'with_front' => false ),
        'supports' 			=> $supports,
        'menu_position' 	=> 15,
        'menu_icon' 		=> 'dashicons-location',
        'taxonomies'		=> $taxonomies
     );
     register_post_type('map_pin',$post_type_args);
}

add_action('init', 'register_map_pin_posttype');

?>