<section id="projects" class="fp-section fp-projects">
    <div class="fp-container">
        <h3 class="section-title">Selected Projects</h3>
        <div class="fp-grid">
            <?php
            $args = array('post_type' => 'project','posts_per_page' => 6);
            $loop = new WP_Query($args);
            if ($loop->have_posts()):
                while ($loop->have_posts()): $loop->the_post();
                    $thumb = get_the_post_thumbnail_url(get_the_ID(), 'fp-project-thumb');
            ?>
                <article class="fp-card reveal">
                    <?php if ($thumb): ?>
                        <img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <div class="fp-card-body">
                        <h4><?php the_title(); ?></h4>
                        <p><?php the_excerpt(); ?></p>
                        <a class="fp-card-link" href="<?php the_permalink(); ?>">View Project</a>
                    </div>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
            ?>
                <p>No projects yet. Add some from the admin → Projects.</p>
            <?php endif; ?>
        </div>
    </div>
</section>
