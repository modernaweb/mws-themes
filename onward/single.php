<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package onward
 */

 get_header();
 ?>
	 <main id="primary">
		 <div class="site-main single">
			 <?php
				 if ( is_single() && 'post' == get_post_type() ) {
					 ?>
						 <div class="main-box"><?php get_template_part('template-parts/blog-single', '');?></div>
					 <?php 
				 } elseif ( is_single() && 'product' == get_post_type() ) {
					 ?>
						 <div class="main-box"><?php get_template_part('woocommerce/single-product', '');?></div>
					 <?php 
				 } else {
					 ?>
						 <div class="main-box"><?php get_template_part('template-parts/blog-single', '');?></div>
					 <?php 
				 }
			 ?>
		 </div>
	 </main>
 <?php
 get_footer();