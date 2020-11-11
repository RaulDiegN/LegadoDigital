<?php
require_once '../config.php';

use LegadoDigital\App\UsuarioRuta;

// Data from ajax serialize
$folder['name_path'] = htmlspecialchars(strip_tags(trim($_POST['folder'])));
$folder['user_id'] = $_SESSION['user_id'];

$rutaCarpetaPrincipal = "../../archivos/" . $_SESSION["user_id"];
$rutaCarpeta = $rutaCarpetaPrincipal . "/" . $folder['name_path'];
$rutaPapelera = $rutaCarpetaPrincipal . "/papelera";
$rutaCajaFuerte = $rutaCarpetaPrincipal . "/cajafuerte";
$result = array();

if (file_exists($rutaCarpeta)) {
    $result['response'] = 'La carpeta ya existe';
    echo json_encode($result);
    exit();
}

if (!file_exists($rutaCarpetaPrincipal)) {
    mkdir($rutaCarpetaPrincipal, 0755);
}

if (!file_exists($rutaPapelera)) {
    mkdir($rutaPapelera, 0755);
}

if (!file_exists($rutaCajaFuerte)) {
    mkdir($rutaCajaFuerte, 0755);
}

$rutaTmp = UsuarioRuta::findPath($_SESSION["user_id"]);
if ($rutaTmp == NULL) {
    UsuarioRuta::insertPath($_SESSION["user_id"], $folder["name_path"]);
    mkdir($rutaCarpeta, 0755);
    $result['message'] = 'Carpeta creada con éxito';
    $result['response'] = 'ok';
    echo json_encode($result);
    exit();
}

$paths = $rutaTmp . ',' . $folder["name_path"];
UsuarioRuta::updatePath($_SESSION["user_id"], $paths);
mkdir($rutaCarpeta, 0755);
$result['message'] = 'Carpeta creada con éxito';
$result['response'] = 'ok';

echo json_encode($result);

exit();
