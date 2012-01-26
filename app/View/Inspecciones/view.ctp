<div class="inspecciones view">
<h2><?php  echo __('Inspeccion');?></h2>
		<label><?php echo __('Usuario'); ?></label>
		<h3>
			<?php echo $this->Html->link($inspeccion['Usuario']['usuario'], array('controller' => 'usuarios', 'action' => 'view', $inspeccion['Usuario']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Artesano'); ?></label>
		<h3>
			<?php echo $this->Html->link($inspeccion['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $inspeccion['Artesano']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($inspeccion['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $inspeccion['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($inspeccion['Local']['id'], array('controller' => 'locales', 'action' => 'view', $inspeccion['Local']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($inspeccion['Inspeccion']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Inspecciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Inspeccion'), array('action' => 'edit', $inspeccion['Inspeccion']['id'])); ?> </li>
	</ul>
</div>