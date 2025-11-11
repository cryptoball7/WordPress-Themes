<?php
// Theme setup and asset enqueue
function fp_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('fp-project-thumb', 800, 600, true);
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'freelancer-portfolio'),
    ));
}
add_action('after_setup_theme', 'fp_setup');

function fp_enqueue_assets() {
    wp_enqueue_style('fp-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap', array(), null);
    wp_enqueue_style('fp-main', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0');
    wp_enqueue_script('fp-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '1.0', true);
    wp_localize_script('fp-main', 'fp_vars', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('fp_contact_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'fp_enqueue_assets');

// Register Projects and Testimonials custom post types
function fp_register_cpts() {
    register_post_type('project', array(
        'labels' => array('name' => 'Projects', 'singular_name' => 'Project'),
        'public' => true,
        'supports' => array('title','editor','thumbnail','excerpt'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'projects'),
    ));
    register_post_type('testimonial', array(
        'labels' => array('name' => 'Testimonials', 'singular_name' => 'Testimonial'),
        'public' => true,
        'supports' => array('title','editor','excerpt','thumbnail'),
        'has_archive' => false,
        'rewrite' => array('slug' => 'testimonials'),
    ));
}
add_action('init', 'fp_register_cpts');

// AJAX contact form handler
function fp_handle_contact() {
    check_ajax_referer('fp_contact_nonce', 'nonce');

    $name = sanitize_text_field($_POST['name'] ?? '');
    $email = sanitize_email($_POST['email'] ?? '');
    $message = sanitize_textarea_field($_POST['message'] ?? '');

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error(array('message' => 'Please fill in all fields.'));
    }

    $to = get_option('admin_email');
    $subject = 'New contact from ' . $name;
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = array('Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email);

    $sent = wp_mail($to, $subject, $body, $headers);

    if ($sent) {
        wp_send_json_success(array('message' => 'Thanks — message sent.'));
    } else {
        wp_send_json_error(array('message' => 'Mail could not be sent. Please try again later.'));
    }
}
add_action('wp_ajax_fp_send_contact', 'fp_handle_contact');
add_action('wp_ajax_nopriv_fp_send_contact', 'fp_handle_contact');
