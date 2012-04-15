<?php if($reporte==false) {?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2>
		<?php echo __('Reporte solicitudes titulación'); ?>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('artesano', array('type' => 'select', 'label' => 'Artesanos', 'empty' => 'Seleccione...', 'options' => $artesanos));
		echo $this -> Form -> input('rama', array('type' => 'select', 'label' => 'Ramas', 'empty' => 'Seleccione...', 'options' => $ramas));
		echo $this -> Form -> input('titulo', array('type' => 'select', 'label' => 'Titulos', 'empty' => 'Seleccione...', 'options' => $titulos));
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else {  //debug($reporteSolicitudesTitulacion);?>
<br />
<br />
<h2><?php echo __('Reporte solicitudes titulación');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('id', 'Id solicitud');?></th>
		<th><?php echo $this -> Paginator -> sort('tit_nombre', 'Titulo');?></th>
		<th><?php echo $this -> Paginator -> sort('est_estado', 'Estado');?></th>
		<th><?php echo $this -> Paginator -> sort('tip_nombre', 'Tipo solicitud');?></th>
		<th><?php echo $this -> Paginator -> sort('nombre_completo', 'Artesano');?></th>
		<th><?php echo $this -> Paginator -> sort('sol_mensaje', 'Mensaje');?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha');?></th>
	</tr>
<?php for($i=0;$i < count($reporteSolicitudesTitulacion);$i++) { ?>
	<tr>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['id'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['Titulo']['tit_nombre'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['EstadosSolicitudesTitulacion']['est_estado'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['TiposSolicitudesTitulacion']['tip_nombre'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['Artesano']['nombre_completo'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['sol_mensaje'];?></td>
		<td><?php echo $reporteSolicitudesTitulacion[$i]['SolicitudesTitulacion']['created'];?></td>
	</tr>
	<?php

	}
	?>
</table>
<div class="paging">
	
	<?php
	echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
	echo $this -> Paginator -> numbers(array('separator' => ''));
	echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
	?>
</div>
<a class='button' href="/solicitudesTitulaciones/reporteSolicitudesTitulacion">Volver</a>
&nbsp; <a class='button' href="/solicitudesTitulaciones/impReporte">Descargar pdf</a>
&nbsp; <a class='button' href="/solicitudesTitulaciones/export_csv2">Exportar a CSV</a>
<?php }?>
<!--

