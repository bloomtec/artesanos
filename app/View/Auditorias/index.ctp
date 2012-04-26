<div class="auditorias index">
	<h2><?php echo __('Auditorias');?></h2>
	<div class="search">
		<input type="text" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('usuario_id','Usuario');?></th>
		<th><?php echo $this->Paginator->sort('aud_nombre_modelo','Tabla -> ID');?></th>
	
		
		<th>Acción</th>
		<th>Fecha</th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($auditorias as $auditoria): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($auditoria['Usuario']['usu_nombre_de_usuario'], array('controller' => 'usuarios', 'action' => 'view', $auditoria['Usuario']['id'])); ?>
		</td>
		<td><?php echo $auditoria['Auditoria']['aud_nombre_modelo'] .' -> '.$auditoria['Auditoria']['aud_llave_foranea']; ?>&nbsp;</td>

		<td>
			<?php
				if($auditoria['Auditoria']['aud_add']){
					echo "Creación";
				}elseif($auditoria['Auditoria']['aud_edit']){
					echo "Modificación";
				}elseif($auditoria['Auditoria']['aud_delete']){
					echo "Borrado";
				}
			?>
		</td>
		<td>
			<?php echo $auditoria['Auditoria']['created'];?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $auditoria['Auditoria']['id']),array('class'=>'view','title'=>'Ver')); ?>
				
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
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
