$(function() {
    $('.form-recoverpassword').on('submit', function (e){
        e.preventDefault();

        var username = $('#nickname').val();
        var email = $('#email').val();
        var url = $(this).attr('action');
        var dataform = $(this).serialize();
        var $modal = $('.modal');

        $('#error-nickname').remove();
        if (username === '') {
            $('#nickname').after('<span id="error-nickname" class"error">El nombre de usuario no debe estar vacío</span>');
        }

        $('#error-email').remove();
        if(email ==='') {
            $('#email').after('<span id="error_recover" class"error">'+'El email no debe estar vacio'+ '</span>');
        }


        $modal.show();

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/recoverPassword.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    console.log(response);
                    var result = JSON.parse(response);
                    if (result['result'] !== 'ok') {
                        $('#error-recover').remove();
                        $('#email').after('<span id="error-recover" class="error">' + result['message'] + '</span>');
                        $modal.hide();

                        return;
                    }

                    window.location.replace(url);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, 500);
    });
});
