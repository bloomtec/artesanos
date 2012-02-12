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

/**
 * Registro Paso 3
 */
$('.finalizar-registro-artesano').click(function(e) {
	e.preventDefault();
	$('#ArtesanoAddForm').submit();
});
$('.AñadirRegistroOperador').click(function(e) {
	e.preventDefault();
	$('#TablaOperadores').append(
		'<tr>' +
			'<input name="data[Trabajadores][tipos_de_trabajador_id]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />' +
			'<td><input name="data[Trabajadores][tra_cedula]" type="number" id="TrabajadoresTraCedula" /></td>' +
			'<td><input name="data[Trabajadores][tra_nombres_y_apellidos]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>' +
			'<td><select name="data[Trabajadores][tra_sexo]" id="TrabajadoresTraSexo" /></select></td>' +
			'<td><input name="data[Trabajadores][tra_fecha_ingreso]" type="date" id="TrabajadoresTraFechaIngreso" /></td>' +
			'<td>' +
			'<input name="data[Trabajadores][tra_afiliado_seguro]" type="radio" value="0" checked="checked" />No' +
			'<input name="data[Trabajadores][tra_afiliado_seguro]" type="radio" value="1" />Sí' +
			'</td>' +
			'<td><input name="data[Trabajadores][tra_fecha_nacimiento]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>' +
			'<td><input name="data[Trabajadores][tra_pago_mensual]" type="number" id="TrabajadoresTraPagoMensual" /></td>' +
		'</tr>'
	);
});
$('.AñadirRegistroAprendiz').click(function(e) {
	e.preventDefault();
	$('#TablaAprendices').append(
		'<tr>' +
			'<input name="data[Trabajadores][tipos_de_trabajador_id]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />' +
			'<td><input name="data[Trabajadores][tra_cedula]" type="number" id="TrabajadoresTraCedula" /></td>' +
			'<td><input name="data[Trabajadores][tra_nombres_y_apellidos]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>' +
			'<td><select name="data[Trabajadores][tra_sexo]" id="TrabajadoresTraSexo" /></select></td>' +
			'<td><input name="data[Trabajadores][tra_fecha_ingreso]" type="date" id="TrabajadoresTraFechaIngreso" /></td>' +
			'<td>' +
			'<input name="data[Trabajadores][tra_afiliado_seguro]" type="radio" value="0" checked="checked" />No' +
			'<input name="data[Trabajadores][tra_afiliado_seguro]" type="radio" value="1" />Sí' +
			'</td>' +
			'<td><input name="data[Trabajadores][tra_fecha_nacimiento]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>' +
			'<td><input name="data[Trabajadores][tra_pago_mensual]" type="number" id="TrabajadoresTraPagoMensual" /></td>' +
		'</tr>'
	);
});