<?php
	$rows = $this->Paginator->request->params['paging']['DatosPersonal']['count'];
	/*
	$php_memory_limit = ini_get('memory_limit');
	$php_memory_limit = substr($php_memory_limit, 0, strlen($php_memory_limit) - 1);
	debug($php_memory_limit . 'M PHP Memory Limit.');
	debug(round(memory_get_peak_usage()/1000000, 0) . 'M memory used.');
	*/
?>
<div class=" informe">
	<div class="csv-export <?php if($rows > 300000)  echo 'inactive' ?>">
		<?php
			// $fields = 'calldate,clid,src,dst,channel,dstchannel,billsec,disposition,department,cost_center';
			$fields = 'calldate,clid,src,dst,channel,dstchannel,billsec,disposition,cost_center';
			// $headers = 'Fecha Y Hora,Usuario,Origen,Destino,Canal Origen,Canal Destino,Duración,Estado,Departamento,Centro De Costo';
			$headers = 'Fecha Y Hora,Usuario,Origen,Destino,Canal Origen,Canal Destino,Tiempo Facturado,Estado,Centro De Costo';
			// echo $this -> Html -> link('Exportar ésta página a CSV', array('action' => 'CSVExport', 'type'=>'page', 'fields'=>$fields, 'headers'=>$headers));
			echo $this -> Html -> link('Exportar el resultado a CSV', array('action' => 'CSVExport', 'fields'=>$fields, 'headers'=>$headers),array('class'=>'csv'));
		?>
	</div>
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('dat_nombres', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_paterno', 'Apellido Paterno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_apellido_materno', 'Apellido Materno');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_nacionalidad', 'Nacionalidad');?></th>
			<th><?php echo $this -> Paginator -> sort('dat_cedula', 'Cédula');?></th>
			<th><?php echo $this -> Paginator -> sort('modified', 'Última Modificación');?></th>
		</tr>
		<?php foreach ($artesanos as $artesano): ?>
		<tr>
			<td><?php echo h($artesano['DatosPersonal']['dat_nombres']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_apellido_paterno']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_apellido_materno']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_nacionalidad']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['dat_cedula']);?>&nbsp;</td>
			<td><?php echo h($artesano['DatosPersonal']['modified']);?>&nbsp;</td>
		</tr>
		<?php endforeach;?>
	</table>
	<div class="paging">
		<?php
			echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
			echo $this -> Paginator -> numbers(array('separator' => ''));
			echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteArtesanos'), array('class' => 'prev button')); ?> </li>
	</ul>
</div>