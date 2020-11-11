<?php if (isset($_SESSION['user_id'])): ?>
	<div class="sidebar-right">
		<!-- Espacio para Imagen de perfil de usuario -->
		<!--<img src="img/logo/logoPrincipal.png" alt="">-->
		<div>
			<span class="perfil-icon"></span>
		</div>

		<h3><?php echo $_SESSION['user_nickname']; ?></h3>
		
		<div class="boton azul">
			<a class="icon-button" href= "archivo.php">
				<span class="upload-icon"></span> Subir archivo
			</a>
		</div>
		<div class="boton azul">
			<a class="icon-button" href= "carpeta.php">
				<span class="folder-icon"></span> Nueva carpeta
			</a>
		</div>
		<div class="boton azul">
			<a class="icon-button" href= "papelera.php">
				<span class="trash-icon"></span> Papelera
			</a>
		</div>
		<div class="boton azul">
			<a class="icon-button" href= "almacenamiento.php">
				<span class="storage-icon"></span> Almacenamiento
			</a>
		</div>
		<div class="boton azul">
			<a class="icon-button" href= "descargas.php">
				<span class="download-icon"></span> Descargas
			</a>
		</div>
	</div>
<?php endif ?>
