<li class="artesanos">
<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'index')))) { ?>
	<a href="/artesanos">ARTESANOS</a>
<?php } else { ?>
	<a href="#">ARTESANOS</a>
<?php } ?>
	<ul>
		<?php // if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'agregarArtesano')))) : ?>
		<li>
			<a href="/artesanos/agregarArtesano">Registrar</a>
		</li>
		<?php // endif;?>
		<?php // if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) : ?>
		<li>
			<a href="/artesanos/add">Calificar</a>
		</li>
		<?php // endif;?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Calificaciones', 'reporteGraficoArtesanos')))
			) {
		?>
		<li>
			<a href="#">Reportes</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos')))) : ?>
				<li>
					<a href="/reportes/reporteArtesanos">Artesanos</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador')))) :	?>
				<li>
					<a href="/reportes/reporteCalificacionesOperador">Calificaciones Operador</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano')))) :	?>
				<li>
					<a href="/reportes/reporteCalificacionesArtesano">Calificaciones Artesano</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Calificaciones', 'reporteGraficoArtesanos')))) :	?>
				<li>
					<a href="/calificaciones/reporteGraficoArtesanos">Estadistico</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))) : ?>
				<li>
					<a href="/reportes/reporteInspecciones">Inspecciones</a>
				</li>
				<?php endif;?>
			</ul>
		</li>
		<?php } ?>
	</ul>
</li>
