<?php if($reporte==false) {
?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte');?>
	<h2><?php echo __('Reporte egresos de suministros'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('persona', array('type' => 'select', 'label' => 'Personas', 'empty' => 'Seleccione...', 'options' => $lstPersonas));
		echo $this -> Form -> input('departamento', array('type' => 'select', 'label' => 'Departamentos', 'empty' => 'Seleccione...', 'options' => $lstDepartamentos));
		echo $this -> Form -> input('producto', array('type' => 'select', 'label' => 'Productos', 'empty' => 'Seleccione...', 'options' => $lstProductos));
		echo $this -> Form -> input('fecha1', array('type' => 'text', 'label' => 'Fecha inicial', 'class' => 'date'));
		echo $this -> Form -> input('fecha2', array('type' => 'text', 'label' => 'Fecha final', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?>
	<?php echo $this -> Form -> end();?>
</div>
<?php } else { ?>
<br />
<br />
<h2><?php echo __('Reporte egresos de inventarios');?></h2>
<table>
	<tr>
		<th><?php echo $this->Paginator->sort('egr_codigo','Código egreso'); ?></th>
		<th><?php echo $this->Paginator->sort('persona_id','Persona'); ?></th>
		<th><?php echo $this->Paginator->sort('egr_concepto_entrega','Concepto de entrega'); ?></th>
		<th><?php echo $this->Paginator->sort('egr_fecha_de_egreso','Fecha egreso'); ?></th>
		<th><?php echo $this->Paginator->sort('Item','Items'); ?></th>
	</tr>
	<?php
//debug($reporteEgresos);
for($i=0;$i < count($reporteEgresos);$i++) {
	?>
	<tr>
		<td><?php echo $reporteEgresos[$i]['EgresosDeInventario']['egr_codigo'];?></td>
		<td><?php echo $reporteEgresos[$i]['Persona']['per_nombres'];?></td>
		<td><?php echo $reporteEgresos[$i]['EgresosDeInventario']['egr_concepto_entrega'];?></td>
		<td><?php echo $reporteEgresos[$i]['EgresosDeInventario']['egr_fecha_de_egreso'];?></td>
		<td><?php
		foreach ($reporteEgresos[$i]['Item'] as $key => $value) {
			if ($reporteEgresos[$i]['Item'] != array())
				echo $value['ite_nombre'] . "<br />";

		}
		?></td>
	</tr>
	<?php

	}
	?>
</table>
<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
<a class='button' href="/egresosDeInventarios/reporteEgresosInventarios">Volver</a>
&nbsp; 
<a class='button' href="/egresosDeInventarios/impReporte">Descargar pdf</a>
&nbsp;
<a class='button' href="/egresosDeInventarios/export_csv">Exportar a CSV</a>
<?php }?>
