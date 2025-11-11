<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="fp-header">
    <div class="fp-container">
        <div class="fp-brand">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <h1 class="fp-site-title"><?php bloginfo('name'); ?></h1>
            </a>
            <p class="fp-tagline"><?php bloginfo('description'); ?></p>
        </div>
        <nav class="fp-nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'fp-menu',
                'fallback_cb' => false,
            ));
            ?>
        </nav>
    </div>
</header>
