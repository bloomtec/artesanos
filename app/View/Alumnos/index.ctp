<div class="alumnos index">
	<h2><?php echo __('Alumnos');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th>Centro de Formación</th>
			<th><?php echo $this -> Paginator -> sort('alu_is_cedula', 'Es Cédula');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_documento_de_identificacion', 'Documento De Identificación');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_nombres', 'Nombres y Apellidos');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_fecha_de_nacimiento', 'Fecha De Nacimiento');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_tipo_de_sangre', 'Tipo De Sangre');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_estado_civil', 'Estado Civil');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_grado_de_estudio', 'Grado De Estudio');?></th>
			<th><?php echo $this -> Paginator -> sort('alu_sexo', 'Sexo');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php
$i = 0;
foreach ($alumnos as $alumno):
		?>
		<tr>
			<td><?php
			if ($alumno['Alumno']['centros_artesanal_id']) {
				echo $alumno['CentrosArtesanal']['cen_nombre'];
			} else {
				echo "Ninguno";
			}
			?></td>
			<td><?php
			if ($alumno['Alumno']['alu_is_cedula']) {
				echo '<input type="checkbox" checked="checked" disabled="disabled" />';
			} else {
				echo '<input type="checkbox" disabled="disabled" />';
			}
			?>
			&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_documento_de_identificacion']);?>&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_nombres'] . " " . $alumno['Alumno']['alu_apellido_paterno'] . " " . $alumno['Alumno']['alu_apellido_materno']);?>&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_fecha_de_nacimiento']);?>&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_tipo_de_sangre']);?>&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_estado_civil']);?>&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_grado_de_estudio']);?>&nbsp;</td>
			<td><?php echo h($alumno['Alumno']['alu_sexo']);?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $alumno['Alumno']['id']), array('class' => 'view', 'title' => 'Ver'));?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $alumno['Alumno']['id']), array('class' => 'edit', 'title' => 'Modificar'));?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $alumno['Alumno']['id']), array('class' => 'delete', 'title' => 'Borrar'), __('Esta seguro que quiere eliminar el registro?', $alumno['Alumno']['id']));?></td>
		</tr>
		<?php endforeach;?>
	</table>
	<div class="paging">
		<!--<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
		));
		?>	</p>-->
		<?php
		echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Agregar Alumno'), array('action' => 'add'));?>
		</li>
	</ul>
</div>
