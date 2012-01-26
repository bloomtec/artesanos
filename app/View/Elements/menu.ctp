<div id="main-menu">
	<a class="logo" href="/"><img src="/img/logo_menu.png" /></a>
	<ul>
		<?php //if($this -> requestAction('/users/verificarAcceso/' , array('ruta'=>array('controllers', 'Users', 'index')))) : ?>
		<li class="usuarios">
			<a href="/usuarios">USUARIOS</a>
			<?php //if($this -> requestAction('/users/verificarAcceso/' , array('ruta'=>array('controllers', 'Users', 'add')))) : ?>
			<ul>
				<li>
					<a href="/usuarios/add">Agregar</a>
				</li>
			</ul>
			<?php //endif; ?>
		</li>
		<?php //endif; ?>
	</ul>
</div>