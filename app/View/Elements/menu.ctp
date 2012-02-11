<div id="main-menu">
	<!-- <a class="logo" href="/"><img src="/img/logo_menu.png" /></a> -->
	<ul>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))) : ?>
		<li class="usuarios">
			<a href="/usuarios">USUARIOS</a>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'add')))) : ?>
			<ul>
				<li>
					<a href="/usuarios/add">Agregar</a>
				</li>
			</ul>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'index')))) : ?>
		<li class="artesanos">
			<a href="/artesanos">ARTESANOS</a>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) : ?>
			<ul>
				<li>
					<a href="/artesanos/add">Registrar</a>
				</li>
			</ul>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
			) :
		?>
		<li class="parametros">
			<a href="/pages/display/parametros">PARAMETROS</a>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Auditorias', 'index')))) : ?>
		<li class="auditorias">
			<a href="/auditorias">AUDITORIAS</a>
		</li>
		<?php endif; ?>
		<li class="reportes">
			<a href="/reportes">REPORTES</a>
		</li>
	</ul>
</div>