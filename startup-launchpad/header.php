<?php
/** Header with video hero */
?><!doctype html>
<html <?php language_attributes(); ?>><head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header">
  <div class="hero" role="banner">
    <?php // Video background can be a <video> or an image fallback. Replace src with your MP4 / webm files. ?>
    <video class="video-bg" autoplay muted loop playsinline>
      <source src="<?php echo esc_url( get_template_directory_uri() . '/assets/media/launch-hero.mp4' ); ?>" type="video/mp4">
    </video>
    <div class="overlay"></div>
    <div class="container">
      <nav class="site-nav" aria-label="Main navigation">
        <div class="brand">
          <?php if (function_exists('the_custom_logo') && has_custom_logo()): the_custom_logo(); else: ?><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a><?php endif; ?>
        </div>
        <?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'menu')); ?>
      </nav>

      <div class="hero-content">
        <h1><?php bloginfo('name'); ?> — Launch fast. Scale faster.</h1>
        <p class="lead"><?php bloginfo('description'); ?> Build, demo and convert — all in one place.</p>
        <?php echo do_shortcode('[slp_newsletter]'); ?>
      </div>
    </div>
  </div>
</header>
<main class="site-main">
