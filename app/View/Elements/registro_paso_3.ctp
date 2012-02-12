<fieldset>
	<div class="datos-operadores">
		<h2>Operadores A Su Cargo</h2>
		<table id="TablaOperadores" class="tabla-operadores">
			<thead>
				<tr>
					<th>No. De Cédula</th>
					<th>Nombre Y Apellido</th>
					<th>Sexo</th>
					<th>Fecha De Ingreso</th>
					<th>Afiliado Al Seguro</th>
					<th>Fecha De Nacimiento</th>
					<th>Pago Mensual</th>
				</tr>
			</thead>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />
				<td><input name="data[Trabajadores][tra_cedula]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual]" type="number" id="TrabajadoresTraPagoMensual" /></td>
			</tr>
		</table>
		<a class="AñadirRegistroOperador cancelar" href="#" >Agregar Otro</a>
	</div>
	<div class="datos-operadores">
		<h2>Aprendices A Su Cargo</h2>
		<table id="TablaAprendices" class="tabla-aprendices">
			<thead>
				<tr>
					<th>No. De Cédula</th>
					<th>Nombre Y Apellido</th>
					<th>Sexo</th>
					<th>Fecha De Ingreso</th>
					<th>Afiliado Al Seguro</th>
					<th>Fecha De Nacimiento</th>
					<th>Pago Mensual</th>
				</tr>
			</thead>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />
				<td><input name="data[Trabajadores][tra_cedula]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual]" type="number" id="TrabajadoresTraPagoMensual" /></td>
			</tr>
		</table>
		<a class="AñadirRegistroAprendiz cancelar" href="#" >Agregar Otro</a>
	</div>
	<div class="datos-balance">
		<h2>Egresos Mensuales</h2>
		<div class="fila-datos" row="30">
		<?php
		echo $this->Form->input('Calificacion.cal_domicilio_propio', array('label' => 'Domicilio Propio'));
		echo $this->Form->input('Calificacion.cal_domicilio_valor', array('label' => 'Valor'));
		?>
		</div>
		<div class="fila-datos" row="31">
		<?php
		echo $this->Form->input('Calificacion.cal_taller_propio', array('label' => 'Taller Propio'));
		echo $this->Form->input('Calificacion.cal_taller_valor', array('label' => 'Valor'));
		?>
		</div>
		<div class="fila-datos" row="32">
		<?php
		echo $this->Form->input('Calificacion.cal_agua', array('label' => 'Agua'));
		echo $this->Form->input('Calificacion.cal_luz', array('label' => 'Luz'));
		echo $this->Form->input('Calificacion.cal_telefono', array('label' => 'Teléfono'));
		echo $this->Form->input('Calificacion.cal_servicios_basicos', array('label' => 'Servicios Básicos'));
		?>
		</div>
		<div class="fila-datos" row="33">
		<?php
		echo $this->Form->input('Calificacion.cal_compra_de_materia_prima_mensual', array('label' => 'Compra Materia Prima Mensual:'));
		echo $this->Form->input('Calificacion.cal_salario_operarios', array('label' => 'Salario Operarios:', 'type' => 'hidden'));
		echo $this->Form->input('Calificacion.cal_salario_aprendices', array('label' => 'Salario Aprendices', 'type' => 'hidden'));
		?>
			<div class="input text">
				<label>Salario Operarios:</label>
				<input class="BalanceSalarioOperarios" type="text" disabled="true" value="0" />
			</div>
			<div class="input text">
				<label>Salario Aprendices:</label>
				<input class="BalanceSalarioAprendices" type="text" disabled="true" value="0" />
			</div>
		<?php
		echo $this->Form->input('Calificacion.cal_otros_salarios', array('label' => 'Otros Salarios:'));
		?>
			<div class="input text">
				<label>Total Egresos:</label>
				<input class="BalanceTotalEgresos" type="text" disabled="true" value="0" />
			</div>
		</div>
		<div class="fila-datos" row="34">
			<h2>Capital De Operaciones</h2>
			<?php
			echo $this->Form->input('Calificacion.cal_maquinas_y_herramientas', array('label' => 'Máquinas Y Herramientas:', 'type' => 'hidden'));
			echo $this->Form->input('Calificacion.cal_materia_prima', array('label' => 'Materia Prima:', 'type' => 'hidden'));
			echo $this->Form->input('Calificacion.cal_productos_elaborados', array('label' => 'Productos Elaborados:', 'type' => 'hidden'));
			?>
			<div class="input text">
				<label>Máquinas Y Herramientas:</label>
				<input class="BalanceMaquinasYHerramientas" type="text" disabled="true" value="0" />
			</div>
			<div class="input text">
				<label>Materia Prima:</label>
				<input class="BalanceMateriaPrima" type="text" disabled="true" value="0" />
			</div>
			<div class="input text">
				<label>Productos Elaborados:</label>
				<input class="BalanceProductosElaborados" type="text" disabled="true" value="0" />
			</div>
			<div class="input text">
				<label>Total Capital:</label>
				<input class="BalanceTotalCapital" type="text" disabled="true" value="0" />
			</div>
		</div>
		<div class="fila-datos" row="35">
			<h2>Ingresos</h2>
			<?php
			echo $this->Form->input('Calificacion.cal_ingresos_por_ventas', array('label' => 'Ingresos Por Ventas:'));
			echo $this->Form->input('Calificacion.cal_otros_ingresos', array('label' => 'Otros Ingresos:'));
			?>
			<div class="input text">
				<label>Total Ingresos:</label>
				<input class="BalanceTotalIngresos" type="text" disabled="true" value="0" />
			</div>
		
		</div>
	</div>
	<div class="resultado-balance">
		<h2>Balance General</h2>
		<div class="input text">
			<label>Total Ingresos:</label>
			<input class="BalanceTotalIngresos" type="text" disabled="true" value="0" />
		</div>
		<div class="input text">
			<label>Total Egresos:</label>
			<input class="BalanceTotalEgresos" type="text" disabled="true" value="0" />
		</div>
		<div class="input text">
			<label>Rentabilidad Mensual:</label>
			<input class="BalanceRentabilidad" type="text" disabled="true" value="0" />
		</div>
	</div>
</fieldset>