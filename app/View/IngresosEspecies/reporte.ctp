<?php if(!isset($especies)) : ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('IngresosEspecie');?>
	<h2><?php echo __('Reporte ingresos de especies'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('fecha_inicio', array('type' => 'text', 'label' => 'Fecha Inicio', 'class' => 'date'));
		echo $this -> Form -> input('fecha_fin', array('type' => 'text', 'label' => 'Fecha Fin', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<?php endif; ?>
<?php if(isset($especies)) : //debug($especies); ?>
<br />
<br />
<h2><?php echo __('Reporte ingresos de especies');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('IngresosEspecie.ing_fecha', 'Fecha De Ingreso'); ?></th>
		<th><?php echo $this -> Paginator -> sort('esp_serie', 'Serie Especie Valorada'); ?></th>
		<th><?php echo $this -> Paginator -> sort('TiposEspeciesValorada.tip_nombre', 'Tipo Especie Valorada'); ?></th>
	</tr>
	<?php
		foreach($especies as $key => $especie) :
	?>
	<tr>
		<td><?php echo $especie['IngresosEspecie']['ing_fecha']; ?> </td>
		<td><?php echo $especie['EspeciesValorada']['esp_serie']; ?></td>
		<td><?php echo $especie['TiposEspeciesValorada']['tip_nombre']; ?> </td>
	</tr>
	<?php
		endforeach;
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
		echo $this -> Paginator -> first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this -> Paginator -> last('>> ', array(), null, array('class' => 'next disabled'));
	?>
</div>
<div class="actions">
	<a class='button' href="/ingresos_especies/reporte">Volver</a>
	&nbsp;
	<a class='button' href="/ingresos_especies/imprimirReporte">Descargar pdf</a>
	&nbsp;
	<a class='button' href="/ingresos_especies/export_csv">Exportar a CSV</a>
</div>
<?php endif; ?>