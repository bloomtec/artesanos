<div class="titulos view">
<h2><?php  echo __('Titulo');?></h2>
		<label><?php echo __('Rama'); ?></label>
		<h3>
			<?php echo $this->Html->link($titulo['Rama']['ram_nombre'], array('controller' => 'ramas', 'action' => 'view', $titulo['Rama']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tit Nombre'); ?></label>
		<h3>
			<?php echo h($titulo['Titulo']['tit_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tit Descripcion'); ?></label>
		<h3>
			<?php echo h($titulo['Titulo']['tit_descripcion']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Titulos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Titulo'), array('action' => 'edit', $titulo['Titulo']['id'])); ?> </li>
	</ul>
</div>