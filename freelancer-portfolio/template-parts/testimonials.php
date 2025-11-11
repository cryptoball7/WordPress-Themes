<section id="testimonials" class="fp-section fp-testimonials">
    <div class="fp-container">
        <h3 class="section-title">Testimonials</h3>
        <div class="fp-testimonial-list">
            <?php
            $args = array('post_type' => 'testimonial','posts_per_page' => 5);
            $loop = new WP_Query($args);
            if ($loop->have_posts()):
                while ($loop->have_posts()): $loop->the_post();
            ?>
                <blockquote class="fp-testimonial reveal">
                    <p><?php the_excerpt(); ?></p>
                    <cite>— <?php the_title(); ?></cite>
                </blockquote>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
                <p>No testimonials yet. Add them in the admin → Testimonials.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
