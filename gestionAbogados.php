<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\UsuarioAdmin;

    $abogados = UsuarioAdmin::buscaTodosUsuarios('user_lawer');
?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Gestión abogados - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <script type="text/javascript" src="js/datatables.min.js"></script>
    <script src="https://use.fontawesome.com/bf66789927.js"></script>
    <script type="text/javascript" src="js/gestion-admin.js"></script>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css"/>
    <link rel="stylesheet" type="text/css"  href="css/table.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <meta name="gestionAbogadoLegadoDigital" content="Gestion abogado LegadoDigital">
    <meta name="robots" content="index, follow"/>
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");
            require("include/comun/sidebarIzq.php");
        ?>
        <div class="container">
            <h1 class="main-title">Gestionar Abogados</h1>
            <div class="form-content">
                <div id="info-message"></div>
                <table id="table_id" class="display listado">
                    <thead>
                        <tr>
                            <th class="first-line">Id</th>
                            <th>Nombre abogado</th>
                            <th>Consultas realizadas</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($abogados as $abogado): ?>
                            <?php $userStatus = $abogado->userBanned() === 0 ?>
                            <tr>
                                <td class="first-line"><?php echo $abogado->userId() ?></td>
	                            <td><?php echo $abogado->userNickname(); ?></td>
	                            <td></td>
	                            <td class="status">
                                    <?php echo $userStatus ? 'Activo' : 'Bloqueado' ?>
                                </td>
	                            <td class="options">
                                    <a class="icono editar" href="#">
                                        <span class="fa fa-pencil fa-lg"></span>
                                    </a>

                                    <a class="icono eliminar" href="#">
                                        <span class="fa fa-trash fa-lg"></span>
                                    </a>

                                    <a class="icono<?php echo $userStatus ? ' bloquear' : ' desbloquear' ?>"
                                        href="gestionAbogados.php"
                                        title= "<?php echo $userStatus ? 'Bloquear': 'Desbloquear' ?> usuario"
                                    >
                                        <span class="fa<?php echo $userStatus ? ' fa-ban' : ' fa-check-circle' ?> fa-lg"></span>
                                    </a>
	                            </td>
	                        </tr>
	                    <?php endforeach ?>
	               </tbody>
                </table>
            </div>
        </div>
        <?php
            require("include/comun/sidebarDer.php");
            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>
