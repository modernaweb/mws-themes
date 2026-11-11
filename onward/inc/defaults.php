<?php
/**
 * Customizer default settings.
 *
 * @package Onward
 */

/**
 * Get the default Customizer settings.
 *
 * @param  string|string $name Option key name to get.
 * @return mixin
 */
function onward_defaults( $name ) {
    static $defaults;

    if ( ! $defaults ) {
        $defaults = apply_filters( 'onward_defaults', array(
                // Colors
                'onward_main_color' => '#2848ff',
                // Container Size
                'onward_container_size'   => '70%',
                'onward_container_size_a' => '80%',
                'onward_container_size_e' => '92%',
                'onward_container_size_b' => '90%',
                'onward_container_size_c' => '90%',
                'onward_container_size_d' => '90%',
                // Footer Text
                'onward_footer_top' => 'Copyright © 2026. All rights reserved — Powered by',
                'onward_footer_name' => 'WordPress',
                'onward_footer_url' => 'https://wp.org/themes/onward/',
                'onward_footer_back_to_top' => 'Back To Top',
                // Styling
                'onward_heading_css_settings' => 'color: #1d1d1d; text-transform: capitalize;',
            ));
    }
    return isset( $defaults[ $name ] ) ? $defaults[ $name ] : null;
}
