<?php
get_header(); ?>

<main id="main-content" class="article-single-page">
    <div class="content-area">
    <h1 class="post-title"><?php the_title(); ?></h1>

        <div class="site-main">
            <?php
            if (get_theme_mod('has_sidebar')) {
                get_sidebar();
            } ?>
            <div class="article-content">
                <div class="featured-image">
                    <?php if (has_post_thumbnail()) {
                        the_post_thumbnail();
                    } ?>
                </div>

                <!-- Post Meta -->
                <div class="post-meta">
                    <div class="post-category">
                        <?php the_category(', '); ?>
                    </div>
                    <time class="post-date">
                        - <?= wp_date('j F, Y', strtotime($post->post_date)); ?>
                    </time>
                </div>

                <!-- Post Content -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <!-- Post Tags -->
                <div class="post-tags">
                    <?php the_tags('<ul><li>', '</li><li>', '</li></ul>'); ?>
                </div>

                <!-- Comments Section -->
                <div class="post-comments">
                    <?php
                    if ( comments_open() || get_comments_number() ) {
                        comments_template();
                    }
                    ?>
                </div>


            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
