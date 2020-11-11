<?php require_once __DIR__ . '/include/config.php';

?>


<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Muro Memorial - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="muroLegadoDigital" content="Muro Memorial LegadoDigital">
    <meta name="description" content="el cliente puede guardar sus recuerdos como por ejemplo imágenes."/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/editorEnriquecido/froala_editor.css">
    <link rel="stylesheet" href="css/editorEnriquecido/froala_style.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/code_view.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/draggable.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/colors.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/emoticons.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/image_manager.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/image.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/line_breaker.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/table.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/char_counter.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/video.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/fullscreen.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/file.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/quick_insert.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/help.css">
    <link rel="stylesheet" href="css/editorEnriquecido/third_party/spell_checker.css">
    <link rel="stylesheet" href="css/editorEnriquecido/plugins/special_characters.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
</head>

<body>
<div class="full-wrapper">
    <?php
    require("include/comun/cabecera.php");
    require("include/comun/sidebarIzq.php");
    ?>

    <div class="container">
        <?php if (isset($_SESSION['user_id'])): ?>
            <div  id="block-two">
                <img class="icono-perfil" src="img/iconos/muro.png" alt="">
                    <h1 class="main-title">Bienvenido a tu muro</h1>
                <p>
                    Aqui puedes editar el documento que se va a subir a las redes sociales que tu indiques, una vez
                     consideres que hayas acabado,guardalo como PDF y subelo a tu carpeta personal. Indica en el documento en una tabla usando el editor las redes sociales donde quieres que se publique.
               </p>
            </div>
            <div id="editor">
                <div id='edit' style="margin-top: 30px;">

                </div>
            </div>
            <script type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
            <script type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
            <script type="text/javascript"
                    src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

            <script type="text/javascript" src="js/editorEnriquecido/froala_editor.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/align.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/char_counter.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/code_beautifier.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/code_view.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/colors.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/draggable.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/emoticons.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/entities.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/file.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/font_size.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/font_family.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/fullscreen.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/image.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/image_manager.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/line_breaker.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/inline_style.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/link.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/lists.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/paragraph_format.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/paragraph_style.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/quick_insert.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/quote.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/table.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/save.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/url.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/video.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/help.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/print.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/third_party/spell_checker.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/special_characters.min.js"></script>
            <script type="text/javascript" src="js/editorEnriquecido/plugins/word_paste.min.js"></script>
            <script type="text/javascript" src="js/muro.js"></script>



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
