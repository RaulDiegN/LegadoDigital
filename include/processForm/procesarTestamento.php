<?php
require '../config.php';

use LegadoDigital\App\UsuarioTestamento;

$user = array(
    'description' => htmlspecialchars(trim(strip_tags($_POST["comentario"]))),
    'text_testament' => htmlspecialchars(trim(strip_tags($_POST["texto"]))),
    'user_id' => $_SESSION['user_id'],
);


    if(!UsuarioTestamento::findUser($user['user_id'])) {
            UsuarioTestamento::guardaTestamento($user);
            header("Location: ../../testamento.php");

    }
    else{
        printf("Este usuario ya tiene testamento guardado, por favor elimine el guardado o modifique el actual.");
    }

?>
