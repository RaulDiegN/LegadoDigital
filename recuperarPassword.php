<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\Form\FormRecoverPassword;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Login - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script src="js/form/recoverPassword.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="css/estilosMenu.css">
    <link rel="stylesheet" type="text/css" href="css/estilosGenerales.css">
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
            <h1 class="main-title">Recuperar Contraseña</h1>

            <div class="form-content">
                <?php
                    $form = new FormRecoverPassword();
                    $form->muestra();
                ?>
            </div>
        </div>

        <?php require("include/comun/pie.php"); ?>
    </div>
</body>
</html>
