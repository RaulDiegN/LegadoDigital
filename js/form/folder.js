$(function() {
    $('.form-folder').on('submit', function (e){
        e.preventDefault();

        var folder = $('#folder').val();
        var url = $(this).attr('action');
        var dataform = $(this).serialize();
        var $modal = $('.modal');

        $('#error-folder').remove();
        if (folder === '') {
            $('#error-folder').after('El nombre del usuario no puede estar vacío');
        }

        $modal.show();

        if ($(this).find('.error').length !== 0) {
            $modal.hide();
            return;
        }

        setTimeout(function () {

            $.ajax({
                method: 'POST',
                url: 'include/ajax/folder.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    var result = JSON.parse(response);
console.log(result);
console.log(result.response);
                    if (result.response !== 'ok') {
                        $('#error-folder').remove();
                        $('#folder').after('<span id="error-folder" class="error"> '+ result.response +'</span>');
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
