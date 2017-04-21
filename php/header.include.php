<header class ="home-header">
	<nav class ="horizontal-menu">
		<?php 
			$pages = [
				'index.php' => 'Home',
				'products.html' => 'Productos',
				'curses.html' => 'Cursos',
				'contact.html' => 'Contactame',
				'faq.html' => 'FAQ'
			];
		?>
		
		<ul class ="horizontal-menu-nav">
			<?php foreach ($pages as $url => $title): ?>
				<li>
					<a <?php if($url === $activePage){echo 'class ="page-active"';}?> href="<?php echo $url; ?>"><?php echo $title ?></a>
				</li>
			<?php endforeach; ?>
		</ul>

		
		<ul class ="horizontal-menu-log">
			<?php 
				$userLogin = null;
				/*$userLogin = isset($_SESSION['username'])?$_SESSION['username']:null
				*/
			?>
			<?php if($userLogin == null){ ?>
				<li><a href="sign-in-up.html">Iniciar sesión</a></li>
				<li><a href="sign-in-up.html">Registrarse</a></li>
			<?php } else { ?>
				<li class = "desplegable">
					<a href="">
						<div class = 'menu-log-user-image'>
							<i class = 'fa fa-circle'></i>
						</div>
						<div class = 'menu-log-username'>
							<?php echo $userLogin; ?>
						</div>
					</a>
					<ul class ="options">
						<li><a href="#">Editar perfil</a></li>
						<li><a href="#">Cerrar sesión</a></li>
					</ul>
				</li>
			<?php } ?>
		</ul>

	</nav>

</header>