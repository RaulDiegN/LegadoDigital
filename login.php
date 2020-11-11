<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\Form\FormLogin;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Login - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script type="text/javascript" src="js/form/login.js" ></script>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="loginLegadoDigital" content="Login LegadoDigital">
    <meta name="description" content="Login de usuarios para acceder a paginas con privilegios de usuario registrado"/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
    <div class="main-wrapper">
        <?php require("include/comun/cabecera.php"); ?>

        <div class="container">
            <h1 class="main-title">Iniciar Sesión</h1>

            <?php
              $form = new FormLogin();
              $form->muestra();
            ?>
        </div>

        <?php require("include/comun/pie.php"); ?>
    </div>

    <div class="modal">
        <div class="modal-loading"></div>
    </div>
</body>
</html>
