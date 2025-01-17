<?php
$location_street = get_theme_mod('esgi_location_street', '242 Rue du Faubourg Saint-Antoine');
$location_code = get_theme_mod('esgi_location_code', '75020 Paris FRANCE');
$team = esgi_get_team();

usort($team, function($a, $b) {
    $order = ['Manager' => 1, 'CEO' => 2];
    return $order[$a['position']] <=> $order[$b['position']];
});
?>

<div class="contact-info">
    <div class="contact-item">
        <h5><?php _e('Location', 'esgi-theme'); ?></h5>
        <p><?php echo esc_html($location_street); ?></p>
        <p><?php echo esc_html($location_code); ?></p>
    </div>
    <?php foreach ($team as $member): ?>
        <?php if ($member['position'] == 'Manager' || $member['position'] == 'CEO'): ?>
            <div class="contact-item">
                <h5><?php echo esc_html($member['position']); ?></h5>
                <p><?php echo esc_html($member['number']); ?></p>
                <p><a href="mailto:<?php echo esc_html($member['email']); ?>"><?php echo esc_html($member['email']); ?></a></p>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</div>
