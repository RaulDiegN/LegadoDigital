$(function() {
    $('#form-create-responsePassword').on('submit', function (e){
        e.preventDefault();

        var question =$('#desplePregunta');
        var response = $('#response').val();
        var url = $(this).attr('action');
        var dataform = $(this).serialize();
        var $modal = $('.modal');

        $('#error-response').remove();
        if ( response === '') {
            $('#response').after('<span id="error-response" class="error"> La respuesta esta vacia </span>');
        }      

        $('#error-desplePregunta');
        if(question = ''){
            $('#desplePregunta').after('<span id="error-response" class="error"> Debes elegir una pregunta </span>')
        }
        
        $modal.show();

        setTimeout(function () {
            $.ajax({
                method: 'POST',
                url: 'include/ajax/createRecoverPassword.php',
                data: dataform,
                beforeSend: function () {
                    $('[type="submit"]', $(this)).attr('disabled', 'disabled');
                },
                success: function (response) {
                    console.log(response);
                    var result = JSON.parse(response);
                    if (result['result'] !== 'ok') {
                        $('#error-recover').remove();
                        $('response').after('<span id="error-recover" class="error">' + result['message'] + '</span>');
                        $modal.hide();

                        return;
                    }

                    //window.location.replace(url);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }, 500);
    });
});