<div class="aprendices form">
<?php echo $this->Form->create('Aprendiz');?>
	<fieldset>
		<legend><?php echo __('Admin Add Aprendiz'); ?></legend>
	<?php
		echo $this->Form->input('operario');
		echo $this->Form->input('cedula');
		echo $this->Form->input('fecha_de_ingreso');
		echo $this->Form->input('afiliado_seguro');
		echo $this->Form->input('edad');
		echo $this->Form->input('pago_mensual');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('local_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Aprendices'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
