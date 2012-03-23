<div class="juntasProvinciales view">
<h2><?php  echo __('Junta Provincial');?></h2>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo h($juntasProvincial['Provincia']['pro_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Jun Nombre'); ?></label>
		<h3>
			<?php echo h($juntasProvincial['JuntasProvincial']['jun_nombre']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Juntas Provinciales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Juntas Provincial'), array('action' => 'edit', $juntasProvincial['JuntasProvincial']['id'])); ?> </li>
	</ul>
</div>