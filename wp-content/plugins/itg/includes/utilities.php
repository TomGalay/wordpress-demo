<?php

// Enqueue Vendor Scripts
function itg_enqueue_vendor_scripts()
{
    //add jquery validate
    wp_register_script('jquery-validate-plugin', plugins_url('/includes/js/vendor/jquery-validation-1.19.5/jquery.validate.min.js', __DIR__), array('jquery'), '1.0', true);
    wp_register_script('jquery-validate-plugin-additional-methods', plugins_url('/includes/js/vendor/jquery-validation-1.19.5/additional-methods.min.js', __DIR__), array('jquery'), '1.0', true);
    wp_enqueue_script('jquery-validate-plugin');
    wp_enqueue_script('jquery-validate-plugin-additional-methods');

    //add jspdf
    wp_register_script('js-jspdf', plugins_url('/includes/js/vendor/jspdf/jspdf.umd.min.js', __DIR__), array('jquery'), '1.0', true);
    wp_enqueue_script('js-jspdf');

    //add html2canvas
    wp_register_script('js-html2canvas', plugins_url('/includes/js/vendor/html2canvas/html2canvas.min.js', __DIR__), array('jquery'), '1.0', true);
    wp_enqueue_script('js-html2canvas');

    //add data tables
    wp_register_style('jquery_tables_plugin_style', plugins_url('/includes/js/vendor/DataTables/datatables.min.css', __DIR__), array(), '1.0');
    wp_enqueue_style('jquery_tables_plugin_style');

    wp_register_script('jquery_tables_plugin', plugins_url('/includes/js/vendor/DataTables/datatables.min.js', __DIR__), array('jquery'), '1.0', true);
    wp_enqueue_script('jquery_tables_plugin');
    
    /*
    *   COMPOSER
    */

    // Bootstrap
    wp_enqueue_style('bootstrap', plugins_url('/vendor/twbs/bootstrap/dist/css/bootstrap.min.css', __DIR__), array(), '1.0');
    wp_enqueue_script('bootstrap', plugins_url('/vendor/twbs/bootstrap/dist/js/bootstrap.min.js', __DIR__), array('jquery'), '1.0', true);
    wp_enqueue_script('bootstrap', plugins_url('/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js', __DIR__), array('jquery'), '1.0', true);

}
add_action('wp_enqueue_scripts', 'itg_enqueue_vendor_scripts');

// Enqueue Custom Scripts
function itg_enqueue_scripts()
{
    // Register and Enqueue Plugin CSS
    wp_register_style('itg_styles', plugins_url('/includes/css/style.css', __DIR__), '', '', true);
    wp_enqueue_style('itg_styles');

    // Register Script
    wp_register_script('itg_login', plugins_url('/includes/js/login.js', __DIR__), '', '', true);
    wp_register_script('itg_registration', plugins_url('/includes/js/registration.js', __DIR__), array('jquery'), '', true);
    wp_register_script('itg_user_details', plugins_url('/includes/js/userDetails.js', __DIR__), array('jquery'), '', true);
    wp_register_script('itg_profile', plugins_url('/includes/js/profile.js', __DIR__), '', '', true);

    //dashboard
    wp_register_script('itg_users', plugins_url('/includes/js/users.js', __DIR__), array('jquery'), '', true);

    // Add Site URL
    wp_localize_script('itg_login', 'itgHomeUrl', array(
        'siteUrl' => esc_url(site_url())
    ));
    wp_localize_script('itg_registration', 'itgHomeUrl', array(
        'siteUrl' => esc_url(site_url())
    ));
    wp_localize_script('itg_user_details', 'itgHomeUrl', array(
        'siteUrl' => esc_url(site_url())
    ));
    wp_localize_script('itg_profile', 'itgHomeUrl', array(
        'siteUrl' => esc_url(site_url())
    ));

    // dashboard
    wp_localize_script('itg_users', 'itgHomeUrl', array(
        'siteUrl' => esc_url(site_url())
    ));

    // WP Api Nonce
    wp_localize_script('itg_profile', 'itg', array(
        'nonce' => wp_create_nonce('wp_rest'),
        'apiUrl' => rest_url('my-api/v1/data'),
    ));
    wp_localize_script('itg_user_details', 'itg', array(
        'nonce' => wp_create_nonce('wp_rest'),
        'apiUrl' => rest_url('my-api/v1/data'),
    ));

    //dashboard
    wp_localize_script('itg_users', 'itgHomeUrl', array(
        'siteUrl' => esc_url(site_url())
    ));
    
    // Enqueue Script if on Correct Page
    if (is_page(array('login'))) {
        wp_enqueue_script('itg_login');
    }
    if (is_page(array('registration'))) {
        wp_enqueue_script('itg_registration');
    }
    if (is_page(array('user-details'))) {
        wp_enqueue_script('itg_user_details');
    }
    if (is_page(array('profile'))) {
        wp_enqueue_script('itg_profile');
    }

    // dashboard
    if (is_page(array('users'))) {
        wp_enqueue_script('itg_users');
    }

}
add_action('wp_enqueue_scripts', 'itg_enqueue_scripts');

function itg_page_redirection()
{
    if( is_page( array( 'profile' ) ) ) {
        if (!is_user_logged_in()){
            wp_safe_redirect( home_url("login") );
        }
    }

    if( is_page( array( 'login', 'registration' ) ) ) {
        if (is_user_logged_in()){
            wp_safe_redirect( home_url("profile") );
        }
    }

    // admin dashboard
    if( is_page( array( 'users' ) ) ) {
        if (is_user_logged_in()){
            // get user data
            $user = wp_get_current_user();

            //check roles
            $roles = (array) $user->roles;

            if (!in_array("administrator", $roles)){
                wp_safe_redirect( home_url("login") );
            }
        } else {
            wp_safe_redirect( home_url("login") );
        }
    }
}
add_action('wp_enqueue_scripts', 'itg_page_redirection');

?>