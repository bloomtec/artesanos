<div class="auditorias view">
<h2><?php  echo __('Auditoria');?></h2>
		<label><?php echo __('Fecha De La Accion'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Usuario'); ?></label>
		<h3>
			<?php echo $this->Html->link($auditoria['Usuario']['usu_nombre_de_usuario'], array('controller' => 'usuarios', 'action' => 'view', $auditoria['Usuario']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Módulo'); ?></label>
		<h3>
			<?php echo h($auditoria['Auditoria']['aud_nombre_modelo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Registro'); ?></label>
		<h3>
			<?php // echo h($auditoria['Auditoria']['aud_llave_foranea']); ?>
			<?php
				switch ($auditoria['Auditoria']['aud_nombre_modelo']) {
					case 'Usuario':
						echo $this -> requestAction('/usuarios/getNombreDeUsuario/'.$auditoria['Auditoria']['aud_llave_foranea']);
						break;
					
					default:
						
						break;
				}
			?>
			&nbsp;
		</h3>
		<label><?php echo __('Añadido'); ?></label>
		<h3>
			<?php // echo h($auditoria['Auditoria']['aud_add']); ?>
			<?php if($auditoria['Auditoria']['aud_add']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php // echo h($auditoria['Auditoria']['aud_edit']); ?>
			<?php if($auditoria['Auditoria']['aud_edit']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</h3>
		<label><?php echo __('Eliminado'); ?></label>
		<h3>
			<?php // echo h($auditoria['Auditoria']['aud_delete']); ?>
			<?php if($auditoria['Auditoria']['aud_delete']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</h3>
		<label><?php echo __('Datos Previos'); ?></label>
		<!--<h3>
			<?php // echo h($auditoria['Auditoria']['aud_datos_previos']); ?>
			&nbsp;
		</h3>-->
		<?php echo $auditoria['Auditoria']['aud_datos_previos']; ?>
		<label><?php echo __('Datos Nuevos'); ?></label>
		<!--<h3>
			<?php // echo h($auditoria['Auditoria']['aud_datos_nuevos']); ?>
			&nbsp;
		</h3>-->
		<?php echo $auditoria['Auditoria']['aud_datos_nuevos']; ?>	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Auditorias'), array('action' => 'index')); ?> </li>
	</ul>
</div>