<?php

/*
Plugin Name: Radio player
Description: Radio player for WordPress
Author: Sidun Oleh
*/

defined( 'ABSPATH' ) or die;

/*
Activate plugin
*/
require_once plugin_dir_path( __FILE__ ) . '/includes/radio-activator.php';
register_activation_hook( 
    __FILE__, 
    [ SOVA_Radio_Activator::class, 'activate' ] 
);

/*
Run plugin
*/
require_once plugin_dir_path( __FILE__ ) . '/includes/radio.php';
SOVA_Radio::run();