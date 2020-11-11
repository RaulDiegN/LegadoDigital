<?php

require_once __DIR__ . '/include/config.php';
use LegadoDigital\App\Form\FormConsulta;
?>


<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Consultas - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="historiaLegadoDigital" content="Mi Historia LegadoDigital">
    <meta name="description" content="En esta página los usuarios podrán añadir información adicional que deseen dar a conocer."/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script  type="text/javascript" src="js/form/consulta.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");
            require("include/comun/sidebarIzq.php");
        ?>

        <div class="container">
            <?php if(isset($_SESSION['user_id'])): ?>
                <h1 class="main-title">Consultas</h1>
                <?php
                $form = new FormConsulta();

                $form->muestra();
                ?>
            <?php else: ?>
                <?php require "include/comun/restringido.php" ?>
            <?php endif ?>
        </div>

        <?php
            require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>
