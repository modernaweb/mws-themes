<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onward
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="onward-wrap" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'onward' ); ?></a>
	<div class="menu-overlay"></div>
	<?php
		$set_onward_cart		= get_theme_mod( 'onward_woocommerce_cart_settings', onward_defaults( 'onward_woocommerce_cart_settings' ) );
		$onward_cart			= isset($set_onward_cart) ? $set_onward_cart : 'no-cart';
		$set_onward_account		= get_theme_mod( 'onward_woocommerce_account_settings', onward_defaults( 'onward_woocommerce_account_settings' ) );
		$onward_account			= isset($set_onward_account) ? $set_onward_account : 'no-account';

	?>
	<header id="mainheader" class="site-header <?php echo $onward_cart;?> <?php echo $onward_account;?>" role="banner">
		<div class="wrapper">
			<div id="site-menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<?php
					echo onward_svg( array( 'icon' => 'menu', 'class' => 'icon-menu' ) );
					echo onward_svg( array( 'icon' => 'close', 'class' => 'icon-menu' ) );
					?>					
					<span class="menu-label"><?php esc_html_e( 'Menu', 'onward' ); ?></span>
				</button>

				<div class="site-branding">
					<div class="site-branding-wrapper">
						<div id="site-details">
							<?php
								if( has_custom_logo() ):
									the_custom_logo();
								else: 
									if ( is_front_page() && is_home() ) :
										?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
										<?php
									else :
										?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
										<?php
									endif;
									$onward_description = get_bloginfo( 'description', 'display' );
									if ( $onward_description || is_customize_preview() ) :?>
										<p class="site-description"><?php echo $onward_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
									<?php endif;
								endif;
							?>
						</div>
					</div>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'onward' ); ?>">
					<?php
					wp_nav_menu( 
						array(
						'theme_location' => 'primary',
						'container' => 'div',
						'menu_class' => 'menu nav-menu',
						'menu_id' => 'primary-menu',
						'echo' => true,
						'fallback_cb' => 'onward_menu_fallback_cb',
						) 
					);
					?>
				</nav><!-- #site-navigation -->
				<?php

					if( is_plugin_active( 'woocommerce/woocommerce.php' ) ):

						if ($onward_account == 'on-header' && $onward_cart == 'on-header') {
							?>
								<div class="onward-cart-box onwno">
									<div class="onward-account-contnet onward-account-contnet onward-cart-content">
										<?php echo onward_woocommerce_header_account(); ?>
										<?php echo onward_woocommerce_header_cart(); ?>
									</div>
								</div>
							<?php
						} elseif ($onward_cart == 'on-header') {
							?>
								<div class="onward-cart-box onwno">
									<div class="onward-cart-content">
										<?php echo onward_woocommerce_header_cart(); ?>
									</div>
								</div>
							<?php
						} elseif ($onward_account == 'on-header') {
							?>
								<div class="onward-account-box onwno">
									<div class="onward-account-contnet">
										<?php echo onward_woocommerce_header_account(); ?>
									</div>
								</div>
							<?php
						} else {
							echo '';
						}

					endif;
				?>
			</div><!-- .site-menu -->
		</div><!-- .wrapper -->
	</header><!-- #mainheader -->