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
				<!--<td><input name="data[EquiposDeTrabajo][equ_cantidad][0]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"> </td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas')); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][0]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas)); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][0]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria)); ?></td>
				<td><input name="data[EquiposDeTrabajo][0][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo0EquFechaDeAdquisicion"></td>
				<!--<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_fecha_de_adquisicion', array('label' => false, 'div' => false, 'type' => 'date')); ?></td>-->
				<!--<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][0]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[EquiposDeTrabajo][equ_cantidad][0]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"> </td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.1.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas')); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][0]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.1.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas)); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][0]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.1.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria)); ?></td>
				<td><input name="data[EquiposDeTrabajo][1][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo1EquFechaDeAdquisicion"></td>
				<!--<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_fecha_de_adquisicion', array('label' => false, 'div' => false, 'type' => 'date')); ?></td>-->
				<!--<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][0]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.1.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[EquiposDeTrabajo][equ_cantidad][0]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"> </td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.2.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas')); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][0]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.2.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas)); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][0]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.2.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria)); ?></td>
				<td><input name="data[EquiposDeTrabajo][2][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo2EquFechaDeAdquisicion"></td>
				<!--<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_fecha_de_adquisicion', array('label' => false, 'div' => false, 'type' => 'date')); ?></td>-->
				<!--<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][0]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.2.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[EquiposDeTrabajo][equ_cantidad][0]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"> </td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.3.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas')); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][0]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.3.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas)); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][0]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.3.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria)); ?></td>
				<td><input name="data[EquiposDeTrabajo][3][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo3EquFechaDeAdquisicion"></td>
				<!--<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_fecha_de_adquisicion', array('label' => false, 'div' => false, 'type' => 'date')); ?></td>-->
				<!--<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][0]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.3.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[EquiposDeTrabajo][equ_cantidad][0]" type="number" id="EquiposDeTrabajoEquCantidad" class="cantidad_maquinas"> </td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.4.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas')); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_maquinaria_y_herramientas][0]" id="EquiposDeTrabajoEquMaquinariaYHerramientas"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.4.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas)); ?></td>
				<!--<td><select name="data[EquiposDeTrabajo][equ_tipo_de_adquisicion][0]" id="EquiposDeTrabajoEquTipoDeAdquisicion"></select></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.4.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria)); ?></td>
				<td><input name="data[EquiposDeTrabajo][4][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo4EquFechaDeAdquisicion"></td>
				<!--<td><?php echo $this -> Form -> input('EquiposDeTrabajo.0.equ_fecha_de_adquisicion', array('label' => false, 'div' => false, 'type' => 'date')); ?></td>-->
				<!--<td><input name="data[EquiposDeTrabajo][equ_valor_comercial][0]" step="any" type="number" id="EquiposDeTrabajoEquValorComercial" class='valor_maquinas'></td>-->
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.4.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas')); ?></td>
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
				<!--<td><input name="data[MateriasPrima][mat_cantidad][0]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.0.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima')); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][0]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.0.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima)); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_procedencia][0]" type="number" id="MateriasPrimaMatProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.0.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima)); ?></td>
				<!--<td><input name="data[MateriasPrima][mat_valor_comercial][0]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.0.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[MateriasPrima][mat_cantidad][0]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.1.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima')); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][0]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.1.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima)); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_procedencia][0]" type="number" id="MateriasPrimaMatProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.1.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima)); ?></td>
				<!--<td><input name="data[MateriasPrima][mat_valor_comercial][0]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.1.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[MateriasPrima][mat_cantidad][0]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.2.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima')); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][0]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.2.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima)); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_procedencia][0]" type="number" id="MateriasPrimaMatProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.2.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima)); ?></td>
				<!--<td><input name="data[MateriasPrima][mat_valor_comercial][0]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.2.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[MateriasPrima][mat_cantidad][0]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.3.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima')); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][0]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.3.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima)); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_procedencia][0]" type="number" id="MateriasPrimaMatProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.3.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima)); ?></td>
				<!--<td><input name="data[MateriasPrima][mat_valor_comercial][0]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.3.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[MateriasPrima][mat_cantidad][0]" type="number" id="MateriasPrimaMatCantidad" class='cantidad_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.4.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima')); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_tipo_de_materia_prima][0]" type="number" id="MateriasPrimaMatTipoDeMateriaPrima"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.4.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima)); ?></td>
				<!--<td><select name="data[MateriasPrima][mat_procedencia][0]" type="number" id="MateriasPrimaMatProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.4.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima)); ?></td>
				<!--<td><input name="data[MateriasPrima][mat_valor_comercial][0]" type="number" id="MateriasPrimaMatValorComercial" class='valor_materia_prima'></td>-->
				<td><?php echo $this -> Form -> input('MateriasPrima.4.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima')); ?></td>
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
				<!--<td><input name="data[ProductosElaborado][pro_cantidad][0]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.0.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados')); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_detalle][0]" type="number" id="ProductosElaboradoProDetalle"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.0.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto)); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_procedencia][0]" type="number" id="ProductosElaboradoProProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.0.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto)); ?></td>
				<!--<td><input name="data[ProductosElaborado][pro_valor_comercial][0]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.0.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[ProductosElaborado][pro_cantidad][0]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.1.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados')); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_detalle][0]" type="number" id="ProductosElaboradoProDetalle"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.1.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto)); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_procedencia][0]" type="number" id="ProductosElaboradoProProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.1.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto)); ?></td>
				<!--<td><input name="data[ProductosElaborado][pro_valor_comercial][0]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.1.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[ProductosElaborado][pro_cantidad][0]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.2.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados')); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_detalle][0]" type="number" id="ProductosElaboradoProDetalle"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.2.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto)); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_procedencia][0]" type="number" id="ProductosElaboradoProProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.2.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto)); ?></td>
				<!--<td><input name="data[ProductosElaborado][pro_valor_comercial][0]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.2.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[ProductosElaborado][pro_cantidad][0]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.3.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados')); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_detalle][0]" type="number" id="ProductosElaboradoProDetalle"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.3.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto)); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_procedencia][0]" type="number" id="ProductosElaboradoProProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.3.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto)); ?></td>
				<!--<td><input name="data[ProductosElaborado][pro_valor_comercial][0]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.3.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados')); ?></td>
			</tr>
			<tr>
				<!--<td><input name="data[ProductosElaborado][pro_cantidad][0]" type="number" id="ProductosElaboradoProCantidad" class="cantidad_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.4.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados')); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_detalle][0]" type="number" id="ProductosElaboradoProDetalle"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.4.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto)); ?></td>
				<!--<td><select name="data[ProductosElaborado][pro_procedencia][0]" type="number" id="ProductosElaboradoProProcedencia"></select></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.4.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto)); ?></td>
				<!--<td><input name="data[ProductosElaborado][pro_valor_comercial][0]" type="number" id="ProductosElaboradoProValorComercial" class="valor_productos_elaborados"></td>-->
				<td><?php echo $this -> Form -> input('ProductosElaborado.4.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados')); ?></td>
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