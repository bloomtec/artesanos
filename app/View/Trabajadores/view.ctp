<div class="trabajadores view">
<h2><?php  echo __('Trabajador');?></h2>
		<label><?php echo __('Operario'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['operario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cedula'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Ingreso'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['fecha_de_ingreso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Afiliado Seguro'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['afiliado_seguro']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Edad'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['edad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pago Mensual'); ?></label>
		<h3>
			<?php echo h($trabajador['Trabajador']['pago_mensual']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($trabajador['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $trabajador['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($trabajador['Local']['id'], array('controller' => 'locales', 'action' => 'view', $trabajador['Local']['id'])); ?>
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