<?php
if(have_posts()) :
	while(have_posts()) : the_post();

        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php if( !empty( onward_post_thumbnail() ) ){ ?>
                <div class="featured-image-box">
                    <?php onward_post_thumbnail(); ?>
            </div>
                <?php } ?>
            <div class="content-box">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php the_excerpt(); ?>
                <a class="blog-read-more" href="<?php the_permalink(); ?>"><span><?php echo esc_html__('Read More', 'onward'); ?></span></a>
            </div>
        </article>
        <?php
	endwhile;
    the_posts_navigation();
else: echo '<h6>' . esc_html__('No Posts Yet', 'onward') . '</h6>';
endif;

?>