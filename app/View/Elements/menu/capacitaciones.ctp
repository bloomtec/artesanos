<?php
	if(
		$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Solicitudes', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cursos', 'index')))
	) :
?>
<li class="capacitaciones">
	<a href="#">CAPACITACIONES</a>
	<ul>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Solicitudes', 'index')))) : ?>
		<li>
			<a href="/solicitudes"> Solicitudes</a>
			<ul>
				<li>
					<a href="/solicitudes/add"> Agregar</a>
				</li>
			</ul>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cursos', 'index')))) : ?>
		<li>
			<a href="/cursos"> Cursos</a>
		</li>
		<?php endif; ?>
		<?php 
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'CentrosArtesanales', 'reporte')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'reporte')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'reporteNotas')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cursos', 'reporte')))
			) :
		?>
		<li>
			<a href="#"> Reportes</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'CentrosArtesanales', 'reporte')))) : ?>
				<li>
					<a href="/centros_artesanales/reporte"> Unidades y Centros artesanales </a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'reporte')))) : ?>
				<li>
					<a href="/alumnos/reporte"> Alumnos </a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'reporteNotas')))) : ?>
				<li>
					<a href="/alumnos/reporteNotas"> Notas de alumnos </a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cursos', 'reporte')))) : ?>
				<li>
					<a href="/cursos/reporte"> Cursos </a>
				</li>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
	</ul>
</li>
<?php endif; ?>