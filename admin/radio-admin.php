<?php

defined( 'ABSPATH' ) or die;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Plugin admin panel
 */
class SOVA_Radio_Admin
{
    public static function settings_page()
    {
        Container::make( 'theme_options', __( 'Radio settings' ) )
            ->set_page_menu_title( __( 'Radio' ) )
            ->set_page_menu_position( 30 )
            ->set_icon( 'dashicons-microphone' )
            ->add_fields( [
                Field::make( 'text', 'radio_stream_url', __( 'Stream URL' ) ),
                Field::make( 'text', 'radio_history_url', __( 'History URL' ) ),
            ] );
        }
}