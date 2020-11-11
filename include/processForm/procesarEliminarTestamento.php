<?php

require '../config.php';

use LegadoDigital\App\UsuarioTestamento;

$user = $_SESSION['user_id'];

if (UsuarioTestamento::buscaTestamento($user)) {
    UsuarioTestamento::eliminarTestamento($user);
    header("Location: ../../testamento.php");
} else {
    printf("Este usuario no tiene ningún testamento guardado.");
}

