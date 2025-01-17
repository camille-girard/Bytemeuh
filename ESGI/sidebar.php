<?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
    <aside id="secondary" class="widget-area" style="background-color: <?php echo get_theme_mod('sidebar_bg_color', '#ffffff'); ?>; color: <?php echo get_theme_mod('sidebar_text_color', '#000000'); ?>;">
        <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    </aside>
<?php endif; ?>
