<div class="auditorias view">
<h2><?php  echo __('Auditoria');?></h2>
		<label><?php echo __('Usuario'); ?></label>
		<h3>
			<?php echo $this->Html->link($auditoria['Usuario']['usu_nombre_de_usuario'], array('controller' => 'usuarios', 'action' => 'view', $auditoria['Usuario']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre Modelo'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_nombre_modelo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Llave Foranea'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_llave_foranea']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Datos Previos'); ?></label>
		<h3>
			<?php echo ($auditoria['Auditoria']['aud_datos_previos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Datos Nuevos'); ?></label>
		<h3>
			<?php echo ($auditoria['Auditoria']['aud_datos_nuevos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Acción'); ?></label>
		<h3>
			<?php
				if($auditoria['Auditoria']['aud_add']){
					echo "Creación";
				}elseif($auditoria['Auditoria']['aud_edit']){
					echo "Modificación";
				}elseif($auditoria['Auditoria']['aud_delete']){
					echo "Borrado";
				}
			?>
		</h3>
		
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Auditorias'), array('action' => 'index')); ?> </li>
		
	</ul>
</div>