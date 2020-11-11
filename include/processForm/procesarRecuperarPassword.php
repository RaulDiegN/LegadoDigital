<?php
require_once '../config.php';

use LegadoDigital\App\UsuarioLogin;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = htmlspecialchars(trim(strip_tags($_POST["username"])));
    $email = htmlspecialchars(trim(strip_tags($_POST["email"])));
    $pregunta1 = htmlspecialchars(trim(strip_tags($_POST["pregunta1"])));
}

header("Location: ../../index.php");
?>
