<div class="aprendices view">
<h2><?php  echo __('Aprendiz');?></h2>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($aprendiz['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $aprendiz['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Cedula'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Nombres Y Apellidos'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_nombres_y_apellidos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Sexo'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Fecha Ingreso'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_fecha_ingreso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Afiliado Seguro'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_afiliado_seguro']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Fecha Nacimiento'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_fecha_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Apr Pago Mensual'); ?></label>
		<h3>
			<?php echo h($aprendiz['Aprendiz']['apr_pago_mensual']); ?>
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