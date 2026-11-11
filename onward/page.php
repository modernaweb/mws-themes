<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package onward
 */

get_header();


$set_onward_page_sidebar = get_theme_mod( 'onward_page_sidebar_settings', onward_defaults( 'onward_page_sidebar_settings' ) );
$onward_page_sidebar = isset($set_onward_page_sidebar) ? $set_onward_page_sidebar : 'nosidebar';


?>
	<main id="primary" class="">
		<div class="site-main page <?php echo $onward_page_sidebar;?>">

			<?php if( $onward_page_sidebar == 'leftsidebar' || $onward_page_sidebar == 'bothsidebar'){
				echo '<div class="sidebar">';
				get_sidebar('left');
				echo '</div>';
			} ?>

			<div class="main-box">
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; ?>
			</div>
			<?php if( $onward_page_sidebar == 'rightsidebar' || $onward_page_sidebar == 'bothsidebar'){
				echo '<div class="sidebar">';
				get_sidebar('right');
				echo '</div>';
			} ?>
			
		</div>
	</main>
<?php
get_footer();
