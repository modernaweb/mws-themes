<?php
/**
 * Single Product Thumbnails
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-thumbnails.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     11.1.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$gallery_class = '\Automattic\WooCommerce\Internal\ProductGallery\ProductMediaGallery';
$media_items   = array();
$has_video     = false;

if (
	class_exists( $gallery_class )
	&& is_callable( array( $gallery_class, 'get_product_media_gallery_items_for_display' ) )
	&& is_callable( array( $gallery_class, 'get_gallery_video_html' ) )
	&& $product instanceof WC_Product
) {
	$media_items = $gallery_class::get_product_media_gallery_items_for_display( $product );

	if ( ! is_array( $media_items ) ) {
		$media_items = array();
	}

	foreach ( $media_items as $media_item ) {
		if ( 'video' === ( isset( $media_item['media_type'] ) ? $media_item['media_type'] : '' ) ) {
			$has_video = true;
			break;
		}
	}
}

if ( $has_video && count( $media_items ) > 1 ) {
	foreach ( array_slice( $media_items, 1 ) as $key => $media_item ) {
		$attachment_id = isset( $media_item['id'] ) ? absint( $media_item['id'] ) : 0;
		$media_type    = isset( $media_item['media_type'] ) ? $media_item['media_type'] : '';

		if ( 'video' === $media_type ) {
			$html = $gallery_class::get_gallery_video_html( $media_item, false );
			echo apply_filters( 'woocommerce_single_product_video_thumbnail_html', $html, $attachment_id, $media_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			continue;
		}

		if ( ! $attachment_id ) {
			continue;
		}

		$html = wc_get_gallery_image_html( $attachment_id, false, $key );
		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
	}
} else {
	$attachment_ids = $product->get_gallery_image_ids();

	if ( $attachment_ids && $product->get_image_id() ) {
		foreach ( $attachment_ids as $attachment_id ) {
			echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', wc_get_gallery_image_html( $attachment_id ), $attachment_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped
		}
	}
}
