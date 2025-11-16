<?php get_header(); ?>
<section class="main">
  <div class="container">
    <div class="row">
      <div class="card" style="grid-column: span 8;">
        <?php if (have_posts()): while (have_posts()): the_post(); ?>
          <article id="post-<?php the_ID(); ?>">
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="entry-content"><?php the_excerpt(); ?></div>
          </article>
        <?php endwhile; endif; ?>
      </div>
      <aside class="card" style="grid-column: span 4;">
        <h3>Product demo</h3>
        <p>Quick links, features, and signup call-to-action.</p>
        <?php echo do_shortcode('[slp_newsletter]'); ?>
      </aside>
    </div>
  </div>
</section>
<?php get_footer(); ?>
