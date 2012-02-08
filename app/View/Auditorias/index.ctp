<div class="auditorias index">
	<h2><?php echo __('Auditorias');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('usuario_id', 'Usuario');?></th>
		<th><?php echo $this->Paginator->sort('aud_nombre_modelo', 'Módulo');?></th>
		<th>Registro</th>
		<th><?php echo $this->Paginator->sort('aud_add', 'Añadir');?></th>
		<th><?php echo $this->Paginator->sort('aud_edit', 'Modificar');?></th>
		<th><?php echo $this->Paginator->sort('aud_delete', 'Eliminar');?></th>
		<th><?php echo $this->Paginator->sort('created', 'Fecha De La Acción');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($auditorias as $auditoria): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($auditoria['Usuario']['usu_nombre_de_usuario'], array('controller' => 'usuarios', 'action' => 'view', $auditoria['Usuario']['id'])); ?>
		</td>
		<td><?php echo h($auditoria['Auditoria']['aud_nombre_modelo']); ?>&nbsp;</td>
		<td>
			<?php // echo h($auditoria['Auditoria']['aud_llave_foranea']); ?>
			<?php
				switch ($auditoria['Auditoria']['aud_nombre_modelo']) {
					case 'Usuario':
						echo $this -> requestAction('/usuarios/getNombreDeUsuario/'.$auditoria['Auditoria']['aud_llave_foranea']);
						break;
					
					case 'Configuracion':
						echo '<b>:: único :: </b>';
						break;
					
					default:
						
						break;
				}
			?>
			&nbsp;
		</td>
		<td>
			<?php // echo h($auditoria['Auditoria']['aud_add']); ?>
			<?php if($auditoria['Auditoria']['aud_add']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</td>
		
		<td>
			<?php // echo h($auditoria['Auditoria']['aud_edit']); ?>
			<?php if($auditoria['Auditoria']['aud_edit']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</td>
		<td>
			<?php // echo h($auditoria['Auditoria']['aud_delete']); ?>
			<?php if($auditoria['Auditoria']['aud_delete']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</td>
		<td><?php echo h($auditoria['Auditoria']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php
				if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Auditorias', 'view')))) {
					echo $this->Html->link(__('View'), array('action' => 'view', $auditoria['Auditoria']['id']),array('class'=>'view'));
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
