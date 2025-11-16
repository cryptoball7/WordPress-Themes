<?php
/**
 * Startup Launchpad functions and setup
 */

if (!function_exists('slp_setup')):
  function slp_setup(){
    load_theme_textdomain('startup-launchpad', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('search-form','comment-form','gallery'));
    register_nav_menus(array('primary' => __('Primary Menu','startup-launchpad')));
  }
endif;
add_action('after_setup_theme','slp_setup');

function slp_scripts(){
  wp_enqueue_style('slp-style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
  wp_enqueue_style('slp-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
  wp_enqueue_script('slp-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
  wp_localize_script('slp-main','slp_ajax',array('ajax_url'=>admin_url('admin-ajax.php'),'nonce'=>wp_create_nonce('slp_nonce')));
}
add_action('wp_enqueue_scripts','slp_scripts');

// Widget area for footer/newsletter
function slp_widgets(){
  register_sidebar(array(
    'name'=>'Footer Widgets',
    'id'=>'footer-widgets',
    'before_widget'=>'<div class="footer-widget">',
    'after_widget'=>'</div>',
  ));
}
add_action('widgets_init','slp_widgets');

// AJAX newsletter subscribe handler (stores email in option for later processing or external API)
function slp_handle_subscribe(){
  check_ajax_referer('slp_nonce','nonce');
  $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
  if (!is_email($email)){
    wp_send_json_error(array('message'=>__('Invalid email','startup-launchpad')));
  }
  // Example: store in transient / option, admin can pull later. In production, integrate with Mailchimp/SendGrid API.
  $list = get_option('slp_newsletter_list', array());
  $list[] = array('email'=>$email,'time'=>current_time('mysql'));
  update_option('slp_newsletter_list', $list);
  wp_send_json_success(array('message'=>__('Thanks — you're subscribed!','startup-launchpad')));
}
add_action('wp_ajax_nopriv_slp_subscribe','slp_handle_subscribe');
add_action('wp_ajax_slp_subscribe','slp_handle_subscribe');

// Shortcode for newsletter form
function slp_newsletter_shortcode($atts){
  ob_start();
  ?>
  <form id="slp-newsletter" class="newsletter" method="post" action="#">
    <input type="email" name="email" placeholder="Enter your email" required aria-label="Email address">
    <button type="submit">Subscribe</button>
    <div id="slp-msg" role="status" aria-live="polite" style="display:none;margin-left:10px"></div>
  </form>
  <?php
  return ob_get_clean();
}
add_shortcode('slp_newsletter','slp_newsletter_shortcode');

// Cleanup for security: hide wp-generator header
remove_action('wp_head','wp_generator');

?>