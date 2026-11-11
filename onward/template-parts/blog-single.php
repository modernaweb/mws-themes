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

$set_onward_post_sidebar = get_theme_mod( 'onward_single_post_sidebar_settings', onward_defaults( 'onward_single_post_sidebar_settings' ) );
$onward_blog_post_sidebar = isset($set_onward_post_sidebar) ? $set_onward_post_sidebar : 'nosidebar';


while ( have_posts() ) :
	the_post();
?>
	<div class="featured-image-box">
		<div class="main-meta">
			<div class="blog-meta-data">
				<span class="blog-meta-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 65 ); ?></span>
				<span class="other-blog-meta">
					<span class="blog-meta-author"><?php onward_posted_by(); ?></span>
					<span class="blog-meta-date"><?php onward_posted_on(); ?></span>
				</span>
			</div>
			<div class="blog-title"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
		</div>
		<?php onward_post_thumbnail(); ?>
	</div>
	<div class="content-box <?php echo $onward_blog_post_sidebar;?>">

		<?php if( $onward_blog_post_sidebar == 'leftsidebar' || $onward_blog_post_sidebar == 'bothsidebar'){
			echo '<div class="sidebar">';
			get_sidebar('left');
			echo '</div>';
		} ?>

		<div class="post-content">
			<div class="blog-content"><?php the_content( sprintf( wp_kses( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'onward' ), array( 'span' => array( 'class' => array(), ), ) ), wp_kses_post( get_the_title() ) ) ); ?></div>
			<span class="blog-meta-tags"><?php the_tags( '', '' ); ?></span>
			<div class="nxt-prv-posts"><?php the_post_navigation(
				array( 'prev_text' => '<span class="nav-title">%title</span>'. onward_svg( array( 'icon' => 'arrow-left', 'class' => 'icon-cart' ) ) .'',
					    'next_text' => '<span class="nav-title">%title</span>'. onward_svg( array( 'icon' => 'arrow-right', 'class' => 'icon-cart' ) ) .'', ) ); ?>
			</div>
			<div class="comment-box"><?php if ( comments_open() || get_comments_number() ) : comments_template(); endif; ?></div>
		</div>


		<?php if( $onward_blog_post_sidebar == 'rightsidebar' || $onward_blog_post_sidebar == 'bothsidebar'){
			echo '<div class="sidebar">';
			get_sidebar('right');
			echo '</div>';
		} ?>
	</div>
<?php endwhile; ?>

