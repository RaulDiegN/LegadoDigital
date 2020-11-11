$(function () {
    $('#eliminar-cuenta').on('click',function (e) {
        e.preventDefault();

        confirmar();
    });
});

function confirmar() {
    var respuesta = confirm("¿Desea realmente eliminar la cuenta?");

    if (respuesta) {
        window.location = "include/ajax/eliminarCuenta.php";
    } else {
        return 0;
    }
}
