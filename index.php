<?php get_header(  ); ?>

<main>
    
    <?php get_template_part( 'template-parts/pageBanner' ); ?>

    <section class="section posts">
        <div class="container container--boxed">
          <h2 class="title title--medium-large section__header">Latest Posts</h2>
          
          <?php get_template_part( 'template-parts/list', 'posts' );
          echo paginate_links(); ?>
          
        </div>
      </section>

      <section class="section">
        <div class="container container--boxed">
          <h2 class="title title--medium-large section__header">Categories</h2>

          <?php categoriesList(); ?>
          
        </div>
      </section>
</main>

<?php get_footer(  ); ?>