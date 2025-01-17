<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<title><?php the_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header id="main-header" class="<?php if (is_404()) echo 'header-404';?>">
    <div class="container">
        <div class="container-header">
            <div id="site-logo">
                <a href="/">
                    <?php
                    if (is_404()) {
                        echo esgi_get_icon('logo');
                    } else {
                        echo get_custom_logo();
                    }
                    ?>
                </a>
            </div>
            <div class="menu">
                <div class="open-menu" id="open-menu">
                    <a class="open-menu-button" id="menu-icon">
                        <?php
                        if (is_404()) {
                            echo esgi_get_icon('menu_open_white');
                        } else {
                            echo esgi_get_icon('menu_open');
                        }
                        ?>
                    </a>
                </div>
                <nav class="main-menu" id="main-menu">
                    <?php
                    if (has_nav_menu('primary_menu')) {
                        wp_nav_menu([
                            'menu' => 'primary_menu',
                            'container' => '',
                        ]);
                    }
                    ?>
                </nav>
            </div>
        </div>
    </div>
</header>
<?php wp_footer(); ?>
</body>
</html>
