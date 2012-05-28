<?php
	if(
		$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'add')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'reporteTitulaciones')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'reporteSolicitudesTitulacion')))
	) :
?>
<li class="titulaciones">
	<a href="#">TITULACIONES</a>
	<ul>
		<li>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'index')))) : ?>
			<a href="/solicitudesTitulaciones">Titulaciones</a>
			<?php endif; ?>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'add')))) : ?>
				<li>
					<a href="/solicitudesTitulaciones/add">Solicitar</a>
				</li>
				<?php endif; ?>
			</ul>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'reporteTitulaciones')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'reporteSolicitudesTitulacion')))
			) :
		?>
		<li>
			<a href="#">Reportes</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'reporteSolicitudesTitulacion')))) : ?>
				<li>
					<a href="/solicitudesTitulaciones/reporteSolicitudesTitulacion">Solicitudes</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'SolicitudesTitulaciones', 'reporteTitulaciones')))) : ?>
				<li>
					<a href="/solicitudesTitulaciones/reporteTitulaciones">Titulaciones</a>
				</li>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
	</ul>
</li>
<?php endif; ?>