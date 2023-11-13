<?php
/*
Plugin Name: ITG Plugin Database
Description: Database initialization for the ITG Plugin
Version: 1.0
Author: Isaiah Thomas Galay
*/

// Prevent Direct Access
if ( !defined('ABSPATH') ){
	wp_die('Silence is golden.');
}

// Activation Hook
register_activation_hook(__FILE__, 'itg_database_activate');

// Deactivation Hook
register_deactivation_hook(__FILE__, 'itg_database_deactivate');

// CREATE Tables if Activated
function itg_database_activate(){

}

// DROP Tables if Deactivated
function itg_database_deactivate(){

}

?>