<div class="materiasPrimas view">
<h2><?php  echo __('Materias Prima');?></h2>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($materiasPrima['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $materiasPrima['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Mat Cantidad'); ?></label>
		<h3>
			<?php echo h($materiasPrima['MateriasPrima']['mat_cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Mat Tipo De Materia Prima'); ?></label>
		<h3>
			<?php echo h($materiasPrima['MateriasPrima']['mat_tipo_de_materia_prima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Mat Procedencia'); ?></label>
		<h3>
			<?php echo h($materiasPrima['MateriasPrima']['mat_procedencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Mat Valor Comercial'); ?></label>
		<h3>
			<?php echo h($materiasPrima['MateriasPrima']['mat_valor_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($materiasPrima['MateriasPrima']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Materias Primas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Materias Prima'), array('action' => 'edit', $materiasPrima['MateriasPrima']['id'])); ?> </li>
	</ul>
</div>