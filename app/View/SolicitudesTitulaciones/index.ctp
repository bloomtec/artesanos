<div class="solicitudesTitulaciones index">
	<h2><?php echo __('Solicitudes Titulaciones');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('estados_solicitudes_titulacion_id','Estado Solicitud');?></th>
		<th><?php echo $this->Paginator->sort('titulo_id','Titulo');?></th>
		<th><?php echo $this->Paginator->sort('tipos_solicitudes_titulacion_id','Tipo De Solicitud');?></th>
		<th><?php echo $this->Paginator->sort('artesano_id','Artesano');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($solicitudesTitulaciones as $solicitudesTitulacion): ?>
	<tr>
		
		<td>
			<?php echo $this->Html->link($solicitudesTitulacion['EstadosSolicitudesTitulacion']['est_estado'], array('controller' => 'estados_solicitudes_titulaciones', 'action' => 'view', $solicitudesTitulacion['EstadosSolicitudesTitulacion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($solicitudesTitulacion['Titulo']['tit_nombre'], array('controller' => 'titulos', 'action' => 'view', $solicitudesTitulacion['Titulo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($solicitudesTitulacion['TiposSolicitudesTitulacion']['tip_nombre'], array('controller' => 'tipos_solicitudes_titulaciones', 'action' => 'view', $solicitudesTitulacion['TiposSolicitudesTitulacion']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($solicitudesTitulacion['Artesano']['art_cedula'], array('controller' => 'artesanos', 'action' => 'view', $solicitudesTitulacion['Artesano']['id'])); ?>
		</td>
		<td class="actions">
			<?php
				if($solicitudesTitulacion['EstadosSolicitudesTitulacion']['id'] == 1) {
					echo $this->Html->link(__('Revisar'),   array('action' => 'revision', $solicitudesTitulacion['SolicitudesTitulacion']['id']),array('class'=>'revision','title'=>'Revision'));		
					echo $this->Html->link(__('Refrendar'), array('action' => 'refrendar', $solicitudesTitulacion['SolicitudesTitulacion']['id']),array('class'=>'aprobacion','title'=>'Refrendar'));						
				}
			?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $solicitudesTitulacion['SolicitudesTitulacion']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php // echo $this->Html->link(__('Edit'), array('action' => 'edit', $solicitudesTitulacion['SolicitudesTitulacion']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $solicitudesTitulacion['SolicitudesTitulacion']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $solicitudesTitulacion['SolicitudesTitulacion']['id'])); ?>
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
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Agregar Solicitud De Titulación'), array('action' => 'add')); ?></li>
	</ul>
</div>