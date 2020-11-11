<?php if (isset($_SESSION['user_id'])): ?>
    <div class="sidebar-left">
    	<div >
            <span class="menu-icon"></span>
        </div>

        <div class="buttons-column">

        	<div class="boton azul">
                <a class="button-link" href="archivador.php">Archivador</a>
            </div>

            <?php if (isset($_SESSION['admin'])): ?>
                <div class="boton azul">
                    <a class="button-link" href="gestion-usuarios.php">Gestion usuarios</a>
                </div>

                <div class="boton azul">
                    <a class="button-link" href="gestionAbogados.php">Gestión abogados</a>
                </div>

                <div class="boton azul">
                    <a class="button-link" href="#">Ver estadísticas</a>
                </div>
            <?php else: ?>
                <div class="boton azul">
                    <a class="button-link" href="miHistoria.php">Consultas</a>
                </div>

                <div class="boton azul">
                    <a class="button-link" href="muro.php">Muro Memorial</a>
                </div>

                <div class="boton azul">
                    <a class="button-link" href="testamento.php">Testamento</a>
                </div>

                <div class="boton azul">
                    <a class="button-link" href="usuarioAsociado.php">Persona asociada</a>
                </div>
            <?php endif ?>

		</div>
	</div>
<?php endif ?>
