<div class="materiales view">
<h2><?php  echo __('Material');?></h2>
		<label><?php echo __('Cantidad'); ?></label>
		<h3>
			<?php echo h($material['Material']['cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tipo De Materia Prima'); ?></label>
		<h3>
			<?php echo h($material['Material']['tipo_de_materia_prima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Procedencia'); ?></label>
		<h3>
			<?php echo h($material['Material']['procedencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Valor Comercial'); ?></label>
		<h3>
			<?php echo h($material['Material']['valor_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($material['Local']['id'], array('controller' => 'locales', 'action' => 'view', $material['Local']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($material['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $material['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($material['Material']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Materiales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Material'), array('action' => 'edit', $material['Material']['id'])); ?> </li>
	</ul>
</div>