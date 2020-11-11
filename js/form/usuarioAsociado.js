$(function() {
    $('.form-asociado').on('submit', function (e){
        e.preventDefault();

        var username = $('#name').val();
        var lastname = $('#lastname').val();
        var email = $('#email').val();
        var dni = $('#dni').val();
        var url = $(this).attr('action');
        var dataform = $(this).serialize();
        var $modal = $('.modal');

        $modal.show();

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/usuarioAsociado.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    if (response !=='ok') {
                        $('#error-usuarioAsociado').remove();
                        $('#name').after('<span id="error-recover" class="error">' + 'Error de guardado' + '</span>');
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