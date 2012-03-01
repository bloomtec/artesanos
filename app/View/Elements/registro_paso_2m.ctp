<fieldset>
	<div class="datos-equipo-trabajo validar">
		<h2>Detalle Del Equipo De Trabajo</h2>
		<table id="TablaEquipos" class="tabla-equipo-trabajo" show="2" till="10">
			<thead>
				<tr>
					<th>Cantidad</th>
					<th>Maquinaria Y Herramientas</th>
					<th>Tipo De Adquisición</th>
					<th>Fecha</th>
					<th>Valor Comercial</th>
				</tr>
			</thead>
			<?php for($i = 0; $i<10; $i++): ?>
			<tr>
				<td>
					<?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_maquinas number','type'=>'text'));?>
					<?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.id'); ?>
				</td>
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_maquinaria_y_herramientas', array('label' => false, 'div' => false, 'options' => $maquinarias_y_herramientas));?></td>
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_tipo_de_adquisicion', array('label' => false, 'div' => false, 'options' => $tipos_de_adquisicion_maquinaria));?></td>
				<td>
					<?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_fecha_de_adquisicion', array('label' => false, 'div' => false,'class' => 'date','type'=>'text'));?> 
				<!--<input name="data[EquiposDeTrabajo][<?php echo $i?>][equ_fecha_de_adquisicion]" type="date" id="EquiposDeTrabajo<?php echo $i?>EquFechaDeAdquisicion"> -->
				</td>
				<td><?php echo $this -> Form -> input('EquiposDeTrabajo.'.$i.'.equ_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_maquinas valor', 'type'=>'text'));?></td>
			</tr>
			<?php endfor;?>
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
			<?php for($i =0;$i < 10 ;$i++):?>
			<tr>
				<td>
					<?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_materia_prima number', 'type'=>'text'));?>
					<?php echo $this -> Form -> input('MateriasPrima.'.$i.'.id') ?>
				</td>
				<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_tipo_de_materia_prima', array('label' => false, 'div' => false, 'options' => $tipos_de_materia_prima));?></td>
				<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_materia_prima));?></td>
				<td><?php echo $this -> Form -> input('MateriasPrima.'.$i.'.mat_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_materia_prima valor', 'type'=>'text'));?></td>
			</tr>
			<?php endfor;?>		
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
			<?php for($i = 0; $i < 10; $i++):?>
			<tr>
				<td>
					<?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_cantidad', array('label' => false, 'div' => false, 'class' => 'cantidad_productos_elaborados number','type'=>'text'));?>
					<?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.id'); ?>
				</td>
				<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_detalle', array('label' => false, 'div' => false, 'options' => $detalles_producto));?></td>
				<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_procedencia', array('label' => false, 'div' => false, 'options' => $procedencias_producto));?></td>
				<td><?php echo $this -> Form -> input('ProductosElaborado.'.$i.'.pro_valor_comercial', array('label' => false, 'div' => false, 'class' => 'valor_productos_elaborados valor', 'type'=>'text'));?></td>
			</tr>
			<?php endfor;?>	
		</table>
		<a class="add-row button" href="#" rel="#TablaProductoElaborado">Agregar Otro</a>
	</div>
	<div class='actions validar'>
		<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
		<?php echo $this -> Html -> link(__('Continuar'), "#" , array('class' => 'next button'));?>
		<div style="clear:both;"></div>
	</div>
</fieldset>