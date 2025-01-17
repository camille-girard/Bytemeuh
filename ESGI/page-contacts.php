<?php
/* Template Name: Contacts */
get_header(); ?>

<main id="main-content">

    <div class="contacts-content">
        <!-- title -->
        <h1><?php the_title(); ?></h1>

        <p class="page-subtitle">
            <?php echo esc_html(get_post_meta(get_the_ID(), '_esgi_contact_subtitle', true)); ?>
        </p>

        <?php get_template_part('template-parts/contact-info'); ?>

        <!-- featured image -->
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

    </div>
</main>

<?php get_footer(); ?>
