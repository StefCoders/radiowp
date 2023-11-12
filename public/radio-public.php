<?php

/**
 * Plugin public side
 */
class SOVA_Radio_Public
{
    public static function enqueue_styles()
    {
        wp_enqueue_style( 
            'radio', 
            plugin_dir_url( __FILE__ ) . '/css/radio.css' 
        );
    }

    public static function enqueue_scripts()
    {
        wp_enqueue_script( 
            'radio', 
            plugin_dir_url( __FILE__ ) . '/js/radio.js', 
            [ 'jquery', ]
        );
    }

    /**
     * add shortcode
     */
    public static function shortcode()
    {
        add_shortcode( 'radio', [ self::class, 'shortcode_html' ] );
    }

    /**
     * shortcode output
     */
    public static function shortcode_html( $attr, $content, $tag )
    {
        require plugin_dir_path( __FILE__ ) . '/templates/radio.php';
    }
}