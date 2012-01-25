<div class="artesanos form">
<?php echo $this->Form->create('Artesano');?>
	<fieldset>
		<legend><?php echo __('Admin Add Artesano'); ?></legend>
	<?php
		echo $this->Form->input('apellido_paterno');
		echo $this->Form->input('apellido_materno');
		echo $this->Form->input('nombres');
		echo $this->Form->input('nacionalidad');
		echo $this->Form->input('cedula_de_ciudadania');
		echo $this->Form->input('fecha_de_nacimiento');
		echo $this->Form->input('tipo_de_sangre');
		echo $this->Form->input('estado_civil');
		echo $this->Form->input('edad');
		echo $this->Form->input('grado_de_estudio');
		echo $this->Form->input('sexo');
		echo $this->Form->input('hijos_mayores');
		echo $this->Form->input('hijos_menores');
		echo $this->Form->input('tipo_de_discapacidad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Artesanos'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
