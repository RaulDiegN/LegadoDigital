<?php
    require_once __DIR__ . '/include/config.php';

    use LegadoDigital\App\UsuarioRegistro;

    if (isset($_SESSION['user_id'])) {
        $usuario = UsuarioRegistro::findUser($_SESSION['user_id']);
    }
 ?>

<!DOCTYPE html>
<html lang="es-ES">
<head>
    <title>Datos Personales - LegadoDigital</title>
    <?php include "include/comun/head-links.php"; ?>
    <meta name="datosLegadoDigital" content="Datos Personales LegadoDigital">
    <meta name="description" content="Visualización de los datos introducidos durante el registro. "/>
    <meta name="keywords" content="legado, digital, legado digital, huella digital, testamento online, home"/>
    <meta name="robots" content="index, follow"/>
</head>

<body>
    <div class="full-wrapper">
        <?php
            require("include/comun/cabecera.php");

            if (!isset($_SESSION['abogado'])) {
                require("include/comun/sidebarIzq.php");
            }
        ?>

        <div class="container">
            <?php if (isset($_SESSION['user_id'])): ?>
                <h1 class="main-title">Mi Perfil</h1>
                <section class="profile-content">
                    <div class="image-wrapper">
                        <img src="<?php echo $usuario->userImage() ?>" alt="Foto usuario">
                        <h3><?php echo $_SESSION['user_nickname'] ?></h3>
                        <p>Fecha de registro: <?php echo $usuario->dateAccountCreate() ?></p>
                        <a class="button-link secondary-button" href="editar-perfil.php">Editar perfil</a>
                        <a class="button-link secondary-button" href="crearRespuestaPassword.php">Crear pregunta secreta</a>
                    </div>

                    <div class="description-wrapper">
                        <div class="row">
                            <div class="column column-left">
                                <div class="description-field">
                                    <span class="strong">Nombre:</span>
                                    <span><?php echo $usuario->userName() ?></span>
                                </div>
                                <div class="description-field">
                                    <span class="strong">Teléfono:</span>
                                    <span>
                                        <?php echo $usuario->userTelephone() !== null ? $usuario->userTelephone() : '-' ?>
                                    </span>
                                </div>
                                <div class="description-field">
                                    <span class="strong">Edad:</span>
                                    <span><?php echo $usuario->userAge() !== null ? $usuario->userAge() : '-' ?></span>
                                </div>
                                <div class="description-field">
                                    <span class="strong">DNI:</span>
                                    <span><?php echo $usuario->userDNI() !== null ? $usuario->userDNI() : '-' ?></span>
                                </div>
                            </div>

                            <div class="column column-right">
                                <div class="description-field">
                                    <span class="strong">Apellidos:</span>
                                    <span><?php echo $usuario->userLastname() ?></span>
                                </div>
                                <div class="description-field">
                                    <span class="strong">Email:</span>
                                    <span><?php echo $usuario->userEmail() ?></span>
                                </div>
                                <div class="description-field">
                                    <span class="strong">Fecha de Nacimiento:</span>
                                    <span><?php echo $usuario->userBirthDate() ? $usuario->userBirthDate() : '-' ?></span>
                                </div>
                                <div class="description-field">
                                    <span class="strong">Tipo de Cuenta:</span>
                                    <span><?php echo $usuario->userRate() !== null ? ucfirst($usuario->userRate()) : '-' ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (!isset($_SESSION['abogado'])): ?>
                            <a id="eliminar-cuenta" class="button-link delete-account" href="index.php">Eliminar Cuenta</a>
                            <?php endif ?>
                        </div>
                    </div>
                </section>
            <?php else: ?>
                <?php require 'include/comun/restringido.php'; ?>
            <?php endif ?>
        </div>

        <?php
            if (!isset($_SESSION['abogado'])) {
                require("include/comun/sidebarDer.php");
            }

            require("include/comun/pie.php");
        ?>
    </div>
</body>
</html>
