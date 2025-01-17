<section class="partners-section">
    <section class="partners-section">
        <?php if (!is_page_template('page-partners.php')) : ?>
            <h2><?php _e('Our Partners', 'esgi'); ?></h2>
        <?php endif; ?>
        <div class="partners-container">
            <?php
            $partners = esgi_get_partners();
            foreach ($partners as $index => $partner_url) {
                if ($partner_url) {
                    ?>
                    <div class="partner-logo">
                        <img src="<?php echo esc_url($partner_url); ?>" alt="<?php echo esc_attr('Partner ' . $index); ?>">
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </section>
