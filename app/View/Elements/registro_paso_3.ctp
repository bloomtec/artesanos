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
					<th>Afiliado Al Seguro</th>
					<th>Fecha De Nacimiento</th>
					<th>Pago Mensual</th>
				</tr>
			</thead>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />
				<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][0]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][0]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][1]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />
				<td><input name="data[Trabajadores][tra_cedula][1]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][1]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][1]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][1]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][1]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][1]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][1]" type="number" id="TrabajadoresTraPagoMensual"  class='salarioOperarios' /></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][2]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />
				<td><input name="data[Trabajadores][tra_cedula][2]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][2]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][2]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][2]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][2]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][2]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][2]" type="number" id="TrabajadoresTraPagoMensual"  class='salarioOperarios' /></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][3]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />
				<td><input name="data[Trabajadores][tra_cedula][3]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][3]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][3]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][3]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][3]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][3]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][3]" type="number" id="TrabajadoresTraPagoMensual"  class='salarioOperarios'/></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][4]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />
				<td><input name="data[Trabajadores][tra_cedula][4]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][4]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][4]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][4]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][4]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][4]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][4]" type="number" id="TrabajadoresTraPagoMensual"  class='salarioOperarios' /></td>
			</tr>
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
					<th>Afiliado Al Seguro</th>
					<th>Fecha De Nacimiento</th>
					<th>Pago Mensual</th>
				</tr>
			</thead>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />
				<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][0]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][0]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual"  class='salarioAprendiz' /></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][1]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />
				<td><input name="data[Trabajadores][tra_cedula][1]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][1]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][1]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][1]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][1]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][1]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][1]" type="number" id="TrabajadoresTraPagoMensual" class='salarioAprendiz' /></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][2]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />
				<td><input name="data[Trabajadores][tra_cedula][2]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][2]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][2]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][2]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][2]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][2]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][2]" type="number" id="TrabajadoresTraPagoMensual" class='salarioAprendiz' /></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][4]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />
				<td><input name="data[Trabajadores][tra_cedula][4]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][4]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][4]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][4]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][4]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][4]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][4]" type="number" id="TrabajadoresTraPagoMensual" class='salarioAprendiz' /></td>
			</tr>
			<tr>
				<input name="data[Trabajadores][tipos_de_trabajador_id][5]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="2" />
				<td><input name="data[Trabajadores][tra_cedula][5]" type="number" id="TrabajadoresTraCedula" /></td>
				<td><input name="data[Trabajadores][tra_nombres_y_apellidos][5]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>
				<td>
					<select name="data[Trabajadores][tra_sexo][5]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php echo $value; ?>"><?php echo $sexo; ?></option>
						<?php endforeach; ?>
					</select>
				</td>
				<td><input name="data[Trabajadores][tra_fecha_ingreso][5]" type="date" id="TrabajadoresTraFechaIngreso" /></td>
				<td><input name="data[Trabajadores][tra_afiliado_seguro][5]" type="checkbox" value="0" /></td>
				<td><input name="data[Trabajadores][tra_fecha_nacimiento][5]" type="date" id="TrabajadoresTraFechaNacimiento" /></td>
				<td><input name="data[Trabajadores][tra_pago_mensual][5]" type="number" id="TrabajadoresTraPagoMensual" class='salarioAprendiz' /></td>
			</tr>
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
				<td>Domicilio <?php echo $this->Form->input('Calificacion.cal_domicilio_propio', array('label' => 'Propio')); ?></td>
				<td><?php echo $this->Form->input('Calificacion.cal_domicilio_valor', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Taller <?php echo $this->Form->input('Calificacion.cal_taller_propio', array('label' => 'Propio')); ?></td>
				<td><?php echo $this->Form->input('Calificacion.cal_taller_valor', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Agua</td>
				<td><?php echo $this->Form->input('Calificacion.Calificacion.cal_agua', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Luz</td>
				<td><?php echo $this->Form->input('Calificacion.Calificacion.cal_luz', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td><?php echo $this->Form->input('Calificacion.Calificacion.cal_telefono', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Servicios Básicos</td>
				<td><?php echo $this->Form->input('Calificacion.Calificacion.cal_servicios_basicos', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Compra Materia Prima Mensual</td>
				<td><?php echo $this->Form->input('Calificacion.cal_compra_de_materia_prima_mensual', array('label' => false));?></td>
			</tr>
			<tr>
				<td>Salario Operarios</td>
				<td>
					<?php echo $this->Form->input('Calificacion.cal_salario_operarios', array('label' => false, 'disabled' => true,'class'=>'salario_operarios'));?>
					<?php echo $this->Form->input('Calificacion.cal_salario_operarios', array('type' => 'hidden','class'=>'salario_operarios'));?>
				</td>
			</tr>
			<tr>
				<td>Salario Aprendices</td>
				<td>
					<?php echo $this->Form->input('Calificacion.cal_salario_aprendices', array('label' => false, 'disabled' => true,'class'=>'salario_aprendices')); ?>
					<?php echo $this->Form->input('Calificacion.cal_salario_aprendices', array( 'type' => 'hidden','class'=>'salario_aprendices')); ?>
				</td>
			</tr>
			<tr>
				<td>Otros Salarios</td>
				<td><?php echo $this->Form->input('Calificacion.cal_otros_salarios', array('label' => false)); ?></td>
			</tr>
			<tr class='total'>
				<th>Total</th>
				<th><?php echo $this -> Form -> number('Calificacion.cal_total_egresos',array('disabled'=>true,'label'=>false,'class'=>'total_egresos'));?></th>
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
				<td>
					<?php echo $this->Form->input('Calificacion.cal_maquinas_y_herramientas', array('label' => false, 'disabled' => true,'class' => 'maquinas_y_herramientas'));?>
					<?php echo $this->Form->input('Calificacion.cal_maquinas_y_herramientas', array('label' => false, 'type' => 'hidden','class' => 'maquinas_y_herramientas'));?>
				</td>
			</tr>
			<tr>
				<td>Materia Prima</td>
				<td>
					<?php echo $this->Form->input('Calificacion.cal_materia_prima', array('label' => false, 'disabled' => true,'class'=>'materia_prima'));?>
					<?php echo $this->Form->input('Calificacion.cal_materia_prima', array('label' => false, 'type' => 'hidden','class'=>'materia_prima'));?>
					</td>
				</td>
			</tr>
			<tr>
				<td>Productos Elaborados</td>
				<td>
					<?php echo $this->Form->input('Calificacion.cal_productos_elaborados', array('label' => false, 'disabled' => true,'class'=>'productos_elaborados')); ?>
					<?php echo $this->Form->input('Calificacion.cal_productos_elaborados', array('label' => false, 'type' => 'hidden','class'=>'productos_elaborados')); ?>
				</td>
			</tr>
			<tr class='total'>
				<th>Total</th>
				<th><?php echo $this -> Form -> number('Calificacion.cal_total_capital',array('disabled'=>true,'label'=>false,'class'=>'total_capital'));?></th>
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
				<td>
					<?php echo $this->Form->input('Calificacion.cal_ingresos_por_ventas', array('label' => false,'class'=>'ingresos_ventas'));?>
				</td>
			</tr>
			<tr>
				<td>Otros Ingresos</td>
				<td>
					<?php echo $this->Form->input('Calificacion.cal_otros_ingresos', array('label' => false,'class'=>'otros_ingresos'));?>
				</td>
			</tr>

			<tr class='total'>
				<th>Total</th>
				<th><?php echo $this -> Form -> number('Calificacion.cal_total_ingresos',array('disabled'=>true,'label'=>false,'class'=>'total_ingresos'));?></th>
			</tr>
		</table>	
	
	</div>
	<div class="resultado-balance validar">
		<h2>Balance General</h2>
		<?php echo $this -> Form -> input('Calificacion.cal_balance_total_ingresos',array('disabled'=>true,'label'=>'Total Ingresos:','class'=>'balance_total_ingresos'));?>
		<?php echo $this -> Form -> input('Calificacion.cal_balance_total_egresos',array('disabled'=>true,'label'=>'Total Egresos:','class'=>'balance_total_egresos'));?>
		<?php echo $this -> Form -> input('Calificacion.cal_balance_rentabilidad_mensual',array('disabled'=>true,'label'=>'Rentabilidad Mensual:','class'=>'balance_rentabilidad_mensual'));?>
	</div>
	<div class='actions validar'>
	<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
	<?php echo $this -> Form -> submit('Finalizar'); ?>
	<div style="clear:both;"></div>
	</div>
</fieldset>


