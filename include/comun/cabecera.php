<header>
    <div class="menuBar">
        <div class="menuLogo">
            <a href="index.php">
                <p class="menuCompanyText">
                    Legado Digital
                </p>
            </a>
        </div>

        <nav>
            <ul>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if (isset($_SESSION['abogado'])): ?>
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="consultas.php">Consultas</a></li>
                    <?php elseif(isset($_SESSION['admin'])): ?>
                        <li><a href="menu.php">Menú</a></li>
                        <li class="dropdown">
                            <a class="dropdown-btn" href="#">Opciones</a>
                            <ul id="menu-dropdown" class="dropdown-content">
                                <li>
                                    <a href="gestionAbogados.php">Gestión abogados</a>
                                </li>
                                <li>
                                    <a href="gestion-usuarios">Gestión usuarios</a>
                                </li>
                                <li>
                                    <a href="#">Estadísticas</a>
                                </li>
                            </ul>
                        </li>

                    <?php else: ?>
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="servicios.php">Servicios</a></li>
                        <li><a href="cajafuerte.php">Caja Fuerte</a></li>
                    <?php endif ?>
                    <li><a href="datosPersonales.php">Mi Perfil</a></li>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                    <li><a href="servicios.php">Servicios</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</header>
