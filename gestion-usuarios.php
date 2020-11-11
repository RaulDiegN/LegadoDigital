<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\UsuarioAdmin;

    $usuarios = UsuarioAdmin::buscaTodosUsuarios('user_client');
?>
<!DOCTYPE html>
<html lang="es-ES">

<head>
    <title>Gestión de usuarios - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script src="https://use.fontawesome.com/bf66789927.js"></script>
    <script type="text/javascript" src="js/gestion-admin.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta name="gestionUsuariosLegadoDigital" content="Gestión de usuarios LegadoDigital">
    <meta name="description"
          content="Gestión de usuarios de la aplicación."/>
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
            <h1 class="main-title">Gestión de usuarios</h1>
            <p>Gestión de usuarios permite bloquear y ver información de usuarios.</p>

            <div class="form-content">
                <h2 class="main-title">Directorio principal</h2>
                <div id="info-message"></div>
                <table id="table_id" class="display listado">
                    <thead>
                        <tr>
                            <th class="first-line">Id</th>
                            <th>Nombre de usuario</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($usuarios as $usuario): ?>
                            <?php $userStatus = $usuario->userBanned() === 0 ?>
                            <tr>
                                <td class="first-line">
                                    <?php echo $usuario->userId() ?>
                                </td>

                                <td>
                                    <?php echo $usuario->userNickname() ?>
                                </td>

                                <td  class="status">
                                    <?php echo $userStatus ? 'Activo' : 'Bloqueado' ?>
                                </td>

                                <td class="options">
                                    <a class="icono editar" href="#" title="Editar usuario">
                                        <span class="fa fa-pencil fa-lg"></span>
                                    </a>

                                    <a class="icono eliminar" href="gestion-usuarios.php" title="Eliminar usuario">
                                        <span class="fa fa-trash fa-lg"></span>
                                    </a>

                                    <a class="icono<?php echo $userStatus ? ' bloquear' : ' desbloquear' ?>"
                                        href="gestion-usuarios.php"
                                        title="<?php echo $userStatus ? 'Bloquear' : 'Desbloquear' ?> usuario"
                                    >
                                        <span class="fa<?php echo $userStatus ? ' fa-ban' : ' fa-check-circle' ?> fa-lg"></span>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
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
