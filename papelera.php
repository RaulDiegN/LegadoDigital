<?php

require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\UsuarioRuta;

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Papelera - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script type="text/javascript" src="js/form/papelera.js"></script>
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta name="archivadorLegadoDigital" content="Archivador LegadoDigital">
    <meta name="description"
          content="Los usuarios y usuarias, podrán visualizar sus archivos eliminados de la aplicación."/>
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
            <h1 class="main-title">Papelera</h1>
            <p>
                Desde aquí puedes ver tus archivos eliminados y recuperarlos. Para restaurar un archivo has click sobre el
                y pincha en el boton restaurar.
            </p>
            <div class="form-content">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Tamaño</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $rutado = "archivos/" . $_SESSION["user_id"] . "/papelera/";
                            $ruta = UsuarioRuta::recorreArchivosCarpeta($rutado);
                            $MBbyte = UsuarioRuta::tamFile($rutado);
                        ?>
                        <?php foreach ($ruta as $archivo): ?>
                            <?php
                                $rutado = "archivos/" . $_SESSION["user_id"] . "/papelera/";
                                $ficheros = UsuarioRuta::recorreArchivosCarpeta($rutado);
                            ?>
                            <?php if ($ficheros != 0): ?>
                                <?php foreach ($ficheros as $value): ?>
                                    <tr>
                                        <td><?php echo $value ?></td>
                                        <td><?php echo filetype($rutado . $value) ?></td>
                                        <td> <?php echo UsuarioRuta::tamFile($rutado . $value) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td><?php echo $archivo ?></td>
                                    <td><?php echo filetype("archivos/" . $_SESSION["user_id"] . "/" . $archivo) ?></td>
                                    <td><?php echo UsuarioRuta::tamFile("archivos/" . $_SESSION["user_id"] . "/" . $archivo) ?></td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <input type="submit" name="ok" class="ok" value="Restaurar"/>
            </div>
        <?php endif ?>
    </div>
    <?php
        require("include/comun/sidebarDer.php");
        require("include/comun/pie.php");
    ?>
</div>
</body>
</html>
