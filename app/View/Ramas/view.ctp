<div class="ramas view">
<h2><?php  echo __('Rama');?></h2>
		<label><?php echo __('Grupo De Ramas'); ?></label>
		<h3>
			<?php echo $this->Html->link($rama['GruposDeRama']['id'], array('controller' => 'grupos_de_ramas', 'action' => 'view', $rama['GruposDeRama']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['ram_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Descripción'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['ram_descripcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($rama['Rama']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), $referer); ?> </li>
	</ul>
</div>