<div class="parametrosInformativos view">
<h2><?php  echo __('Parametro Informativo');?></h2>
		<label><?php echo __('Par Nombre'); ?></label>
		<h3>
			<?php echo h($parametrosInformativo['ParametrosInformativo']['par_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($parametrosInformativo['ParametrosInformativo']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Parametros Informativos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Parametro Informativo'), array('action' => 'edit', $parametrosInformativo['ParametrosInformativo']['id'])); ?> </li>
	</ul>
</div>