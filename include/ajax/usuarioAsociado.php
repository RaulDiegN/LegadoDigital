<?php

    require_once '../config.php';

    use LegadoDigital\App\UsuarioAsociado;

    // Data from ajax serialize

    $asociado['name'] = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $asociado['lastname'] = htmlspecialchars(strip_tags(trim($_POST['lastname'])));
    $asociado['email'] =  htmlspecialchars(strip_tags(trim($_POST['email'])));
    $asociado['dni'] =  htmlspecialchars(strip_tags(trim($_POST['dni'])));

    $asociado['user_id'] = $_SESSION['user_id'];

    if (UsuarioAsociado::buscaAsociado($asociado['user_id'])) {
        UsuarioAsociado::modificarAsociado($asociado);
    }
    else{
        UsuarioAsociado::guardaAsociado($asociado);
    }

    echo 'ok';
    exit();

