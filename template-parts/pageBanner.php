<?php 

// Banner across all pages

    // Sets what page it is on and assign it to $page
    // Used in some of the ACF calls below
    // There an easier way to do this?
    if (is_home(  )) {
        $page = get_option( 'page_for_posts');
    } elseif(is_author( ) OR is_front_page(  )) {
        $page = get_option( 'page_on_front' );
    } elseif(is_archive(  )) {
        $page = get_queried_object();
    }  // TODO preview banner image not working :[
    elseif(is_single( ) OR is_preview(  )) {
        $page = get_the_ID( );
    } else {
        $page = NULL;
    }

    // Sets the title of the page banner
    if(is_archive(  )) {
        $pageInfo['title'] = get_the_archive_title(  );
    } else {
        $pageInfo['title'] = get_the_title($page);
    }

    // Sets the subtitle of the page banner
    // If page is author, use author description
    // Do not have ACF Pro, so using user description
    if(get_field('page_banner_subtitle') AND is_author( )) {
        $pageInfo['subtitle'] = get_the_author_meta( 'user_description' );
    }
    // Else if page is not NULL
    // ACF subtitle
    elseif(get_field('page_banner_subtitle') AND $page) {
        $pageInfo['subtitle'] = get_field('page_banner_subtitle', $page);
    } else {
        $pageInfo['subtitle'] = "";
    }


    // Sets the photo of the page banner
    if (get_field('page_banner_image')) {
        $pageInfo['photo'] = get_field('page_banner_image', $page)['sizes']['pageBanner'];
    }
    // Default page banner is the page banner on the front page
    else {
        $pageInfo['photo'] = get_field('page_banner_image', get_option( 'page_on_front'))['sizes']['pageBanner'];
    }
 ?>


    <!-- 
        Page banner markup 
    -->
    <div class="section page-banner">

        <div
          class="page-banner__bg-image"
          style="background-image: url(
              <?php echo $pageInfo['photo']; ?>);">
                <div class="page-banner__content container">
          <h1 class="page-banner__title title title--large">
            <?php echo $pageInfo['title']; ?>
          </h1>

          <p class="page-banner__intro"><?php 
            echo $pageInfo['subtitle']; ?>
          </p>
          
          <?php if(is_front_page()) { ?>
            <p class="page-banner__btns"><a href="mailto:wentlingjessica@gmail.com?subject=Mail from Personal Site" class="btn btn--accent" type="button/html">Contact Me!</a>
            <a href="<?php $resume = get_field('resume', get_option( 'page_on_front' )); echo $resume['url']; ?>" class="btn btn--ghost" type="button/html">Resume</a></p>
          <?php } ?>

        </div>
    
        </div>

      </div>