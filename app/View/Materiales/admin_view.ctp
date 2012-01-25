<div class="materiales view">
<h2><?php  echo __('Material');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($material['Material']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($material['Material']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo De Materia Prima'); ?></dt>
		<dd>
			<?php echo h($material['Material']['tipo_de_materia_prima']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Procedencia'); ?></dt>
		<dd>
			<?php echo h($material['Material']['procedencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Comercial'); ?></dt>
		<dd>
			<?php echo h($material['Material']['valor_comercial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo $this->Html->link($material['Local']['id'], array('controller' => 'locales', 'action' => 'view', $material['Local']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($material['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $material['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($material['Material']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($material['Material']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Material'), array('action' => 'edit', $material['Material']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Material'), array('action' => 'delete', $material['Material']['id']), null, __('Are you sure you want to delete # %s?', $material['Material']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
	</ul>
</div>
