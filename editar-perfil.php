<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\Form\FormModifyData;

 ?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Editar Perfil - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <script type="text/javascript" src="js/form/editar-perfil.js"></script>
    <meta name="datosLegadoDigital" content="Datos Personales LegadoDigital">
    <meta name="description" content="Modificación de los datos de la cuenta de usuario. "/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");
            if (!isset($_SESSION['abogado']))
                require("include/comun/sidebarIzq.php");
        ?>

        <div class="container">
            <?php if (isset($_SESSION['user_id'])): ?>
                <h1 class="main-title">Editar Perfil</h1>

                <section class="profile-content">
                    <?php
                        $form = new FormModifyData();
                        $form->muestra();
                     ?>
                </section>
            <?php else: ?>
                <?php require 'include/comun/restringido.php'; ?>
            <?php endif ?>
        </div>

        <?php
            if (!isset($_SESSION['abogado']))
                require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>

    <div class="modal">
        <div class="modal-loading"></div>
    </div>
</body>
</html>
