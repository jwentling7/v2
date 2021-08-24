<?php

if ( SITECOOKIEPATH != COOKIEPATH ) setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

require get_theme_file_path( '/inc/search.php' );

function jw_files() {
    wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400&display=swap' );
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );

        wp_enqueue_script('jw_main_script', get_theme_file_uri( '/js/scripts.js' ), NULL, '1.0', true);
        wp_enqueue_style( 'jw_main_styles', get_theme_file_uri('/css/style.css') );

    wp_localize_script( 'jw_main_script', 'jwData', array(
        'root_url' => get_site_url()
    ));
}

add_action( 'wp_enqueue_scripts', 'jw_files' );

function jw_features() {
    register_nav_menu( 'siteMenuLocation', 'Site Menu Location' );
    register_nav_menu( 'categoryMenuLocation', 'Category Menu Location' );
    add_theme_support( 'title-tag' );
    add_image_size( 'pageBanner', 1600, 600, true );
    add_image_size( 'postThumbnail', 500, 210, true );
}

add_action( 'after_setup_theme', 'jw_features' );

// Make custom sizes selectable from WordPress admin.
function custom_image_sizes( $size_names ) {
    $new_sizes = array(
        'pageBanner' => __( 'Page Banner'),
        'postThumbnail' => __( ' Custom Post Thumbnail'),
    );
    return array_merge( $size_names, $new_sizes );
}

add_filter( 'image_size_names_choose', 'custom_image_sizes' );

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

// Activate HTML5 features
add_theme_support( 'html5', array(
    'comment-list', 'comment-form'
));

// Removes prefix of Cat, Tag, Author, etc.
function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );