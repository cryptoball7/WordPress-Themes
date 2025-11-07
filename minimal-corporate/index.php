<?php get_header(); ?>
<main>
  <?php if(is_front_page()){
    get_template_part('front-page');
  } else {
    if(have_posts()):
      while(have_posts()):the_post();?>
        <article class="container sections">
          <h1><?php the_title(); ?></h1>
          <div><?php the_content(); ?></div>
        </article>
      <?php endwhile;
    endif;
  } ?>
</main>
<?php get_footer(); ?>
