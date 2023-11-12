<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Plugin core
 */
class SOVA_Radio
{
    public static function run()
    {
        self::load_dependencies();
        self::define_admin_hooks();
        self::define_public_hooks();
    }

    private static function load_dependencies()
    {   
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/radio-admin.php';
        require_once plugin_dir_path( dirname( __FILE__ ) ) . '/public/radio-public.php';
    }

    private static function define_admin_hooks()
    {
        add_action( 
            'carbon_fields_register_fields', 
            [ SOVA_Radio_Admin::class, 'settings_page' ] 
        );
    }

    private static function define_public_hooks()
    {
        add_action( 
            'wp_enqueue_scripts', 
            [ SOVA_Radio_Public::class, 'enqueue_styles' ] 
        );
        add_action( 
            'wp_enqueue_scripts', 
            [ SOVA_Radio_Public::class, 'enqueue_scripts' ] 
        );
        add_action( 
            'init', 
            [ SOVA_Radio_Public::class, 'shortcode' ] 
        );
    }
}
