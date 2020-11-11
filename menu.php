<?php
 
    require_once __DIR__ . '/include/config.php'; 

    use LegadoDigital\App\UsuarioAdmin;

?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Menu - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <meta name="indexLegadoDigital" content="Home LegadoDigital">
    <meta name="description" content="Aplicación web para gestionar la huella digital tras el fallecimiento."/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>

<div class="main-wrapper">
    <?php require("include/comun/cabecera.php"); ?>

    <div class="container">
        <h1>Menú Administrador</h1>

        <div class="row">
            <div class="column">
                <h2>Gestion de usuarios</h2>
                <p></p>
                <a href="">acceder</a>
            </div>
            <div class="colum">
                <h2>Gestion de abogados</h2>    
            </div>
        </div>
        <div class="row">
            <div class="column">
                <h2>Gestion de tarifas</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet similique, commodi? Dolorum enim placeat nemo sapiente libero hic eaque nihil consectetur, fugit iusto, nostrum modi! Inventore distinctio maxime aliquam dolor!
                </p>
            </div>
            <div class="column">
                <h2>Ver estadisticas</h2>    
            </div>
        </div>
    </div>
    <?php require("include/comun/pie.php"); ?>
</div>

</body>
</html>