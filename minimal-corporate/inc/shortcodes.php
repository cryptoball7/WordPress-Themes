<?php
/** Shortcodes and helpers */

// Simple pricing table shortcode: [minimal_pricing plans="basic:9|pro:29|enterprise:99" features="Feature A,Feature B,Feature C"]
function mincorp_pricing_shortcode($atts){
  \$atts = shortcode_atts(array('plans'=>'Basic:Free','features'=>''),\$atts,'minimal_pricing');
  \$plans_raw = explode('|', \$atts['plans']);
  \$features = array_map('trim', explode(',', \$atts['features']));

  ob_start();
  echo '<div class="container sections"><div class="pricing-grid">';
  foreach(\$plans_raw as \$p){
    list(\$title,\$price) = array_pad(explode(':', \$p),2,'');
    \$title = esc_html(\$title);
    \$price = esc_html(\$price);
    echo '<div class="pricing-card">';
    echo '<h3>'.\$title.'</h3>';
    echo '<div class="price">'.\$price.'</div>';
    if(!empty(\$features)){
      echo '<ul>';
      foreach(\$features as \$f) echo '<li>'.esc_html(\$f).'</li>';
      echo '</ul>';
    }
    echo '<p><a class="cta" href="#">Choose</a></p>';
    echo '</div>';
  }
  echo '</div></div>';
  return ob_get_clean();
}
add_shortcode('minimal_pricing','mincorp_pricing_shortcode');

?>