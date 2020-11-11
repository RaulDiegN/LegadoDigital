<?php require_once __DIR__ . '/include/config.php' ?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Contacto - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="contactoLegadoDigital" content="Contacto LegadoDigital">
    <meta name="description"
        content="Datos de contacto con los autores de la aplicación web para gestionar la huella digital tras el fallecimiento."/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, contacto"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
    <div class="main-wrapper">
        <?php require("include/comun/cabecera.php"); ?>

        <div class="container">
            <h1 class="main-title">Contáctanos</h1>
            <div class="row">
                <div class="column">
                     <img src="img/iconos/contacto.png" alt="">
                </div>
                <p id="contact-p">
                A continuación, se muestra un formulario que será enviado a nuestro correo. Cualquier duda o comentario se
                leerá, y dependiendo de nuestras políticas tomaremos las acciones correspondientes. Gracias de antemano por
                su interacción con nosotros.
            </p>
        </div>
            <hr>
         <div class="row">           
            <div class="form-section">
                <h2 class="text-center">Formulario</h2>
                    <form class="form-contact" method="get" action="mailto:legadodigitalucm@gmail.com">
                    <div class="form-group">
                        <input type="text" name="cliente" placeholder="Nombre y apellidos"/>
                        <input type="text" name="email" placeholder="Dirección de email:"/>
                    </div>

                    <div class="form-group">
                        <p>Motivo de la interacción:</p>
                        <input id="evaluation" type="radio" name="consulta" value="evaluacion">
                        <label for="evaluation">Evaluación</label>
                        <input id="sugestion" type="radio" name="consulta" value="sugerencias">
                        <label for="sugestion">Sugerencias</label>
                        <input id="critics" type="radio" name="consulta" value="criticas">
                        <label for="critics">Críticas</label>
                    </div>

                    <div class="form-group">
                        <textarea name="comentarios" rows="10" cols="50" placeholder="Escribe aquí tus comentarios"></textarea>
                    </div>

                      <div class="form-group">
                        <input id="policy" type="checkbox" name="politica" value="acepta"> <label for="policy">Marque esta casilla
                        para verificar que ha leído nuestros términos y condiciones del servicio.</label>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Enviar">
                    </div>
                </form>
                </div>
            </div>
        </div>

        <?php require("include/comun/pie.php"); ?>
    </div>
</body>
</html>
