<footer id="site-footer">
    <div class="container">
        <div class="container-footer">
	<a href="/">
		<?= esgi_get_icon('logo'); ?>
	</a>
            <div class="contact-footer">
                <?php
                $team = esgi_get_team();

                // Sort the team members
                usort($team, function($a, $b) {
                    $order = ['Manager' => 1, 'CEO' => 2];
                    return $order[$a['position']] <=> $order[$b['position']];
                });

                foreach ($team as $member):
                    if ($member['position'] == 'Manager' || $member['position'] == 'CEO'):
                        ?>
                        <div class="contact-footer-item">
                            <h5 class="contact-title"><?php echo esc_html($member['position']); ?></h5>
                            <p><?php echo esc_html($member['number']); ?></p>
                            <p><a href="mailto:<?php echo esc_html($member['email']); ?>"><?php echo esc_html($member['email']); ?></a></p>
                        </div>
                    <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
        <div class="container-footer-footer">
            <div class="rs">
                <ul>
                    <li>
                        <a href="https://www.linkedin.com/company/bytemeuh/">
                            <?= esgi_get_icon('linkedin'); ?>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <?= esgi_get_icon('facebook'); ?>
                        </a>
                    </li>
                </ul>
            </div>
	    <div itemscope itemtype="https://schema.org/PostalAddress" class="address-footer">
                <p><strong>Adresse :</strong></p>
                <p itemprop="streetAddress">242 rue du Faubourg Saint-Antoine</p>
                <p><span itemprop="postalCode">75020</span>, <span itemprop="addressLocality">Paris</span></p>
                <p><span itemprop="addressCountry">France</span></p>
                <p><strong>Téléphone :</strong> <span itemprop="telephone">+33 1 00 00 00 00</span></p>
                <p><strong>Email :</strong> <a href="mailto:info@bytemeuh.fr" itemprop="email">info@bytemeuh.fr</a></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer() ?>
</body>
</html>
