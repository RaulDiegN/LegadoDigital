<?php

require_once '../config.php';

use LegadoDigital\App\UsuarioLogin;
use LegadoDigital\App\UsuarioRuta;

$nickname = $_SESSION['user_nickname'];

$user = UsuarioLogin::eliminar($_SESSION['user_id']);
UsuarioRuta::eliminaDirectorio("../../archivos/" . strval($_SESSION['user_id']));

echo '<script>
window.location="../../logout.php"
</script>';
