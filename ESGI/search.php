<?php get_header(); ?>

<main id="main-content" class="search-results-page">
    <h1>Search results for: <span class="search-query"><?php echo get_search_query(); ?></span></h1>


    <?php if (have_posts()) : ?>
        <div class="search-results">
            <?php while (have_posts()) : the_post(); ?>
                <div class="search-result-item">
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <div class="search-meta">
                        <div class="search-category">
                            <?php the_category(', '); ?>
                        </div>
                        <time class="search-date">
                            , <?= wp_date('j F Y', strtotime($post->post_date)); ?>
                        </time>
                    </div>
                    <div><?php the_excerpt(); ?></div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else : ?>
        <p>No results found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
