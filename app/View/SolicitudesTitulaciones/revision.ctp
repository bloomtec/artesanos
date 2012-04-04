<div class="solicitudesTitulaciones form">
	<?php echo $this -> Form -> create('SolicitudesTitulacion');?>
	<fieldset>
		<h2><?php echo __('Revisión Solicitud Titulación');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('estados_solicitudes_titulacion_id', array('label' => 'Estado De La Solicitud'));
		echo $this -> Form -> input('sol_mensaje', array('label' => 'Obervación'));
		?>
	</fieldset>
	<br />
	<br />
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
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