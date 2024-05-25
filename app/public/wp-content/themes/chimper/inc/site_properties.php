<?php
add_action('customize_register', function($customizer){ // $customizer это класс
    // WP_Customize_Manager который позволяет подключать элементы управления и настройки

    /*
     * WP_Customize_Manager имеет такие методы:
     *
     * WP_Customize_Manager->add_panel();
     * WP_Customize_Manager->get_panel();
     * WP_Customize_Manager->remove_panel();
     *
     * WP_Customize_Manager->add_section();
     * WP_Customize_Manager->get_section();
     * WP_Customize_Manager->remove_section();
     *
     * WP_Customize_Manager->add_setting();
     * WP_Customize_Manager->get_setting();
     * WP_Customize_Manager->remove_setting();
     *
     * WP_Customize_Manager->add_control();
     * WP_Customize_Manager->get_control();
     * WP_Customize_Manager->remove_control();
     */

    $customizer->add_section(
        'header',
        array(
            'title' => 'Header',
            'priority' => 11,
            'description' => "change tel, email, social",
            /*
                $id — уникальный идентификатор
                $args — массив аргументов
                В массиве $args может быть несколько позиций, а именно:
                title — как секция будет называться
                description — описание секции (необязательно)
                priority — какой по счету будет располагаться секция или ее приоритет (по-умолчанию 10)
                capability — права пользователя, необходимые для изменения данного параметра. Т.е. разные параметры могут видеть разные группы пользователей. Круто! (необязательно)
                theme_supports — указывает на то, что текущая тема должна поддерживать описанную в параметре функцию (необязательно)
             */
        )
    );
    $customizer->add_setting(
        'email',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_email',
        )
    /*
     Метод add_setting() принимает два параметра:

        $id — уникальный идентификатор
        $args — массив аргументов
        В массиве $args может быть несколько позиций, а именно:
        default — значение настройки по-умолчанию
        type — тип настройки
        capability — права пользователя, необходимые для изменения данного параметра. Т.е. разные параметры могут видеть разные группы пользователей. Круто! (необязательно)
        theme_supports — указывает на то, что текущая тема должна поддерживать описанную в параметре функцию (необязательно)
        transport — как изменение настройки будет отображаться в окне предпросмотра. Обновление страницы или AJAX. По умолчанию страница обновляется при каждом обновлении настройки, но если вам интересно могу рассказать, как реализовать это на AJAX, без перезагрузки страницы. Пишите в комментах свои пожелания.
        sanitize_callback — имя функции для фильтрации входных данных, в БД
        sanitize_js_callback — имя функции для фильтрации выходных данных, из БД
     */
    );
    $customizer->add_setting(
        'phone',
        array(
            'default' => '',
            'sanitize_callback' => function($value){return preg_replace('/[^\d+()-]/', '', $value);},
        ));


    $customizer->add_control(
        'email',
        array(
            'label' => 'Введите email',
            'section' => 'header',
            'type' => 'text',
        )
    );

    /*
       ------- add_control - это и есть та настройка куда вводятся данные
        WP_Customize_Manager->add_control( 'setting_id', array(
          'type' => 'date', // тип данных: text, checkbox, textarea, radio, select, dropdown-pages, email, url, number, hidden, date
          'priority' => 10, // приоритет внутри секции
          'section' => 'colors', // Required, core or custom.
          'label' => __( 'Date' ),
          'description' => __( 'This is a date control with a red border.' ),
          'input_attrs' => array(
            'class' => 'my-custom-class-for-js',
            'style' => 'border: 1px solid #900',
            'placeholder' => __( 'mm/dd/yyyy' ),
          ),
          'active_callback' => 'is_front_page',
        ) );
    */

$customizer->add_control(
    'phone',
    array(
        'label' => 'Введите tel',
        'section' => 'header',
        'type' => 'text',
    )
);

});

