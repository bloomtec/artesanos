<?php 
if($reporte==false) {?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2>
		<?php echo __('Reporte de titulaciones'); ?>
	</h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('artesano', array('type' => 'select', 'label' => 'Artesanos', 'empty' => 'Seleccione...', 'options' => $artesanos));
		echo $this -> Form -> input('titulo', array('type' => 'select', 'label' => 'Titulos', 'empty' => 'Seleccione...', 'options' => $titulos));
		//echo $this -> Form -> input('junta_provincial', array('type' => 'select', 'label' => 'Juntas provinciales', 'empty' => 'Seleccione...', 'options' => $juntasProvinciales));
		echo $this -> Form -> input('provincia', array('type' => 'select', 'label' => 'Provincia', 'empty' => 'Seleccione...', 'options' => $provincias));
		echo $this -> Form -> input('rama', array('type' => 'select', 'label' => 'Rama', 'empty' => 'Seleccione...', 'options' => $ramas));
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date','value'=>$fechaActual));
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date', 'value'=>$fechaActual));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else {  /*debug($reporteIngresos);*/?>
<br />
<br />
<h2><?php echo __('Reporte titulaciones');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('id', 'Id titulacion');?></th>
		<th><?php echo $this -> Paginator -> sort('tit_nombre', 'Titulo');?></th>
		<th><?php echo $this -> Paginator -> sort('rama_id', 'Rama');?></th>
		<th><?php echo $this -> Paginator -> sort('provincia_id', 'Provincia');?></th>
		<th><?php echo $this -> Paginator -> sort('artesano_id', 'Cedula artesano');?></th>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha');?></th>
	</tr>
<?php for($i=0;$i < count($reporteTitulaciones);$i++) { ?>
	<tr>
		<td><?php echo $reporteTitulaciones[$i]['Titulacion']['id'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['Titulo']['tit_nombre'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['Titulo']['nom_rama'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['JuntasProvincial']['nom_provincia'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['SolicitudesTitulacion']['cedula_artesano'];?></td>
		<td><?php echo $reporteTitulaciones[$i]['Titulacion']['created'];?></td>
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
<a class='button' href="/solicitudesTitulaciones/reporteTitulaciones">Volver</a>
&nbsp; <a class='button' href="/solicitudesTitulaciones/impReporte2">Descargar pdf</a>
&nbsp; <a class='button' href="/solicitudesTitulaciones/export_csv3">Exportar a CSV</a>
<?php }?>
