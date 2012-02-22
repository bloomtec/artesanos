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