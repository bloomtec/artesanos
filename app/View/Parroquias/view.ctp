<div class="parroquias view">
<h2><?php  echo __('Parroquia');?></h2>
		<label><?php echo __('Sector'); ?></label>
		<h3>
			<?php echo $this->Html->link($parroquia['Sector']['sec_nombre'], array('controller' => 'sectores', 'action' => 'view', $parroquia['Sector']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($parroquia['Parroquia']['par_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($parroquia['Parroquia']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($parroquia['Parroquia']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'geograficos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Parroquia'), array('action' => 'edit', $parroquia['Parroquia']['id'])); ?> </li>
	</ul>
</div>