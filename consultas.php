<?php
require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\UsuarioConsulta;
 $consultas = UsuarioConsulta::buscarConsultasPorID($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Datos Personales - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <link rel="stylesheet" href="css/datatables.min.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script src="https://use.fontawesome.com/bf66789927.js"></script> 
    <script src="js/consulta-modal.js" type="text/javascript"></script>   
    <meta name="datosLegadoDigital" content="Datos Personales LegadoDigital">
    <meta name="description" content="Visualización de los datos introducidos durante el registro. "/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
<div class="full-wrapper">
    <?php
    require("include/comun/cabecera.php");
    ?>

    <div class="container-consulta">
        <?php if (isset($_SESSION['user_id'])): ?>
            <h1 class="main-title">Consultas</h1>
            <div class="form-content">
                <img class="icono-perfil" src="img/iconos/consulta-respuesta.png" alt="ver" title="ver consulta">
                <table id="table_id" class="display listado-consulta listado">
                    <thead>
                    <tr>
                        <th class="first-line">Cliente</th>
                        <th>Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($consultas as $consulta): ?>
                                <tr>
                                    <td><?php echo $consulta['user_email'] ?></td>
                                    <td class="options">
                                       <a id="<?php echo $consulta['consulta_id'] ?>" class="icono ver" href="#">
                                          <span class="fa fa-envelope fa-lg"></span>
                                       </a>
                                    </td>
                                </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <?php require 'include/comun/restringido.php'; ?>
        <?php endif ?>
    </div>
    <?php
    require("include/comun/pie.php");
    require("include/modal/modal-consulta.php")
    ?>
</div>
</body>
</html>

