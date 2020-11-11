<?php
    require_once __DIR__ . '/include/config.php';
    use LegadoDigital\App\Form\FormFolder;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Nueva Carpeta - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script type="text/javascript" src="js/form/folder.js"></script>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="carpetaLegadoDigital" content="Nueva Carpeta LegadoDigital">
    <meta name="description" content="El cliente agregará a su archivador una nueva carpeta."/>
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
            <?php if (isset($_SESSION["user_id"])): ?>
                <h1 class="main-title">Carpeta</h1>
                <p>Aquí puedes crear carpetas para organizar tus archivos</p>
                <div class="form-content">
                    <?php
                        $form = new FormFolder();
                        $form->muestra();
                    ?>
                </div>
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
