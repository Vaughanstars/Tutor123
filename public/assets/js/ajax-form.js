$(document).ready(function() {
    // Make sure CSRF token is sent with all AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var form = $('#contact-form');
    var formMessages = $('.form-messege');

    form.submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                formMessages.removeClass('error').addClass('success').css('color', 'green');
                formMessages.text(response.message);
                form.find('input, textarea').val(''); // also reset select fields
            },
            error: function(xhr) {
                formMessages.removeClass('success').addClass('error').css('color', 'red');

                if (xhr.status === 422 && xhr.responseJSON && xhr.responseJSON.message) {
                    formMessages.text(xhr.responseJSON.message);
                } else {
                    formMessages.text('Oops! Something went wrong.');
                }
            }
        });
    });
});