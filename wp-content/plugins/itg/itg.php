<?php
/*
Plugin Name: ITG Plugin
Description: Custom Plugin
Version: 1.0
Author: Isaiah Thomas Galay
*/

// Prevent Direct Access
if ( !defined('ABSPATH') ){
	wp_die('Silence is golden.');
}

if ( !class_exists('ITG')){
    class ITG {
        public function __construct(){
            define('ITG_PLUGIN_PATH',  plugin_dir_path( __FILE__ ));

            require_once( ITG_PLUGIN_PATH . '/vendor/autoload.php' );
        }

        public function initialize(){
            include_once( ITG_PLUGIN_PATH . 'includes/utilities.php');
            include_once( ITG_PLUGIN_PATH . 'includes/templates.php');
            include_once( ITG_PLUGIN_PATH . 'includes/api.php');
        }
    }
}

    $main = new ITG;
    $main->initialize();
    
?>
