<div class="solicitudes view">
<h2><?php  echo __('Solicitud');?></h2>
		<label><?php echo __('Centro Artesanal'); ?></label>
		<h3>
			<?php echo $this->Html->link($solicitud['CentrosArtesanal']['cen_nombre'], array('controller' => 'juntas_provinciales', 'action' => 'view', $solicitud['JuntasProvincial']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha Solicitud'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_fecha_solicitud']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Numero De Memorandum'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_numero_de_memorandum']); ?>
			&nbsp; commit co
		</h3>
		<label><?php echo __('Nombre De La Capacitacion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_nombre_de_la_capacitacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Duracion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_duracion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha Inicio De La Capacitacion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_fecha_inicio_de_la_capacitacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Fin De La Capacitacion'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_fecha_de_fin_de_la_capacitacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Costos'); ?></label>
		<h3>
			<?php echo h($solicitud['Solicitud']['sol_costos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Numero De Participantes'); ?></label>
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