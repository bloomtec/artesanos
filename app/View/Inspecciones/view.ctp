<div class="inspecciones view">
<h2><?php  echo __('Inspeccion');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($inspeccion['Inspeccion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usuario'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inspeccion['Usuario']['usuario'], array('controller' => 'usuarios', 'action' => 'view', $inspeccion['Usuario']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Artesano'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inspeccion['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $inspeccion['Artesano']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inspeccion['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $inspeccion['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo $this->Html->link($inspeccion['Local']['id'], array('controller' => 'locales', 'action' => 'view', $inspeccion['Local']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($inspeccion['Inspeccion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($inspeccion['Inspeccion']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inspeccion'), array('action' => 'edit', $inspeccion['Inspeccion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Inspeccion'), array('action' => 'delete', $inspeccion['Inspeccion']['id']), null, __('Are you sure you want to delete # %s?', $inspeccion['Inspeccion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Usuarios'), array('controller' => 'usuarios', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usuario'), array('controller' => 'usuarios', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artesanos'), array('controller' => 'artesanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artesano'), array('controller' => 'artesanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
	</ul>
</div>
