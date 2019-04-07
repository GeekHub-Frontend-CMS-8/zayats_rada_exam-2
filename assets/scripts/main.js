(function($) {
  $('.btn__calendar').on('click', function (e) {
    e.preventDefault();
    $('.calendar').addClass('calendar_show');
    $('#html--hidden').addClass('html--hidden');
  });

  $('.btn_close').on('click', function () {
    $('.calendar').removeClass('calendar_show');
    $('#html--hidden').removeClass('html--hidden');
  });

  $('.subscribe__mail').on('focus', function () {
    $('.subscribe').addClass('form_focus');
  });

  $('.subscribe__mail').on('blur', function () {
    $('.subscribe').removeClass('form_focus');
  });

  $('.input_field').on('focus', function () {
    $(this).parent().parent().find('.filed_label').addClass('label_focus')
  });

  $('.input_field').on('blur', function () {

    if ($('.input_field').val() == "") {
      $(this).parent().parent().find('.filed_label').removeClass('label_focus')
    }
    else {
      $(this).parent().parent().find('.filed_label').addClass('label_focus')
    }
  })
})(jQuery);

//change border color on main page form (red color)
var wpcf7Elm = document.querySelector( '.wpcf7' );
var alert = document.querySelector('.subscribe');

wpcf7Elm.addEventListener( 'wpcf7invalid', function( event ) {
  alert.classList.add("alert");

}, false );








