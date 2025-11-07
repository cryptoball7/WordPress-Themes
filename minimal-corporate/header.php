<?php
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header">
  <div class="container">
    <div style="display:flex;align-items:center;gap:12px">
      <div class="site-branding">
        <?php if(has_custom_logo()) the_custom_logo(); ?>
        <div>
          <div class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></div>
          <div class="site-description"><?php bloginfo('description'); ?></div>
        </div>
      </div>
    </div>
    <nav class="site-nav" aria-label="Primary menu">
      <?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'items_wrap'=>'%3$s')); ?>
    </nav>
  </div>
</header>