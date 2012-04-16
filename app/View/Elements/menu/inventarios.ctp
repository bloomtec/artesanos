<?php
	if(
		$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'indexSuministros')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'indexActivosFijos')))
	) :
?>
<li class="inventarios">
	<a href="#">INVENTARIOS</a>
	<ul>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'indexActivosFijos')))) : ?>
		<li>
			<a href="/items/indexActivosFijos">Activos Fijos </a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'agregarActivoFijo')))) : ?>
				<li>
					<a href="/items/agregarActivoFijo">Agregar</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'traspasoActivoFijo')))) : ?>
				<li>
					<a href="/items/traspasoActivoFijo">Traspaso Activo Fijo</a>
				</li>
				<?php endif;?>
				<li>
					<a href="#">Reportes</a>
					<ul>
						<li>
							<a href="/ingresosDeInventarios/reporteIngresosInventarios">Ingresos</a>
						</li>
						<li>
							<a href="/ItemsPersonas/reporteAsignaciones">Asignaciones</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'indexSuministros')))) : ?>
		<li>
			<a href="/items/indexSuministros">Suministros y Materiales </a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'agregarSuministro')))) : ?>
				<li>
					<a href="/items/agregarSuministro">Agregar</a>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'deleteSuministro')))) : ?>
				<li>
					<a href="/items/deleteSuministro">Egreso suministro</a>
				</li>
				<?php endif;?>
				<li>
					<a href="#">Reportes</a>
					<ul>
						<li>
							<a href="/ingresosDeInventarios/reporteIngresosSuministros">Ingresos</a>
						</li>
						<li>
							<a href="/EgresosDeInventarios/reporteEgresosSuministros">Egresos</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<?php endif;?>
	</ul>
</li>
<?php endif;?>