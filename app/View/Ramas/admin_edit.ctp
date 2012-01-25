<div class="ramas form">
<?php echo $this->Form->create('Rama');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Rama'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rama.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rama.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ramas'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Calificaciones'), array('controller' => 'calificaciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Calificacion'), array('controller' => 'calificaciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
