<?php
get_header(); ?>

<main id="main-content">

    <h1><?php the_title(); ?></h1>

    <div class="featured-image">
        <?php if (has_post_thumbnail()) {
            the_post_thumbnail();
        } ?>
    </div>

    <?php get_template_part('template-parts/custom-about-us'); ?>

<section class="latest-blog-posts">
        <h2>Retrouvez nos derniers articles de blog</h2>
        <?php
        $recent_posts = new WP_Query(array(
            'posts_per_page' => 3,
            'post_type' => 'post'
        ));

        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <div class="blog-post">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </section>

    <?php if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>


    <?php get_template_part('template-parts/partners'); ?>


</main>

<?php get_footer(); ?>
