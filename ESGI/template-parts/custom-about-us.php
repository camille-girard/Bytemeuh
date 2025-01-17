<?php
    $about_us_page = get_page_by_path('about-us');
    $information_title1 = get_post_meta($about_us_page->ID, '_information_title1', true);
    $information_content1 = get_post_meta($about_us_page->ID, '_information_content1', true);
    $information_title2 = get_post_meta($about_us_page->ID, '_information_title2', true);
    $information_content2 = get_post_meta($about_us_page->ID, '_information_content2', true);
    $information_title3 = get_post_meta($about_us_page->ID, '_information_title3', true);
    $information_content3 = get_post_meta($about_us_page->ID, '_information_content3', true);
    $information_photo = get_post_meta($about_us_page->ID, '_information_photo', true);

    $page_description = get_post_meta($about_us_page->ID, '_custom_page_description', true);
    $page_slogan = get_post_meta($about_us_page->ID, '_custom_page_slogan', true);


    if (is_front_page()) {
        $about_us_page = get_page_by_path('about-us');
        if ($about_us_page) {
            $page_slogan = get_post_meta($about_us_page->ID, '_hp_about_us_title', true);
        }
        if (empty($page_slogan)) {
            $page_slogan = "Welcome to Our Company";
        }
    }
?>

<section class="section-custom">
    <div class="information-section intro">
        <?php if ($page_description || $page_slogan) : ?>
            <div>
                <?php if ($page_slogan) : ?>
                    <h2><?php echo esc_html($page_slogan); ?></h2>
                <?php endif; ?>
                <?php if ($page_description) : ?>
                    <p><?php echo esc_html($page_description); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="about-us">
        <?php if ($information_photo) : ?>
            <img src="<?php echo esc_url($information_photo); ?>" alt="<?php _e('Information Photo', 'textdomain'); ?>" style="max-width: 100%; height: auto;" />
        <?php endif; ?>
        <div class="custom-informations">
            <?php if ($information_title1 || $information_content1) : ?>
                <div class="information-section">
                    <?php if ($information_title1) : ?>
                        <h3><?php echo esc_html($information_title1); ?></h3>
                    <?php endif; ?>
                    <?php if ($information_content1) : ?>
                        <p><?php echo esc_html($information_content1); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($information_title2 || $information_content2) : ?>
                <div class="information-section">
                    <?php if ($information_title2) : ?>
                        <h3><?php echo esc_html($information_title2); ?></h3>
                    <?php endif; ?>
                    <?php if ($information_content2) : ?>
                        <p><?php echo esc_html($information_content2); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ($information_title3 || $information_content3) : ?>
                <div class="information-section">
                    <?php if ($information_title3) : ?>
                        <h3><?php echo esc_html($information_title3); ?></h3>
                    <?php endif; ?>
                    <?php if ($information_content3) : ?>
                        <p><?php echo esc_html($information_content3); ?></p>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
