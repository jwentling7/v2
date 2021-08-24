<?php get_header(  ); ?>


<main>

      <?php get_template_part( 'template-parts/pageBanner' ); ?>

      <section class="section about-me" id="about-me">
        <div class="container container--boxed">
          <h2 class="section__header title title--medium-large">About Me</h2>
          <div class="about-me__box">
            <div class="about-me__img">
              <img
                src="<?php echo get_field('about_me_portrait')['url']; ?>"
                alt="Jessica Wentling"
              />
            </div>
            <div class="about-me__bio">
              <?php echo get_field('about_me_bio'); ?>
            </div>
          </div>
        </div>
      </section>

      <?php the_content( ); ?>

      <section class="section posts">
        <div class="container container--boxed">
          <h2 class="section__header title title--medium-large">
            Latest Blog Posts
          </h2>
          
          <?php get_template_part( 'template-parts/list', 'posts' ); ?>

          <div class="view-all-btn"><a href="<?php echo site_url( '/blog' ); ?>" class="btn btn--accent">View All Posts</a></div>
        </div>
      </section>

      <section class="section work-together">
          <div class="container container--narrow">
            <h2 class="section__header title title--medium-large">Let's Work Together!</h2>
            <p>
              I am currently looking for opportunities in Web and Software
              Development. What I will bring to the team is my eye for detail
              and my programming knowledge.
            </p>
            <div class="work-together__buttons">
              <a href="mailto:wentlingjessica@gmail.com?subject=Mail from Personal Site" class="btn btn--accent">Contact</a>
              <a href="<?php $resume = get_field('resume', get_option( 'page_on_front' )); echo $resume['url']; ?>" class="btn btn--ghost">Resume</a>
            </div>
          </div>
        </section>

    </main>


  <?php get_footer(  ); ?>