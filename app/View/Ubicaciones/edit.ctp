<div class="ubicaciones form">
<?php echo $this->Form->create('Ubicacion');?>
	<fieldset>
		<legend><?php echo __('Edit Ubicacion'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ubicacion.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ubicacion.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ubicaciones'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
	</ul>
</div>
