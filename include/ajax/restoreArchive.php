<?php
require_once '../config.php';

$archivo = htmlspecialchars(trim(strip_tags($_GET["archivo"])));
$idUsuario = $_SESSION['user_id'];
$oldname = "../../archivos/". $idUsuario ."/"."papelera/" . $archivo;
$newname = "../../archivos/" . $idUsuario . "/" . $archivo;


if (rename ($oldname,$newname)){
    $response['result'] = 'ok';
} else {
    $response['result'] = 'NO';
}

echo json_encode($response, JSON_UNESCAPED_UNICODE);
exit();
