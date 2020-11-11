<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\Form\FormRegister;
 ?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Registro - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <script type="text/javascript" src="js/form/registro.js"></script>
    <meta name="registroLegadoDigital" content="Registro LegadoDigital">
    <meta name="description" content="Registro de nuevos usuarios para acceder a paginas con privilegios de usuario registrado"/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
    <div class="main-wrapper">
        <?php require("include/comun/cabecera.php"); ?>

        <div class="container">
            <h1 class="main-title">Registro</h1>

            <div class="form-content">
                <?php
                    $formRegistro = new FormRegister();
                    $formRegistro->muestra();
                 ?>
            </div>
        </div>

        <?php require("include/comun/pie.php"); ?>
    </div>

    <div class="modal">
        <div class="modal-loading"></div>
    </div>

</body>
</html>
