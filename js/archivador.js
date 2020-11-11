$(function () {
    // Initializa DataTable
    $("#table_id").dataTable({
        "order": [],
        "aoColumns": [
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false },
            { "bSortable": false }
        ]
    });

    $('.eliminar').on('click', function (e) {
        e.preventDefault();

        var file = $(this).closest('tr').find('.first-line').text().trim();
        var $t = $(this);

        $.ajax({
            method: 'POST',
            url: 'include/ajax/delete-file.php',
            data: {
                'file': file
            },
            success: function (response) {
                if (response !== 'ok') {
                    return ;
                }

                showMessage('Archivo movido a la papelera');
                $t.closest('tr').remove();
            },
            error: function (message) {
                console.log('Something went wrong');
            }
        });
    });

    function showMessage(message)
    {
        $('#info-message').text(message);
        $('#info-message').fadeIn();

        setTimeout(function () {
            $('#info-message').fadeOut();
            $('#info-message').text('');
        }, 4000);
    }
});
