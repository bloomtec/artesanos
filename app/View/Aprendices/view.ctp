<div class="aprendices view">
<h2><?php  echo __('Aprendiz');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operario'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['operario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['cedula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha De Ingreso'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['fecha_de_ingreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Afiliado Seguro'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['afiliado_seguro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edad'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['edad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pago Mensual'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['pago_mensual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aprendiz['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $aprendiz['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aprendiz['Local']['id'], array('controller' => 'locales', 'action' => 'view', $aprendiz['Local']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($aprendiz['Aprendiz']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aprendiz'), array('action' => 'edit', $aprendiz['Aprendiz']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aprendiz'), array('action' => 'delete', $aprendiz['Aprendiz']['id']), null, __('Are you sure you want to delete # %s?', $aprendiz['Aprendiz']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aprendices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aprendiz'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
