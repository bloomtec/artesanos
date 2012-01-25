<div class="trabajadores view">
<h2><?php  echo __('Trabajador');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operario'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['operario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['cedula']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha De Ingreso'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['fecha_de_ingreso']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Afiliado Seguro'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['afiliado_seguro']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edad'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['edad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pago Mensual'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['pago_mensual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajador['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $trabajador['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trabajador['Local']['id'], array('controller' => 'locales', 'action' => 'view', $trabajador['Local']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($trabajador['Trabajador']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trabajador'), array('action' => 'edit', $trabajador['Trabajador']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trabajador'), array('action' => 'delete', $trabajador['Trabajador']['id']), null, __('Are you sure you want to delete # %s?', $trabajador['Trabajador']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajadores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajador'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
