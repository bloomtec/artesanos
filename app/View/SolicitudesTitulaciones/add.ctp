<div class="solicitudesTitulaciones form">
	<?php echo $this -> Form -> create('SolicitudesTitulacion', array('type' => 'file'));?>
	<fieldset>
		<h2><?php echo __('Agregar Solicitudes Titulacion');?></h2>
		<?php
		echo $this -> Form -> hidden('estados_solicitudes_titulacion_id', array('value' => 1));
		echo $this -> Form -> input('titulo_id');
		echo $this -> Form -> input('tipos_solicitudes_titulacion_id');
		echo $this -> Form -> input('artesano_id');
		?>
		<div class="archivos">
			<!--
				poner aca lo de los archivos
				formato :: echo $this -> Form -> input('Archivos.$i.archivo', array('type' => 'file'));
			--> 
		</div>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>