<?php
/** Front page template that outputs flexible sections and template parts */
?>
<div class="hero">
  <div class="container">
    <h1><?php echo esc_html(get_theme_mod('mincorp_hero_title','Minimal Corporate — Clean, focused, reliable')); ?></h1>
    <p><?php echo esc_html(get_theme_mod('mincorp_hero_sub','A lightweight theme that puts content and typography first.')); ?></p>
    <p><a href="#" class="cta"><?php _e('Get Started','minimal-corporate'); ?></a></p>
  </div>
</div>

<?php // If widget areas are active, output them as flexible sections. Developers can add widgets or the user can place blocks in custom HTML widgets.
if(is_active_sidebar('hp-section-1')) dynamic_sidebar('hp-section-1');
else get_template_part('template-parts/section','features');

if(is_active_sidebar('hp-section-2')) dynamic_sidebar('hp-section-2');
else get_template_part('template-parts/section','pricing');

if(is_active_sidebar('hp-section-3')) dynamic_sidebar('hp-section-3');
else get_template_part('template-parts/section','contact');
?>