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
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.0.tipos_de_trabajador_id', array('value' => 1, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.0.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.0.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.0.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][0][tra_fecha_ingreso]" type="date" id="Trabajadores0TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.0.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][0][tra_fecha_nacimiento]" type="date" id="Trabajadores0TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.0.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.1.tipos_de_trabajador_id', array('value' => 1, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.1.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.1.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.1.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][1][tra_fecha_ingreso]" type="date" id="Trabajadores1TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.1.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][1][tra_fecha_nacimiento]" type="date" id="Trabajadores1TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.1.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.2.tipos_de_trabajador_id', array('value' => 1, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.2.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.2.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.2.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][2][tra_fecha_ingreso]" type="date" id="Trabajadores2TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.2.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][2][tra_fecha_nacimiento]" type="date" id="Trabajadores2TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.2.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.3.tipos_de_trabajador_id', array('value' => 1, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.3.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.3.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.3.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][3][tra_fecha_ingreso]" type="date" id="Trabajadores3TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.3.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][3][tra_fecha_nacimiento]" type="date" id="Trabajadores3TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.3.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][0]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.4.tipos_de_trabajador_id', array('value' => 1, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][0]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.4.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][0]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.4.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][0]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.4.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][4][tra_fecha_ingreso]" type="date" id="Trabajadores4TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][0]" type="checkbox" value="0" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.4.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][4][tra_fecha_nacimiento]" type="date" id="Trabajadores4TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][0]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.4.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
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
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][5]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.5.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][5]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.5.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][5]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.5.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][5]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.5.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][5][tra_fecha_ingreso]" type="date" id="Trabajadores5TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][5]" type="checkbox" value="5" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.5.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][5][tra_fecha_nacimiento]" type="date" id="Trabajadores5TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][5]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.5.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][6]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.6.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][6]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.6.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][6]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.6.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][6]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.6.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][6][tra_fecha_ingreso]" type="date" id="Trabajadores6TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][6]" type="checkbox" value="6" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.6.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][6][tra_fecha_nacimiento]" type="date" id="Trabajadores6TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][6]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.6.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][7]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.7.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][7]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.7.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][7]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.7.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][7]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.7.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][7][tra_fecha_ingreso]" type="date" id="Trabajadores7TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][7]" type="checkbox" value="7" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.7.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][7][tra_fecha_nacimiento]" type="date" id="Trabajadores7TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][7]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.7.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][8]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.8.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][8]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.8.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][8]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.8.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][8]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.8.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][8][tra_fecha_ingreso]" type="date" id="Trabajadores8TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][8]" type="checkbox" value="8" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.8.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][8][tra_fecha_nacimiento]" type="date" id="Trabajadores8TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][8]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.8.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajadores][tipos_de_trabajador_id][9]" type="hidden" id="TrabajadoresTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajadores.9.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajadores][tra_cedula][9]" type="number" id="TrabajadoresTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.9.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajadores][tra_nombres_y_apellidos][9]" type="text" id="TrabajadoresTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.9.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajadores][tra_sexo][9]" id="TrabajadoresTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.9.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][9][tra_fecha_ingreso]" type="date" id="Trabajadores9TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajadores][tra_afiliado_seguro][9]" type="checkbox" value="9" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.9.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajadores][9][tra_fecha_nacimiento]" type="date" id="Trabajadores9TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajadores][tra_pago_mensual][9]" type="number" id="TrabajadoresTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajadores.9.tra_pago_mensual', array('label' => false, 'div' => false)); ?></td>
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
				<td><?php echo $this->Form->input('Calificacion.cal_agua', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Luz</td>
				<td><?php echo $this->Form->input('Calificacion.cal_luz', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Teléfono</td>
				<td><?php echo $this->Form->input('Calificacion.cal_telefono', array('label' => false)); ?></td>
			</tr>
			<tr>
				<td>Servicios Básicos</td>
				<td><?php echo $this->Form->input('Calificacion.cal_servicios_basicos', array('label' => false)); ?></td>
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


