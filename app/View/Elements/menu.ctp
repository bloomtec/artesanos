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
				<li>
					<?php echo $this->Html->link('View as PDF', array('controller'=>'artesanos','action'=>'pruebas', 'ext'=>'pdf','umm')); ?>
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
			<a href="#">REPORTES</a>
			<ul>
				<li>
					<a href="/reportes/reporteArtesanos">Artesanos</a>
				</li>
				<li>
					<a href="/reportes/reporteCalificacionesOperador">Calificaciones Operador</a>
				</li>
				<li>
					<a href="/reportes/reporteCalificacionesArtesano">Calificaciones Artesano</a>
				</li>
				<li>
					<a href="/reportes/reporteInspecciones">Inspecciones</a>
				</li>
				<li>
					<a href="/reportes/reporteEstadisticoCalificaciones">Estadistico Calificaciones</a>
				</li>
			</ul>
		</li>
	</ul>
</div>