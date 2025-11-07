<?php
?>
<footer class="footer">
  <div class="container">
    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap">
      <small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</small>
      <div><?php dynamic_sidebar('footer-1'); ?></div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
