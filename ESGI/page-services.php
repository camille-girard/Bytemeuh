<?php
/* Template Name: Services */
get_header();

?>

<main id="main-content">
    <!-- title -->
    <h1><?php the_title(); ?></h1>

    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
    <div class="featured-image-services">
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail();
                } ?>
    </div>
</main>

<?php
get_footer();
?>
