$(function() {
    $('.form-cajafuertePassword').on('submit', function(e) {
        e.preventDefault();

        var $nickname = $('#nickname'),
            $password = $('#password'),
            $repassword = $('#repetirPassword'),
            url = $(this).attr('action'),
            dataform = $(this).serialize(),
            $modal = $('.modal');

        if ($nickname.val() === '') {
            $nickname.after('<span id="error-nickname" class="error">El nombre del usuario no puede estar vacío</span>');
            return;
        } else {
            $('#error-nickname').remove();
        }

        $('#error-repassword').remove();
        if ($password.val() !== $repassword.val()) {
            $repassword.after('<span id="error-repassword" class="error">Las contraseñas deben coincidir</span>');
        }

        $modal.show();

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/createPasswordCajafuerte.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    if (response !== 'ok') {
                        $('#error-login').remove();
                        $password.after('<span id="error-login" class="error">' + response + '</span>');

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
