<?php get_header(  ); ?> 

<main>

      <?php get_template_part( 'template-parts/pageBanner' ); ?>

      <section class="section post">
        <div class="container container--boxed ">
          <?php 

            get_template_part( 'template-parts/breadCrumb' );

          // Need the while loop to read out the_author_posts_link()
          while(have_posts(  )) : the_post(  ); ?>

          <div class="post__content">
            <p><?php the_time('F j, Y'); ?></p>
            
            <div class="link-underline">
              <?php the_content( ); ?>
            </div>
          </div>

          <?php endwhile; ?>
        </div>
      </section>
      
      <?php
        if ( comments_open() ) : ?>
        <section class="section comments">
          <div class="container container--boxed ">
          <h2 class="section__header title title--medium-large">
              Leave a Comment!
            </h2>
            <div class="comments__box">
              <?php comments_template(); ?>
            </div>
          </div>
        </section>
      <?php endif; ?>
</main>

<?php get_footer(  ); ?>