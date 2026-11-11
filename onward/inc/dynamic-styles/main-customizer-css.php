<?php 

function onward_customizer_css() {
    wp_enqueue_style(
        'onward-theme-styles',
        get_template_directory_uri() . '/inc/dynamic-styles/onward.css'
    );
    $primary_color = get_theme_mod( 'onward_main_color', onward_defaults( 'onward_main_color' ) );
    list($primary_color_r, $primary_color_g, $primary_color_b) = sscanf($primary_color, "#%02x%02x%02x");
    $contex = get_theme_mod( 'onward_heading_css_settings', onward_defaults( 'onward_heading_css_settings' ) );
    $container = get_theme_mod( 'onward_container_size', onward_defaults( 'onward_container_size' ) );
    $container_a = get_theme_mod( 'onward_container_size_a', onward_defaults( 'onward_container_size_a' ) );
    $container_e = get_theme_mod( 'onward_container_size_e', onward_defaults( 'onward_container_size_e' ) );
    $container_b = get_theme_mod( 'onward_container_size_b', onward_defaults( 'onward_container_size_b' ) );
    $container_c = get_theme_mod( 'onward_container_size_c', onward_defaults( 'onward_container_size_c' ) );
    $container_d = get_theme_mod( 'onward_container_size_d', onward_defaults( 'onward_container_size_d' ) );

    $onward_custom_css =
    '
    .site-main,
    .site-header .onward-nav,
    #mainheader .wrapper,
    footer,
    .single-post .site-main .content-box,
    .single-product .site-main .content-box,
    .single-post .main-box .featured-image-box .main-meta,
    .single-post .main-box .featured-image-box .post-thumbnail
    {max-width: ' . esc_attr( $container ) . '; margin-right: auto; margin-left: auto;}

    @media(max-width: 1280px) {
        .site-main,
        .site-header .onward-nav,
        #mainheader .wrapper,
        footer,
        .single-post .site-main .content-box,
        .single-product .site-main .content-box,
        .single-post .main-box .featured-image-box .main-meta,
        .single-post .main-box .featured-image-box .post-thumbnail
        {max-width: ' . esc_attr( $container_a ) . ';}
    }

    @media(max-width: 1024px) {
        .site-main,
        .site-header .onward-nav,
        #mainheader .wrapper,
        footer,
        .single-post .site-main .content-box,
        .single-product .site-main .content-box,
        .single-post .main-box .featured-image-box .main-meta,
        .single-post .main-box .featured-image-box .post-thumbnail
        {max-width: ' . esc_attr( $container_e ) . ';}
    }

    @media(max-width: 960px) {
        .site-main,
        .site-header .onward-nav,
        #mainheader .wrapper,
        footer,
        .single-post .site-main .content-box,
        .single-product .site-main .content-box,
        .single-post .main-box .featured-image-box .main-meta,
        .single-post .main-box .featured-image-box .post-thumbnail
        {max-width: ' . esc_attr( $container_b ) . ';}
    }

    @media(max-width: 760px) {
        .site-main,
        .site-header .onward-nav,
        #mainheader .wrapper,
        footer,
        .single-post .site-main .content-box,
        .single-product .site-main .content-box,
        .single-post .main-box .featured-image-box .main-meta,
        .single-post .main-box .featured-image-box .post-thumbnail
        {max-width: ' . esc_attr( $container_c ) . ';}
    }

    @media(max-width: 480px) {
        .site-main,
        .site-header .onward-nav,
        #mainheader .wrapper,
        footer,
        .single-post .site-main .content-box,
        .single-product .site-main .content-box,
        .single-post .main-box .featured-image-box .main-meta,
        .single-post .main-box .featured-image-box .post-thumbnail
        {max-width: ' . esc_attr( $container_d ) . ';}
    }

    a, .widget li a, .form-submit .submit, .search-results .main-box .page h3 a:hover, .main-box .post .content-box h3 a:hover, .footer .site-info a:hover, .footer .back-to-top:hover, #mainheader .main-navigation ul#primary-menu li.current-menu-item > a, #mainheader .main-navigation ul.nav-menu > li > a:hover, #mainheader .main-navigation ul.nav-menu > li > a:focus, .main-navigation ul#primary-menu li:hover > a, .main-navigation ul#primary-menu li:focus > a, .main-navigation ul#primary-menu .focus > a, .woocommerce ul.products li.product .woocommerce-loop-category__title:hover, .woocommerce ul.products li.product .woocommerce-loop-product__title:hover, .woocommerce ul.products li.product h3:hover
    {color: ' . esc_attr( $primary_color ) . ';}

    .form-submit .submit:hover, .search-results .main-box .page .content-box .blog-read-more:hover, .main-box .post .content-box .blog-read-more:hover, #mainheader .main-navigation ul#primary-menu li.current-menu-item:hover > a, .main-navigation ul.sub-menu li:hover > a, .main-navigation ul.sub-menu li:focus > a,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit.alt.disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit.alt.disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit.alt:disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit.alt:disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit.alt:disabled[disabled],
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit.alt:disabled[disabled]:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button.alt.disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button.alt.disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button.alt:disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button.alt:disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button.alt:disabled[disabled],
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button.alt:disabled[disabled]:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt.disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt:disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt:disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt:disabled[disabled],
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button.alt:disabled[disabled]:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button.alt.disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button.alt.disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button.alt:disabled,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button.alt:disabled:hover,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button.alt:disabled[disabled],
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button.alt:disabled[disabled]:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit.alt.disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit.alt.disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit.alt:disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit.alt:disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit.alt:disabled[disabled],
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit.alt:disabled[disabled]:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button.alt.disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button.alt.disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button.alt:disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button.alt:disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button.alt:disabled[disabled],
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button.alt:disabled[disabled]:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt.disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt.disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt:disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt:disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt:disabled[disabled],
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button.alt:disabled[disabled]:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button.alt.disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button.alt.disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button.alt:disabled,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button.alt:disabled:hover,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button.alt:disabled[disabled],
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button.alt:disabled[disabled]:hover,
    .woocommerce #respond input#submit.alt,
    .woocommerce a.button.alt,
    .woocommerce button.button.alt,
    .woocommerce input.button.alt,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) #respond input#submit,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) a.button,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) button.button,
    .woocommerce:where(body:not(.woocommerce-block-theme-has-button-styles)) input.button,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce #respond input#submit,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce a.button,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce button.button,
    :where(body:not(.woocommerce-block-theme-has-button-styles)) .woocommerce input.button,
    .woocommerce table.my_account_orders .button:hover,
    .woocommerce .cart .button:hover,
    .woocommerce .cart input.button:hover,
    .woocommerce ul.products li.product .button:hover
    {background: ' . esc_attr( $primary_color ) . ';}

    .form-submit .submit:hover 
    {border-color: ' . esc_attr( $primary_color ) . ';}

    #mainheader .main-navigation ul#primary-menu li.current-menu-item > a
    {background: rgb('.$primary_color_r.' '.$primary_color_g.' '.$primary_color_b.' / 15%);}

    .search-results .main-box .page .content-box .blog-read-more:hover, .main-box .post .content-box .blog-read-more:hover
    {box-shadow: rgb('.$primary_color_r.' '.$primary_color_g.' '.$primary_color_b.' / 50%) 0px 14px 30px -14px;}

    .form-submit .submit:hover,
    .woocommerce table.my_account_orders .button:hover,
    .woocommerce .cart .button:hover, .woocommerce .cart input.button:hover,
    .woocommerce ul.products li.product .button:hover,
    .woocommerce button.button.alt,
    .cart .woocommerce .wc-forward,
    .woocommerce a.button.alt:hover,
    .woocommerce a.button.alt
    {box-shadow: rgb('.$primary_color_r.' '.$primary_color_g.' '.$primary_color_b.' / 50%) 0px 14px 30px -14px;}

    h1, h2, h3, h4, h5, h6
    {'. $contex .'}

    ';

    wp_add_inline_style( 'onward-theme-styles', $onward_custom_css );
}
add_action( 'wp_enqueue_scripts', 'onward_customizer_css' );

function onward_block_editor_heading_styles( $settings ) {
	$heading = get_theme_mod( 'onward_heading_css_settings', onward_defaults( 'onward_heading_css_settings' ) );
	if ( ! is_string( $heading ) || '' === $heading ) {
		return $settings;
	}

	if ( ! isset( $settings['styles'] ) || ! is_array( $settings['styles'] ) ) {
		$settings['styles'] = array();
	}

	$settings['styles'][] = array(
		'css' => 'h1, h2, h3, h4, h5, h6 { ' . $heading . ' }',
	);

	return $settings;
}
add_filter( 'block_editor_settings_all', 'onward_block_editor_heading_styles' );