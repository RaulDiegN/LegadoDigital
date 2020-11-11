<?php
require_once '../config.php';

use LegadoDigital\App\UsuarioCajafuerte;

// Data from ajax serialize
$data = array('user_password' => htmlspecialchars(strip_tags(trim($_POST['password']))),
    'user_nickname' => htmlspecialchars(strip_tags(trim($_POST['nickname']))));

$data['user_id'] = $_SESSION['user_id'];

$user = UsuarioCajafuerte::password($data);

if ($user === false) {
    echo 'Nombre de usuario o contraseña incorrectos';
    exit();
}

$_SESSION['cajafuerte'] = true;

echo 'ok';
