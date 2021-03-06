<div class="calificaciones view">
	<br />
	<h3>DATOS CALIFICACIÓN [ NÚMERO - <?php echo $inspeccion['Calificacion']['id'];?>]</h3>
	<h2>Artesano</h2>
	<table class="artesano">
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
	<!-- Información para un local -->
	<?php if(!empty($inspeccion['Local'])) :
	?>
	&nbsp;
	<h2>Local</h2>
	<table class="local">
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
	<?php endif;?>

	<!-- Información para un taller -->
	&nbsp; <h2>Taller</h2>
	<table class="taller">
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
	&nbsp; <h2>Operarios Del Taller</h2>
	<table class="operadores">
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
	&nbsp; <h2>Aprendices Del Taller</h2>
	<table class="aprendices">
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
	&nbsp; <h2>Equipos Y Herramientas</h2>
	<table class="equipos-herramientas">
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
	&nbsp; <h2>Materia Prima</h2>
	<table class="materia-prima">
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
	&nbsp; <h2>Productos Elaborados</h2>
	<table class="productos">
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
	<br/>
	<br/>
	<legend>
		Información sobre las inspecciones
	</legend>
	<?php if(isset($inspeccion['InspectorTaller']['id']) && !empty($inspeccion['InspectorTaller']['id'])) :
	?>
	&nbsp;
	<h2> Inspector asignado y fecha para el taller </h2>
	<table>
		<tr>
			<th>Numero De Identificación</th>
			<th>Nombres Y Apellidos</th>
			<th>Unidad</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td><?php echo $inspeccion['InspectorTaller']['usu_numero_identificacion'];?></td>
			<td><?php echo $inspeccion['InspectorTaller']['usu_nombres_y_apellidos'];?></td>
			<td><?php echo $inspeccion['InspectorTaller']['usu_unidad'];?></td>
			<td><?php echo $inspeccion['Calificacion']['cal_fecha_inspeccion_taller'];?></td>
		</tr>
	</table>
	<?php endif;?>
	<?php if(isset($inspeccion['InspectorLocal']['id']) && !empty($inspeccion['InspectorLocal']['id'])) :
	?>
	&nbsp;
	<h2> INSPECTOR ASIGNADO Y FECHA PARA EL LOCAL </h2>
	<table>
		<tr>
			<th>Numero De Identificación</th>
			<th>Nombres Y Apellidos</th>
			<th>Unidad</th>
			<th>Fecha</th>
		</tr>
		<tr>
			<td><?php echo $inspeccion['InspectorLocal']['usu_numero_identificacion'];?></td>
			<td><?php echo $inspeccion['InspectorLocal']['usu_nombres_y_apellidos'];?></td>
			<td><?php echo $inspeccion['InspectorLocal']['usu_unidad'];?></td>
			<td><?php echo $inspeccion['Calificacion']['cal_fecha_inspeccion_local'];?></td>
		</tr>
	</table>
	<?php endif;?>
</div>