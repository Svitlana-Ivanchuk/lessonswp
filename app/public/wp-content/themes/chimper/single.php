<?php get_header(); ?>

<div class="container">
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

$value = get_field( "icon" );

if( $value ) {
    echo wp_kses_post( $value );
} else {
    return the_title();
}
echo '<span class = "dashicons-before '.$value.'"></span>';

the_content();

$gallery = get_post_meta(get_the_ID(), '_gallery', true);
if (!empty($gallery)) {
    echo '<div class="post-gallery">';
    foreach ($gallery as $image) {
        echo '<img src="' . esc_url($image) . '" alt="">';
    }
    echo '</div>';
}
?>
</div>

<?php get_footer(); ?>
