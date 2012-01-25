<div class="calificaciones view">
<h2><?php  echo __('Calificacion');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($calificacion['Calificacion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rama'); ?></dt>
		<dd>
			<?php echo $this->Html->link($calificacion['Rama']['nombre'], array('controller' => 'ramas', 'action' => 'view', $calificacion['Rama']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expiracion'); ?></dt>
		<dd>
			<?php echo h($calificacion['Calificacion']['expiracion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($calificacion['Calificacion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($calificacion['Calificacion']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Calificacion'), array('action' => 'edit', $calificacion['Calificacion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Calificacion'), array('action' => 'delete', $calificacion['Calificacion']['id']), null, __('Are you sure you want to delete # %s?', $calificacion['Calificacion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Calificaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calificacion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ramas'), array('controller' => 'ramas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rama'), array('controller' => 'ramas', 'action' => 'add')); ?> </li>
	</ul>
</div>
