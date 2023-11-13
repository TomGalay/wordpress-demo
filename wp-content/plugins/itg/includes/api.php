<?php

/*
*   REST APIS
*/

function itg_login_user(WP_REST_Request $request)
{

    //http://localhost/mlm/wp-json/itg-api/v1/itg_login_user

    $login_details = array();
    $login_details['user_login'] = $request->get_param('username');
    $login_details['user_password'] = $request->get_param('password');
    $login_details['remember'] = true;

    //attempt to login
    $user_signon = wp_signon($login_details, false);
    $response = array();

    if (!is_wp_error($user_signon)) {
        $response = [
            'status' => 'success',
            'message' => 'User logged in successfully',
            'redirect' => get_site_url() . '/profile'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'User not found',
            'redirect' => get_site_url()
        ];
    }

    echo json_encode($response);
}
add_action('rest_api_init', function () {
    register_rest_route('itg-api/v1', 'itg_login_user', array(
        'methods' => 'POST',
        'callback' => 'itg_login_user',
    ));
});

function itg_add_new_user(WP_REST_Request $request)
{

    //http://localhost/mlm/wp-json/itg-api/v1/itg_add_new_user

    global $wpdb;

    $email = $request->get_param('email');
    $username = $request->get_param('username');
    $password = $request->get_param('password');

    $response = array();

    if (!email_exists($email)){
        if (!username_exists($username)){

            $user_id = wp_insert_user(array(
                'user_login' => $username,
                'user_email' => $email,
                'user_pass' => $password,
            ));

            if ($user_id) {

                // add other details to user meta
                add_user_meta($user_id, 'First Name', '');
                add_user_meta($user_id, 'Middle Name', '');
                add_user_meta($user_id, 'Last Name', '');
                add_user_meta($user_id, 'DOB', '');
                add_user_meta($user_id, 'Mobile', '');
                add_user_meta($user_id, 'Address', '');
        
                // log the new user in
                wp_set_auth_cookie($user_id, true, is_ssl());
                wp_set_current_user($user_id, $username);
                do_action('wp_login', $username);
        
                $response = [
                    'status' => 'success',
                    'message' => 'User added successfully',
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'message' => 'User failed to register',
                ];
            }
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Username already exists',
            ];
        }
    } else {
        $response = [
            'status' => 'error',
            'message' => 'Email already exists',
        ];
    }

    echo json_encode($response);
}
add_action('rest_api_init', function () {
    register_rest_route('itg-api/v1', 'itg_add_new_user', array(
        'methods' => 'POST',
        'callback' => 'itg_add_new_user',
    ));
});

function itg_add_user_details(WP_REST_Request $request)
{

    //http://localhost/mlm/wp-json/itg-api/v1/itg_add_user_details

    $first = $request->get_param('first');
    $middle = $request->get_param('middle');
    $last = $request->get_param('last');
    $dob = $request->get_param('dob');
    $mobile = $request->get_param('mobile');
    $address = $request->get_param('address');

    $user_id = get_current_user_id();

    update_user_meta($user_id, 'First Name', $first);
    update_user_meta($user_id, 'Middle Name', $middle);
    update_user_meta($user_id, 'Last Name', $last);
    update_user_meta($user_id, 'DOB', $dob);
    update_user_meta($user_id, 'Mobile', $mobile);
    update_user_meta($user_id, 'Address', $address);

    $response = array();

    $response = [
        'status' => 'success',
        'message' => 'User details successfully added',
        'redirect' => get_site_url() . '/profile',
    ];
    
    echo json_encode($response);
}
add_action('rest_api_init', function () {
    register_rest_route('itg-api/v1', 'itg_add_user_details', array(
        'methods' => 'POST',
        'callback' => 'itg_add_user_details',
    ));
});

function itg_add_new_user_from_dashboard(WP_REST_Request $request)
{

    //http://localhost/mlm/wp-json/itg-api/v1/itg_add_new_user_from_dashboard

    $email = $request->get_param('email');
    $username = $request->get_param('username');
    $password = $request->get_param('password');
    $referral = $request->get_param('referral');

    $user_id = wp_insert_user(array(
        'user_login' => $username,
        'user_email' => $email,
        'user_pass' => $password,
    ));

    $response = array();

    if ($user_id) {
        
        //add other details to user meta
        add_user_meta($user_id, 'Referrer', $referral);
        add_user_meta($user_id, 'First Referrer', $referral);
        add_user_meta($user_id, 'Secret Key', bin2hex(random_bytes(15)));
        add_user_meta($user_id, 'Referral Code', bin2hex(random_bytes(8)));
        add_user_meta($user_id, 'First Name', '');
        add_user_meta($user_id, 'Middle Name', '');
        add_user_meta($user_id, 'Last Name', '');
        add_user_meta($user_id, 'DOB', '');
        add_user_meta($user_id, 'Mobile', '');
        add_user_meta($user_id, 'Address', '');

        $response = [
            'status' => 'success',
            'message' => 'User added successfully',
            'id' => $user_id
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'User failed to register',
        ];
    }

    echo json_encode($response);
}
add_action('rest_api_init', function () {
    register_rest_route('itg-api/v1', 'itg_add_new_user_from_dashboard', array(
        'methods' => 'POST',
        'callback' => 'itg_add_new_user_from_dashboard',
    ));
});

function itg_add_user_details_from_dashboard(WP_REST_Request $request)
{

    //http://localhost/mlm/wp-json/itg-api/v1/itg_add_user_details_from_dashboard

    $user_id = $request->get_param('id');
    $first = $request->get_param('first');
    $middle = $request->get_param('middle');
    $last = $request->get_param('last');
    $dob = $request->get_param('dob');
    $mobile = $request->get_param('mobile');
    $address = $request->get_param('address');
    $membership = $request->get_param('membership');
    $level = $request->get_param('level');

    update_user_meta($user_id, 'First Name', $first);
    update_user_meta($user_id, 'Middle Name', $middle);
    update_user_meta($user_id, 'Last Name', $last);
    update_user_meta($user_id, 'DOB', $dob);
    update_user_meta($user_id, 'Mobile', $mobile);
    update_user_meta($user_id, 'Address', $address);

    $response = array();

    $response = [
        'status' => 'success',
        'message' => 'User details successfully added',
    ];

    echo json_encode($response);
}
add_action('rest_api_init', function () {
    register_rest_route('itg-api/v1', 'itg_add_user_details_from_dashboard', array(
        'methods' => 'POST',
        'callback' => 'itg_add_user_details_from_dashboard',
    ));
});