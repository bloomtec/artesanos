<div class="locales form">
<?php echo $this->Form->create('Local');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Local'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('pichincha');
		echo $this->Form->input('canton');
		echo $this->Form->input('ciudad');
		echo $this->Form->input('parroquia');
		echo $this->Form->input('calle_o_avenida');
		echo $this->Form->input('numero');
		echo $this->Form->input('interseccion');
		echo $this->Form->input('barrio');
		echo $this->Form->input('telefono_celular');
		echo $this->Form->input('telefono_convencional');
		echo $this->Form->input('referencia');
		echo $this->Form->input('email');
		echo $this->Form->input('artesano_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Local.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Local.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Locales'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Artesanos'), array('controller' => 'artesanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artesano'), array('controller' => 'artesanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aprendices'), array('controller' => 'aprendices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aprendiz'), array('controller' => 'aprendices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Balances'), array('controller' => 'balances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Balance'), array('controller' => 'balances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipos'), array('controller' => 'equipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipo'), array('controller' => 'equipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajadores'), array('controller' => 'trabajadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajador'), array('controller' => 'trabajadores', 'action' => 'add')); ?> </li>
	</ul>
</div>
