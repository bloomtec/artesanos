<fieldset>
	<div class="datos-equipo-trabajo validar">
		<h2>Detalle Del Equipo De Trabajo</h2>
		<table id="TablaEquipos" class="tabla-equipo-trabajo" show="2" till="10">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Maquinaria Y Herramientas</th>
					<th>Procedencia</th>
					<th>Fecha</th>
					<th>Valor Comercial</th>
				</tr>
			</thead>
			<?php echo $this -> element ("equipos-trabajo")?>
		</table>
		<a class="add-row button" href="#" rel="#TablaEquipos">Agregar Otro</a>
	</div>
	<div class="datos-materia-prima validar">
		<h2>Materia Prima Existente</h2>
		<table id="TablaMateriaPrima" class="tabla-materia-prima" show="2" till="10">
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
		<a class="add-row button" href="#" rel="#TablaMateriaPrima">Agregar Otro</a>
	</div>
	<div class="datos-producto validar">
		<h2>Productos Elaborados</h2>
		<table id="TablaProductoElaborado" class="tabla-producto-elaborado" show="2" till="10">
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
		<a class="add-row button" href="#" rel="#TablaProductoElaborado">Agregar Otro</a>
	</div>
	<div class='actions validar'>
		<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
		<?php echo $this -> Html -> link(__('Continuar'), "#" , array('class' => 'next button'));?>
		<div style="clear:both;"></div>
	</div>
</fieldset>