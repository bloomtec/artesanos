<div class="solicitudes view">
<h2><?php  echo __('Solicitud');?></h2>
		<label><?php echo __('Juntas Provincial'); ?></label>
		<h3>
			<?php echo $this->Html->link($solicitud['JuntasProvincial']['id'], array('controller' => 'juntas_provinciales', 'action' => 'view', $solicitud['JuntasProvincial']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Fecha Solicitud'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_fecha_solicitud']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Numero De Memorandum'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_numero_de_memorandum']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Nombre De La Capacitacion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_nombre_de_la_capacitacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Duracion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_duracion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Fecha Inicio De La Capacitacion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_fecha_inicio_de_la_capacitacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Fecha De Fin De La Capacitacion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_fecha_de_fin_de_la_capacitacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Costos'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_costos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sol Numero De Participantes'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_numero_de_participantes']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Solicitudes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Solicitud'), array('action' => 'edit', $solicitud['Solicitud']['id'])); ?> </li>
	</ul>
</div>