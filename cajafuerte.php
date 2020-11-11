<?php
require_once __DIR__ . '/include/config.php';

use LegadoDigital\App\Form\FormCajafuerte;
use LegadoDigital\App\UsuarioRuta;
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Cajafuerte - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script type="text/javascript" src="js/form/cajafuerte.js"></script>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" href="css/table.css">
    <?php if (!isset($_SESSION['cajafuerte'])): ?>
        <link rel="stylesheet" href="css/estilosFormulario.css">
    <?php endif; ?>
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta name="loginLegadoDigital" content="Login LegadoDigital">
    <meta name="description" content="Login de usuarios para acceder a paginas con privilegios de usuario registrado"/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>
<body>
<div class="main-wrapper">
    <?php require("include/comun/cabecera.php"); ?>

    <div class="container">
        <?php if (!isset($_SESSION['cajafuerte'])): ?>
            <div class="row">
                <div class="column" id="block-for">
                    <div class="block">
                        <img class="img-cajafuerte" src="img/iconos/caja-fuerte-inicio.png" alt="Caja Fuerte">
                    </div>
                </div>

                <div class="column">
                    <h1 class="main-title">Introducir credenciales</h1>
                    <?php
                        $form = new FormCajafuerte();
                        $form->muestra();
                    ?>
                </div>
            </div>
        <?php else: ?>
            
            <div class="form-content">
                <img class="caja-fuerte" src="img/iconos/caja-fuerte.png" alt="Caja Fuerte">

                <table id="table_id" class="display listado">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Tamaño</th>
                            <th>Opciones</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $rutado = "archivos/" . $_SESSION["user_id"] . "/cajafuerte/";
                            $ruta = UsuarioRuta::recorreArchivosCarpeta($rutado);
                            $MBbyte = UsuarioRuta::tamFile($rutado);
                        ?>
                        <tr>
                            <td><i class="icon-folder-open"></i> <?php echo "cajaFuerte" ?></td>
                            <td><?php echo filetype($rutado) ?></td>
                            <td><?php echo $MBbyte ?></td>
                            <td class="icono"><a href="#"><span class="fa fa-pencil-square-o fa-2x"></span></a></td>
                            <td class="icono"><a href="#"><span class="fa fa-trash fa-2x"></span></a></td>
                        </tr>

                        <?php foreach ($ruta as $archivo): ?>
                            <?php
                                $rutado = "archivos/" . $_SESSION["user_id"] . "/cajafuerte/";
                                $ficheros = UsuarioRuta::recorreArchivosCarpeta($rutado);
                            ?>

                            <?php if ($ficheros != 0): ?>
                                <?php foreach ($ficheros as $value): ?>
                                    <tr>
                                        <td>
                                            <i class="icon-chevron-right"></i>
                                            <i class="icon-file-text-alt"></i>
                                            <a href="<?php echo $rutado . $value ?>"
                                                target="_blank"
                                                download="<?php echo $value ?>">
                                                <?php echo $value ?>
                                            </a>
                                        </td>
                                        <td><?php echo filetype($rutado . $value) ?></td>
                                        <td><?php echo UsuarioRuta::tamFile($rutado . $value) ?></td>
                                        <td class="icono">
                                            <a href="#"><span class="fa fa-pencil-square-o fa-2x"></span></a>
                                        </td>
                                        <td class="icono"><a href="#"><span class="fa fa-trash fa-2x"></span></a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                    <tr>
                                        <td>
                                            <i class="icon-chevron-right"></i>
                                            <i class="icon-file-text-alt"></i>
                                            <?php echo $archivo ?>
                                        </td>
                                        <td>
                                            <?php echo filetype("archivos/" . $_SESSION["user_id"] . "/" . $archivo) ?>
                                        </td>
                                        <td>
                                            <?php echo UsuarioRuta::tamFile("archivos/" . $_SESSION["user_id"] . "/" . $archivo) ?>
                                        </td>
                                        <td class="icono">
                                            <a href="#"><span class="fa fa-pencil-square-o fa-2x"></span></a>
                                        </td>
                                        <td class="icono">
                                            <a href="#"><span class="fa fa-trash fa-2x"></span></a>
                                        </td>
                                    </tr>
                            <?php endif; ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="boton verde">
                    <a class="enlace-link" href="logout-cajafuerte.php">Cerrar Caja Fuerte</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php require("include/comun/pie.php"); ?>
</div>

<div class="modal">
    <div class="modal-loading"></div>
</div>
</body>
</html>
