<div class="solicitudesTitulaciones form">
	<?php echo $this -> Form -> create('Solicitud', array("Action"=>"Aprobar"));?>
	<fieldset>
		<h2><?php echo __('Revisión de Solicitudes');?></h2>
		<?php
		echo $this -> Form -> input('sol_estado', array('label' => 'Estado De La Solicitud', "options"=>array("1"=>"Pendiente","2"=>"Aprobado","3"=>"Rechazado")));
		echo $this -> Form -> input('sol_comentario', array('label' => 'Cometarios'));
		?>
	</fieldset>
	<br />
	<br />
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<div class="archivos-view" style="display: inline-block;">

	<?php /*foreach($archivos as $key => $archivo) : ?>
		<a class="button" href="/<?php echo $archivo['Archivo']['ruta']; ?>"><?php echo $archivo['Archivo']['nombre']; ?></a>
		<br />
		<br />
		<br />
	<?php endforeach; */?>
</div>