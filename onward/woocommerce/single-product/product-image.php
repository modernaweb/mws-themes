<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 11.1.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);

$gallery_class    = '\Automattic\WooCommerce\Internal\ProductGallery\ProductMediaGallery';
$first_media_item = array();
$is_video         = false;

if (
	class_exists( $gallery_class )
	&& is_callable( array( $gallery_class, 'get_product_media_gallery_items_for_display' ) )
	&& is_callable( array( $gallery_class, 'get_gallery_video_html' ) )
	&& $product instanceof WC_Product
) {
	$media_items      = $gallery_class::get_product_media_gallery_items_for_display( $product );

	if ( ! is_array( $media_items ) ) {
		$media_items = array();
	}

	$first_media_item = isset( $media_items[0] ) ? $media_items[0] : array();
	$is_video         = ! empty( $first_media_item ) && 'video' === ( isset( $first_media_item['media_type'] ) ? $first_media_item['media_type'] : '' );
}
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<figure class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $is_video ) {
			$first_media_id = isset( $first_media_item['id'] ) ? absint( $first_media_item['id'] ) : $post_thumbnail_id;
			$html           = $gallery_class::get_gallery_video_html( $first_media_item, true );
			echo apply_filters( 'woocommerce_single_product_video_thumbnail_html', $html, $first_media_id, $first_media_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		} else {
			if ( $post_thumbnail_id ) {
				$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
			} else {
				$html  = '<div class="woocommerce-product-gallery__image--placeholder">';
				$html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'onward' ) );
				$html .= '</div>';
			}

			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
		}

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</figure>
</div>
