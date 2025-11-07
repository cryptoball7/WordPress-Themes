<?php
/**
 * Minimal Corporate functions and definitions
 */

if(!defined('MINCORP_DIR')) define('MINCORP_DIR', get_template_directory());

function mincorp_setup(){
  load_theme_textdomain('minimal-corporate', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption'));
  add_theme_support('custom-logo');
  add_theme_support('responsive-embeds');

  register_nav_menus(array(
    'primary' => __('Primary Menu','minimal-corporate'),
  ));
}
add_action('after_setup_theme','mincorp_setup');

function mincorp_scripts(){
  wp_enqueue_style('mincorp-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
  wp_enqueue_style('mincorp-main', get_template_directory_uri() . '/assets/css/main.css', array(), wp_get_theme()->get('Version'));
  wp_enqueue_script('mincorp-scripts', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), wp_get_theme()->get('Version'), true);
}
add_action('wp_enqueue_scripts','mincorp_scripts');

require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/shortcodes.php';

// Register widget areas used as flexible homepage sections
function mincorp_widgets_init(){
  register_sidebar(array('name'=>'Homepage Section 1','id'=>'hp-section-1','before_widget'=>'<section class="container sections" id="hp-section-1">','after_widget'=>'</section>','before_title'=>'<h2>','after_title'=>'</h2>'));
  register_sidebar(array('name'=>'Homepage Section 2','id'=>'hp-section-2','before_widget'=>'<section class="container sections" id="hp-section-2">','after_widget'=>'</section>','before_title'=>'<h2>','after_title'=>'</h2>'));
  register_sidebar(array('name'=>'Homepage Section 3','id'=>'hp-section-3','before_widget'=>'<section class="container sections" id="hp-section-3">','after_widget'=>'</section>','before_title'=>'<h2>','after_title'=>'</h2>'));
}
add_action('widgets_init','mincorp_widgets_init');

?>
