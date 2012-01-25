<div class="balances view">
<h2><?php  echo __('Balance');?></h2>
		<label><?php echo __('Domicilio Propio'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['domicilio_propio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Domicilio Valor'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['domicilio_valor']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller Propio'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['taller_propio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller Valor'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['taller_valor']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Servicios Basicos'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['servicios_basicos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Salario Operarios'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['salario_operarios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Salario Aprendices'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['salario_aprendices']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Total Egresos'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['total_egresos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Maquinaria Y Herramientas'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['maquinaria_y_herramientas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Materia Prima'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['materia_prima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Elaborados'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['elaborados']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Otros Ingresos'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['otros_ingresos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Total Ingresos'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['total_ingresos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Rentabilidad Mensual'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['rentabilidad_mensual']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($balance['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $balance['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($balance['Local']['id'], array('controller' => 'locales', 'action' => 'view', $balance['Local']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Balances'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Balance'), array('action' => 'edit', $balance['Balance']['id'])); ?> </li>
	</ul>
</div>