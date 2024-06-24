<?php get_header(); ?>



    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

                <header class="page-header">
                    <h2 class="page-title">
                        <?php printf( __( 'Результати пошуку для: %s', 'textdomain' ), '<span>' . get_search_query() . '</span>' ); ?>
                    </h2>

                </header><!-- .page-header -->

                <?php
                // Начало цикла для отображения постов
                while ( have_posts() ) : the_post();
                    // Вы можете использовать шаблоны контента (content.php) или свои кастомные шаблоны
                    ?>
                <div class="search-item">
                    <div class="thumbnail">
                          <?php the_post_thumbnail( ); ?>
                    </div >
                    <div class="search-item-discription">
                        <h3><a href="<?php echo get_page_link() ?>"><?php the_title();?> </a></h3>
                        <?php the_excerpt();?>
                        <a href="<?php the_permalink(); ?>" title="<?php echo 'Читати далі'; ?>"><?php echo 'Читати далі'; ?></a>
                    </div>
                </div>
                <?php
                endwhile;

                // Добавление пагинации, если это необходимо
                the_posts_navigation();


            else : ?>

                <section class="no-results not-found">
                    <header class="page-header">
                        <h1 class="page-title"><?php _e( 'Нічого не знайдено', 'textdomain' ); ?></h1>
                    </header><!-- .page-header -->

                    <div class="page-content">
                        <p><?php _e( 'Вибачте, але нічого не знайдено за Вашим запитом. Спробуйте інші ключові слова.', 'textdomain' ); ?></p>
                        <div class="">
                            <?php get_search_form(); ?>
                        </div>

                    </div><!-- .page-content -->
                </section><!-- .no-results -->

            <?php endif; ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>