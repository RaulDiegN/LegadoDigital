$(function () {
    $('.form-modify-data').on('submit', function (e) {
        e.preventDefault();

        var $name = $('#name'),
            $lastname = $('#lastname'),
            $nickname = $('#nickname'),
            $email = $('#email'),
            $password = $('#password'),
            $repassword = $('#repassword'),
            $telephone = $('#telephone'),
            $age = $('#age'),
            $birthday = $('#birthday'),
            dataform = new FormData(this),
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
        if ($password.val().length > 0 && $password.val().length < 6) {
            $password.after('<span id="error-password" class="error">La longitud de la contraseña debe ser de 6 o más caracteres.</span>');
        }

        $('#error-repassword').remove();
        if ($password.val() !== $repassword.val()) {
            $repassword.after('<span id="error-repassword" class="error">Las contraseñas deben coincidir</span>');
        }

        $('#error-age').remove();
        if ($age.val().length > 0 && parseInt($age.val()) < 18) {
            $age.after('<span id="error-age" class="error">Tienes que ser mayor de edad</span>');
        }

        $('#error-telephone').remove();
        var pattern = "^([+]?[(]?[0-9]{1,4}[)]?)?\s?([0-9]{9}|[0-9]{2}\s[0-9]{3}\s[0-9]{2}\s[0-9]{2}|[0-9]{3}\s[0-9]{3}\s[0-9]{3})$",
            regex = new RegExp(pattern, "g")
        ;

        if ($telephone.val().length > 0 && !regex.test($telephone.val())) {
            $telephone.after('<span id="error-telephone" class="error">El teléfono de ser válido</span>');
        }

        $modal.show();

        if ($(this).find('.error').length !== 0) {
            $modal.hide();
            return;
        }

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/modify-data.php',
                data: dataform,
                cache: false,
                processData: false,
                contentType: false,
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

    $("#image").change(function(){
        readURL(this);
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
});