add_action('customize_register', function($customizer){


    $customizer->add_section(
        'social',
        array(
            'title' => 'Social',
            'priority' => 12,
            'description' => "change social links",
        )
    );
    $customizer->add_setting(
        'facebook',
        array(
            'default' => '',
            'sanitize_callback' => '',
        )

    );
    $customizer->add_setting(
        'instagram',
        array(
            'default' => '',
            'sanitize_callback' => '',
        ));
    $customizer->add_setting(
        'github',
        array(
            'default' => '',
            'sanitize_callback' => '',
        ));

    $customizer->add_setting(
        'linkedin',
        array(
            'default' => '',
            'sanitize_callback' => '',
        ));

    $customizer->add_control(
        'facebook',
        array(
            'label' => 'facebook',
            'section' => 'social',
            'type' => 'text',
        )
    );

    $customizer->add_control(
        'instagram',
        array(
            'label' => 'instagram',
            'section' => 'social',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'github',
        array(
            'label' => 'github',
            'section' => 'social',
            'type' => 'text',
        )
    );
    $customizer->add_control(
        'linkedin',
        array(
            'label' => 'linkedin',
            'section' => 'social',
            'type' => 'text',
        )
    );

});

// ----------------------------------------
add_action('customize_register', function($customizer) {
    $customizer->add_section(
        'test',
        array(
            'title' => 'test',
            'priority' => 12,
            'description' => "test",
        )
    );
    $customizer->add_setting(
        'checkbox',
        array('default' => '1',)
    );
    $customizer->add_control(
        'checkbox',
        array(
            'type' => 'checkbox',
            'label' => 'Скрыть текст',
            'section' => 'test',
        )
    );

    // ---- Группа переключателей
    $customizer->add_setting(
        'radio_setting',
        array('default' => 'item_1')
    );

    $customizer->add_control(
        'radio_setting',
        array(
            'type' => 'radio',
            'label' => 'Переключатели',
            'section' => 'test',
            'choices' => array(
                'item_1' => 'item_1',
                'item_2' => 'item_2',
                'item_3' => 'item_3',
            ),
        )
    );

    // ---- NUMBER
    $customizer->add_setting( 'number_setting' , array(
        'sanitize_callback' => 'absint',
    ));

    $customizer->add_control( 'posts_number_home', array(
        'label'    => 'Выбери число',
        'section'  => 'test',
        'settings' => 'number_setting',
        'type'     => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 10
        )
    ) );

    // ---- COLOR
    $customizer->add_setting('color_setting',
        array(
            'sanitize_callback' => 'sanitize_hex_color',
        )
    );
    $customizer->add_control(
        new WP_Customize_Color_Control(
            $customizer,
            'color_control',
            array(
                'label'      => 'Цвет ссылок',
                'section'    => 'test', // Стандартная секция - Цвета
                'settings'   => 'color_setting',
            )
        )
    );

    // ---- IMAGE
    $customizer->add_setting( 'image_sitting');

    $customizer->add_control(
        new WP_Customize_Image_Control(
            $customizer,
            'image_control',
            array(
                'label'    => 'Изображение в какой-то блок',
                'settings' => 'image_sitting',
                'section'  => 'test'
            )
        )
    );

    // ---- FILE
    $customizer->add_setting( 'file_setting' );
    $customizer->add_control(
        new WP_Customize_Upload_Control(
            $customizer,
            'file_control',
            array(
                'label'    => 'Загрузите файл',
                'settings' => 'file_setting',
                'section'  => 'test'
            )
        )
    );

    // ---- RANGE
    $customizer->add_setting( 'range_setting' );
    $customizer->add_control( 'range_setting', array(
        'type' => 'range',
        'section' => 'test',
        'label' => 'Range',
        'input_attrs' => array(
            'min' => 0,
            'max' => 10,
            'step' => 2,
        ),
    ) );

    $customizer->add_setting( 'cropped_image_setting' );
    $customizer->add_control( new WP_Customize_Cropped_Image_Control( $customizer, 'cropped_image_setting', array(
        'section'     => 'test',
        'label'       => __( 'Croppable Image' ),
        'flex_width'  => false, // Allow any width, making the specified value recommended. False by default.
        'flex_height' => false, // Require the resulting image to be exactly as tall as the height attribute (default).
        'width'       => 300,
        'height'      => 300,
    ) ) );

    /* Вывод checkbox
 if (get_theme_mod('checkbox') == '');*/

    /* Группа переключателей
        $customizer->add_setting(
            'radio',
            array('default' => 'item_1')
        );

        $customizer->add_control(
            'radio',
            array(
                'type' => 'radio',
                'label' => 'Пример переключателей',
                'section' => 'example_section_one',
                'choices' => array(
                    'item_1' => 'item_1',
                    'item_2' => 'item_2',
                    'item_3' => 'item_3',
                ),
            )
        );
     */
    /*
        Выпадающий список.

        $customizer->add_setting(
            'select',
            array('default' => 'Вордпресса')
        );

    $customizer->add_control(
        'select',
        array(
            'type' => 'select',
            'label' => 'Кто мы?',
            'section' => 'example_section_one',
            'choices' => array(
                'Человеки' => 'Человеки',
                'Стахановцы' => 'Стахановцы',
                'Крутые ребята' => 'Крутые ребята',
                'НЛО' => 'НЛО',
            ),
        )
    );*/
});