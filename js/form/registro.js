$(function () {
    $('.form-register').on('submit', function (e) {
        e.preventDefault();

        var $name = $('#name'),
            $lastname = $('#lastname'),
            $nickname = $('#nickname'),
            $email = $('#email'),
            $password = $('#password'),
            $repassword = $('#repassword'),
            dataform = $(this).serialize(),
            url = $(this).attr('action'),
            $modal = $('.modal')
        ;

        $('#error-name').remove();
        if ($name.val() === '') {
            $name.after('<span id="error-name" class="error">El nombre no puede estar vacío</span>');
        }

        $('#error-lastname').remove();
        if ($lastname.val() === '') {
            $lastname.after('<span id="error-lastname" class="error">Los apellidos de usuario no puede estar vacío</span>');
        }

        $('#error-nickname').remove();
        if ($nickname.val() === '') {
            $nickname.after('<span id="error-nickname" class="error">El nombre de usuario no puede estar vacío</span>');
        } else if ($nickname.val().length > 20) {
            $nickname.after('<span id="error-nickname" class="error">El nombre de usuario debe tener menos de 21 caracteres</span>');
        }

        $('#error-email').remove();
        if ($email.val() === '') {
            $email.after('<span id="error-email" class="error">El correo no puede estar vacío</span>');
        }

        $('#error-password').remove();
        if ($password.val() === '' || $password.val().length < 6) {
            $password.after('<span id="error-password" class="error">La longitud de la contraseña debe ser de 6 o más caracteres.</span>');
        }

        $('#error-repassword').remove();
        if ($password.val() !== $repassword.val()) {
            $repassword.after('<span id="error-repassword" class="error">Las contraseñas deben coincidir</span>');
        }

        $modal.show();

        if ($(this).find('.error').length !== 0) {
            $modal.hide();
            return;
        }

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/register.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    $modal.show();

                    if (response !== 'ok') {
                        $('#error-register').remove();
                        $nickname.after('<span id="error-register">' + response + '</span>');
                        $modal.hide();

                        return;
                    }

                    window.location.replace(url);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    });
});
