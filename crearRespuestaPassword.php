<?php
require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\Form\FormCreateRecoverPassword;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Recover Password - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <script type="text/javascript" src="js/form/createRecoverPassword.js"></script>
    <meta name="loginLegadoDigital" content="Login LegadoDigital">
    <meta name="description" content="Login de usuarios para acceder a paginas con privilegios de usuario registrado"/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index,follow"/>
</head>

<body>
    <div class="main-wrapper">
        <?php require("include/comun/cabecera.php"); ?>

        <div class="container">
            <h1 class="main-title"> Crear respuesta de Seguridad</h1>

            <div class="form-content">
                <?php
                    $form = new FormCreateRecoverPassword();
                    $form->muestra();
                ?>
            </div>
        </div>

        <?php require("include/comun/pie.php"); ?>
    </div>
</body>
</html>

