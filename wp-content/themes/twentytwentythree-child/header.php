<?php

/**
 * @package WordPress
 * @subpackage HTML5_Boilerplate
 */
?>
<? echo phpinfo(); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
       Remove this if you use the .htaccess -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <!-- <title><?php wp_title(''); ?></title> -->

    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="viewport" content="width=device-width">

    <!-- Wordpress Head Items -->
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_head(); ?>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c911291bfb.js" crossorigin="anonymous"></script>

    <!-- Poppins Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Questrial Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">

</head>

<body <?php body_class(); ?>>

    <nav class="navbar navbar-expand-lg navbar-dark px-5 py-4 bg-dark font-questrial">
        <div class="container-sm">
            <a class="navbar-brand" href="<?php echo get_site_url(); ?>/profile">
                <a href="<?php echo get_site_url(); ?>" class="fw-bold text-white fs-3 text-decoration-none">LOREM IPSUM</a>
            </a>
            <button class="navbar-toggler rounded-0 border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100 justify-content-end">
                    <?php

                    // add other navigation options if logged in
                    if (is_user_logged_in()) {

                        // get user data
                        $user = wp_get_current_user();

                        //check roles
                        $roles = (array) $user->roles;
                        foreach ($roles as $role) {
                            if ($role == 'administrator') { ?>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Admin
                                    </a>
                                    <ul class="dropdown-menu m-0 p-0 rounded-0">
                                        <li><a class="dropdown-item border-bottom border-1 pt-3 pb-3" href="<?php echo get_site_url(); ?>/dashboard/users">Users</a></li>
                                    </ul>
                                </li>
                        <?php }
                        }
                        ?>
                        <li class="nav-item d-flex align-items-center">
                            <a class="text-decoration-none nav-link <?php if (is_page('Profile')) echo 'active'; ?>" href="<?php echo get_site_url(); ?>/profile">Profile</a>
                        </li>
                    <?php } ?>
                    <?php if (is_user_logged_in()) { //login/register/logout ?>
                        <li class="nav-item d-flex align-items-center">
                            <a class="text-decoration-none nav-link" href="<?php echo wp_logout_url(home_url("login")); ?>">
                                Logout
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item d-flex align-items-center">
                            <a class="text-decoration-none nav-link <?php if (is_page('Login')) echo 'active'; ?>" href="<?php echo get_site_url(); ?>/login">Login</a>
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <a class="text-decoration-none nav-link <?php if (is_page('Registration')) echo 'active'; ?>" href="<?php echo get_site_url(); ?>/registration">Register</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>