<div class="usuarios index">
	<h2><?php echo __('Usuarios');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('rol_id');?></th>
		<th><?php echo $this->Paginator->sort('usu_nombre_de_usuario', 'Nombre De Usuario');?></th>
		<th><?php echo $this->Paginator->sort('usu_nombres_y_apellidos', 'Nombres Y Apellidos');?></th>
		<th><?php echo $this->Paginator->sort('usu_numero_identificacion', 'Identificación');?></th>
		<th><?php echo $this->Paginator->sort('usu_activo', 'Activo');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo h($usuario['Rol']['rol_nombre']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['usu_nombre_de_usuario']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['usu_nombres_y_apellidos']); ?>&nbsp;</td>
		<td><?php echo h($usuario['Usuario']['usu_numero_identificacion']); ?>&nbsp;</td>
		<td>
			<?php if($usuario['Usuario']['usu_activo']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
		</td>
		<td class="actions">
			<?php
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'permisos')))) {
					echo $this->Html->link(__('Permisos'), array('action' => 'permisos', $usuario['Usuario']['id']),array('class'=>'privileges','title' => 'Permisos'));
				}
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'view')))) {
					echo $this->Html->link(__('Ver'), array('action' => 'view', $usuario['Usuario']['id']),array('class'=>'view','title' => 'Ver'));
				}
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'edit')))) {
					echo $this->Html->link(__('Modificar'), array('action' => 'edit', $usuario['Usuario']['id']),array('class'=>'edit','title'=>'Modificar'));
				}
			?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>


	<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Usuario'), array('action' => 'add')); ?></li>
	</ul>
</div>
