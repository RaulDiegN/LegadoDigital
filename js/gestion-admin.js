$(function () {
    $('#table_id').DataTable();

    $('.editar').on('click', function (e) {
        e.preventDefault();

        var userId = $(this).closest('tr').find('.first-line').text();
    });

    $('.eliminar').on('click', function (e) {
        e.preventDefault();

        deleteAction($(this));
    });

    $('.bloquear').on('click', function (e) {
        e.preventDefault();

        switchStatus($(this));
    });

    $('.desbloquear').on('click', function (e) {
        e.preventDefault();

        switchStatus($(this));
    });

    function switchStatus(action)
    {
        var userId = action.closest('tr').find('.first-line').text(),
            userStatus = action.closest('tr').find('.status').text(),
            strAction = action.attr('class').replace(/icono /, ''),
            urlAction = encodeURI('include/ajax/admin/' + (strAction == 'desbloquear' ? 'bloquear' : strAction) + '-usuario.php'),
            page = action.attr('href');
        ;

        $.ajax({
            method: 'POST',
            url: urlAction,
            data: {
                'userId': userId,
                'userStatus': userStatus
            },
            success: function (response) {
                if (response != 'ok') {
                    console.log('Algo fue mal');
                    return;
                }

                switchUserStatus(action, strAction, userStatus);
            },
            error: function (message) {
                console.log('Something went wrong: ' + message);
            }
        });
    }

    function deleteAction(elem) {
        var userId = elem.closest('tr').find('.first-line').text(),
            urlAction = encodeURI('include/ajax/admin/eliminar-usuario.php')
        ;

        $.ajax({
            method: 'POST',
            url: urlAction,
            data: {
                'userId': userId
            },
            success: function (response) {
                if (response != 'ok') {
                    return;
                }

                showMessage('Usuario eliminado correctamente');
                elem.closest('tr').remove();
            },
            error: function (message) {
                console.log('Something went wrong: ' + message);
            }
        });
    }

    function switchUserStatus(action, strAction, userStatus) {
        var statusClass,
            newStatus
        ;

        if (strAction == 'desbloquear') {
            statusClass = 'bloquear';
        } else {
            statusClass = 'desbloquear';
        }

        if (userStatus.trim() == 'Bloqueado') {
            newStatus = 'Activo';
        } else {
            newStatus = 'Bloqueado';
        }

        action.addClass(statusClass);
        action.removeClass(strAction);
        action.closest('tr').find('.status').text(newStatus);

        switchIcons(action, strAction);

        showMessage('Usuario ' + newStatus);
    }

    function switchIcons(action, strAction) {
        if (strAction == 'desbloquear') {
            action.find('span').removeClass('fa-check-circle');
            action.find('span').addClass('fa-ban');
        } else {
            action.find('span').removeClass('fa-ban');
            action.find('span').addClass('fa-check-circle');
        }
    }

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
