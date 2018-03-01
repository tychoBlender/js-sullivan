<?php
/******************************************************************************
Remove Query Strings on js & css
******************************************************************************/
function _remove_script_version( $src ){
	$parts = explode( '?', $src );
	return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

/******************************************************************************
Add Thumbnail Support
******************************************************************************/
add_theme_support('post-thumbnails');

/******************************************************************************************
Remove image compression for uploaded media
******************************************************************************************/
add_filter( 'jpeg_quality', create_function( '', 'return 100;' ) );

/******************************************************************************
Cleanup Wordpress Header
******************************************************************************/
remove_action( 'wp_head', 'feed_links_extra', 3 ); 				// Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); 					// Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); 						// Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); 				// Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); 		// prev link
remove_action( 'wp_head', 'start_post_rel_link');
remove_action( 'wp_head', 'index_rel_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link');
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'wp_generator' ); 					// Display the XHTML generator that is generated on the wp_head hook, WP version;
remove_action( 'wp_head', 'rel_canonical');						// Remove canonical - leave that up to SEO

/******************************************************************************************
Remove Emojis
******************************************************************************************/
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/******************************************************************************
Replace jQuery from Google
******************************************************************************/
function modify_jquery() {
	if (!is_admin()) {
		// comment out the next two lines to load the local copy of jQuery
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', false, '2.1.4');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

/******************************************************************************************
Alter Body Class
******************************************************************************************/
//Page Slug Body Class
function add_slug_body_class( $classes ) {
    global $post;
    if (isset($post)) {
        $classes[] = $post->post_name;
        $classes[] = "preload";
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

?>