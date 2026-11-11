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

$set_onward_blog_sidebar = get_theme_mod( 'onward_sidebar_settings', onward_defaults( 'onward_sidebar_settings' ) );
$onward_blog_sidebar = isset($set_onward_blog_sidebar) ? $set_onward_blog_sidebar : 'rightsidebar';

?>
	<main id="primary">
		<div class="site-main index <?php echo $onward_blog_sidebar;?>">
<?php

switch ($onward_blog_sidebar) {
	case 'bothsidebar':
		?>
		<div class="sidebar"><?php get_sidebar('left'); ?></div>
		<div class="main-box"><?php get_template_part('template-parts/blog-loop/simple-blog', '');?></div>
		<div class="sidebar"><?php get_sidebar('right'); ?></div>
		<?php
		break;
	case 'nosidebar':
		?>
		<div class="main-box"><?php get_template_part('template-parts/blog-loop/simple-blog', '');?></div>
		<?php
		break;
	case 'leftsidebar':
		?>
		<div class="sidebar"><?php get_sidebar('left'); ?></div>
		<div class="main-box"><?php get_template_part('template-parts/blog-loop/simple-blog', '');?></div>
		<?php
		break;
	case 'rightsidebar':
		?>
		<div class="main-box"><?php get_template_part('template-parts/blog-loop/simple-blog', '');?></div>
		<div class="sidebar"><?php get_sidebar('right'); ?></div>
		<?php
		break;
	default:
	?>
		<div class="main-box"><?php get_template_part('template-parts/blog-loop/simple-blog', '');?></div>
		<div class="sidebar"><?php get_sidebar('right'); ?></div>
	<?php
		break;
}

?>
		</div>
	</main>
<?php
get_footer();
