<div class="valores view">
<h2><?php  echo __('Valor');?></h2>
		<label><?php echo __('Parametros Informativo'); ?></label>
		<h3>
			<?php echo $this->Html->link($valor['ParametrosInformativo']['id'], array('controller' => 'parametros_informativos', 'action' => 'view', $valor['ParametrosInformativo']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Val Nombre'); ?></label>
		<h3>
			<?php echo h($valor['Valor']['val_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($valor['Valor']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Valores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Valor'), array('action' => 'edit', $valor['Valor']['id'])); ?> </li>
	</ul>
</div>