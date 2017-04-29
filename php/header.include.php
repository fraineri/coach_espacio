<header class ="home-header">
	<nav class ="horizontal-menu">
		<?php 
			$pagesNav= [
				'index.php' => 'Home',
				'index.php#knowus' => 'Quiénes somos',
				'productos.php' => 'Productos',
				/*'curses.php' => 'Cursos',*/
				'contact.php' => 'Contactame',
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
					<a <?php if($url === $activePage){echo 'class ="page-active"';}?> href="<?php echo $url; ?>"><?php echo $title ?></a>
				</li>
			<?php endforeach; ?>
		</ul>

		
		<ul class ="horizontal-menu-log">
			<?php if($userLogin == null){ ?>
				<?php foreach ($pagesLog as $url => $title): ?>
					<li>
						<a <?php if($url === $activePage){echo 'class ="page-active"';}?> href="<?php echo $url; ?>"><?php echo $title ?></a>
					</li>
				<?php endforeach; ?>
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