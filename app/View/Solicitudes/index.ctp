<div class="solicitudes index">
	<h2><?php echo __('Solicitudes');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('centros_artesanal_id','Centro Artesanal');?></th>
		<th><?php echo $this->Paginator->sort('sol_fecha_solicitud','Fecha De Solicitud');?></th>
		<th><?php echo $this->Paginator->sort('sol_numero_de_memorandum','Número De Memorandum');?></th>
		<th><?php echo $this->Paginator->sort('sol_nombre_de_la_capacitacion','Nombre De La Capacitación');?></th>
		<th><?php echo $this->Paginator->sort('sol_fecha_inicio_de_la_capacitacion','Fecha De Inicio De La Capacitación');?></th>
		<th><?php echo $this->Paginator->sort('sol_duracion','Duración');?></th>
		<th><?php echo $this->Paginator->sort('sol_costos','Costos');?></th>
		<th><?php echo $this->Paginator->sort('sol_numero_de_participantes','Número De Participantes');?></th>
		<th><?php echo $this->Paginator->sort('sol_estado','Estado');?></th>
		<th class="actions"><?php echo __('Acciones');?></th>
	</tr>
	<?php $i = 0; foreach ($solicitudes as $solicitud): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($solicitud['CentrosArtesanal']['cen_nombre'], array('controller' => 'juntas_provinciales', 'action' => 'view', $solicitud['JuntasProvincial']['id'])); ?>
		</td>
		<td><?php echo h($solicitud['Solicitud']['sol_fecha_solicitud']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['sol_numero_de_memorandum']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['sol_nombre_de_la_capacitacion']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['sol_fecha_inicio_de_la_capacitacion']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['sol_duracion']); ?>&nbsp;</td>
		
		<td><?php echo h($solicitud['Solicitud']['sol_costos']); ?>&nbsp;</td>
		<td><?php echo h($solicitud['Solicitud']['sol_numero_de_participantes']); ?>&nbsp;</td>
		<td>
			<?php 
				switch ($solicitud['Solicitud']['sol_estado']) {
					case '1':
						echo "PENDIENTE";
						break;
					case '2':
						echo "APROBADA";
						break;
					case '3':
						echo "RECHAZADA";
						break;
				}
			 ?>&nbsp;
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $solicitud['Solicitud']['id']),array('class'=>'view','title'=>'Ver')); ?>
			<?php  if($solicitud['Solicitud']['sol_estado']!=2) echo $this->Html->link(__('Edit'), array('action' => 'edit', $solicitud['Solicitud']['id']),array('class'=>'edit','title'=>'Modificar')); ?>
			<?php if($solicitud['Solicitud']['sol_estado']==1) echo $this->Html->link(__('aprobar'), array('action' => 'revision', $solicitud['Solicitud']['id']),array('class'=>'aprobar','title'=>'Aprobar / Rechazar')); ?>
			<?php if($solicitud['Solicitud']['sol_estado']!=2) echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $solicitud['Solicitud']['id']), array('class'=>'delete','title'=>'Borrar'), __('Esta seguro que quiere eliminar el registro?', $solicitud['Solicitud']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Agregar Solicitud'), array('action' => 'add')); ?></li>
	</ul>
</div>