<div class="valores view">
<h2><?php  echo __('Valor');?></h2>
		<label><?php echo __('Parametro Informativo'); ?></label>
		<h3>
			<?php echo $this->Html->link($valor['ParametrosInformativo']['par_nombre'], array('controller' => 'parametros_informativos', 'action' => 'view', $valor['ParametrosInformativo']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($valor['Valor']['val_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($valor['Valor']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($valor['Valor']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), $referer,array('class' => 'button')); ?> </li>
	</ul>
</div>