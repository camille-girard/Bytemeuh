<?php get_header(); ?>

<main id="main-content">

    <h1><?php the_title(); ?></h1>

        <div class="featured-image">
            <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
            } ?>
        </div>

        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;

        ?>

    </main>

    <?php get_footer(); ?>
