<?php
	if(
		$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'IngresosEspecies', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'add')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'addToOthers')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'IngresosEspecies', 'reporte')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'reporte')))
	) :
?>
<li class="especies">
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'IngresosEspecies', 'index')))) { ?>
	<a href="/ingresos_especies">ESPECIES VALORADAS</a>
	<?php } else { ?>
	<a href="#">ESPECIES VALORADAS</a>
	<?php } ?>
	<ul>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'IngresosEspecies', 'add')))) : ?>
		<li>
			<a href="/ingresos_especies/add">Ingresar Especies</a>
		</li>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'add')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'addToOthers')))
			) :
		?>
		<li>
			<a href="#">Vender Especie</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'add')))) : ?>
				<li>
					<a href="/ventas_especies/add">Artesano</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'addToOthers')))) : ?>
				<li>
					<a href="/ventas_especies/addToOthers">Otros</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'addToOthers')))) : ?>
				<li>
					<a href="/ventas_especies/ventas">Facturas</a>
				</li>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'IngresosEspecies', 'reporte')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'reporte')))
			) :
		?>
		<li>
			<a href="#">Reportes</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'IngresosEspecies', 'reporte')))) : ?>
				<li>
					<a  href="/ingresos_especies/reporte">Ingresos</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'VentasEspecies', 'reporte')))) : ?>
				<li>
					<a  href="/ventas_especies/reporte">Ventas</a>
				</li>
				<?php endif; ?>
			</ul>
		</li>
		<?php endif; ?>
	</ul>
</li>
<?php endif; ?>