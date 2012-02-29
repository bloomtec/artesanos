<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Asignar Permisos Usuario');?></h2>
		<?php echo $this -> Form -> input('id');?>
		<table>
			<caption>Acciones Disponibles</caption>
			<tr>
				<th>USUARIOS</th>
				<td><input type="checkbox" id="PermisosUsuarioIndex" name="data[Permisos][Usuario][index]">Listar</td>
				<td><?php echo $this -> Form ->input('Permisos.Usuario.view', array('type' => 'checkbox')); ?></td>
			</tr>
		</table>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>