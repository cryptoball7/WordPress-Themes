<?php
/** Customizer: simple options for hero area and accent color */
function mincorp_customize_register($wp_customize){
  // Hero section
  $wp_customize->add_section('mincorp_hero', array('title'=>__('Hero','minimal-corporate'),'priority'=>30,'description'=>'Hero area settings'));
  $wp_customize->add_setting('mincorp_hero_title', array('default'=>'Minimal Corporate — Clean, focused, reliable','sanitize_callback'=>'sanitize_text_field'));
  $wp_customize->add_control('mincorp_hero_title', array('label'=>__('Hero Title','minimal-corporate'),'section'=>'mincorp_hero','type'=>'text'));

  $wp_customize->add_setting('mincorp_hero_sub', array('default'=>'A lightweight theme that puts content and typography first.','sanitize_callback'=>'sanitize_textarea_field'));
  $wp_customize->add_control('mincorp_hero_sub', array('label'=>__('Hero Subheading','minimal-corporate'),'section'=>'mincorp_hero','type'=>'textarea'));

  // Accent color
  $wp_customize->add_setting('mincorp_accent', array('default'=>'#0b66d1','sanitize_callback'=>'sanitize_hex_color'));
  $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'mincorp_accent',array('label'=>__('Accent Color','minimal-corporate'),'section'=>'colors')));
}
add_action('customize_register','mincorp_customize_register');

// Apply accent color inline
function mincorp_customize_css(){
  $accent = get_theme_mod('mincorp_accent','#0b66d1');
  echo "<style>:root{--accent:{$accent}}</style>";
}
add_action('wp_head','mincorp_customize_css');
?>

