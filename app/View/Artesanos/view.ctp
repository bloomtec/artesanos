<div class="artesanos view">
<h2><?php  echo __('Artesano');?></h2>
		<label><?php echo __('Art Cedula'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['art_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Artesanos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Artesano'), array('action' => 'edit', $artesano['Artesano']['id'])); ?> </li>
	</ul>
</div>