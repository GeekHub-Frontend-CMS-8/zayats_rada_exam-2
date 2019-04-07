<?php
/**
 * rada-exam Theme Customizer
 *
 * @package rada-exam
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function rada_exam_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'rada_exam_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'rada_exam_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'rada_exam_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function rada_exam_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function rada_exam_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function rada_exam_customize_preview_js() {
	wp_enqueue_script( 'rada-exam-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'rada_exam_customize_preview_js' );


function true_customizer_init( $wp_customize ) {

    $true_transport = 'postMessage'; // описание этой переменной чуть ниже

    // Цвета ссылок
    $wp_customize->add_setting(
        'true_link_color', // id
        array(
            'default'     => '#000000', // по умолчанию - черный
            'transport'   => $true_transport // как обновлять превью сайта: $true_transport - асинхронным запросом, 'refresh' - перезагрузкой фрейма, указав значение 'refresh', вы можете полностью отказаться от JavaScript
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'true_link_color', // id
            array(
                'label'      => 'Цвет ссылок',
                'section'    => 'colors', // Стандартная секция - Цвета
                'settings'   => 'true_link_color' // id
            )
        )
    );

    // Добавляем собственную секцию настроек
    $wp_customize->add_section(
        'true_display_options', // id секции, должен прописываться во всех настройках, которые в неё попадают
        array(
            'title'     => 'Отображение',
            'priority'  => 200, // приоритет расположения относительно других секций
            'description' => 'Настройте внешний вид вашего сайта' // описание не обязательное
        )
    );

    // Отображение шапки
    $wp_customize->add_setting(
        'true_display_header', // id
        array(
            'default'    =>  'true', // значение по умолчанию
            'transport'  =>  $true_transport
        )
    );
    $wp_customize->add_control(
        'true_display_header', // id
        array(
            'section'   => 'true_display_options', // название секции
            'label'     => 'Отобразить заголовок?', // название настройки
            'type'      => 'checkbox' // тип - чекбокс
        )
    );

    // Цветовая схема сайта
    $wp_customize->add_setting(
        'true_color_scheme', // id
        array(
            'default'   => 'normal', // ниже смотрите, какие будут значения радио-кнопок
            'transport' => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_color_scheme', // id
        array(
            'section'  => 'true_display_options', // название (id) секции
            'label'    => 'Цветовая схема',
            'type'     => 'radio', // радио-кнопки
            'choices'  => array( // все значения радио-кнопок
                'normal'    => 'Светлая', // перечисляем в виде массива
                'inverse'   => 'Темная'
            )
        )
    );

    // Шрифт
    $wp_customize->add_setting(
        'true_font', // id
        array(
            'default'   => 'arial', // этот шрифт будет задействован по умолчанию
            'type'      => 'theme_mod', // использовать get_theme_mod() для получения настроек, если указать 'option', то нужно будет использовать функцию get_option()
            'transport' => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_font', // id
        array(
            'section'  => 'true_display_options', // секция
            'label'    => 'Шрифт',
            'type'     => 'select', // выпадающий список select
            'choices'  => array( // список значений и лейблов выпадающего списка в виде ассоциативного массива
                'arial'     => 'Arial',
                'courier'   => 'Courier New'
            )
        )
    );

    // Текст копирайта в футере
    $wp_customize->add_setting(
        'true_footer_copyright_text', // id
        array(
            'default'            => 'Все права защищены', // текст по умолчанию
            'sanitize_callback'  => 'true_sanitize_copyright', // функция, обрабатывающая значение поля при сохранении
            'transport'          => $true_transport
        )
    );
    $wp_customize->add_control(
        'true_footer_copyright_text', // id
        array(
            'section'  => 'true_display_options', // id секции
            'label'    => 'Копирайт',
            'type'     => 'text' // текстовое поле
        )
    );

    // Добавляем ещё одну секцию - Настройки фона
    $wp_customize->add_section(
        'true_advanced_options', // id секции
        array(
            'title'     => 'Настройки фона',
            'priority'  => 201 // Приоритет сделаем чуть побольше, благодаря этому секция окажется в самом низу кастомайзера
        )
    );

    // Фоновое изображение
    $wp_customize->add_setting(
        'true_background_image',
        array(
            'default'      => '', // по умолчанию - фоновое изображение не установлено
            'transport'    => $true_transport
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'true_background_image',
            array(
                'label'    => 'Фон сайта',
                'settings' => 'true_background_image',
                'section'  => 'true_advanced_options'
            )
        )
    );
}

add_action( 'customize_register', 'true_customizer_init' );

/*
 * Функция обработки текстовых значений, перед их сохранением в базу
 */
function true_sanitize_copyright( $value ) {
    return strip_tags( stripslashes( $value ) ); // обрезаем слеши и HTML-теги
}

/*
 * CSS для хука wp_head()
 */
function true_customizer_css() {
    echo '<style>';
    // Сначала стили для body
    echo 'body {font-family:';
    switch( get_theme_mod( 'true_font' ) ) { // получаем значение шрифта из параметров и проверяем его
        case 'arial':
            echo 'Arial, Helvetica, sans-serif;';
            break;
        case 'courier':
            echo '\'Courier New\', Courier;';
            break;
        default:
            echo 'Arial, Helvetica, sans-serif;'; // этот шрифт будет задействован по умолчанию
            break;
    }
    if ( 'inverse' == get_theme_mod( 'true_color_scheme' ) ) { // применяем наборы стилей в зависимости от указанной цветовой темы в настройщике
        echo 'background-color:#000;color:#fff;'; // черный фон, белый текст
    } else {
        echo 'background-color:#fff;color:#000;'; // белый фон, черный текст
    }
    if ( 0 < count( strlen( ( $background_image_url = get_theme_mod( 'true_background_image' ) ) ) ) ) { // применяем фоновое изображение, если указано
        echo 'background-image: url( \'' . $background_image_url . '\' );';
    }
    echo '}'; // стили для <body> закончились

    // Теперь ссылки
    echo 'a { color: ' . get_theme_mod( 'true_link_color' ) . '; }';

    // Показать или скрыть шапку сайта
    if( false === get_theme_mod( 'true_display_header' ) ) {
        echo '#header { display: none; }'; // display:none конечно не лучший вариант, но мы просто рассматриваем это как пример
    }
    echo '</style>';
}
add_action( 'wp_head', 'true_customizer_css' ); // вешаем на wp_head

/*
 * Подключение скриптов
 */
function true_customizer_live() {
    wp_enqueue_script(
        'true-theme-customizer', // название скрипта, указываем что угодно
        get_stylesheet_directory_uri() . '/js/theme-customizer.js', // URL
        array( 'jquery', 'customize-preview' ), // зависимости от других скриптов
        null, // версия, ну её
        true // подключить в футере
    );
}
add_action( 'customize_preview_init', 'true_customizer_live' );
