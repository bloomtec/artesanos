<div class="auditorias view">
<h2><?php  echo __('Auditoria');?></h2>
		<label><?php echo __('Usuario'); ?></label>
		<h3>
			<?php echo $this->Html->link($auditoria['Usuario']['usu_nombre_de_usuario'], array('controller' => 'usuarios', 'action' => 'view', $auditoria['Usuario']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Nombre Modelo'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_nombre_modelo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Llave Foranea'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_llave_foranea']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Datos Previos'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_datos_previos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Datos Nuevos'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_datos_nuevos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Add'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_add']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Edit'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_edit']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Aud Delete'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_delete']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Auditorias'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Auditoria'), array('action' => 'edit', $auditoria['Auditoria']['id'])); ?> </li>
	</ul>
</div>