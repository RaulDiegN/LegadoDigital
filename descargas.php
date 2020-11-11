<?php
require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\UsuarioRuta;

$rootFolder = "archivos/" . $_SESSION["user_id"] . "/";
$ruta = UsuarioRuta::recorreArchivosCarpeta($rootFolder);
$MBbyte = UsuarioRuta::tamFile($rootFolder);

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Archivador - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/buttom.css"/>
    <link rel="stylesheet" type="text/css" href="css/table.css">
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <meta name="archivadorLegadoDigital" content="Descargas LegadoDigital">
    <meta name="description" content="Los usuarios y usuarias, podrán descargar los archivos subidos a la aplicación."/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
<div class="full-wrapper">
    <?php
    require("include/comun/cabecera.php");
    require("include/comun/sidebarIzq.php");
    ?>

    <div class="container">
        <?php if (isset($_SESSION["login"])): ?>
            <?php require "include/comun/restringido.php" ?>
        <?php else: ?>
            <h1 class="main-title">Descargas</h1>
            <p>Desde aquí puedes descargar los archivos que subiste a tu cuenta.</p>
            <p>Para descargarlos debes de hacer click sobre el nombre del archivo y se te descargara automáticamente</p>

            <div class="form-content">
                <table id="table_id" class="display listado">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Tamaño</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($ruta as $archivo): ?>
                        <?php
                        $currentFolder = $rootFolder . $archivo . "/";
                        $ficheros = UsuarioRuta::recorreArchivosCarpeta($currentFolder);
                        ?>
                        <?php if (count($ficheros) > 0 && $archivo != "cajafuerte" && $archivo != "papelera") : ?>
                            <?php foreach ($ficheros as $value): ?>
                                <tr>
                                    <td>
                                        <i class="icon-chevron-right"></i>
                                        <i class="icon-file-text-alt"></i>
                                        <?php echo '<a href="' . $currentFolder . $value . '" target="_blank" download="' . $value . '">' . $value . '</a>' ?>
                                    </td>
                                    <td><?php echo filetype($currentFolder . $value) ?></td>
                                    <td> <?php echo UsuarioRuta::tamFile($currentFolder . $value) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif ?>
                    <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        <?php endif ?>
    </div>
    <?php
    require("include/comun/sidebarDer.php");
    require("include/comun/pie.php");
    ?>
</div>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
</body>
</html>
