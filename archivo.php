<?php require_once __DIR__ . '/include/config.php';
use LegadoDigital\App\Form\FormUploadFile;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Subir Archivo - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="archivoLegadoDigital" content="Subir Archivo LegadoDigital">
    <meta name="description" content="el cliente puede agregar nuevo y cualquier tipo de archivo (multimedia, texto, distintos formatos, entre otros) desde su ordenador."/>
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
            <h1 class="main-title">Archivo</h1>
            <p>Desde esta página puedes subir archivos a su espacio personal.</p>
            <div class="form-content">
                <?php
                    $form = new FormUploadFile();
                    $form->gestiona();
                ?>
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
