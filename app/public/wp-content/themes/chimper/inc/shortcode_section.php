<?php
// Шоткоды
add_shortcode('section_shortcode', 'section_shortcode_function');

function section_shortcode_function ( $atts ) {
    ob_start();
    $atts = shortcode_atts( [
    'rubric' => 'Noname',
    'count'  => 4,
    ], $atts );
    $category = get_term_by('name', 'Наши продукты', 'category');
    if ($category) {
        $category_id = $category->term_id;
    }

    // Параметры запроса
    $args = array(
        'cat' => $category_id, // Использование ID категории
        'posts_per_page' => 4, // Количество постов для получения (например, 5)
        'order' => 'DESC', // Порядок сортировки (DESC или ASC)
        'orderby' => 'date', // Поле для сортировки (date, title и т.д.)
    );
     ?>

    <section class="section ft-feature-1">
        <div class="container">
            <div class="row align-items-stretch">
                <div class="col-12 bg-black w-100 ft-feature-1-content">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="h-100">
                                <div class="mb-5  align-items-center">
                                    <div>
                                        <?php

                                        // получим ID картинки из метаполя термина
                                        $image_id = get_term_meta( $category_id, '_thumbnail_id', 1 );

                                        // ссылка на полный размер картинки по ID вложения
                                        $image_url = wp_get_attachment_image_url( $image_id, 'full' );

                                        // выводим картинку на экран
                                        echo '<img src="'. $image_url .'" alt="" class="image1" width="100%" />';
                                        ?>

                                    </div>
                                    <h2>Welcome To Chimper An Awward Winning Web Agency</h2>
                                </div>

                            </div>
                        </div>


                        <div class="col-lg-5 ml-auto">

<?php
    $query = new WP_Query($args);
    while ($query->have_posts()) {
        $query->the_post();?>
        <div class="mb-5">
            <h3 class="d-flex align-items-center">
                <?php $value = get_field( "icon" );
               echo '<strong class = "dashicons-before '.$value.'"></strong>';?>
                <span><?php the_title(); ?></span>
            </h3>
            <p><?php the_excerpt(); ?></p>
            <p><a href="<?php the_permalink(); ?>">Read More</a></p>
        </div>
        <?php
    }
        ?>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    /* Восстанавливаем оригинальные данные поста */
    wp_reset_postdata();

    return ob_get_clean();
}