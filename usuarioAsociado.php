<?php
require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\Form\FormAsociado;

?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Persona Asociada - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="PersonaAsociadaLegadoDigital" content="Persona Asociada LegadoDigital">
    <meta name="description" content="Visualización de los datos introducidos durante el registro. "/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <script  type="text/javascript" src="js/form/usuarioAsociado.js"></script>
</head>
<body>
    <div class="full-wrapper">
        <?php
        require("include/comun/cabecera.php");
        require("include/comun/sidebarIzq.php");
        ?>

        <div class="container">
            <div class="row">
                <div class="column" id="block-two">
                    <img src="img/iconos/amistad.png" alt="">
                    <p>
                        Recuerda, es importante que ingreses a tus unicos herederos digitales. De esta forma 
                        tu mas valiosa e intima información puede ser lo mas simbolico para otros. Piensa en el mañana, piensa en tus seres más queridos. Regalales tu legado digital.
                    </p>

                </div>
                <div class="column">
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <h2 class="main-title">Persona asociada</<h2>
                    <form action="" method="POST" class="form-asociado">
                        <?php
                            $form = new FormAsociado();

                            $form->muestra();
                            ?>    
                         </form>
                
                        <?php else: ?>
                            <?php require "include/comun/restringido.php" ?>
                        <?php endif ?>
                </div>
            </div>
        </div>

        <?php
        require("include/comun/sidebarDer.php");
        require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>