<div class="trabajadores view">
<h2><?php  echo __('Trabajador');?></h2>
		<label><?php echo __('Tipos De Trabajador'); ?></label>
		<h3>
			<?php echo $this->Html->link($trabajador['TiposDeTrabajador']['id'], array('controller' => 'tipos_de_trabajadores', 'action' => 'view', $trabajador['TiposDeTrabajador']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Cedula'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Nombres Y Apellidos'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_nombres_y_apellidos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Sexo'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Fecha Ingreso'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_fecha_ingreso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Afiliado Seguro'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_afiliado_seguro']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Fecha Nacimiento'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_fecha_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tra Pago Mensual'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['tra_pago_mensual']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Trabajadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Trabajador'), array('action' => 'edit', $trabajador['Trabajador']['id'])); ?> </li>
	</ul>
</div>