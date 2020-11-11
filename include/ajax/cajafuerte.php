<?php
require_once '../config.php';

use LegadoDigital\App\UsuarioCajafuerte;

// Data from ajax serialize
$user_nickname = htmlspecialchars(strip_tags(trim($_POST['nickname'])));
$user_password = htmlspecialchars(strip_tags(trim($_POST['password'])));

$user = UsuarioCajafuerte::login($user_nickname, $user_password);

if ($user === false) {
    echo 'Nombre de usuario o contraseña incorrectos';
    exit();
}

$_SESSION['cajafuerte'] = true;

echo 'ok';
