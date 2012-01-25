<div class="balances form">
<?php echo $this->Form->create('Balance');?>
	<fieldset>
		<legend><?php echo __('Add Balance'); ?></legend>
	<?php
		echo $this->Form->input('domicilio_propio');
		echo $this->Form->input('domicilio_valor');
		echo $this->Form->input('taller_propio');
		echo $this->Form->input('taller_valor');
		echo $this->Form->input('servicios_basicos');
		echo $this->Form->input('salario_operarios');
		echo $this->Form->input('salario_aprendices');
		echo $this->Form->input('total_egresos');
		echo $this->Form->input('maquinaria_y_herramientas');
		echo $this->Form->input('materia_prima');
		echo $this->Form->input('elaborados');
		echo $this->Form->input('otros_ingresos');
		echo $this->Form->input('total_ingresos');
		echo $this->Form->input('rentabilidad_mensual');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('local_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Balances'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
