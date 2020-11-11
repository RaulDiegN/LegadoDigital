<footer>
		<div class="container main-footer">
			<div class="footer-column">
				<h3>Redes Sociales</h3>
				<div class="social-links">
					<a href="https://www.facebook.com/" title="Facebook"><img class="social-icon"  src="img/rs/facebook.png"></a>
					<a href="https://www.twitter.com/" title="Twitter"><img class="social-icon" src="img/rs/twitter.png"></a>
					<a href="https://www.instagram.com/" title="Instagram"><img class="social-icon" src="img/rs/instagram.png"></a>
				</div>
			</div>

			<div class="footer-column">
				<h3>Legado Digital</h3>
				<ul>
					<li>
						<a href="miembros.php">Sobre nosotros</a>
					</li>
					<li>
						<a href="miembros.php#faq">FAQ</a>
					</li>
				
					<li>
						<a href="contacto.php">Contacto</a>
					</li>
				</ul>
			</div>

			<div class="footer-column">
				<h3>Servicios</h3>
				<ul>
					<?php if (isset($_SESSION['user_id']) && !isset($_SESSION['abogado'])): ?>
					<li><a href="testamento.php">Testamento individual</a></li>
					<li><a href="testamento.php">Testamento en pareja</a></li>
					<?php else: ?>
					<li><a href="servicios.php#testamento-individual">Testamento individual</a></li>
					<li><a href="servicios.php#testamento-pareja">Testamento en pareja</a></li>
					 <?php endif ?>
					<li>
						<a href="servicios.php#consultas-legales">Consultas legales</a>
					</li>
				</ul>
			</div>
		</div>
		<div class="bottom-footer">
			<div class="copyright">
				&copy; 2019 Todos los derechos Reservados | <a href="">Legado Digital SA.</a>
			</div>

			<div class="copyright-information">
				<a href="">Terminos y condiciones</a> |
				<a href="">Privacidad y Política</a>
			</div>
		</div>
	</footer>