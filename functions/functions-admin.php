<?php

/******************************************************************************************
Hide Menu Items
******************************************************************************************/
function remove_menus(){
	remove_menu_page( 'edit.php' );               //Posts
	remove_menu_page( 'upload.php' );             //Media
	remove_menu_page( 'edit-comments.php' );        //Comments
	remove_menu_page( 'themes.php' );             //Appearance
	remove_menu_page( 'tools.php' );                //Tools
}

add_action( 'admin_menu', 'remove_menus' );

/******************************************************************************************
ADMIN - Remove items from Admin bar
http://www.paulund.co.uk/how-to-remove-links-from-wordpress-admin-bar
******************************************************************************************/
function admin_bar_removal() {
        global $wp_admin_bar;

        $wp_admin_bar->remove_menu('wp-logo'); 			// Wordpress Logo
		$wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
		$wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
		$wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
		$wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
		$wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
		$wp_admin_bar->remove_menu('comments'); 		// Reomve the "Comments" link
		$wp_admin_bar->remove_menu('new-content'); 		// Remove the "New" content link
		$wp_admin_bar->remove_menu('updates'); 			// Remove the "Updates" link
}

add_action('wp_before_admin_bar_render', 'admin_bar_removal', 0);

/******************************************************************************************
ADMIN - Add separator

function add_admin_menu_separator($position) {
	global $menu;
	$menu[ $position ] = array(
		0	=>	'',
		1	=>	'read',
		2	=>	'separator' . $position,
		3	=>	'',
		4	=>	'wp-menu-separator'
	);
}

function set_admin_menu_separator() {
	do_action( 'admin_init', 79 );
} 

add_action( 'admin_init', 'add_admin_menu_separator' );
add_action( 'admin_menu', 'set_admin_menu_separator' );
******************************************************************************************/
?>