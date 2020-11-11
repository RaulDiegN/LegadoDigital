$(function() {
    $('.dropdown-btn').on('click', function (e) {
        $('#menu-dropdown').slideToggle('show');
    });

    window.onclick = function(e) {
        if (!e.target.matches('.dropdown-btn')) {
            var $dropdownMenu = $('#menu-dropdown');

            if ($dropdownMenu.is(':visible')) {
                $dropdownMenu.slideUp();
            }
        }
    }

});
