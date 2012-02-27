<fieldset>
	<div class="datos-equipo-trabajo validar">
		<h2>Detalle Del Equipo De Trabajo</h2>
		<table id="TablaEquipos" class="tabla-equipo-trabajo">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Maquinaria Y Herramientas</th>
					<th>Tipo De Adquisición</th>
					<th>Fecha</th>
					<th>Valor Comercial</th>
				</tr>
			</thead>
			<?php echo $this -> element ("equipos-trabajo")?>
		</table>

	</div>
	<div class="datos-materia-prima validar">
		<h2>Materia Prima Existente</h2>
		<table id="TablaMateriaPrima" class="tabla-materia-prima">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Tipo De Materia Prima</th>
					<th>Procedencia</th>
					<th>Valor Comercial</th>
				</tr>
			</thead>
			<?php echo $this ->element('materias-primas');?>			
		</table>
	</div>
	<div class="datos-producto validar">
		<h2>Productos Elaborados</h2>
		<table id="TablaProductoElaborado" class="tabla-producto-elaborado">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Detalle</th>
					<th>Procedencia</th>
					<th>Valor Comercial</th>
				</tr>
			</thead>
			<?php echo $this -> element('productos_elaborados');?>
		</table>
		<a class="AñadirRegistroProducto cancelar" href="#" >Agregar Otro</a>
	</div>
	<div class='actions validar'>
		<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
		<?php echo $this -> Html -> link(__('Continuar'), "#" , array('class' => 'next button'));?>
		<div style="clear:both;"></div>
	</div>
</fieldset>