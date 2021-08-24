<footer class="site-footer">
      <div class="container container--narrow">
        <div class="site-footer__buttons">
          <nav class="social-icon-list">
            <a href="<?php echo esc_url(get_field('github', get_option( 'page_on_front' ))); ?>" target="_blank" rel="noopener noreferer" class="social"
              ><i class="fa fa-github fa-lg" aria-hidden="true"></i
            ></a>            
            <a href="<?php echo esc_url(get_field('facebook', get_option( 'page_on_front' ))); ?>" target="_blank" rel="noopener noreferer" class="social"
              ><i class="fa fa-facebook fa-lg" aria-hidden="true"></i
            ></a>
            <a href="<?php echo esc_url(get_field('instagram', get_option( 'page_on_front' ))); ?>" target="_blank" rel="noopener noreferer" class="social"
              ><i class="fa fa-instagram fa-lg" aria-hidden="true"></i
            ></a>
            <a href="<?php echo esc_url(get_field('linkedin', get_option( 'page_on_front' ))); ?>" target="_blank" rel="noopener noreferer" class="social"
              ><i class="fa fa-linkedin fa-lg" aria-hidden="true"></i
            ></a>
            <a href="<?php echo esc_url(get_field('twitter', get_option( 'page_on_front' ))); ?>" target="_blank" rel="noopener noreferer" class="social"
              ><i class="fa fa-twitter fa-lg" aria-hidden="true"></i
            ></a>
            <a href="mailto:wentlingjessica@gmail.com?subject=Mail from Personal Site" class="social"
              ><i class="fa fa-envelope fa-lg" aria-hidden="true"></i
            ></a>
            <a href="<?php $resume = get_field('resume', get_option( 'page_on_front' )); echo $resume['url']; ?>" class="social"
              ><i class="fa fa-file fa-lg" aria-hidden="true"></i
            ></a>
          </nav>
        </div>

        <div class="site-footer__info">
          <p>
            <a href="<?php echo esc_url(get_field('github_repo', get_option( 'page_on_front' ))); ?>" target="_blank" rel="noreferer noopener"
              >Website designed and built by Jessica Wentling.</a
            >
          </p>
        </div>
      </div>
    </footer>

    <i class="to-top-btn fa fa-angle-double-up fa-2x" id="to-top-btn" title="Back to top" aria-hidden="true"></i>

    <div class="search-overlay" <?php if(current_user_can( 'manage_options' )) { ?> style="margin-top: 30px;" <?php } ?>>
      <div class="search-overlay__top">
        <div class="search-overlay__inner container">
          <i class="fa fa-search fa-lg search-overlay__icon" aria-hidden="true"></i>
          <input type="text" class="search-term" id="search-term" placeholder="Whatcha searchin' for?" autocomplete="off">
          <i class="fa fa-close fa-lg search-overlay__close" aria-hidden="true"></i>
        </div>
      </div>
      <div class="search-overlay__bottom container">
        <div class="search-overlay__results">
        </div>
      </div>
    </div>

    <!-- This adds the black admin bar up top on the front end -->
    <?php 
    wp_footer(  ); 
    ?>

    </body>
</html>