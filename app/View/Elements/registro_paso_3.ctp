<fieldset>
	<div class="datos-operadores validar">
		<h2>Operadores A Su Cargo</h2>
		<table id="TablaOperadores" class="tabla-operadores">
			<thead>
				<tr>
					<th>No. De Cédula</th>
					<th>Nombre Y Apellido</th>
					<th>Sexo</th>
					<th>Fecha De Ingreso</th>
					<th style='width:70px;'>Afiliado Seguro</th>
					<th>Fecha De Nacimiento</th>
					<th>Pago Mensual</th>
				</tr>
			</thead>
			<?php echo $this -> element('operarios');?>
		</table>
		<a class="AñadirRegistroOperador button" href="#" >Agregar Otro</a>
	</div>
	<div class="datos-operadores validar">
		<h2>Aprendices A Su Cargo</h2>
		<table id="TablaAprendices" class="tabla-aprendices">
			<thead>
				<tr>
					<th>No. De Cédula</th>
					<th>Nombre Y Apellido</th>
					<th>Sexo</th>
					<th>Fecha De Ingreso</th>
					<th style='width:70px;'>Afiliado Seguro</th>
					<th>Fecha De Nacimiento</th>
					<th>Pago Mensual</th>
				</tr>
			</thead>
			<?php echo $this -> element('aprendices');?>
		</table>
	</div>
	<div class="datos-balance validar">
		<h2>Egresos Mensuales</h2>
		<table class='balance egresos'>
			<tr>
				<th> Egreso </th>
				<th> Valor </th>
			</tr>
			<tr>
				<td>Domicilio <?php echo $this -> Form -> input('Calificacion.cal_domicilio_propio', array('label' => 'Propio'));?></td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_domicilio_valor', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Taller <?php echo $this -> Form -> input('Calificacion.cal_taller_propio', array('label' => 'Propio'));?></td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_taller_valor', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Agua</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_agua', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Luz</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_luz', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_telefono', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Servicios Básicos</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_servicios_basicos', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Compra Materia Prima Mensual</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_compra_de_materia_prima_mensual', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr>
				<td>Salario Operarios</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_salario_operarios', array('label' => false, 'disabled' => true, 'class' => 'salario_operarios'));?>
				<?php echo $this -> Form -> input('Calificacion.cal_salario_operarios', array('type' => 'hidden', 'class' => 'salario_operarios'));?></td>
			</tr>
			<tr>
				<td>Salario Aprendices</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_salario_aprendices', array('label' => false, 'disabled' => true, 'class' => 'salario_aprendices'));?>
				<?php echo $this -> Form -> input('Calificacion.cal_salario_aprendices', array('type' => 'hidden', 'class' => 'salario_aprendices'));?></td>
			</tr>
			<tr>
				<td>Otros Salarios</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_otros_salarios', array('label' => false,'value'=>0, 'class'=>'valor'));?></td>
			</tr>
			<tr class='total'>
				<th>Total</th>
				<th><?php echo $this -> Form -> text('Calificacion.cal_total_egresos', array('disabled' => true, 'label' => false, 'class' => 'total_egresos valor'));?></th>
			</tr>
		</table>
		<h2>Capital De Operaciones</h2>
		<table class='balance capital'>
			<tr>
				<th> Capital </th>
				<th> Valor </th>
			</tr>
			<tr>
				<td>Maquinas y Herramientas </td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_maquinas_y_herramientas', array('label' => false, 'disabled' => true, 'class' => 'maquinas_y_herramientas'));?>
				<?php echo $this -> Form -> input('Calificacion.cal_maquinas_y_herramientas', array('label' => false, 'type' => 'hidden', 'class' => 'maquinas_y_herramientas','value'=>0));?></td>
			</tr>
			<tr>
				<td>Materia Prima</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_materia_prima', array('label' => false, 'disabled' => true, 'class' => 'materia_prima'));?>
				<?php echo $this -> Form -> input('Calificacion.cal_materia_prima', array('label' => false, 'type' => 'hidden', 'class' => 'materia_prima','value'=>0));?></td>
				</td>
			</tr>
			<tr>
				<td>Productos Elaborados</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_productos_elaborados', array('label' => false, 'disabled' => true, 'class' => 'productos_elaborados'));?>
				<?php echo $this -> Form -> input('Calificacion.cal_productos_elaborados', array('label' => false, 'type' => 'hidden', 'class' => 'productos_elaborados','value'=>0));?></td>
			</tr>
			<tr class='total'>
				<th>Total</th>
				<th><?php echo $this -> Form -> text('Calificacion.cal_total_capital', array('disabled' => true, 'label' => false, 'class' => 'total_capital'));?>
				<?php echo $this -> Form -> input('Calificacion.cal_total_capital', array('type' => 'hidden', 'label' => false, 'class' => 'total_capital','value'=>0));?></th>
			</tr>
		</table>
		<h2>Ingresos</h2>
		<table class='balance ingresos'>
			<tr>
				<th> Ingreso </th>
				<th> Valor </th>
			</tr>
			<tr>
				<td>Ingresos Por Ventas </td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_ingresos_por_ventas', array('label' => false, 'class' => 'ingresos_ventas valor','value'=>0));?></td>
			</tr>
			<tr>
				<td>Otros Ingresos</td>
				<td><?php echo $this -> Form -> text('Calificacion.cal_otros_ingresos', array('label' => false, 'class' => 'otros_ingresos valor','value'=>0));?></td>
			</tr>
			<tr class='total'>
				<th>Total</th>
				<th><?php echo $this -> Form -> text('Calificacion.cal_total_ingresos', array('disabled' => true, 'label' => false, 'class' => 'total_ingresos valor'));?>
				<?php echo $this -> Form -> hidden('Calificacion.cal_total_ingresos', array('label' => false, 'class' => 'total_ingresos','value'=>0));?></th>
			</tr>
		</table>
	</div>
	<div class="resultado-balance validar">
		<h2>Balance General</h2>
		<?php echo $this -> Form -> text('Calificacion.cal_balance_total_ingresos', array('disabled' => true, 'label' => 'Total Ingresos:', 'class' => 'balance_total_ingresos'));?>
		<?php echo $this -> Form -> text('Calificacion.cal_balance_total_egresos', array('disabled' => true, 'label' => 'Total Egresos:', 'class' => 'balance_total_egresos'));?>
		<?php echo $this -> Form -> text('Calificacion.cal_balance_rentabilidad_mensual', array('disabled' => true, 'label' => 'Rentabilidad Mensual:', 'class' => 'balance_rentabilidad_mensual'));?>
		<?php echo $this -> Form -> hidden('Calificacion.cal_balance_total_ingresos', array('label' => 'Total Ingresos:', 'class' => 'balance_total_ingresos','value'=>0));?>
		<?php echo $this -> Form -> hidden('Calificacion.cal_balance_total_egresos', array('label' => 'Total Egresos:', 'class' => 'balance_total_egresos','value'=>0));?>
		<?php echo $this -> Form -> hidden('Calificacion.cal_balance_rentabilidad_mensual', array('label' => 'Rentabilidad Mensual:', 'class' => 'balance_rentabilidad_mensual','value'=>0));?>
	</div>
	<div class='actions validar'>
		<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
		<a class="submit button">Finalizar</a>
		<div style="clear:both;"></div>
	</div>
</fieldset>
