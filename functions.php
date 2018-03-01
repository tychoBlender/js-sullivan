<?php
/******************************************************************************
Load Scripts & Styles
******************************************************************************/
function load_extra_scripts() {
    
    // Scripts   	
	//wp_register_script( 'jquery.fullpage', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.7.4/jquery.fullPage.min.js', array('jquery'), false, true);	
	wp_register_script( 'jquery.fullpage', get_template_directory_uri() . '/js/jquery.fullpage.min.js', array('jquery'), false, true);	
    wp_register_script( 'jmain', get_template_directory_uri() . '/js/jquery.main.js', array('jquery'), false, true);    
    wp_register_script( 'jhome', get_template_directory_uri() . '/js/jquery.home.js', array('jquery'), false, true);  
    wp_register_script( 'jdev', get_template_directory_uri() . '/js/jquery.developments.js', array('jquery'), false, true);
    wp_register_script( 'jsingle', get_template_directory_uri() . '/js/jquery.single.js', array('jquery'), false, true); 
    wp_register_script( 'janimsition', 'https://cdnjs.cloudflare.com/ajax/libs/animsition/3.5.2/js/jquery.animsition.js', array('jquery'), false, true); 
    wp_register_script( 'jwaypoints', get_template_directory_uri() . '/js/jquery.waypoints.js', array('jquery'), false, true); 
    
    
    wp_register_script( 'jquery.swiper', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.2.7/js/swiper.min.js', array('jquery'), false, true);

    // CSS
    wp_register_style('style.development', get_template_directory_uri() . '/style-developments.css');
    
    
    //wp_register_style('fullPageStyles', 'https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/2.6.7/jquery.fullPage.min.css');
    wp_register_style('fullPageStyles', get_template_directory_uri() . '/css/jquery.fullpage.min.css');
    
    wp_register_style('animisitionStyles', 'https://cdnjs.cloudflare.com/ajax/libs/animsition/3.5.2/css/animsition.min.css');
    wp_register_style('swiperStyles', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.1.0/css/swiper.min.css');
    
    // Enqueue Styles
    wp_enqueue_style('fullPageStyles');
    wp_enqueue_style('animisitionStyles');
    wp_enqueue_style('swiperStyles');
   
    
    // Enqueue Scripts    
    wp_enqueue_script('janimsition'); 
    wp_enqueue_script('jquery.fullpage'); 
	wp_enqueue_script('jquery.swiper');    
    wp_enqueue_script('jmain');        
    wp_enqueue_script('jwaypoints');        

    if (is_front_page()){
        wp_enqueue_script('jhome');                
    }
        
    if (is_page_template( 'page-info.php' )){
	    wp_enqueue_script('jmain');        	
    }
    
    if (is_page('developments')){
        wp_enqueue_style('style.development');    
        wp_enqueue_script('jdev');    
    }
    if(is_single() || is_page('future-developments')){
	    wp_enqueue_script('jsingle');    
    }
}

add_action( 'wp_enqueue_scripts', 'load_extra_scripts' );

/******************************************************************************************
SVG Upload
******************************************************************************************/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/******************************************************************************************
Options Sidebar
******************************************************************************************/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Featured Menu Overlay Settings',
		'menu_title'	=> 'Featured Menu Overlay',
		'parent_slug'	=> 'theme-general-settings',
	));
    
    acf_add_options_sub_page(array(
		'page_title' 	=> 'Meta Tags Settings',
		'menu_title'	=> 'Meta Tags',
		'parent_slug'	=> 'theme-general-settings',
	));
    
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Tracking Settings',
		'menu_title'	=> 'Tracking',
		'parent_slug'	=> 'theme-general-settings',
	));
}

/******************************************************************************************
Includes
******************************************************************************************/
include("functions/functions-basics.php"); 
include("functions/functions-admin.php"); 
include("functions/functions-login.php"); 
include("functions/functions-dashboard.php");
include("functions/functions-custom-post-types.php");
