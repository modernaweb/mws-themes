<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package onward
 */
$onward_footer_top = esc_html__( 'Copyright © 2026. All rights reserved — Powered by', 'onward' );
$onward_footer_name = esc_html__( 'WordPress', 'onward' );
$onward_footer_url = esc_html__( 'https://wp.org/themes/onward/', 'onward' );
$onward_footer_back_to_top = esc_html__( 'Back to Top', 'onward' );

if ( get_theme_mod( 'onward_footer_top' ) ) $onward_footer_top = wp_kses_post( get_theme_mod( 'onward_footer_top' ) );
if ( get_theme_mod( 'onward_footer_name' ) ) $onward_footer_name = wp_kses_post( get_theme_mod( 'onward_footer_name' ) );
if ( get_theme_mod( 'onward_footer_url' ) ) $onward_footer_url = wp_kses_post( get_theme_mod( 'onward_footer_url' ) );
if ( get_theme_mod( 'onward_footer_back_to_top' ) ) $onward_footer_back_to_top = wp_kses_post( get_theme_mod( 'onward_footer_back_to_top' ) );

?>

	<footer id="colophon" class="site-footer footer">
		<div class="site-info">
			<?php echo $onward_footer_top; ?>
			<a href="<?php echo esc_url( $onward_footer_url ); ?>"><?php echo $onward_footer_name; ?></a>
		</div>
		<a class="back-to-top" href="#onward-wrap"><span><?php echo $onward_footer_back_to_top; ?></span></a>
	</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>