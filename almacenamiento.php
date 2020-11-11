<?php require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\UsuarioRuta;

?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Almacenamiento - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" href="css/barraProgreso.css">
    <link rel="stylesheet" type="text/css" href="css/estilosFormulario.css">
    <meta name="archivoLegadoDigital" content="Almacenamiento">
    <meta name="description"
          content="el cliente puede agregar nuevo y cualquier tipo de archivo (multimedia, texto, distintos formatos, entre otros) desde su ordenador."/>
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
        <?php if (isset($_SESSION["login"])): ?>
            <?php require "include/comun/restringido.php" ?>
        <?php else: ?>
            <h1 class="main-title">Almacenamiento</h1>

            <?php
             $MBbyte = UsuarioRuta::almacenamiento("archivos/".$_SESSION["user_id"]."/");  
             $porcentaje = ((int)$MBbyte*100)/5000000;
             ?>
             <div>
                <p>Desde esta página puede ver el almacenamiento de su espacio personal.</p>
                <div class="progress-bar blue stripes shine">
                 <span class="bar" style="width:<?php echo $porcentaje ?>%"></span>
                 <span class="number"><?php echo $MBbyte ?></span>
            </div>
            </div>           
            
        <?php endif ?>
    </div>

    <?php
    require("include/comun/sidebarDer.php");
    require("include/comun/pie.php");
    ?>
</div>
</body>
</html>
