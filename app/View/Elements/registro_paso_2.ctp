<fieldset>
	<div class="datos-equipo-trabajo">
		<h2>Detalle Del Equipo De Trabajo</h2>
		<br />
		<br />
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
		<a class="AñadirRegistro cancelar" href="#" >Agregar Otro</a>
	</div>
</fieldset>
<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
<a id="registroB_continuar" href="#" class="cancelar">Siguiente</a>
<script type="text/javascript">
	$('#registroA_continuar').click(function() {
		//$('#DataContainer').load('/artesanos/registroC');
	});
	$('.AñadirRegistro').click(function() {
		$('#TablaEquipos').append(
			'<tr>' +
				'<td><input name="data[EquiposDeTrabajo][equ_cantidad]" type="number" id="EquiposDeTrabajoEquCantidad"></td>' +
				'<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>' +
				'<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>' +
				'<td>' +
					'<select name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion][month]" id="EquiposDeTrabajoEquFechaDeAdquisicionMonth">' +
						'<option value="01">Enero</option>' +
						'<option value="02" selected="selected">Febrero</option>' +
						'<option value="03">Marzo</option>' +
						'<option value="04">Abril</option>' +
						'<option value="05">Mayo</option>' +
						'<option value="06">Junio</option>' +
						'<option value="07">Julio</option>' +
						'<option value="08">Agosto</option>' +
						'<option value="09">Septiembre</option>' +
						'<option value="10">Octubre</option>' +
						'<option value="11">Noviembre</option>' +
						'<option value="12">Diciembre</option>' +
					'</select>' +
				'</td>' +
				'<td><input name="data[EquiposDeTrabajo][equ_valor_comercial]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial"></td>' +
			'</tr>'
		);
	});

</script>