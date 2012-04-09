<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'index')))) :

?>
<li class="artesanos">
	<a href="/artesanos">ARTESANOS</a>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) :
	?>
	<ul>
		<li>
			<a href="/artesanos/agregarArtesano">Agregar</a>
		</li>
		<li>
			<a href="/artesanos/add">Calificar</a>
		</li>
		<?php
			if(
			$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos'))) ||
			$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador'))) ||
			$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano'))) ||
			$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))
			) :

		?>
		<li>
			<a href="#">Reportes</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos')))) :
				?>
				<li>
					<a href="/reportes/reporteArtesanos">Artesanos</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador')))) :
				?>
				<li>
					<a href="/reportes/reporteCalificacionesOperador">Calificaciones Operador</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano')))) :
				?>
				<li>
					<a href="/reportes/reporteCalificacionesArtesano">Calificaciones Artesano</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))) :
				?>
				<li>
					<a href="/reportes/reporteInspecciones">Inspecciones</a>
				</li>
				<?php endif;?>
			</ul>
		</li>
		<?php endif;?>
	</ul>
	<?php endif;?>
</li>
<?php endif;?>
