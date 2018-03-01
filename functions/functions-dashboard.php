<?php
/******************************************************************************************
Hide Menu Items in Dashboard
******************************************************************************************/
function remove_dashboard_meta() {
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_primary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
    remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
    remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
}
add_action( 'admin_init', 'remove_dashboard_meta' );

/******************************************************************************************
Hide Widgets in Dashboard
******************************************************************************************/
function wpc_dashboard_widgets() {
	global $wp_meta_boxes;
	// Incoming links
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	// Plugins
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	// Last comments
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
}

add_action('wp_dashboard_setup', 'wpc_dashboard_widgets');

/******************************************************************************************
Hide Menu Items in Dashboard
******************************************************************************************/
function register_my_menu() {
  register_nav_menu('spaces-menu',__( 'Spaces Menu' ));
}
add_action( 'init', 'register_my_menu' );


/******************************************************************************************
ADMIN - Widgets
******************************************************************************************/
// Add custom dashboard widget
function my_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Want to know what to do? Just look down.', 'custom_dashboard_help');
}

function custom_dashboard_help() {
    $url = site_url( '/wp-admin/' );
    $pub = site_url('/');
    echo '<div style="background-color: #000; background-image: url(\''.get_template_directory_uri().'/img/FPO_home-video.jpg\'); background-size: cover; background-repeat: no-repeat; background-position: 50% 30%; padding: 20px 20px 25vh 20px;"><img src="'.get_template_directory_uri().'/img/logo.svg" alt="Polaris Pacific" width="245" /></div><div id="PP-panel" class="welcome-panel">
    
    <div class="welcome-panel-content">
        <!-- <p class="about-description">We&#8217;ve assembled some links to get you started:</p> -->
        <div class="welcome-panel-column-container">
            <div class="welcome-panel-column">
                <h3 style="padding-left: 0; font-size: 16px !important;">Manage Developments</h3>
                 <ul>
                    <li><a href="'.$url.'edit.php?post_type=property_development" class="welcome-icon welcome-edit-page">View List</a></li>
                    <li><a href="'.$url.'post-new.php?post_type=property_development" class="welcome-icon welcome-add-page">Add Development</a></li>
                    <li><a href="'.$pub.'developments/" class="welcome-icon welcome-view-site" target="_blank">View Developments</a></li>
                    <li><a href="#" class="welcome-icon welcome-learn-more gray">Tutorial</a></li>
                </ul>
            </div>
            <div class="welcome-panel-column">
                <h3 style="padding-left: 0; font-size: 16px !important;">Manage Map Pins</h3>
                 <ul>
                    <li><a href="'.$url.'edit.php?post_type=map_pin" class="welcome-icon welcome-edit-page">View List</a></li>
                    <li><a href="'.$url.'post-new.php?post_type=map_pin" class="welcome-icon welcome-add-page">Add Article</a></li>
                    <li><a href="'.$pub.'developments/" class="welcome-icon welcome-view-site" target="_blank">View the Map (Visible on Desktop Only)</a></li>
                    <li><a href="#" class="welcome-icon welcome-learn-more gray">Tutorial</a></li>
                </ul>
            </div>
		</div>
    </div>
</div>';
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

// Restore dashboard widget column selection
function wpse126301_dashboard_columns() {
    add_screen_option(
        'layout_columns',
        array(
            'max'     => 1,
            'default' => 1
        )
    );
}
add_action( 'admin_head-index.php', 'wpse126301_dashboard_columns' );

add_action( 'admin_head-index.php', function()
{
    ?>
<style>
.postbox-container {
    min-width: 100% !important;
}
.meta-box-sortables.ui-sortable.empty-container {
    display: none;
}
</style>
    <?php
});
?>