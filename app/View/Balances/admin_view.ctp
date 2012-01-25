<div class="balances view">
<h2><?php  echo __('Balance');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Domicilio Propio'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['domicilio_propio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Domicilio Valor'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['domicilio_valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller Propio'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['taller_propio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller Valor'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['taller_valor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Servicios Basicos'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['servicios_basicos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario Operarios'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['salario_operarios']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salario Aprendices'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['salario_aprendices']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Egresos'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['total_egresos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maquinaria Y Herramientas'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['maquinaria_y_herramientas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Materia Prima'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['materia_prima']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elaborados'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['elaborados']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Otros Ingresos'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['otros_ingresos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Total Ingresos'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['total_ingresos']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rentabilidad Mensual'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['rentabilidad_mensual']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($balance['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $balance['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo $this->Html->link($balance['Local']['id'], array('controller' => 'locales', 'action' => 'view', $balance['Local']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($balance['Balance']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Balance'), array('action' => 'edit', $balance['Balance']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Balance'), array('action' => 'delete', $balance['Balance']['id']), null, __('Are you sure you want to delete # %s?', $balance['Balance']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Balances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Balance'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
