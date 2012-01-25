<div class="ciudades view">
<h2><?php  echo __('Ciudad');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['nombre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['descripcion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ciudad['Ciudad']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ciudad'), array('action' => 'edit', $ciudad['Ciudad']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ciudad'), array('action' => 'delete', $ciudad['Ciudad']['id']), null, __('Are you sure you want to delete # %s?', $ciudad['Ciudad']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ciudades'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ciudad'), array('action' => 'add')); ?> </li>
	</ul>
</div>
