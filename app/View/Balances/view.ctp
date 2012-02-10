<div class="balances view">
<h2><?php  echo __('Balance');?></h2>
		<label><?php echo __('Calificacion'); ?></label>
		<h3>
			<?php echo $this->Html->link($balance['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $balance['Calificacion']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Domicilio Propio'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_domicilio_propio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Domicilio Valor'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_domicilio_valor']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Taller Propio'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_taller_propio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Taller Valor'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_taller_valor']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Agua'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_agua']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Luz'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_luz']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Telefono'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_telefono']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Servicios Basicos'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_servicios_basicos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Compras De Materia Prima Mensuales'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_compras_de_materia_prima_mensuales']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Salario Operarios'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_salario_operarios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Salario Aprendices'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_salario_aprendices']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Otros Salarios'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_otros_salarios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Maquinas Y Herramientas'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_maquinas_y_herramientas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Materia Prima'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_materia_prima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Elaborados'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_elaborados']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Ingresos Por Ventas'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_ingresos_por_ventas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Bal Otros Ingresos'); ?></label>
		<h3>
			<?php echo h($balance['Balance']['bal_otros_ingresos']); ?>
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