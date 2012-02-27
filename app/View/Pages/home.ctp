<div class="home">
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))) : ?>
	<a class="home_description" href="/usuarios">
		<h2 class="usuarios">
			USUARIOS
		</h2>
		<p>
			Listado de los usuarios que tienen acceso a esta aplicación.
		</p>
	</a>
	<?php endif ?>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) : ?>
	<a class="home_description" href="/artesanos/add">
		<h2 class="usuarios">
			Calificar Artesano
		</h2>
		<p>
			Calificación, Registro o Recalificación de un artesano
		</p>
	</a>
	<?php endif ?>
	<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
			) :
		?>
	<a class="home_description" href="/pages/display/parametros">
		<h2 class="usuarios">
			Parametros
		</h2>
		<p>
			Configuración de los parametros del sistema
		</p>
	</a>
	<?php endif ?>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Auditorias', 'index')))) : ?>
	<a class="home_description" href="/auditorias">
		<h2 class="usuarios">
			Auditorias
		</h2>
		<p>
			Registros de actividades por usuario en el sistema
		</p>
	</a>
	<?php endif ?>

</div>