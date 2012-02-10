<div class="operadores view">
<h2><?php  echo __('Operador');?></h2>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($operador['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $operador['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Cedula'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Nombres Y Apellidos'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_nombres_y_apellidos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Sexo'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Fecha Ingreso'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_fecha_ingreso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Afiliado Seguro'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_afiliado_seguro']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Fecha Nacimiento'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_fecha_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ope Pago Mensual'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['ope_pago_mensual']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($operador['Operador']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Operadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Operador'), array('action' => 'edit', $operador['Operador']['id'])); ?> </li>
	</ul>
</div>