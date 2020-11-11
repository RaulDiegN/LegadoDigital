$(document).ready(function () {
    $('#table_id').DataTable();

    $("#table_id tr").click(function () {
        $(this).addClass('selected').siblings().removeClass('selected');
    });
});


$(function () {
    $('.ok').on('click', function (e) {
        e.preventDefault();
        var archivo = $("#table_id tr.selected td:first").html();
        var url = "papelera.php";
        var $modal = $('.modal');

        $('#error-nickname').remove();
        if (archivo === "") {
            $('#table_id').after('<span id="error-nickname" class"error">Se debe seleccionar un archivo a restaurar</span>');
        }

        $modal.show();
        setTimeout(function () {
            $.ajax({
                method: 'GET',
                url: 'include/ajax/restoreArchive.php?archivo=' + archivo,
                //data: dataform,
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
