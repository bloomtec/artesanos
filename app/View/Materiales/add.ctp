<div class="materiales form">
<?php echo $this->Form->create('Material');?>
	<fieldset>
		<legend><?php echo __('Add Material'); ?></legend>
	<?php
		echo $this->Form->input('cantidad');
		echo $this->Form->input('tipo_de_materia_prima');
		echo $this->Form->input('procedencia');
		echo $this->Form->input('valor_comercial');
		echo $this->Form->input('local_id');
		echo $this->Form->input('taller_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Materiales'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
	</ul>
</div>
