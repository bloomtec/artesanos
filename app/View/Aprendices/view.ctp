<div class="aprendices view">
<h2><?php  echo __('Aprendiz');?></h2>
		<label><?php echo __('Operario'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['operario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cedula'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Ingreso'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['fecha_de_ingreso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Afiliado Seguro'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['afiliado_seguro']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Edad'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['edad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pago Mensual'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['pago_mensual']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($aprendiz['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $aprendiz['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($aprendiz['Local']['id'], array('controller' => 'locales', 'action' => 'view', $aprendiz['Local']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Aprendices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Aprendiz'), array('action' => 'edit', $aprendiz['Aprendiz']['id'])); ?> </li>
	</ul>
</div>