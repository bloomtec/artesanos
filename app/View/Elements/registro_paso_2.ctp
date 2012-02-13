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
			<tr>
				<td><input name="data[EquiposDeTrabajo][equ_cantidad][0]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"> </td>
				<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][0]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>
				<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][0]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>
				<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion][0]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>
				<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][0]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>
			</tr>
			<tr>
				<td><input name="data[EquiposDeTrabajo][equ_cantidad][1]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"></td>
				<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][1]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>
				<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][1]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>
				<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion][1]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>
				<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][1]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>
			</tr>
			<tr>
				<td><input name="data[EquiposDeTrabajo][equ_cantidad][2]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"></td>
				<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][2]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>
				<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][2]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>
				<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion][2]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>
				<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][2]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>
			</tr>
			<tr>
				<td><input name="data[EquiposDeTrabajo][equ_cantidad][3]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"></td>
				<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][3]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>
				<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][3]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>
				<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion][3]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>
				<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][3]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>
			</tr>
			<tr>
				<td><input name="data[EquiposDeTrabajo][equ_cantidad][4]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"></td>
				<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][4]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>
				<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][4]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>
				<td><input name="data[EquiposDeTrabajo][equ_fecha_de_adquisicion][4]" type="date" id="EquiposDeTrabajoEquFechaDeAdquisicion"></td>
				<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][4]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>
			</tr>
		</table>
		<a class="AñadirRegistroEquipo cancelar" href="#" >Agregar Otro</a>
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
			<tr>
				<td><input name="data[MateriasPrima][mat_cantidad][0]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>
				<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][0]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>
				<td><select name="data[MateriasPrima][mat_procedencia][0]" type="number" id="MateriasPrimaMatProcedencia"></select></td>
				<td><input name="data[MateriasPrima][mat_valor_comercial][0]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>
			</tr>
			<tr>
				<td><input name="data[MateriasPrima][mat_cantidad][1]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>
				<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][1]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>
				<td><select name="data[MateriasPrima][mat_procedencia][1]" type="number" id="MateriasPrimaMatProcedencia"></select></td>
				<td><input name="data[MateriasPrima][mat_valor_comercial][1]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>
			</tr>
			<tr>
				<td><input name="data[MateriasPrima][mat_cantidad][2]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>
				<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][2]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>
				<td><select name="data[MateriasPrima][mat_procedencia][2]" type="number" id="MateriasPrimaMatProcedencia"></select></td>
				<td><input name="data[MateriasPrima][mat_valor_comercial][2]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>
			</tr>
			<tr>
				<td><input name="data[MateriasPrima][mat_cantidad][3]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>
				<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][3]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>
				<td><select name="data[MateriasPrima][mat_procedencia][3]" type="number" id="MateriasPrimaMatProcedencia"></select></td>
				<td><input name="data[MateriasPrima][mat_valor_comercial][3]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>
			</tr>
			<tr>
				<td><input name="data[MateriasPrima][mat_cantidad][4]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>
				<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][4]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>
				<td><select name="data[MateriasPrima][mat_procedencia][4]" type="number" id="MateriasPrimaMatProcedencia"></select></td>
				<td><input name="data[MateriasPrima][mat_valor_comercial][4]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>
			</tr>
		</table>
		<a class="AñadirRegistroMateria cancelar" href="#" >Agregar Otro</a>
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
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad][0]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>
				<td><select name="data[ProductosElaborado][pro_detalle][0]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia][0]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial][0]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>
			</tr>
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad][1]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>
				<td><select name="data[ProductosElaborado][pro_detalle][1]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia][1]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial][1]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>
			</tr>
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad][2]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>
				<td><select name="data[ProductosElaborado][pro_detalle][2]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia][2]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial][2]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>
			</tr>
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad][3]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>
				<td><select name="data[ProductosElaborado][pro_detalle][3]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia][3]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial][3]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>
			</tr>
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad][4]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>
				<td><select name="data[ProductosElaborado][pro_detalle][4]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia][4]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial][4]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>
			</tr>
			<tr>
				<td><input name="data[ProductosElaborado][pro_cantidad][5]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>
				<td><select name="data[ProductosElaborado][pro_detalle][5]" type="number" id="ProductosElaboradoProDetalle"></select></td>
				<td><select name="data[ProductosElaborado][pro_procedencia][5]" type="number" id="ProductosElaboradoProProcedencia"></select></td>
				<td><input name="data[ProductosElaborado][pro_valor_comercial][5]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>
			</tr>
		</table>
		<a class="AñadirRegistroProducto cancelar" href="#" >Agregar Otro</a>
	</div>
	<div class='actions validar'>
	<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
	<?php echo $this -> Html -> link(__('Continuar'), "#" , array('class' => 'next button'));?>
	<div style="clear:both;"></div>
	</div>
</fieldset>