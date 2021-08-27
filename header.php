<!DOCTYPE html>
<html class="dark-theme">
    <head>
      <!-- Google Tag Manager -->
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-TQVRQW4');</script>
      <!-- End Google Tag Manager -->

        <?php
          // include_once("analytics.php");
          wp_head(  );
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>


    <body id="page-top">
      <!-- Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TQVRQW4"
      height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!-- End Google Tag Manager (noscript) -->

    <header class="site-header" <?php if(current_user_can( 'manage_options' )) { ?> style="margin-top: 30px;" <?php } ?>>
      <div class="container">
        <div class="jw-logo">
          <a href="<?php echo site_url( ); ?>">
          <img src="<?php site_icon_url(); ?>" alt="Jessica Wentling Logo"/>
          </a>
        </div>

        <span class="site-header__mobile-search search-trigger"
            ><i class="fa fa-search fa-lg" aria-hidden="true"></i
          ></span>
        <!-- <span class="site-header__mobile-search search-trigger"
            ><i class="light-dark-toggler fa fa-adjust fa-lg" title="Toggle Light/Dark Theme" aria-hidden="true"></i></span> -->

        <div class="site-header__menu-wrap">
          <div class="site-header__mobile-menu">
            <i
              class="hamburger fa fa-bars fa-lg"
              aria-label="menu"
            ></i>
            <div class="site-header__menu">
              <nav class="main-nav">
                <ul>
                  <?php wp_nav_menu(array( 
                    'theme_location' => 'siteMenuLocation' )); ?>
                </ul>
              </nav>
              <div class="site-header__buttons">
                <a href="mailto:wentlingjessica@gmail.com?subject=Mail from Personal Site" class="btn btn--accent">Contact</a>
                <a href="<?php $resume = get_field('resume', get_option( 'page_on_front' )); echo $resume['url']; ?>" class="btn btn--ghost">Resume</a>
                <span class="site-header__search search-trigger"
                  ><i class="fa fa-search fa-lg" title="Search blog posts" aria-hidden="true"></i
                ></span>
                <!-- <i class="light-dark-toggler fa fa-adjust fa-lg" title="Toggle Light/Dark Theme" aria-hidden="true"></i> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
