<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\UsuarioRuta;

    $rootFolder = "archivos/" . $_SESSION["user_id"] . "/";
    $ruta = UsuarioRuta::recorreArchivosCarpeta($rootFolder);
    $MBbyte = UsuarioRuta::tamFile($rootFolder);

?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Archivador - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script type="text/javascript" src="https://use.fontawesome.com/bf66789927.js"></script>
    <script type="text/javascript" src="js/archivador.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta name="archivadorLegadoDigital" content="Archivador LegadoDigital">
    <meta name="description"
          content="Los usuarios y usuarias, podrán visualizar sus carpetas y archivos subidos a la aplicación."/>
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
            <h1 class="main-title">Archivador</h1>
            <p>Desde aquí puedes ver y/o eliminar los archivos que subiste a tu cuenta.</p>

            <div class="form-content">
                <div id="info-message"></div>
                <table id="table_id" class="display listado">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Tamaño</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td class="first-line">
                                <i class="icon-folder-open"></i> Carpeta Raiz
                            </td>
                            <td>
                                <?php echo filetype($rootFolder); ?>
                            </td>
                            <td>
                                <?php echo $MBbyte ?>
                            </td>
                            <td class="options">
                            </td>
                        </tr>

                        <?php foreach ($ruta as $archivo): ?>
                            <?php
                                $currentFolder = $archivo . "/";
                                $ficheros = array();

                                if (is_dir($currentFolder)) {
                                    $ficheros = UsuarioRuta::recorreArchivosCarpeta($currentFolder);
                                }
                            ?>

                            <tr<?php echo is_dir($currentFolder) ? 'class="folder"' : '' ?>>
                                <td class="first-line">
                                    <?php if (is_dir($currentFolder)): ?>
                                        <span class="icon-folder-open"></span>
                                    <?php else: ?>
                                        <i class="icon-file-text-alt"></i>
                                    <?php endif ?>
                                    <?php echo basename($archivo) ?>
                                </td>
                                <td>
                                    <?php $folder = count($ficheros) > 0 ? $currentFolder : $archivo ?>
                                    <?php echo filetype($folder) ?>
                                </td>
                                <td>
                                    <?php echo UsuarioRuta::tamFile($folder) ?>
                                </td>
                                <td class="options">
                                    <?php if (basename($archivo) !== 'cajafuerte' && basename($archivo) !== 'papelera'): ?>
                                        <a class="icono eliminar" href="#">
                                            <span class="fa fa-trash fa-lg"></span>
                                        </a>
                                    <?php endif ?>
                                </td>
                            </tr>

                            <?php if (count($ficheros) > 0): ?>
                                <?php foreach ($ficheros as $value):  ?>
                                    <tr>
                                        <td class="first-line">
                                            <i class="icon-file-text-alt"></i>
                                            <?php echo basename($value) ?>
                                        </td>
                                        <td>
                                            <?php echo filetype($value) ?>
                                        </td>
                                        <td>
                                            <?php echo UsuarioRuta::tamFile($value) ?>
                                        </td>
                                        <td class="options">
                                            <a class="icono eliminar" href="#">
                                                <span class="fa fa-trash fa-lg"></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif ?>
                        <?php endforeach ?>
                    </tbody>
                </table>
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
