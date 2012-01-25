<div class="calificaciones form">
<?php echo $this->Form->create('Calificacion');?>
	<fieldset>
		<legend><?php echo __('Edit Calificacion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rama_id');
		echo $this->Form->input('expiracion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Calificacion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Calificacion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Calificaciones'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ramas'), array('controller' => 'ramas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rama'), array('controller' => 'ramas', 'action' => 'add')); ?> </li>
	</ul>
</div>
