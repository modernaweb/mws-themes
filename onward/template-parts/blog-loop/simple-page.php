<?php
if(have_posts()) :
	while(have_posts()) : the_post();

        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php onward_post_thumbnail(); ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
        </article>
        <?php
	endwhile;
    the_posts_navigation();
else: echo '<h1>' . esc_html__('No Posts Yet', 'onward') . '</h1>';
endif;

?>