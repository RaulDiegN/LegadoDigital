<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioTestamento;

    // Data from ajax serialize
    $testament['user_id']= $_SESSION['user_id'];
    $testament['description'] = htmlspecialchars(strip_tags(trim($_POST['description'])));
    $testament['text_testament'] = htmlspecialchars(strip_tags(trim($_POST['text_testament'])));
    $testament['text_annexed'] =  htmlspecialchars(strip_tags(trim($_POST['text_annexed'])));

    if (UsuarioTestamento::buscaTestamento($testament['user_id'])) {
        UsuarioTestamento::modificarTestamento($testament);
    } else {
        UsuarioTestamento::guardaTestamento($testament);
    }

    echo 'ok';
    exit();
