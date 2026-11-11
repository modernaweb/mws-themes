<?php

add_action( 'wp_enqueue_scripts', 'onward_child_enqueue_styles', 20 );

function onward_child_enqueue_styles() {

    $parent_version = wp_get_theme( get_template() )->get( 'Version' );

    // Replace the incorrectly resolved parent stylesheet handle.
    wp_dequeue_style( 'onward-style' );
    wp_deregister_style( 'onward-style' );

    wp_register_style(
        'onward-style',
        get_template_directory_uri() . '/style.css',
        array(),
        $parent_version
    );

    wp_style_add_data( 'onward-style', 'rtl', 'replace' );
    wp_enqueue_style( 'onward-style' );

    // Ensure the main stylesheet loads after the parent stylesheet.
    wp_dequeue_style( 'onward-main-css' );
    wp_deregister_style( 'onward-main-css' );

    wp_enqueue_style(
        'onward-main-css',
        get_template_directory_uri() . '/css/onward-main.css',
        array( 'onward-style' ),
        $parent_version
    );

    // Load child stylesheet only once.
    wp_enqueue_style(
        'onward-child',
        get_stylesheet_uri(),
        array( 'onward-main-css' ),
        wp_get_theme()->get( 'Version' )
    );
}

/**
 * Font registry.
 *
 * One line per font: 'CSS font-family name' => 'path to its CSS file, relative to assets/fonts/'.
 * To disable a font, comment out (or delete) its line. To add one, add a line
 * and drop its folder into assets/fonts/. The folder itself can also be deleted
 * once the line is removed.
 */
function onward_child_registered_fonts() {
    return array(
        'Inter Tight'   => 'inter-tight/inter-tight.css',
        'Switzer'       => 'switzer/switzer.css',
        'General Sans'  => 'general-sans/general-sans.css',
        'Clash Grotesk' => 'clash-grotesk/clash-grotesk.css',
    );
}

/**
 * Which font is used where.
 *
 * Edit the two variables below. Any font from the registry can be used; keep a
 * fallback at the end of each stack. Examples:
 *   --onward-child-font-heading: 'Clash Grotesk', 'Inter Tight', sans-serif;
 *   --onward-child-font-heading: 'General Sans', 'Inter Tight', sans-serif;
 *   --onward-child-font-body:    'General Sans', sans-serif;
 */
function onward_child_fonts_override_css() {
    return "
        :root {
            --onward-child-font-body: 'Inter Tight', sans-serif;
            --onward-child-font-heading: 'Switzer', 'Inter Tight', sans-serif;
        }

        body,
        button,
        input,
        select,
        textarea,
        p, a, li, label,
        .entry-content,
        .site-description {
            font-family: var(--onward-child-font-body);
        }

        h1, h2, h3, h4, h5, h6,
        .site-title {
            font-family: var(--onward-child-font-heading);
        }
    ";
}

function onward_child_enqueue_fonts() {
    $version = wp_get_theme()->get( 'Version' );

    foreach ( onward_child_registered_fonts() as $family => $css_path ) {
        wp_enqueue_style(
            'onward-child-font-' . sanitize_title( $family ),
            get_stylesheet_directory_uri() . '/assets/fonts/' . $css_path,
            array(),
            $version
        );
    }

    // Carries the font-family rules; no stylesheet of its own.
    wp_register_style( 'onward-child-fonts', false, array(), $version );
    wp_enqueue_style( 'onward-child-fonts' );
    wp_add_inline_style( 'onward-child-fonts', onward_child_fonts_override_css() );
}
add_action( 'wp_enqueue_scripts', 'onward_child_enqueue_fonts' );
add_action( 'elementor/editor/after_enqueue_styles', 'onward_child_enqueue_fonts' );
add_action( 'enqueue_block_editor_assets', 'onward_child_enqueue_fonts' );

// Make the registered fonts selectable in the Elementor typography controls.
add_filter( 'elementor/fonts/additional_fonts', function ( $fonts ) {
    foreach ( array_keys( onward_child_registered_fonts() ) as $family ) {
        $fonts[ $family ] = 3;
    }
    return $fonts;
} );

add_filter( 'onward_search_results_overview_query_args', function ( $args ) {
    if ( function_exists( 'relevanssi_do_query' ) ) {
        $args['relevanssi'] = true;
    }
    return $args;
} );

add_filter( 'onward_pagination_query_args', function ( $args, $context ) {
    if ( function_exists( 'relevanssi_do_query' ) && isset( $context['type'] ) && 'search' === $context['type'] ) {
        $args['relevanssi'] = true;
    }
    return $args;
}, 10, 2 );

add_filter( 'onward_pagination_product_query_args', function ( $args, $context ) {
    if ( function_exists( 'relevanssi_do_query' ) && isset( $context['type'] ) && 'search' === $context['type'] ) {
        $args['relevanssi'] = true;
    }
    return $args;
}, 10, 2 );
