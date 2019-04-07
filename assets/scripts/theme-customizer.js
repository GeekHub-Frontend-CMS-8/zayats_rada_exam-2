jQuery(function( $ ) {

    // цвет ссылок сайта
    wp.customize( 'true_link_color', function( value ) {
        value.bind( function( to ) {
            $( 'a' ).css( 'color', to ); // ко всем ссылкам применяем заданный цвет
        } );
    });

    // отображение/скрытие шапки сайта
    wp.customize( 'true_display_header', function( value ) {
        value.bind( function( to ) {
            false === to ? $( '#header' ).hide() : $( '#header' ).show(); // скрываем или отображаем #header
        } );
    });

    // изменение цветовой схемы
    wp.customize( 'true_color_scheme', function( value ) {
        value.bind( function( to ) {
            if ( 'inverse' === to ) {
                $( 'body' ).css({ // в данном примере мы меняем только цвет фона и текста
                    'background-color': '#000', // черный фон
                    'color':      '#fff' // белый текст
                });
            } else {
                $( 'body' ).css({
                    'background-color': '#fff', // белый фон
                    'color':      '#000' // черный цвет текста
                });
            }
        });
    });

    // изменение основного шрифта на сайте
    var sFont;
    wp.customize( 'true_font', function( value ) {
        value.bind( function( to ) {
            switch( to.toString().toLowerCase() ) { // переводим значение селекта в строку и в нижний регистр
                case 'arial':
                    sFont = 'Arial, Helvetica, sans-serif';
                    break;
                case 'courier':
                    sFont = 'Courier New, Courier';
                    break;
                default:
                    sFont = 'Arial, Helvetica, sans-serif';
                    break;
            }
            $( 'body' ).css({
                fontFamily: sFont // применяем шрифт
            });
        });

    });

    // изменяем текст в футере
    wp.customize( 'true_footer_copyright_text', function( value ) {
        value.bind( function( to ) {
            $( '#copyright' ).text( to ); // в элемент #copyright помещаем текст
        });
    });

    // фон сайта
    wp.customize( 'true_background_image', function( value ) {
        value.bind( function( to ) {
            0 === $.trim( to ).length ? $( 'body' ).css( 'background-image', '' ) : $( 'body' ).css( 'background-image', 'url( ' + to + ')' );
        });
    });
});