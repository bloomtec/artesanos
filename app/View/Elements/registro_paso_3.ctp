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
		
			<?php echo $this -> element('otros_trabajadores');?>
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
				<!--<input name="data[Trabajador][tipos_de_trabajador_id][5]" type="hidden" id="TrabajadorTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajador.15.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajador][tra_cedula][5]" type="number" id="TrabajadorTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.15.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajador][tra_nombres_y_apellidos][5]" type="text" id="TrabajadorTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.15.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajador][tra_sexo][5]" id="TrabajadorTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajador.15.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][15][tra_fecha_ingreso]" type="date" id="Trabajador15TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajador][tra_afiliado_seguro][5]" type="checkbox" value="5" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.15.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][15][tra_fecha_nacimiento]" type="date" id="Trabajador5TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajador][tra_pago_mensual][5]" type="number" id="TrabajadorTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.15.tra_pago_mensual', array('label' => false, 'div' => false, 'class'=>'salarioAprendiz')); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajador][tipos_de_trabajador_id][6]" type="hidden" id="TrabajadorTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajador.16.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajador][tra_cedula][6]" type="number" id="TrabajadorTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.16.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajador][tra_nombres_y_apellidos][6]" type="text" id="TrabajadorTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.16.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajador][tra_sexo][6]" id="TrabajadorTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajador.16.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][16][tra_fecha_ingreso]" type="date" id="Trabajador16TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajador][tra_afiliado_seguro][6]" type="checkbox" value="6" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.16.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][16][tra_fecha_nacimiento]" type="date" id="Trabajador16TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajador][tra_pago_mensual][6]" type="number" id="TrabajadorTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.16.tra_pago_mensual', array('label' => false, 'div' => false, 'class'=>'salarioAprendiz')); ?></td>
			<tr>
				<!--<input name="data[Trabajador][tipos_de_trabajador_id][7]" type="hidden" id="TrabajadorTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajador.17.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajador][tra_cedula][7]" type="number" id="TrabajadorTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.17.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajador][tra_nombres_y_apellidos][7]" type="text" id="TrabajadorTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.17.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajador][tra_sexo][7]" id="TrabajadorTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajador.17.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][17][tra_fecha_ingreso]" type="date" id="Trabajador17TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajador][tra_afiliado_seguro][7]" type="checkbox" value="7" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.17.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][17][tra_fecha_nacimiento]" type="date" id="Trabajador17TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajador][tra_pago_mensual][7]" type="number" id="TrabajadorTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.17.tra_pago_mensual', array('label' => false, 'div' => false, 'class'=>'salarioAprendiz')); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajador][tipos_de_trabajador_id][8]" type="hidden" id="TrabajadorTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajador.18.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajador][tra_cedula][8]" type="number" id="TrabajadorTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.18.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajador][tra_nombres_y_apellidos][8]" type="text" id="TrabajadorTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.18.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajador][tra_sexo][8]" id="TrabajadorTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajador.18.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][18][tra_fecha_ingreso]" type="date" id="Trabajador18TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajador][tra_afiliado_seguro][8]" type="checkbox" value="8" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.18.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][18][tra_fecha_nacimiento]" type="date" id="Trabajador18TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajador][tra_pago_mensual][8]" type="number" id="TrabajadorTraPagoMensual" class='salarioOperarios'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.18.tra_pago_mensual', array('label' => false, 'div' => false, 'class'=>'salarioAprendiz')); ?></td>
			</tr>
			<tr>
				<!--<input name="data[Trabajador][tipos_de_trabajador_id][9]" type="hidden" id="TrabajadorTiposDeTrabajadorId" value="1" />-->
				<?php echo $this -> Form -> hidden('Trabajador.19.tipos_de_trabajador_id', array('value' => 2, 'label' => false, 'div' => false)); ?>
				<!--<td><input name="data[Trabajador][tra_cedula][9]" type="number" id="TrabajadorTraCedula" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.19.tra_cedula', array('label' => false, 'div' => false)); ?></td>
				<!--<td><input name="data[Trabajador][tra_nombres_y_apellidos][9]" type="text" id="TrabajadorTraNombresYApellidos" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.19.tra_nombres_y_apellidos', array('label' => false, 'div' => false)); ?></td>
				<!--<td>
					<select name="data[Trabajador][tra_sexo][9]" id="TrabajadorTraSexo" />
						<option value="">Seleccione...</option>
						<?php //foreach ($sexos as $value => $sexo) : ?>
						<option value="<?php //echo $value; ?>"><?php //echo $sexo; ?></option>
						<?php //endforeach; ?>
					</select>
				</td>-->
				<td><?php echo $this -> Form -> input('Trabajador.19.tra_sexo', array('options' => $sexos, 'empty' => 'Seleccione...', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][19][tra_fecha_ingreso]" type="date" id="Trabajador19TraFechaIngreso" /></td>
				<!--<td><input name="data[Trabajador][tra_afiliado_seguro][9]" type="checkbox" value="9" /></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.19.tra_afiliado_seguro', array('type' => 'checkbox', 'label' => false, 'div' => false)); ?></td>
				<td><input name="data[Trabajador][19][tra_fecha_nacimiento]" type="date" id="Trabajador19TraFechaNacimiento" /></td>
				<!--<td><input name="data[Trabajador][tra_pago_mensual][9]" type="number" id="TrabajadorTraPagoMensual" class='salarioAprendiz'/></td>-->
				<td><?php echo $this -> Form -> input('Trabajador.19.tra_pago_mensual', array('label' => false, 'div' => false, 'class'=>'salarioAprendiz')); ?></td>
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
				<th>
					<?php echo $this -> Form -> number('Calificacion.cal_total_capital',array('disabled'=>true,'label'=>false,'class'=>'total_capital'));?>
					<?php echo $this -> Form -> input('Calificacion.cal_total_capital',array('type'=>'hidden','disabled'=>true,'label'=>false,'class'=>'total_capital'));?>
				</th>
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
				<th>
					<?php echo $this -> Form -> number('Calificacion.cal_total_ingresos',array('disabled'=>true,'label'=>false,'class'=>'total_ingresos'));?>
					<?php echo $this -> Form -> hidden('Calificacion.cal_total_ingresos',array('disabled'=>true,'label'=>false,'class'=>'total_ingresos'));?>
				</th>
			</tr>
		</table>	
	
	</div>
	<div class="resultado-balance validar">
		<h2>Balance General</h2>
		<?php echo $this -> Form -> input('Calificacion.cal_balance_total_ingresos',array('disabled'=>true,'label'=>'Total Ingresos:','class'=>'balance_total_ingresos'));?>
		<?php echo $this -> Form -> input('Calificacion.cal_balance_total_egresos',array('disabled'=>true,'label'=>'Total Egresos:','class'=>'balance_total_egresos'));?>
		<?php echo $this -> Form -> input('Calificacion.cal_balance_rentabilidad_mensual',array('disabled'=>true,'label'=>'Rentabilidad Mensual:','class'=>'balance_rentabilidad_mensual'));?>
		<?php echo $this -> Form -> hidden('Calificacion.cal_balance_total_ingresos',array('disabled'=>true,'label'=>'Total Ingresos:','class'=>'balance_total_ingresos'));?>
		<?php echo $this -> Form -> hidden('Calificacion.cal_balance_total_egresos',array('disabled'=>true,'label'=>'Total Egresos:','class'=>'balance_total_egresos'));?>
		<?php echo $this -> Form -> hidden('Calificacion.cal_balance_rentabilidad_mensual',array('disabled'=>true,'label'=>'Rentabilidad Mensual:','class'=>'balance_rentabilidad_mensual'));?>
	
	</div>
	<div class='actions validar'>
	<?php echo $this -> Html -> link(__('Atras'), "#", array('class' => 'prev button'));?>
	<?php echo $this -> Form -> submit('Finalizar'); ?>
	<div style="clear:both;"></div>
	</div>
</fieldset>


