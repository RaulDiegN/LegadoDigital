<?php
require_once '../config.php';

use LegadoDigital\App\UsuarioLogin;
use LegadoDigital\App\UsuarioRegistro;
use LegadoDigital\App\UsuarioConsulta;

$defaultImage = 'img/miembros/blank-profile.png';

$data = array(
    'user_name' => htmlspecialchars(strip_tags(trim($_POST['name']))),
    'user_lastname' => htmlspecialchars(strip_tags(trim($_POST['lastname']))),
    'user_nickname' => htmlspecialchars(strip_tags(trim($_POST['nickname']))),
    'user_email_login' => htmlspecialchars(strip_tags(trim($_POST['email']))),
    'user_password' => htmlspecialchars(strip_tags(trim($_POST['password']))),
    'user_type' => htmlspecialchars(strip_tags(trim($_POST['user_type']))),
    'user_image' => $defaultImage,
);

$user_nickname = UsuarioLogin::buscaUsuario($data['user_nickname']);

if ($user_nickname !== false) {
    echo 'El nombre de usuario ya existe';
    exit();
}

$usuarioLogin = UsuarioLogin::crea($data);
$data['user_id'] = $usuarioLogin->userId();

UsuarioRegistro::crea($data);
$_SESSION['user_id'] = $data['user_id'];
$_SESSION['user_nickname'] = $usuarioLogin->userNickname();
$_SESSION['user_email'] = $usuarioLogin->userEmailLogin();
$_SESSION['user_type'] = $data['user_type'];

if ($usuarioLogin->userType() == "user_lawer") {
    $_SESSION['abogado'] = true;
    UsuarioConsulta::añade($_SESSION['user_id']);
}

$rutaCarpetaPrincipal = "../../archivos/" . $_SESSION["user_id"];
$rutaPapelera = $rutaCarpetaPrincipal . "/papelera";
$rutaCajaFuerte = $rutaCarpetaPrincipal . "/cajafuerte";


if (!file_exists($rutaCarpetaPrincipal)) {
    mkdir($rutaCarpetaPrincipal, 0755);
}

if (!file_exists($rutaPapelera)) {
    mkdir($rutaPapelera, 0755);
}

if (!file_exists($rutaCajaFuerte)) {
    mkdir($rutaCajaFuerte, 0755);
}

echo 'ok';
