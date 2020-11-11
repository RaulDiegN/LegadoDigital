<?php
require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\Form\FormCrearContrasenaCajafuerte;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Cajafuerte - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <script type="text/javascript" src="js/form/createPasswordCajafuerte.js"></script>
    <meta name="loginLegadoDigital" content="Login LegadoDigital">
    <meta name="description" content="Login de usuarios para acceder a paginas con privilegios de usuario registrado"/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
<div class="main-wrapper">
    <?php require("include/comun/cabecera.php"); ?>

    <div class="container">
        <div class="form-content">
            <?php
            if (!isset($_SESSION['cajafuerte'])) {
                echo "<h1 class=\"main-title\">Introducir datos para crear la contraseña de la cajafuerte</h1>";
                $form = new FormCrearContrasenaCajafuerte();
                $form->muestra();
            } ?>
        </div>
    </div>
    <?php require("include/comun/pie.php"); ?>
</div>

<div class="modal">
    <div class="modal-loading"></div>
</div>
</body>
</html>
