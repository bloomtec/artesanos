<div class="home">
	<?php if($this -> Session -> read('Auth.User.rol_id')==3) : ?>
	<div class="home_description" href="/calificaciones/inspecciones/<?php echo $this -> Session -> read('Auth.User.id'); ?>">
		<h2 class="usuarios">
			Inspecciones
		</h2>
		<p>
			Inspecciones que se deben realizar
		</p>
	</div>
	<?php endif ?>
	
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))) : ?>
	<div class="home_description" href="/usuarios">
		<h2 class="usuarios">
			USUARIOS
		</h2>
		<p>
			Listado de los usuarios que tienen acceso a esta aplicación.
			<br />
			
		</p>
		<div class="acciones_home">
			<a href="">Listado</a>
			<a href="">Añadir</a>
		</div>
	</div>
	<?php endif ?>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) : ?>
	<div class="home_description" href="/artesanos/add">
		<h2 class="calificar">
			Calificar Artesano
		</h2>
		<p>
			Calificación, Registro o Recalificación de un artesano
		</p>
	</div>
	<?php endif ?>
	<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
			) :
		?>
	<div class="home_description" href="/pages/display/parametros">
		<h2 class="parametros">
			Parametros
		</h2>
		<p>
			Configuración de los parametros del sistema
		</p>
	</div>
	<?php endif ?>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Auditorias', 'index')))) : ?>
	<div class="home_description" href="/auditorias">
		<h2 class="auditorias">
			Auditorias
		</h2>
		<p>
			Registros de actividades por usuario en el sistema
		</p>
	</div>
	<?php endif ?>

</div>