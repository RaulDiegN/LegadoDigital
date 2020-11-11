$(function() {
    $('.form-testament').on('submit', function (e){
        e.preventDefault();

        var username = $('#description').val();
        var email = $('#text_testament').val();
        var email = $('#text_annexed').val();
        var url = $(this).attr('action');
        var dataform = $(this).serialize();
        var $modal = $('.modal');

        $modal.show();

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/subirTestamento.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    if (response !=='ok') {
                        $('#error-subirTestamento').remove();
                        $('#text_testament').after('<span id="error-recover" class="error">' + 'Error de guardado' + '</span>');
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
