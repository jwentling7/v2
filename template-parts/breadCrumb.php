<p class="breadcrumb">
    <a href="<?php echo site_url( '/blog' ); ?>" class="breadcrumb__parent"><i class="fa fa-home" aria-hidden="true" type="text/html"></i> Blog Home</a>
            
    <span class="breadcrumb__main">&ensp;»&ensp;
        <?php
            $category = get_queried_object();
                    
            if ($category->parent == 0) {
                single_cat_title( );
            } elseif(is_author()) {
                echo 'Posts by ';
                the_author();
            } else {
                the_category('&ensp;»&ensp;', 'multiple');
            } ?>
    </span>
</p>