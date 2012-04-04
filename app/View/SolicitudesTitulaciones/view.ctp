<div class="solicitudesTitulaciones view">
	<h2><?php  echo __('Solicitudes Titulacion');?></h2>
	<label><?php echo __('Estados Solicitudes Titulacion'); ?></label>
	<h3>
		<?php echo $this->Html->link($solicitudesTitulacion['EstadosSolicitudesTitulacion']['id'], array('controller' => 'estados_solicitudes_titulaciones', 'action' => 'view', $solicitudesTitulacion['EstadosSolicitudesTitulacion']['id'])); ?>
		&nbsp;
	</h3>
	<label><?php echo __('Titulo'); ?></label>
	<h3>
		<?php echo $this->Html->link($solicitudesTitulacion['Titulo']['tit_nombre'], array('controller' => 'titulos', 'action' => 'view', $solicitudesTitulacion['Titulo']['id'])); ?>
		&nbsp;
	</h3>
	<label><?php echo __('Tipos Solicitudes Titulacion'); ?></label>
	<h3>
		<?php echo $this->Html->link($solicitudesTitulacion['TiposSolicitudesTitulacion']['id'], array('controller' => 'tipos_solicitudes_titulaciones', 'action' => 'view', $solicitudesTitulacion['TiposSolicitudesTitulacion']['id'])); ?>
		&nbsp;
	</h3>
	<label><?php echo __('Artesano'); ?></label>
	<h3>
		<?php echo $this->Html->link($solicitudesTitulacion['Artesano']['id'], array('controller' => 'artesanos', 'action' => 'view', $solicitudesTitulacion['Artesano']['id'])); ?>
		&nbsp;
	</h3>
	<label><?php echo __('Sol Mensaje'); ?></label>
	<h3>
		<?php echo h($solicitudesTitulacion['SolicitudesTitulacion']['sol_mensaje']); ?>
		&nbsp;
	</h3>
	<label><?php echo __('Modified'); ?></label>
	<h3>
		<?php echo h($solicitudesTitulacion['SolicitudesTitulacion']['modified']); ?>
		&nbsp;
	</h3>
</div>
<div class="archivos-view" style="display: inline-block;">
	<h2>Documentos</h2>
	<br />
	<br />
	<br />
	<?php foreach($archivos as $key => $archivo) : ?>
		<a class="button" href="/<?php echo $archivo['Archivo']['ruta']; ?>"><?php echo $archivo['Archivo']['nombre']; ?></a>
		<br />
		<br />
		<br />
	<?php endforeach; ?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Solicitudes Titulaciones'), array('action' => 'index')); ?> </li>
	</ul>
</div>