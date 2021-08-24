<?php 

add_action( 'rest_api_init', 'jwSearch');

function jwSearch() {
    register_rest_route( 'jw/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'jwSearchResults'
    ));
}

function jwSearchResults($data) {
    $mainQuery = new WP_Query(array(
        'post_type' => array('post', 'page'),
        's' => sanitize_text_field($data['term'])
    ));

    $results = array(
        'blogPosts' => array(),
        'categories' => array()
    );

    while($mainQuery->have_posts()) {
        $mainQuery->the_post(  );
        $category = get_the_category(  );

        // Only query posts
        if(get_post_type( ) == 'post') {
            array_push($results['blogPosts'], array(
                'title' => get_the_title( ),
                'category' => $category[0]->name,
                'categoryUrl' => get_category_link($category[0]->cat_ID),
                'image' => get_the_post_thumbnail_url( get_the_ID(  ), 'postThumbnail' ),
                'date' => get_the_time('F j, Y'),
                'excerpt' => get_the_excerpt( ),
                'tags' => wp_get_post_tags( get_the_ID(), array('fields' => 'names') ),
                'url' => get_the_permalink( )
            ));

            // Set up the category list. If the category is in the array already, then dont add it again
            if(!in_array($category[0]->name, array_column($results['categories'], 'title'))){
                array_push($results['categories'], array(
                    'title' => $category[0]->name,
                    'image' => 'TODO',
                    'excerpt' => category_description($category[0]->cat_ID),
                    'url' => get_category_link($category[0]->cat_ID)
                ));
            }
        }
    }

    wp_reset_postdata(  );
    return $results;
}