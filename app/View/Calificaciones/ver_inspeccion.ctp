<div class="inspecciones view">
	<h3>DATOS INSPECCIÓN</h3>
	<table class="inspeccion">
		<caption>
			INSPECCIÓN
		</caption>
		<tr>
			<th>Código</th>
			<th>Tipo De Inspección</th>
			<th>Fecha Asignada</th>
		</tr>
		<tr>
			<td><?php echo $inspeccion['Calificacion']['id'];?></td>
			<td><?php echo $se_inspecciona;?></td>
			<td><?php
			if ($tipo_inspeccion == 1) {
				echo $inspeccion['Calificacion']['cal_fecha_inspeccion_taller'];
			} else {
				echo $inspeccion['Calificacion']['cal_fecha_inspeccion_local'];
			}
			?></td>
		</tr>
	</table>
	<table class="artesano">
		<caption>
			ARTESANO
		</caption>
		<tr>
			<th>Nombre</th>
			<th>Documento</th>
			<th>Fecha De Nacimiento</th>
			<th>Nacionalidad</th>
			<th>Tipo De Sangre</th>
			<th>Sexo</th>
		</tr>
		<tr>
			<td><?php
			echo $inspeccion['DatosPersonal'][0]['dat_nombres'] . ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_paterno'] . ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_materno'];
			?></td>
			<td><?php echo $this -> requestAction('/artesanos/getID/' . $inspeccion['Calificacion']['artesano_id']);?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_fecha_nacimiento'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_nacionalidad'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_tipo_de_sangre'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_sexo'];?></td>
		</tr>
		<tr>
			<th>Estado Civil</th>
			<th>Grado De Estudio</th>
			<th>Hijos Mayores</th>
			<th>Hijos Menores</th>
			<th>Tipo De Discapacidad</th>
			<th>% De Discapacidad</th>
		</tr>
		<tr>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_estado_civil'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_grado_estudio'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_hijos_mayores'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_hijos_menores'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_tipo_discapacidad'];?></td>
			<td><?php echo $inspeccion['DatosPersonal'][0]['dat_porcentaje_de_discapacidad'];?></td>
		</tr>
	</table>
	<?php if($tipo_inspeccion == 2) :
	?> <!-- Información para un local -->
	<table class="local">
		<caption>
			LOCAL
		</caption>
		<tr>
			<th>Provincia</th>
			<th>Canton</th>
			<th>Ciudad</th>
			<th>Sector</th>
			<th>Parroquia</th>
		</tr>
		<tr>
			<td><?php
			if ($inspeccion['Local'][0]['provincia_id'])
				echo $this -> requestAction('/provincias/getNombre/' . $inspeccion['Local'][0]['provincia_id']);
			?></td>
			<td><?php
			if ($inspeccion['Local'][0]['canton_id'])
				echo $this -> requestAction('/cantones/getNombre/' . $inspeccion['Local'][0]['canton_id']);
			?></td>
			<td><?php
			if ($inspeccion['Local'][0]['ciudad_id'])
				echo $this -> requestAction('/ciudades/getNombre/' . $inspeccion['Local'][0]['ciudad_id']);
			?></td>
			<td><?php
			if ($inspeccion['Local'][0]['sector_id'])
				echo $this -> requestAction('/sectores/getNombre/' . $inspeccion['Local'][0]['sector_id']);
			?></td>
			<td><?php
			if ($inspeccion['Local'][0]['parroquia_id'])
				echo $this -> requestAction('/parroquias/getNombre/' . $inspeccion['Local'][0]['parroquia_id']);
			?></td>
		</tr>
		<tr>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Referencia</th>
			<th>Correo Electrónico</th>
			<th>Dirección</th>
		</tr>
		<tr>
			<td><?php echo $inspeccion['Local'][0]['loc_telefono_convencional'];?></td>
			<td><?php echo $inspeccion['Local'][0]['loc_telefono_celular'];?></td>
			<td><?php echo $inspeccion['Local'][0]['loc_referencia'];?></td>
			<td><?php echo $inspeccion['Local'][0]['loc_email'];?></td>
			<td><?php echo 'Calle / Avenida: ' . $inspeccion['Local'][0]['loc_calle_o_avenida'];?>
			&nbsp;
			<?php echo 'Número: ' . $inspeccion['Local'][0]['loc_numero'];?>
			&nbsp;
			<?php echo 'Intersección: ' . $inspeccion['Local'][0]['loc_interseccion'];?>
			&nbsp;
			<?php echo 'Barrio: ' . $inspeccion['Local'][0]['loc_barrio'];?>
			&nbsp;</td>
		</tr>
	</table>
	<!-- Inspección -->
	<?php echo $this -> Form -> create('Calificacion', array('type' => 'file', 'action' => 'verInspeccion', 'style' => 'padding: 0')); ?>
	<?php echo $this -> Form -> hidden('id', array('value' => $inspeccion['Calificacion']['id'])); ?>
	<table class="calificacion">
		<caption>
			Área Para El Inspector
		</caption>
		<tr>
			<th>Comentarios</th>
			<th>Documentos Asociados</th>
			<th>Decisión</th>
			<th></th>
		</tr>
		<tr>
			<?php
				$disabled = false;
				if ($this -> Session -> read('Auth.User.rol_id') != 3 || $this -> Session -> read('Auth.User.id') != $inspeccion['Calificacion']['cal_inspector_taller']) $disabled = true;
			?>
			<td style="min-width: 229px;">
				<?php
					$text = '';
					if(!empty($inspeccion['Calificacion']['cal_comentarios_local'])) $text = $inspeccion['Calificacion']['cal_comentarios_local'];
					if($disabled) {
						echo $this -> Form -> input('cal_comentarios_local', array('disabled', 'value' => $text, 'required' => 'required', 'label' => false, 'div' => false, 'type' => 'textarea'));
					} else {
						echo $this -> Form -> input('cal_comentarios_local', array('value' => $text, 'required' => 'required', 'label' => false, 'div' => false, 'type' => 'textarea'));
					}
				?>
			</td>
			<td style="min-width: 450px;">
				<?php
					if($disabled) {
						foreach($inspeccion['Documento'] as $key => $documento) :
							if(!$documento['doc_documento_taller']) :
				?>
								<a href="<?php echo '/' . $documento['doc_path']; ?>" class="button"><?php echo $documento['doc_name']; ?></a>
								<br />
								<br />
								<br />
				<?php
							endif;
						endforeach;
					} else {
						echo $this -> Form -> input('Documentos.doc_1', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_2', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_3', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_4', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_5', array('type' => 'file'));
					}
					echo $this -> Form -> hidden('Documentos.is_taller', array('value' => false));
				?>
			</td>
			<td style="min-width: 160px;">
				<?php
					$value = '-1';
					if($inspeccion['Calificacion']['cal_local_aprobado'] != 0) $value = $inspeccion['Calificacion']['cal_local_aprobado'];
					if($disabled) {
						echo $this -> Form -> radio('cal_local_aprobado', array(-1 => 'Denegado', 1 => 'Aprobado'), array('value' => $value, 'required' => 'required', 'label' => false, 'div' => false, 'legend' => false, 'disabled'));
					} else {
						echo $this -> Form -> radio('cal_local_aprobado', array(-1 => 'Denegado', 1 => 'Aprobado'), array('value' => $value, 'required' => 'required', 'label' => false, 'div' => false, 'legend' => false));
					}
				?>
			</td>			
			<td><?php echo $this -> Form -> submit('Enviar'); ?></td>
		</tr>
	</table>
	<?php echo $this -> Form -> end();?>
	<?php endif;?>
	<?php if($tipo_inspeccion == 1) :
	?> <!-- Información para un taller -->
	<table class="taller">
		<caption>
			TALLER
		</caption>
		<tr>
			<th>Provincia</th>
			<th>Canton</th>
			<th>Ciudad</th>
			<th>Sector</th>
			<th>Parroquia</th>
			<th>Dirección</th>
		</tr>
		<tr>
			<td><?php
			if ($inspeccion['Taller'][0]['provincia_id'])
				echo $this -> requestAction('/provincias/getNombre/' . $inspeccion['Taller'][0]['provincia_id']);
			?></td>
			<td><?php
			if ($inspeccion['Taller'][0]['canton_id'])
				echo $this -> requestAction('/cantones/getNombre/' . $inspeccion['Taller'][0]['canton_id']);
			?></td>
			<td><?php
			if ($inspeccion['Taller'][0]['ciudad_id'])
				echo $this -> requestAction('/ciudades/getNombre/' . $inspeccion['Taller'][0]['ciudad_id']);
			?></td>
			<td><?php
			if ($inspeccion['Taller'][0]['sector_id'])
				echo $this -> requestAction('/sectores/getNombre/' . $inspeccion['Taller'][0]['sector_id']);
			?></td>
			<td><?php
			if ($inspeccion['Taller'][0]['parroquia_id'])
				echo $this -> requestAction('/parroquias/getNombre/' . $inspeccion['Taller'][0]['parroquia_id']);
			?></td>
			<td><?php echo 'Calle / Avenida: ' . $inspeccion['Taller'][0]['tal_calle_o_avenida'];?>
			&nbsp;
			<?php echo 'Número: ' . $inspeccion['Taller'][0]['tal_numero'];?>
			&nbsp;
			<?php echo 'Intersección: ' . $inspeccion['Taller'][0]['tal_interseccion'];?>
			&nbsp;
			<?php echo 'Barrio: ' . $inspeccion['Taller'][0]['tal_barrio'];?>
			&nbsp;</td>
		</tr>
		<tr>
			<th></th>
			<th>Razón Social</th>
			<th>Teléfono</th>
			<th>Celular</th>
			<th>Referencia</th>
			<th>Correo Electrónico</th>
		</tr>
		<tr>
			<td></td>
			<td><?php echo $inspeccion['Taller'][0]['tal_razon_social_o_nombre_comercial'];?></td>
			<td><?php echo $inspeccion['Taller'][0]['tal_telefono_convencional'];?></td>
			<td><?php echo $inspeccion['Taller'][0]['tal_telefono_celular'];?></td>
			<td><?php echo $inspeccion['Taller'][0]['tal_referencia'];?></td>
			<td><?php echo $inspeccion['Taller'][0]['tal_email'];?></td>
		</tr>
	</table>
	<!-- Operadores -->
	<table class="operadores">
		<caption>
			Operarios Del Taller
		</caption>
		<tr>
			<th>Cedula</th>
			<th>Nombres Y Apellidos</th>
			<th>Sexo</th>
			<th>Fecha De Ingreso</th>
			<th>Afiliado Al Seguro</th>
			<th>Fecha De Nacimiento</th>
			<th>Pago Mensual</th>
		</tr>
		<?php
			$cantidad_trabajadores = count($inspeccion['Operador']);
			if($cantidad_trabajadores > 0 && $cantidad_trabajadores == 1) { // Solo hay un trabajador
				$trabajador = $inspeccion['Operador'][0];
		?>
		<tr>
			<td><?php echo $trabajador['Trabajador']['tra_cedula'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_nombres_y_apellidos'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_sexo']) {
				echo 'Masculino';
			} else {
				echo 'Femenino';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_ingreso'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_afiliado_seguro']) {
				echo 'Sí';
			} else {
				echo 'No';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_nacimiento'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_pago_mensual'];?></td>
		</tr>
		<?php
			} elseif($cantidad_trabajadores > 0 && $cantidad_trabajadores >= 2) { // Hay m
				foreach($inspeccion['Operador'] as $key => $trabajador) :
		?>
		<tr>
			<td><?php echo $trabajador['Trabajador']['tra_cedula'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_nombres_y_apellidos'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_sexo']) {
				echo 'Masculino';
			} else {
				echo 'Femenino';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_ingreso'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_afiliado_seguro']) {
				echo 'Sí';
			} else {
				echo 'No';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_nacimiento'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_pago_mensual'];?></td>
		</tr>
		<?php
		endforeach;
		}
		?>
	</table>
	<!-- Aprendices -->
	<table class="aprendices">
		<caption>
			Aprendices Del Taller
		</caption>
		<tr>
			<th>Cedula</th>
			<th>Nombres Y Apellidos</th>
			<th>Sexo</th>
			<th>Fecha De Ingreso</th>
			<th>Afiliado Al Seguro</th>
			<th>Fecha De Nacimiento</th>
			<th>Pago Mensual</th>
		</tr>
		<?php
			$cantidad_trabajadores = count($inspeccion['Aprendiz']);
			if($cantidad_trabajadores > 0 && $cantidad_trabajadores == 1) { // Solo hay un trabajador
				$trabajador = $inspeccion['Aprendiz'][0];
		?>
		<tr>
			<td><?php echo $trabajador['Trabajador']['tra_cedula'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_nombres_y_apellidos'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_sexo']) {
				echo 'Masculino';
			} else {
				echo 'Femenino';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_ingreso'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_afiliado_seguro']) {
				echo 'Sí';
			} else {
				echo 'No';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_nacimiento'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_pago_mensual'];?></td>
		</tr>
		<?php
		} elseif($cantidad_trabajadores > 0 && $cantidad_trabajadores >= 2) { // Hay más de un trabajador
		foreach($inspeccion['Aprendiz'] as $key => $trabajador) :
		?>
		<tr>
			<td><?php echo $trabajador['Trabajador']['tra_cedula'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_nombres_y_apellidos'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_sexo']) {
				echo 'Masculino';
			} else {
				echo 'Femenino';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_ingreso'];?></td>
			<td><?php
			if ($trabajador['Trabajador']['tra_afiliado_seguro']) {
				echo 'Sí';
			} else {
				echo 'No';
			}
			?></td>
			<td><?php echo $trabajador['Trabajador']['tra_fecha_nacimiento'];?></td>
			<td><?php echo $trabajador['Trabajador']['tra_pago_mensual'];?></td>
		</tr>
		<?php
		endforeach;
		}
		?>
	</table>
	<!-- Equipos Y Herramientas -->
	<table class="equipos-herramientas">
		<caption>
			Equipos Y Herramientas
		</caption>
		<tr>
			<th>Cantidad</th>
			<th>Maquinaria Y Herramientas</th>
			<th>Tipo De Adquisición</th>
			<th>Fecha De Adquisición</th>
			<th>Valor Comercial</th>
		</tr>
		<?php foreach($inspeccion['EquipoDeTrabajo'] as $key => $equipo) :
		?>
		<tr>
			<td><?php echo $equipo['EquiposDeTrabajo']['equ_cantidad'];?></td>
			<td><?php echo $equipo['EquiposDeTrabajo']['equ_maquinaria_y_herramientas'];?></td>
			<td><?php echo $equipo['EquiposDeTrabajo']['equ_procedencia'];?></td>
			<td><?php echo $equipo['EquiposDeTrabajo']['equ_fecha_de_adquisicion'];?></td>
			<td><?php echo $equipo['EquiposDeTrabajo']['equ_valor_comercial'];?></td>

		</tr>
		<?php endforeach;?>
	</table>
	<!-- Materia Prima -->
	<table class="materia-prima">
		<caption>
			Materia Prima
		</caption>
		<tr>
			<th>Cantidad</th>
			<th>Tipo De Materia Prima</th>
			<th>Procedencia</th>
			<th>Valor Comercial</th>
		</tr>
		<?php foreach($inspeccion['MateriaPrima'] as $key => $materia) :
		?>
		<tr>
			<td><?php echo $materia['MateriasPrima']['mat_cantidad'];?></td>
			<td><?php echo $materia['MateriasPrima']['mat_tipo_de_materia_prima'];?></td>
			<td><?php echo $materia['MateriasPrima']['mat_procedencia'];?></td>
			<td><?php echo $materia['MateriasPrima']['mat_valor_comercial'];?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<!-- Productos Elaborados -->
	<table class="productos">
		<caption>
			Productos Elaborados
		</caption>
		<tr>
			<th>Cantidad</th>
			<th>Detalle</th>
			<th>Procedencia</th>
			<th>Valor Comercial</th>
		</tr>
		<?php foreach($inspeccion['ProductoElaborado'] as $key => $producto) :
		?>
		<tr>
			<td><?php echo $producto['ProductosElaborado']['pro_cantidad'];?></td>
			<td><?php echo $producto['ProductosElaborado']['pro_detalle'];?></td>
			<td><?php echo $producto['ProductosElaborado']['pro_procedencia'];?></td>
			<td><?php echo $producto['ProductosElaborado']['pro_valor_comercial'];?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<!-- Inspección -->
	<?php echo $this -> Form -> create('Calificacion', array('type' => 'file', 'action' => 'verInspeccion', 'style' => 'padding: 0')); ?>
	<?php echo $this -> Form -> hidden('id', array('value' => $inspeccion['Calificacion']['id'])); ?>
	<table class="calificacion">
		<caption>Área Para El Inspector</caption>
		<tr>
			<th>Comentarios</th>
			<th>Documentos Asociados</th>
			<th>Decisión</th>
			<th></th>
		</tr>
		<tr>
			<?php
				$disabled = false;
				if($this -> Session -> read('Auth.User.rol_id') != 3 || $this -> Session -> read('Auth.User.id') != $inspeccion['Calificacion']['cal_inspector_taller']) $disabled = true;
			?>
			<td style="min-width: 229px;">
				<?php
					$text = '';
					if(!empty($inspeccion['Calificacion']['cal_comentarios_taller'])) $text = $inspeccion['Calificacion']['cal_comentarios_taller'];
					if($disabled) {
						echo $this -> Form -> input('cal_comentarios_taller', array('disabled', 'value' => $text, 'required' => 'required', 'label' => false, 'div' => false, 'type' => 'textarea'));
					} else {
						echo $this -> Form -> input('cal_comentarios_taller', array('value' => $text, 'required' => 'required', 'label' => false, 'div' => false, 'type' => 'textarea'));
					}
				?>
			</td>
			<td style="min-width: 450px;">
				<?php
					if($disabled) {
						foreach($inspeccion['Documento'] as $key => $documento) :
							if($documento['doc_documento_taller']) :
				?>
								<a href="<?php echo '/' . $documento['doc_path']; ?>" class="button"><?php echo $documento['doc_name']; ?></a>
								<br />
								<br />
								<br />
				<?php
							endif;
						endforeach;
					} else {
						echo $this -> Form -> input('Documentos.doc_1', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_2', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_3', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_4', array('type' => 'file'));
						echo $this -> Form -> input('Documentos.doc_5', array('type' => 'file'));
					}
					echo $this -> Form -> hidden('Documentos.is_taller', array('value' => true));
				?>
			</td>
			<td style="min-width: 160px;">
				<?php
					$value = '-1';
					if($inspeccion['Calificacion']['cal_taller_aprobado'] != 0) $value = $inspeccion['Calificacion']['cal_taller_aprobado'];
					if($disabled) {
						echo $this -> Form -> radio('cal_taller_aprobado', array(-1 => 'Denegado', 1 => 'Aprobado'), array('value' => $value, 'required' => 'required', 'label' => false, 'div' => false, 'legend' => false, 'disabled'));
					} else {
						echo $this -> Form -> radio('cal_taller_aprobado', array(-1 => 'Denegado', 1 => 'Aprobado'), array('value' => $value, 'required' => 'required', 'label' => false, 'div' => false, 'legend' => false));
					}
				?>
			</td>
			<td><?php echo $this -> Form -> submit('Enviar'); ?></td>
		</tr>
	</table>
	<?php echo $this -> Form -> end(); ?>
	<?php endif; ?>
</div>
<?php // debug($inspeccion);?>
