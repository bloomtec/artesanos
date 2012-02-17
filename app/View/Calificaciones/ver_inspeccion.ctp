<div class="inspecciones view">
	<h2><?php  echo __('INSPECCIÓN');?></h2>
	<label><?php echo __('Código'); ?></label>
	<h3>
		<?php echo $inspeccion['Calificacion']['id']; ?>
		&nbsp;
	</h3>
	<label><?php echo __('Tipo De Inspección'); ?></label>
	<h3>
		<?php echo $se_inspecciona; ?>
		&nbsp;
	</h3>
	<label><?php echo __('Fecha Asignada'); ?></label>
	<h3>
		<?php
			if($tipo_inspeccion == 1) {
				echo $inspeccion['Calificacion']['cal_fecha_inspeccion_taller'];
			} else {
				echo $inspeccion['Calificacion']['cal_fecha_inspeccion_local'];
			}
		?>
		&nbsp;
	</h3>
	<label><?php echo __('ARTESANO'); ?></label><h3>&nbsp;</h3>
	<label><?php echo __('Nombre'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_nombres']
			. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_paterno']
			. ' ' . $inspeccion['DatosPersonal'][0]['dat_apellido_materno'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Documento'); ?></label>
	<h3>
		<?php
			echo $this -> requestAction('/artesanos/getID/' . $inspeccion['Calificacion']['artesano_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Fecha De Nacimiento'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_fecha_nacimiento'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Nacionalidad'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_nacionalidad'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Tipo De Sangre'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_tipo_de_sangre'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Sexo'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_sexo'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Estado Civil'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_estado_civil'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Grado De Estudio'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_grado_estudio'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Hijos Mayores'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_hijos_mayores'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Hijos Menores'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_hijos_menores'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Discapacidad'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_tipo_discapacidad'];
		?>
		&nbsp;
	</h3>
	<label><?php echo __('% Discapacidad'); ?></label>
	<h3>
		<?php
			echo $inspeccion['DatosPersonal'][0]['dat_porcentaje_de_discapacidad'];
		?>
		&nbsp;
	</h3>
	<?php if($tipo_inspeccion == 1) : ?>
	<label><?php echo __('TALLER'); ?></label><h3>&nbsp;</h3>
	<label><?php echo __('Razón Social / Nombre Comercial'); ?></label>
	<h3>
		<?php echo $inspeccion['Taller'][0]['tal_razon_social_o_nombre_comercial']; ?>&nbsp;
	</h3>
	<label><?php echo __('Provincia'); ?></label>
	<h3>
		<?php
			if($inspeccion['Taller'][0]['provincia_id']) echo $this -> requestAction('/provincias/getNombre/' . $inspeccion['Taller'][0]['provincia_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Canton'); ?></label>
	<h3>
		<?php
			if($inspeccion['Taller'][0]['canton_id']) echo $this -> requestAction('/cantones/getNombre/' . $inspeccion['Taller'][0]['canton_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Ciudad'); ?></label>
	<h3>
		<?php
			if($inspeccion['Taller'][0]['ciudad_id']) echo $this -> requestAction('/ciudades/getNombre/' . $inspeccion['Taller'][0]['ciudad_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Sector'); ?></label>
	<h3>
		<?php
			if($inspeccion['Taller'][0]['sector_id']) echo $this -> requestAction('/sectores/getNombre/' . $inspeccion['Taller'][0]['sector_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Parroquia'); ?></label>
	<h3>
		<?php
			if($inspeccion['Taller'][0]['parroquia_id']) echo $this -> requestAction('/parroquias/getNombre/' . $inspeccion['Taller'][0]['parroquia_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Dirección'); ?></label>
	<h3>
		<?php echo 'Calle / Avenida: ' . $inspeccion['Taller'][0]['tal_calle_o_avenida']; ?>
		&nbsp;
		<?php echo 'Número: ' . $inspeccion['Taller'][0]['tal_numero']; ?>
		&nbsp;
		<?php echo 'Intersección: ' . $inspeccion['Taller'][0]['tal_interseccion']; ?>
		&nbsp;
		<?php echo 'Barrio: ' . $inspeccion['Taller'][0]['tal_barrio']; ?>
		&nbsp;
	</h3>
	<label><?php echo __('Teléfono'); ?></label>
	<h3>
		<?php echo $inspeccion['Taller'][0]['tal_telefono_convencional']; ?>&nbsp;
	</h3>
	<label><?php echo __('Celular'); ?></label>
	<h3>
		<?php echo $inspeccion['Taller'][0]['tal_telefono_celular']; ?>&nbsp;
	</h3>
	<label><?php echo __('Referencia'); ?></label>
	<h3>
		<?php echo $inspeccion['Taller'][0]['tal_referencia']; ?>&nbsp;
	</h3>
	<label><?php echo __('Correo Electrónico'); ?></label>
	<h3>
		<?php echo $inspeccion['Taller'][0]['tal_email']; ?>&nbsp;
	</h3>
	<?php endif; ?>
	<?php if($tipo_inspeccion == 2) : ?>
	<label><?php echo __('LOCAL'); ?></label><h3>&nbsp;</h3>
	<label><?php echo __('Provincia'); ?></label>
	<h3>
		<?php
			if($inspeccion['Local'][0]['provincia_id']) echo $this -> requestAction('/provincias/getNombre/' . $inspeccion['Local'][0]['provincia_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Canton'); ?></label>
	<h3>
		<?php
			if($inspeccion['Local'][0]['canton_id']) echo $this -> requestAction('/cantones/getNombre/' . $inspeccion['Local'][0]['canton_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Ciudad'); ?></label>
	<h3>
		<?php
			if($inspeccion['Local'][0]['ciudad_id']) echo $this -> requestAction('/ciudades/getNombre/' . $inspeccion['Local'][0]['ciudad_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Sector'); ?></label>
	<h3>
		<?php
			if($inspeccion['Local'][0]['sector_id']) echo $this -> requestAction('/sectores/getNombre/' . $inspeccion['Local'][0]['sector_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Parroquia'); ?></label>
	<h3>
		<?php
			if($inspeccion['Local'][0]['parroquia_id']) echo $this -> requestAction('/parroquias/getNombre/' . $inspeccion['Local'][0]['parroquia_id']);
		?>
		&nbsp;
	</h3>
	<label><?php echo __('Dirección'); ?></label>
	<h3>
		<?php echo 'Calle / Avenida: ' . $inspeccion['Local'][0]['loc_calle_o_avenida']; ?>
		&nbsp;
		<?php echo 'Número: ' . $inspeccion['Local'][0]['loc_numero']; ?>
		&nbsp;
		<?php echo 'Intersección: ' . $inspeccion['Local'][0]['loc_interseccion']; ?>
		&nbsp;
		<?php echo 'Barrio: ' . $inspeccion['Local'][0]['loc_barrio']; ?>
		&nbsp;
	</h3>
	<label><?php echo __('Teléfono'); ?></label>
	<h3>
		<?php echo $inspeccion['Local'][0]['loc_telefono_convencional']; ?>&nbsp;
	</h3>
	<label><?php echo __('Celular'); ?></label>
	<h3>
		<?php echo $inspeccion['Local'][0]['loc_telefono_celular']; ?>&nbsp;
	</h3>
	<label><?php echo __('Referencia'); ?></label>
	<h3>
		<?php echo $inspeccion['Local'][0]['loc_referencia']; ?>&nbsp;
	</h3>
	<label><?php echo __('Correo Electrónico'); ?></label>
	<h3>
		<?php echo $inspeccion['Local'][0]['loc_email']; ?>&nbsp;
	</h3>
	<?php endif; ?>
</div>