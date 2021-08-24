<?php

if(is_front_page(  )) {
    $homepagePosts = new WP_Query(array(
        'posts_per_page' => 3
      ));

    // Displays the posts list with only 3 at the most showing
    postsList($homepagePosts);
    wp_reset_postdata(  );

} else {
    postsList();
}

// Displays the markup for posts list
function postsList($homePagePosts = NULL) {

    if(!have_posts(  )) { ?>
        <p style="text-align: center;">There are no posts yet.<br/>
        Check back later!</p>
    <?php } ?>

    <div class="posts__box">

            <?php
            // If the homepage
              if($homePagePosts) {
                  while($homePagePosts->have_posts( )) {
                    $homePagePosts->the_post( );
                      postsListMarkUp();
                  }
              } 

              // If any other page
              else {
                  while(have_posts(  )) {
                    the_post(  );
                    postsListMarkUp();
                  }
              } ?>

    </div>
<?php }

// Markup for the posts list - used in postsList() below
function postsListMarkUp($category = NULL) {?>
    <div class="post-item">
        <div class="post-item__img-container">
            <div class="post-item__img" style="background-image: url(<?php 
            
                if($category){
                    echo get_field('page_banner_image', $category)['sizes']['postThumbnail'];
                } else {
                    the_post_thumbnail_url('postThumbnail');
                } ?>);">

                <a href="<?php 

                if($category) {
                    echo get_category_link( $category );
                } else {
                    the_permalink(  );
                }
                
                ?>" type="img/html" style="display: block; width: 100%; height:100%; outline: none;"></a>
            </div>
        </div>
                
        <div class="post-item__info">
            <div class="post-item__title">
                <h3 class="title title--small"><a href="<?php 

                    if($category) {
                        echo get_category_link( $category );
                    } else {
                        the_permalink(  );
                    } 
                
                ?>" type="text/html"><?php 
                
                    if($category) {
                        echo get_cat_name( $category->cat_ID );
                    } else {
                        the_title( );
                    }
                
                ?></a></h3> 
            </div>
            <?php if(!$category) { ?>

                <div class="post-item__meta-info">
                    <p>In <?php echo get_the_category_list(' and '); ?> on <?php the_time('F j, Y'); ?></p>
                </div>

            <?php } ?>
            
            <div class="post-item__summary">
                <?php 

                if($category) {
                    echo category_description($category);
                } else {
                    the_excerpt(  ); 
                } ?>

            </div>
        </div>
  </div>
<?php }

// Displays the markup for the categories list which is just
// named postsListMarkUp()
function categoriesList() { ?>
    <div class="posts__box">

        <?php
            // Did this because I want the top three categories showing first
            // Is there a cleaner way to do this? TODO
            $args1 = array(
                'orderby' => 'ID',
                'order' => 'ASC',
                'include' => '2,3,4',
                'hide_empty' => FALSE
            );
            
            $catTopID = get_categories( $args1 );
            foreach ( $catTopID as $category ) {
                postsListMarkUp($category);
            }

            $args2 = array(
                'orderby' => 'name',
                'order' => 'ASC',
                'exclude' => '1, 2, 3, 4',
                'hide_empty' => FALSE
            );

            $catSubID = get_categories( $args2 );
            foreach ( $catSubID as $category ) {
                postsListMarkUp($category);
            }
            ?>
        
    </div>
<?php }