<?php
/* Template Name: Partners */
get_header();

?>

<main id="main-content">

    <h1><?php the_title(); ?></h1>

<?php get_template_part('template-parts/partners'); ?>

<?php

if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;

?>

</main>

<?php
get_footer();
?>
