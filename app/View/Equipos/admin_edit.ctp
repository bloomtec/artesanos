<div class="equipos form">
<?php echo $this->Form->create('Equipo');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Equipo'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cantidad');
		echo $this->Form->input('maquinaria_y_herramientas');
		echo $this->Form->input('tipo_de_adquisicion');
		echo $this->Form->input('fecha_de_adquisicion');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Equipo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Equipo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Equipos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
	</ul>
</div>
