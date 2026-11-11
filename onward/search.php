<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package onward
 */

get_header();
?>
	<main id="primary">
	<h1 class="page-title"><?php /* translators: %s: search query. */ printf( esc_html__( 'Search Results for: %s', 'onward' ), '<span>' . get_search_query() . '</span>' );?></h1>
		<div class="site-main search">
			<div class="main-box"><?php get_template_part('template-parts/blog-loop/simple-blog', '');?></div>
			<div class="sidebar"><?php get_sidebar(); ?></div>
		</div>
	</main>
<?php
get_footer();