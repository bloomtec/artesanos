<div class="calificaciones view">
<h2><?php  echo __('Calificacion');?></h2>
		<label><?php echo __('Rama'); ?></label>
		<h3>
			<?php echo $this->Html->link($calificacion['Rama']['nombre'], array('controller' => 'ramas', 'action' => 'view', $calificacion['Rama']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Expiracion'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['expiracion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Calificaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Calificacion'), array('action' => 'edit', $calificacion['Calificacion']['id'])); ?> </li>
	</ul>
</div>