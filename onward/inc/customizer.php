<?php
/**
 * Onward Theme Customizer
 *
 * @package onward
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function onward_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'onward_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'onward_customize_partial_blogdescription',
			)
		);
	}

	/** Theme Options Main Panel */
	$wp_customize->add_panel(
		'onward_themeoptions',
		array(
			'priority'       	=> 222,
			'theme_supports' 	=> '',
			'title'          	=> esc_html__( 'Theme Settings', 'onward' ),
		)
	);

	// Start of Container
	$wp_customize->add_section(
		'onward_container',
		array(
			'title' 			=> esc_html__( 'Container', 'onward' ),
			'priority' 			=> 1,
			'panel' 			=> 'onward_themeoptions',
		)
	);

	// Desktop width
	$wp_customize->add_setting(
		'onward_container_size',
		array(
			'default' 			=> onward_defaults( 'onward_container_size' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_container_size',
		array(
			'label' 			=> esc_html__( 'Desktop Container', 'onward' ),
			'priority' 			=> 1,
			'type'     			=> 'text',
			'section' 			=> 'onward_container',
			'settings' 			=> 'onward_container_size'
		)
	);

	// Small laptop width
	$wp_customize->add_setting(
		'onward_container_size_a',
		array(
			'default' 			=> onward_defaults( 'onward_container_size_a' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_container_size_a',
		array(
			'label' 			=> esc_html__( 'Breakpoint in 1280px', 'onward' ),
			'priority' 			=> 1,
			'type'     			=> 'text',
			'section' 			=> 'onward_container',
			'settings' 			=> 'onward_container_size_a'
		)
	);

	// Normal Tablet Width
	$wp_customize->add_setting(
		'onward_container_size_e',
		array(
			'default' 			=> onward_defaults( 'onward_container_size_e' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_container_size_e',
		array(
			'label' 			=> esc_html__( 'Breakpoint in 1024px', 'onward' ),
			'priority'	 		=> 1,
			'type'     			=> 'text',
			'section' 			=> 'onward_container',
			'settings' 			=> 'onward_container_size_e'
		)
	);

	// Tablet width
	$wp_customize->add_setting(
		'onward_container_size_b',
		array(
			'default' 			=> onward_defaults( 'onward_container_size_b' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_container_size_b',
		array(
			'label' 			=> esc_html__( 'Breakpoint in 960px', 'onward' ),
			'priority'	 		=> 1,
			'type'     			=> 'text',
			'section' 			=> 'onward_container',
			'settings' 			=> 'onward_container_size_b'
		)
	);

	$wp_customize->add_setting(
		'onward_container_size_c',
		array(
			'default' 			=> onward_defaults( 'onward_container_size_c' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// Small tablet width
	$wp_customize->add_control(
		'onward_container_size_c',
		array(
			'label' 			=> esc_html__( 'Breakpoint in 760px', 'onward' ),
			'priority' 			=> 1,
			'type'     			=> 'text',
			'section' 			=> 'onward_container',
			'settings' 			=> 'onward_container_size_c'
		)
	);

	$wp_customize->add_setting(
		'onward_container_size_d',
		array(
			'default' 			=> onward_defaults( 'onward_container_size_d' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	// Phone width
	$wp_customize->add_control(
		'onward_container_size_d',
		array(
			'label' 			=> esc_html__( 'Breakpoint in 480px', 'onward' ),
			'priority' 			=> 1,
			'type'     			=> 'text',
			'section' 			=> 'onward_container',
			'settings' 			=> 'onward_container_size_d'
		)
	);
	// End of Container

	// Start of the sidebar
	$wp_customize->add_section(
		'onward_sidebar',
		array(
			'title' 			=> esc_html__( 'Sidebars', 'onward' ),
			'priority'			=> 2,
			'panel' 			=> 'onward_themeoptions',
		)
	);

	// Blog Sidebars
	$wp_customize->add_setting(
		'onward_sidebar_settings',
		array(
			'default' 			=> 'nosidebar',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'onward_text_sanitization'
		)
	);

	$wp_customize->add_control(
		new Onward_Image_Radio_Button_Custom_Control(
			$wp_customize,
			'onward_sidebar_settings',
			array(
				'label'    		=> esc_html__( 'Blog — Archive Page Sidebar Design:', 'onward' ),
				'description' 	=> esc_html__( 'Select your desired style for the blog posts sidebar', 'onward' ),
				'section'  		=> 'onward_sidebar',
				'settings' 		=> 'onward_sidebar_settings',
				'priority' 		=> 1,
				'choices'  		=> onward_blog_sidebars(),
			)
		)
	);

	// Blog Sidebars
	$wp_customize->add_setting(
		'onward_single_post_sidebar_settings',
		array(
			'default' 			=> 'nosidebar',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'onward_text_sanitization'
		)
	);

	$wp_customize->add_control(
		new Onward_Image_Radio_Button_Custom_Control(
			$wp_customize,
			'onward_single_post_sidebar_settings',
			array(
				'label'    		=> esc_html__( 'Blog — Single Post Sidebar Design:', 'onward' ),
				'description' 	=> esc_html__( 'Select your desired style for the blog posts sidebar', 'onward' ),
				'section'  		=> 'onward_sidebar',
				'settings' 		=> 'onward_single_post_sidebar_settings',
				'priority' 		=> 1,
				'choices'  		=> onward_blog_sidebars(),
			)
		)
	);
	// End of the sidebar

	// Page Sidebars
	$wp_customize->add_setting(
		'onward_page_sidebar_settings',
		array(
			'default' 			=> 'nosidebar',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'onward_text_sanitization'
		)
	);

	$wp_customize->add_control(
		new Onward_Image_Radio_Button_Custom_Control(
			$wp_customize,
			'onward_page_sidebar_settings',
			array(
				'label'    		=> esc_html__( 'Page — Sidebar Design:', 'onward' ),
				'description' 	=> esc_html__( 'Select your desired style for the blog posts sidebar', 'onward' ),
				'section'  		=> 'onward_sidebar',
				'settings' 		=> 'onward_page_sidebar_settings',
				'priority' 		=> 1,
				'choices'  		=> onward_blog_sidebars(),
			)
		)
	);
	// End of the sidebar

	$wp_customize->add_setting(
		'onward_product_archive_sidebar_settings',
		array(
			'default' 			=> 'nosidebar',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'onward_text_sanitization'
		)
	);

	$wp_customize->add_control(
		new Onward_Image_Radio_Button_Custom_Control(
			$wp_customize,
			'onward_product_archive_sidebar_settings',
			array(
				'label'    		=> esc_html__( 'Woo — Archive Product Sidebar Design:', 'onward' ),
				'description' 	=> esc_html__( 'Select your desired style for the blog posts sidebar', 'onward' ),
				'section'  		=> 'onward_sidebar',
				'settings' 		=> 'onward_product_archive_sidebar_settings',
				'priority' 		=> 1,
				'choices'  		=> onward_blog_sidebars(),
			)
		)
	);
	// End of the sidebar


	// Woo Sidebars
	$wp_customize->add_setting(
		'onward_single_product_sidebar_settings',
		array(
			'default' 			=> 'nosidebar',
			'transport' 		=> 'refresh',
			'sanitize_callback' => 'onward_text_sanitization'
		)
	);

	$wp_customize->add_control(
		new Onward_Image_Radio_Button_Custom_Control(
			$wp_customize,
			'onward_single_product_sidebar_settings',
			array(
				'label'    		=> esc_html__( 'Woo — Single Product Sidebar Design:', 'onward' ),
				'description' 	=> esc_html__( 'Select your desired style for the blog posts sidebar', 'onward' ),
				'section'  		=> 'onward_sidebar',
				'settings' 		=> 'onward_single_product_sidebar_settings',
				'priority' 		=> 1,
				'choices'  		=> onward_blog_sidebars(),
			)
		)
	);
	// End of the sidebar


  // Start of WooCommerce
  if( is_plugin_active( 'woocommerce/woocommerce.php' ) ):
	$wp_customize->add_section(
	  'onward_woocommerce_section',
	  array(
		'title'					=> esc_html__( 'Woo Styles', 'onward' ),
		'priority'				=> 6,
		'panel'					=> 'onward_themeoptions',
	  )
	);

	// WooCommerce primary styling
	$wp_customize->add_setting(
	  'onward_woocommerce_settings',
	  array(
		'default'				=> 'default',
		'transport'				=> 'refresh',
		'sanitize_callback' 	=> 'onward_text_sanitization'
	  )
	);
  
	$wp_customize->add_control(
	  'onward_woocommerce_settings',
	  array(
		'label'					=> esc_html__( 'WooCommerce Primary Style', 'onward' ),
		'priority'				=> 1,
		'type'					=> 'select',
		'section'				=> 'onward_woocommerce_section',
		'settings'				=> 'onward_woocommerce_settings',
		'choices'				=> onward_woocommerce_style(),
	  )
	);

	// WooCommerce cart styling
	$wp_customize->add_setting(
		'onward_woocommerce_cart_settings',
		array(
		  'default'				=> 'no-cart',
		  'transport'			=> 'refresh',
		  'sanitize_callback'	=> 'onward_text_sanitization'
		)
	);
	
	  $wp_customize->add_control(
		'onward_woocommerce_cart_settings',
		array(
		  'label'				=> esc_html__( 'WooCommerce Cart Style', 'onward' ),
		  'priority'			=> 1,
		  'type'				=> 'select',
		  'section'				=> 'onward_woocommerce_section',
		  'settings'			=> 'onward_woocommerce_cart_settings',
		  'choices'      		=> onward_woocommerce_cart_style(),
		)
	);

	// WooCommerce account styling
	$wp_customize->add_setting(
		'onward_woocommerce_account_settings',
		array(
		  'default'				=> 'no-account',
		  'transport'			=> 'refresh',
		  'sanitize_callback'	=> 'onward_text_sanitization'
		)
	);
	
	  $wp_customize->add_control(
		'onward_woocommerce_account_settings',
		array(
		  'label'				=> esc_html__( 'WooCommerce Account Style', 'onward' ),
		  'priority'			=> 1,
		  'type'				=> 'select',
		  'section'				=> 'onward_woocommerce_section',
		  'settings'			=> 'onward_woocommerce_account_settings',
		  'choices'      		=> onward_woocommerce_account_style(),
		)
	);


	endif;
	// End of WooCommerce

	// Start of colors
	$wp_customize->add_section(
		'onward_main_color_section',
		array(
			'title' 			=> esc_html__( 'Colors', 'onward' ),
			'priority' 			=> 5,
			'panel' 			=> 'onward_themeoptions',
		)
	);

	// Set the primary color
	$wp_customize->add_setting(
		'onward_main_color',
		array(
			'default' 			=> onward_defaults( 'onward_main_color' ),
			'sanitize_callback' => 'sanitize_hex_color'
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'onward_main_color',
			array(
				'label'			=> esc_html__( 'Primary Color', 'onward' ),
				'priority' 		=> 1,
				'section' 		=> 'onward_main_color_section',
				'settings' 		=> 'onward_main_color'
			)
		)
	);

	$onward_color = $wp_customize->get_section( 'colors' );
	if ( is_object( $onward_color ) ) {
		$onward_color->title = __( 'Colors & Dark Mode', 'onward' );
	}
	// End of colors

	// Start of the footer
	$wp_customize->add_section(
		'onward_footer_section',
		array(
			'title' 			=> esc_html__( 'Footer', 'onward' ),
			'priority' 			=> 12,
			'panel' 			=> 'onward_themeoptions',
		)
	);

	$wp_customize->add_setting(
		'onward_footer_top',
		array(
			'default' 			=> onward_defaults( 'onward_footer_top' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_footer_top',
		array(
			'label' 			=> esc_html__( 'Footer Copyright Text', 'onward' ),
			'priority' 			=> 1,
			'type'				=> 'text',
			'section'			=> 'onward_footer_section',
			'settings'			=> 'onward_footer_top'
		)
	);

	$wp_customize->add_setting(
		'onward_footer_name',
		array(
			'default'			=> onward_defaults( 'onward_footer_name' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_footer_name',
		array(
			'label'				=> esc_html__( 'Website Name', 'onward' ),
			'priority'			=> 2,
			'type'				=> 'text',
			'section'			=> 'onward_footer_section',
			'settings'			=> 'onward_footer_name'
		)
	);

	$wp_customize->add_setting(
		'onward_footer_url',
		array(
			'default'			=> onward_defaults( 'onward_footer_url' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_footer_url',
		array(
			'label'				=> esc_html__( 'Website URL', 'onward' ),
			'priority'			=> 2,
			'type'				=> 'text',
			'section'			=> 'onward_footer_section',
			'settings'			=> 'onward_footer_url'
		)
	);

	$wp_customize->add_setting(
		'onward_footer_back_to_top',
		array(
			'default'			=> onward_defaults( 'onward_footer_back_to_top' ),
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'onward_footer_back_to_top',
		array(
			'label'				=> esc_html__( 'Back To Top Text', 'onward' ),
			'priority'			=> 3,
			'type'				=> 'text',
			'section'			=> 'onward_footer_section',
			'settings'			=> 'onward_footer_back_to_top'
		)
	);
	// End of the footer

}
add_action( 'customize_register', 'onward_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function onward_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function onward_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function onward_customize_preview_js() {
	wp_enqueue_script( 'onward-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _ONWARD_VERSION, true );
}
add_action( 'customize_preview_init', 'onward_customize_preview_js' );
