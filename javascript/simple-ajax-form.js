(function ($) {
    'use strict';
    
    var form = $('.ajax-form'),
      message = $('.ajax-return-message'),
      form_data;
    
    function handle_response(response) {
      message.fadeIn()
      message.html(response);
      setTimeout(function () {
        message.fadeOut();
      }, 10000);
    }
    
    form.submit(function (e) {
      e.preventDefault();
      form_data = $(this).serialize();
      $.ajax({
        type: 'POST',
        url: form.attr('action'),
        data: form_data
      })
      .done(handle_response)
      .fail(handle_response);
    }); })(jQuery);