<?php get_header(); ?>

<?php
the_post();

the_title();

add_filter('the_content', function ($content){
    if (is_single()){
        $content = str_replace('<p>', '<p class="custom-class">', $content);
        return $content;
    }
    return $content;
});

the_content();
?>

<?php get_footer(); ?>
