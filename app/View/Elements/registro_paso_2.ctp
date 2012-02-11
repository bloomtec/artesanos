<fieldset>
	<div class="datos-equipo-trabajo">
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
			<tr>
				<td><input name="data[EquiposDeTrabajo][equ_cantidad]" type="number" id="EquiposDeTrabajoEquCantidad"></td>
				<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>
				<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>
				<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>
				<td><input name="data[EquiposDeTrabajo][equ_valor_comercial]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial"></td>
			</tr>
		</table>
		<a class="AñadirRegistroEquipo cancelar" href="#" >Agregar Otro</a>
	</div>
	<div class="datos-materia-prima">
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
			<tr>
				<td><input name="data[MateriasPrima][mat_cantidad]" type="number" id="MateriasPrimaMatCantidad"></td>
				<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>
				<td><select name="data[MateriasPrima][mat_procedencia]" type="number" id="MateriasPrimaMatProcedencia"></select></td>
				<td><input name="data[MateriasPrima][mat_valor_comercial]" type="number" id="MateriasPrimaMatValorComercial"></td>
			</tr>
		</table>
		<a class="AñadirRegistroMateria cancelar" href="#" >Agregar Otro</a>
	</div>
	<div class="datos-producto">
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
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad]" type="number" id="ProductosElaboradoProCantidad"></td>
				<td><select name="data[ProductosElaborado][pro_detalle]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial]" type="number" id="ProductosElaboradoProValorComercial"></td>
			</tr>
		</table>
		<a class="AñadirRegistroProducto cancelar" href="#" >Agregar Otro</a>
	</div>
</fieldset>
<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
<a id="registroB_continuar" href="#" class="cancelar">Siguiente</a>
<script type="text/javascript">
	$('#registroA_continuar').click(function() {
		//$('#DataContainer').load('/artesanos/registroC');
	});
	$('.AñadirRegistroEquipo').click(function(e) {
		e.preventDefault();
		$('#TablaEquipos').append(
			'<tr>' +
				'<td><input name="data[EquiposDeTrabajo][equ_cantidad]" type="number" id="EquiposDeTrabajoEquCantidad"></td>' +
				'<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>' +
				'<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>' +
				'<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>' +
				'<td><input name="data[EquiposDeTrabajo][equ_valor_comercial]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial"></td>' +
			'</tr>'
		);
	});
	$('.AñadirRegistroMateria').click(function(e) {
		e.preventDefault();
		$('#TablaMateriaPrima').append(
			'<tr>' +
				'<td><input name="data[MateriasPrima][mat_cantidad]" type="number" id="MateriasPrimaMatCantidad"></td>' +
				'<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>' +
				'<td><select name="data[MateriasPrima][mat_procedencia]" type="number" id="MateriasPrimaMatProcedencia"></select></td>' +
				'<td><input name="data[MateriasPrima][mat_valor_comercial]" type="number" id="MateriasPrimaMatValorComercial"></td>' +
			'</tr>'
		);
	});
	$('.AñadirRegistroProducto').click(function(e) {
		e.preventDefault();
		$('#TablaProductoElaborado').append(
			'<tr>' +
				'<td><input name="data[ProductosElaborado][pro_cantidad]" type="number" id="ProductosElaboradoProCantidad"></td>' +
				'<td><select name="data[ProductosElaborado][pro_detalle]" type="number" id="ProductosElaboradoProDetalle"></select></td>' +
				'<td><select name="data[ProductosElaborado][pro_procedencia]" type="number" id="ProductosElaboradoProProcedencia"></select></td>' +
				'<td><input name="data[ProductosElaborado][pro_valor_comercial]" type="number" id="ProductosElaboradoProValorComercial"></td>' +
			'</tr>'
		);
	});

</script>