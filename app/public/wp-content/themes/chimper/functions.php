<?php
add_action('wp_print_styles', 'add_styles'); // приклеем ф-ю на добавление стилей в хедер
if (!function_exists('add_styles')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
    function add_styles() { // добавление стилей
        if(is_admin()) return false; // если мы в админке - ничего не делаем
        wp_enqueue_style( 'icomoon', get_template_directory_uri().'/fonts/icomoon/style.css');
        wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
        wp_enqueue_style( 'magnific-popup', get_template_directory_uri().'/css/magnific-popup.css' );
        wp_enqueue_style( 'jquery-ui', get_template_directory_uri().'/css/jquery-ui.css' );
        wp_enqueue_style( 'owl-carousel', get_template_directory_uri().'/css/owl.carousel.min.css' );
        wp_enqueue_style( 'owl-theme-default', get_template_directory_uri().'/css/owl.theme.default.min.css' );
        wp_enqueue_style( 'bootstrap-datepicker', get_template_directory_uri().'/css/bootstrap-datepicker.css' );
        wp_enqueue_style( 'flaticon', get_template_directory_uri().'/fonts/flaticon/font/flaticon.css');
        wp_enqueue_style( 'aos', get_template_directory_uri().'/css/aos.css');
        wp_enqueue_style( 'style', get_template_directory_uri().'/css/style.css');
    }
}

add_action('wp_footer', 'add_scripts'); // приклеем ф-ю на добавление скриптов в футер
if (!function_exists('add_scripts')) { // если ф-я уже есть в дочерней теме - нам не надо её определять
    function add_scripts() { // добавление скриптов
        if(is_admin()) return false; // если мы в админке - ничего не делаем
        wp_deregister_script('jquery'); // выключаем стандартный jquery
        wp_enqueue_script('jquery.js',get_template_directory_uri().'/js/jquery-3.3.1.min.js','','',true); // добавляем свой
        wp_enqueue_script('jquery-migrate.js',get_template_directory_uri().'/js/jquery-migrate-3.0.1.min.js','','',true); // добавляем свой
        wp_enqueue_script('jquery-ui.js',get_template_directory_uri().'/js/jquery-ui.js','','',true); // добавляем свой
        wp_enqueue_script('popper.js',get_template_directory_uri().'/js/popper.min.js','','',true); // добавляем свой
        wp_enqueue_script('bootstrap.js',get_template_directory_uri().'/js/bootstrap.min.js','','',true);
        wp_enqueue_script('owl.carousel.js',get_template_directory_uri().'/js/owl.carousel.min.js','','',true);
        wp_enqueue_script('stellar.js',get_template_directory_uri().'/js/jquery.stellar.min.js','','',true);
        wp_enqueue_script('countdown.js',get_template_directory_uri().'/js/jquery.countdown.min.js','','',true);
        wp_enqueue_script('magnific-popup.js',get_template_directory_uri().'/js/jquery.magnific-popup.min.js','','',true);
        wp_enqueue_script('bootstrap-datepicker.js',get_template_directory_uri().'/js/bootstrap-datepicker.min.js','','',true);
        wp_enqueue_script('aos.js',get_template_directory_uri().'/js/aos.js','','',true);
        wp_enqueue_script('typed.js',get_template_directory_uri().'/js/typed.js','','',true);
        wp_enqueue_script('main.js',get_template_directory_uri().'/js/main.js','','',true);
        wp_enqueue_script('search.js',get_template_directory_uri().'/js/search.js','','',true);
    }
}

register_nav_menus(array( // Регистрируем меню
    'top' => 'Верхнее',
    'footer' => 'Подвал',
));

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class ($classes, $item) {	// добавляем активному меню класс
    if (in_array('current-menu-item', $classes) ){
        $classes[] = 'active';
    }
    return $classes;
}

// добавляем класс к пунктам меню которые имеют детей
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 );
function menu_set_dropdown( $sorted_menu_items, $args ) {
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        if ( 0 == $obj->menu_item_parent ) {
            $last_top = $key;
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown has-children';
        }
    }
    return $sorted_menu_items;
}

add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {
    $parents = array();
    foreach ( $items as $item ) {
        if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
            $parents[] = $item->menu_item_parent;
        }
    }

    foreach ( $items as $item ) {
        if ( in_array( $item->ID, $parents ) ) {
            $item->classes[] = 'my-parent-item';
        }
    }

    return $items;
}

class My_Walker_Nav_Menu extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = NULL ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        if ($display_depth > 0)
            $classes = array(
                'dropdown',);
        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }


}

/* Start Добавление пункта настройки сайта */
require_once get_stylesheet_directory() . '/inc/site_properties.php';