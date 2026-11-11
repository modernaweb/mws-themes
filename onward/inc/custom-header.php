<?php // Silence is golden

// Onward Blog Sidebars
function onward_blog_sidebars() {

	$layouts = array(
		'bothsidebar'	=> array(
			'image'	=> trailingslashit( get_template_directory_uri() ) . '/assets/images/both-sidebar.svg',
			'name'	=> __( 'Both Sidebar', 'onward' )
		),
		'nosidebar'		=> array(
			'image'	=> trailingslashit( get_template_directory_uri() ) . '/assets/images/no-sidebar.svg',
			'name'	=> __( 'No Sidebar', 'onward' )
		),
		'leftsidebar'	=> array(
			'image'	=> trailingslashit( get_template_directory_uri() ) . '/assets/images/left-sidebar.svg',
			'name'	=> __( 'Left Sidebar', 'onward' )
		),
		'rightsidebar'	=> array(
			'image'	=> trailingslashit( get_template_directory_uri() ) . '/assets/images/right-sidebar.svg',
			'name'	=> __( 'Right Sidebar', 'onward' )
		)
	);

	return $layouts;

}

// Onward WooCommerce Styling
function onward_woocommerce_style() {

    $shop_style = array(
		'default'		=> esc_html__( 'Default', 'onward' ),
		// 'modern'		=> esc_html__( 'Modern', 'onward' ),
		// 'minimal'		=> esc_html__( 'Minimal', 'onward' ),
  );

  return $shop_style;

}

// Onward WooCommerce Cart Styling
function onward_woocommerce_cart_style() {

    $shop_style = array(
		'no-cart'		=> esc_html__( 'Hide', 'onward' ),
		'on-header'		=> esc_html__( 'Show', 'onward' ),
  );

  return $shop_style;

}

// Onward WooCommerce Account Styling
function onward_woocommerce_account_style() {

    $shop_style = array(
		'no-account'		=> esc_html__( 'Hide', 'onward' ),
		'on-header'		=> esc_html__( 'Show', 'onward' ),
  );

  return $shop_style;

}

