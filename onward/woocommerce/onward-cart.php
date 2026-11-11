<?php


/**
 * Show cart contents / total Ajax
 */


if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function onward_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		?>
		<span class="cart-count">
			<span class="count-number"><?php echo esc_html( WC()->cart->get_cart_contents_count() ); ?></span>
		</span>
		<?php
		$fragments['.cart-count'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'onward_woocommerce_cart_link_fragment' );

if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function onward_woocommerce_cart_link() {
		// $cart_icon = get_theme_mod( 'cart_icon', 'icon-cart' );

		$link = '<a class="cart-contents" href="' . esc_url( wc_get_cart_url() ) . '" title="' . esc_attr__( 'View your shopping cart', 'onward' ) . '">';
		$link .= onward_svg( array( 'icon' => 'cart', 'class' => 'icon-cart' ) );
		$link .= '<span class="cart-count">';
		$link .= '<span class="count-number">' . esc_html( WC()->cart->get_cart_contents_count() ) . '</span>';
		$link .= '</span>';
		$link .= '</a>';


		return $link;
	}
}

if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function onward_woocommerce_header_cart() {
		$show_cart						= get_theme_mod( 'enable_header_cart', 1 );
		$show_wishlist					= get_theme_mod( 'shop_product_wishlist_layout', 'layout1' ) !== 'layout1' ? true : false;
		$enable_header_wishlist_icon	= get_theme_mod( 'enable_header_wishlist_icon', 1 );

		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>


		<?php if ( $show_cart ) : ?>
		<div id="onward-header-cart" class="onward-header-cart header-item mini-cart-<?php echo ( count( WC()->cart->get_cart() ) > 2 ? 'has-scroll' : 'has-no-scroll' ); ?>">
			<div class="<?php echo esc_attr( $class ); ?>">
				<?php echo onward_woocommerce_cart_link(); ?>
			</div>
			<div class="onward-cart-box">
				<?php
					$instance = array('title' => esc_html__( 'Your Cart', 'onward' ),);
					the_widget( 'WC_Widget_Cart', $instance );
				?>
			</div>
		</div>
		<?php endif; ?>
		<?php if( $show_wishlist && $enable_header_wishlist_icon ) : 
			$wishlist_count = isset( $_COOKIE['woocommerce_items_in_cart_onward_wishlist'] ) ? count( explode( ',', sanitize_text_field( wp_unslash( $_COOKIE['woocommerce_items_in_cart_onward_wishlist'] ) ) ) ) : 0; ?>
			<a class="header-item header-wishlist-icon" href="<?php echo esc_url( get_permalink( get_option('onward_wishlist_page_id') ) ); ?>" title="<?php echo esc_attr__( 'Your wishlist', 'onward' ); ?>">
				<span class="count-number"><?php echo esc_html( $wishlist_count ); ?></span>
				<?php onward_include_svg_icons( 'icon-wishlist', true ); ?>
			</a>
		<?php endif; ?>
		<?php
	}
}

