<?php


/**
 * Show account contents / total Ajax
 */


if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function onward_woocommerce_header_account() {
		$show_account					= get_theme_mod( 'enable_header_account', 1 );

		if ( $show_account ) :
			echo '<div id="onward-header-account" class="onward-header-account"><a class="onward-header-item" href="' . esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ) . '" title="' . esc_html__( 'Your account', 'onward' ) . '">' . onward_svg( array( 'icon' => 'user-account', 'class' => 'icon-cart' ) ) . '</a></div>';
		endif;

	}
}

