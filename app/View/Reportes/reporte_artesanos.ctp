<!-- Seccion formulario consulta reporte -->
<?php if(!$mostrar_reporte) : ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte'); ?>
	<h2><?php echo __('Reporte Artesanos'); ?></h2>
	<fieldset>
		<?php
			echo $this -> Form -> input('apellido_paterno');
			echo $this -> Form -> input('apellido_materno');
			echo $this -> Form -> input('nombres');
			echo $this -> Form -> input('cedula', array('label' => 'Cédula De Ciudadanía'));
			echo $this -> Form -> input('fecha_de_nacimiento');
			echo $this -> Form -> input('nacionalidad');
			echo $this -> Form -> input('tipo_de_sangre');
			echo $this -> Form -> input('sexo');
			echo $this -> Form -> input('estado_civil');
			echo $this -> Form -> input('edad');
			echo $this -> Form -> input('grado_de_estudio');
			echo $this -> Form -> input('hijos_mayores');
			echo $this -> Form -> input('hijos_menores');
			echo $this -> Form -> input('tipo_de_discapacidad');
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar'); ?>
	<?php echo $this -> Form -> end(); ?>
</div>
<?php endif;?>
<!-- Sección informe reporte -->
<?php if($mostrar_reporte) : ?>
<div class="reportes informe">
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('dat_nombre', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_paterno', 'Apellido Paterno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_materno', 'Apellido Materno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_nacionalidad', 'Nacionalidad');?></th>
			<th><?php //echo $this -> Paginator -> sort('dat_cedula', 'Cédula');?></th>
		</tr>
		<?php foreach ($artesanos as $artesano): ?>
		<tr>
			<td><?php echo h($artesano['DatosPersonal']['dat_nombre']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_apellido_paterno']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_apellido_materno']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_nacionalidad']);?>&nbsp;</td>
			<td><?php //echo h($artesano['DatosPersonal']['dat_cedula']);?>&nbsp;</td>
		</tr>
		<?php endforeach;?>
	</table>
	<div class="paging">
		<?php
			echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this -> Paginator -> numbers(array('separator' => ''));
			echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<?php endif;?>