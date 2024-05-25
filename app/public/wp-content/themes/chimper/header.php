<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php $title=wp_get_document_title(); echo $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700,900" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <div class="border-bottom top-bar py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">

                        <?php
                        $tel = get_theme_mod('phone', '');
                        if (!empty($tel)) :
                            echo '<span ><strong class="icon-phone"></strong> <a href="tel:'.preg_replace('/[^\d]/','', $tel) . '" class="p-2">'.$tel.'</a></span>';
                        endif ?>

                        <?php
                        $email = get_theme_mod('email', '');
                        if (!empty($email)) :
                            /*echo '<span><strong class="icon-envelope"></strong> <a href="mailto:'.$email.'" class="p-2">'.$email.'</a></span>';*/
                        echo '<span><strong class="icon-envelope"></strong><a href="mailto:mail@mail.com">Почта</a></span>';
                        endif ?>

                    </p>
                </div>
                <div class="col-md-6">
                    <ul class="social-media">
                        <li><?php
                            $facebook = get_theme_mod('facebook', '');
                            if (!empty($facebook)) :
                                echo '<span><a href="'.$facebook.'" class="p-2" target="_blank" ><strong><span class="icon-facebook"></span></strong></a></span>';
                            endif ?></li>

                        <li><?php
                            $instagram = get_theme_mod('instagram', '');
                            if (!empty($instagram)) :
                                echo '<span><a href="'.$instagram.'" class="p-2" target="_blank" ><strong><span class="icon-instagram"></span></strong></a></span>';
                            endif ?></li>

                        <li><?php
                            $github = get_theme_mod('github', '');
                            if (!empty($github)) :
                                echo '<span><a href="'.$github.'" class="p-2" target="_blank" ><strong><span class="icon-github"></span></strong></a></span>';
                            endif ?></li>

                        <li><?php
                            $linkedin = get_theme_mod('linkedin', '');
                            if (!empty($linkedin)) :
                                echo '<span><a href="'.$linkedin.'" class="p-2" target="_blank" ><strong><span class="icon-linkedin"></span></strong></a></span>';
                            endif ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <header class="site-navbar py-4 bg-white" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-11 col-xl-2">
                    <h1 class="mb-0 site-logo"><a href="index.html" class="text-primary h1 mb-0">ISvitlana</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <?php $args = array( // опции для вывода верхнего меню, чтобы они работали, меню должно быть создано в админке
                            'theme_location' => 'top', // идентификатор меню, определен в register_nav_menus() в functions.php
                            'container'=> false, // обертка списка, div или nav. false - без обертки
                            'menu_id' => 'top-nav-ul', // id для ul
                            'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',// Шаблон обёртки для элементов меню. Шаблон обязательно должен иметь плейсхолдер %3$s, остальное опционально.
                            'menu_class' => 'site-menu js-clone-nav mr-auto d-none d-lg-block', // класс для ul
                            'menu'            => '', // Меню которое нужно вывести. Можно указать: id, slug или название меню.
                            'container_class' => '', // Значение атрибута class="" у контейнера меню.
                            'container_id'    => '', // Значение атрибута id="" у контейнера меню.
                            'echo'            => true, // Вывести на экран или в переменную
                            'before'          => '', // Текст перед тегом <a> в меню.
                            'after'           => '', // Текст после каждого тега </a> в меню.
                            'link_before'     => '', // Текст перед анкором каждой ссылки в меню.
                            'link_after'      => '', // Текст после анкора каждой ссылки в меню.
                            'depth'           => 2, // Уровень вложенности. 0 - все уровни.
                            'walker'          => new My_Walker_Nav_Menu(),
                        );
                        wp_nav_menu($args); // выводим верхнее меню
                        ?>
                    </nav>
                </div>

                <div>
                    <?php get_template_part('template-parts/search');?>
                </div>

                <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span
                                class="icon-menu h3"></span></a>
                </div>

            </div>

        </div>
    </header>

</div>

</body>