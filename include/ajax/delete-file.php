<?php

require_once '../config.php';

use LegadoDigital\App\UsuarioRuta;

$file = $_POST['file'];
$userId = $_SESSION['user_id'];

$folder = '../../archivos/' . $_SESSION['user_id'] . '/' . $file;

if (is_dir($folder)) {
    UsuarioRuta::eliminaDirectorio($folder);
    echo 'ok';
    exit();
}

$fileFull = UsuarioRuta::buscarArchivo($file, $userId);
$fileinRoot = $userId . '/' . $file;

if (strpos($fileFull, $fileinRoot) !== false) {
    rename($fileFull, str_replace($userId, $userId . '/papelera/' . $file, $fileFull));
} else {
    rename($fileFull, dirname(dirname($fileFull)) . '/papelera/' . $file);
}

echo 'ok';
