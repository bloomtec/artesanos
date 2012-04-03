<div class="tiposSolicitudesTitulaciones view">
<h2><?php  echo __('Tipos Solicitudes Titulacion');?></h2>
		<label><?php echo __('Tip Nombre'); ?></label>
		<h3>
			<?php echo h($tiposSolicitudesTitulacion['TiposSolicitudesTitulacion']['tip_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tip Descripcion'); ?></label>
		<h3>
			<?php echo h($tiposSolicitudesTitulacion['TiposSolicitudesTitulacion']['tip_descripcion']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Tipos Solicitudes Titulaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Tipos Solicitudes Titulacion'), array('action' => 'edit', $tiposSolicitudesTitulacion['TiposSolicitudesTitulacion']['id'])); ?> </li>
	</ul>
</div>