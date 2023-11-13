<?php

add_shortcode('itg-login-form','show_login_form');
function show_login_form(){
    ob_start();
    include_once( ITG_PLUGIN_PATH . 'includes/templates/login-form.php');
    return ob_get_clean();
}

add_shortcode('itg-registration-form','show_registration_form');
function show_registration_form(){
    ob_start();
    include_once( ITG_PLUGIN_PATH . 'includes/templates/registration-form.php');
    return ob_get_clean();
}

add_shortcode('itg-user-details-form','show_user_details_form');
function show_user_details_form(){
    ob_start();
    include_once( ITG_PLUGIN_PATH . 'includes/templates/user-details-form.php');
    return ob_get_clean();
}

add_shortcode('itg-profile','show_profile');
function show_profile(){
    ob_start();
    include_once( ITG_PLUGIN_PATH . 'includes/templates/profile.php');
    return ob_get_clean();
}

/* Admin Pages */
add_shortcode('itg-dashboard-users','show_dashboard_users');
function show_dashboard_users(){
    ob_start();
    include_once( ITG_PLUGIN_PATH . 'includes/templates/admin/users.php');
    return ob_get_clean();
}

?>