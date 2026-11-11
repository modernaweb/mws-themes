<?php
/**
 * My Account navigation
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/navigation.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_account_navigation' );
?>

<nav class="woocommerce-MyAccount-navigation">

	<span class="onward-top-acc">
		<span class="my-account-avatar"><?php echo get_avatar( get_current_user_id(), 140 ); ?></span>
		<?php $current_user = wp_get_current_user(); ?>
		<span class="my-acc-welcome">
			<?php
			printf(
				/* translators: %s: user display name */
				esc_html__( 'Hello %s', 'onward' ),
				esc_html( $current_user->display_name ? $current_user->display_name : $current_user->nickname )
			);
			?>
			<a href="<?php echo esc_url( wc_logout_url() ); ?>"><?php esc_html_e( 'Logout', 'onward' ); ?></a>
		</span>
	</span>

	<ul>
		<?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
			<li class="<?php echo esc_attr( wc_get_account_menu_item_classes( $endpoint ) ); ?>">
				<a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>"><?php echo esc_html( $label ); ?></a>
			</li>
		<?php endforeach; ?>
	</ul>
</nav>

<?php do_action( 'woocommerce_after_account_navigation' ); ?>
