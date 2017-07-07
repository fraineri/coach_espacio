<header class ="home-header">
	<nav class ="main-menu">
		<div class ="horizontal-menu">
			<?php 
				$pagesNav= [
					'index.php' => 'Home',
					'index.php#knowus' => 'Quiénes somos',
					'productos.php' => 'Comprar',
					/*'curses.php' => 'Cursos',*/
					'contact.php' => 'Contactanos',
					'faq.php' => 'FAQ'
				];

				$pagesLog = [
					'login.php' => 'Iniciar sesión',
					'register.php' => 'Registrarse',
				];
			?>
			
			<ul class ="horizontal-menu-nav">
				<?php foreach ($pagesNav as $url => $title): ?>
					<li>
						<a <?php if($url === $activePage){echo 'class ="page-active"';}?> class = "selectable" href="<?php echo $url; ?>"><?php echo $title ?></a>
					</li>
				<?php endforeach; ?>
				<li onclick='cambioTema()'><a class = "selectable" href="#">Cambiar tema</a></li>
			</ul>

			
			
			<ul class ="horizontal-menu-log">
				<?php if($userLogin == null){ ?>
					<?php foreach ($pagesLog as $url => $title): ?>
						<li>
							<a <?php if($url === $activePage){echo 'class ="page-active"';}?> class = "selectable" href="<?php echo $url; ?>"><?php echo $title ?></a>
						</li>
					<?php endforeach; ?>
				<?php } else { ?>
					<li class = "desplegable">
						<div class ="desplegable-user" >
							<div class ="menu-log-user">
								<img class = 'menu-log-user-image' src="php/users/pictures/<?php echo$_SESSION['picture'] ?>">
							</div>
							<div class = 'menu-log-name'>
								<p><?php echo $userLogin; ?></p>
							</div>
						</div>
						<ul class ="options">
							<li><a href="user-profile.php">Editar perfil</a></li>
							<li><a href="php/logOut.php">Cerrar sesión</a></li>
						</ul>
					</li>
				<?php } ?>
					<li class ="shop-cart-menu">
						<a href="#">
							<div>
								<i class="fa fa-shopping-cart fa-lg shop-cart" aria-hidden="true"> 2</i>
							</div>
						</a>
					</li>
			</ul>
		</div>
		<?php if($activePage == 'productos.php'): ?>
			<div class ="horizontal-menu products">
				<ul class='horizontal-menu-nav'>
					<li><a href="">Categorías</a></li>
					<li><a href="">Cursos</a></li>
					<li><a href="">Productos</a></li>
				</ul>	
			</div>
		<?php endif; ?>
	</nav>
	
	<script src="js/cambiar_tema.js"></script>
</header>