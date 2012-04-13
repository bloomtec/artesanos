<div class=" informe">
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('id', 'Código');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_fecha_expedicion', 'Fecha De Expedición');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_fecha_expiracion', 'Fecha De Expiración');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_estado', 'Estado');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_rama', 'Rama');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_tipo_artesano', 'Tipo De Artesano');?></th>
			<th>Acciones</th>
		</tr>
		<?php foreach ($calificaciones as $calificacion):
		?>
		<tr>
			<td><?php echo h($calificacion['Calificacion']['id']);?>&nbsp;</td>
			<td><?php
				if ($calificacion['Calificacion']['cal_fecha_expedicion']) {
					echo h($calificacion['Calificacion']['cal_fecha_expedicion']);
				} else {
					echo "No asignada";
				}
			?>&nbsp;</td>
			<td><?php
				
			if ($calificacion['Calificacion']['cal_fecha_expiracion'] && $calificacion['Calificacion']['cal_fecha_expiracion'] == '3000-00-00') {
				echo h('Indefinida');
			} elseif($calificacion['Calificacion']['cal_fecha_expiracion']) {
				echo h($calificacion['Calificacion']['cal_fecha_expiracion']);
			} else {
				echo "No asignada";
			}
			?>&nbsp;</td>
			<td>
				<?php
					echo h($calificacion['Calificacion']['cal_estado']);
				?>
				&nbsp;
			</td>
			<td><?php echo h($calificacion['Calificacion']['cal_rama']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['cal_tipo_de_calificacion']);?>&nbsp;</td>
			<td class='actions'>
			<?php
				if ($calificacion['Calificacion']['cal_estado'] == "Aprobada" && $this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Calificaciones', 'imprimir')))) {
					echo $this -> Html -> link('Especie Valorada', array("action" => "imprimir", $calificacion['Calificacion']['id']), array( 'class' => 'informe', 'title' => 'Especie Valorada'));
					echo $this -> Html -> link('Carnet', array("action" => "carnet", $calificacion['Calificacion']['id']), array( 'class' => 'carnet', 'title' => 'Carnet de Artesano'));
				}
				if ($this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Calificaciones', 'view')))) {
					echo $this -> Html -> link('Ver', array("action" => "view", $calificacion['Calificacion']['id']), array('class' => 'pdf', 'title' => 'Descargar'));
				}
				if ($this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Artesanos', 'modificarCalificacion')))) {
					echo $this -> Html -> link('Modificar', array("controller" => "artesanos", "action" => "modificarCalificacion", $calificacion['Calificacion']['id']), array('class' => 'edit', 'title' => 'Modificar'));
				}
			?>
			</td>
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
		<li>
			<?php echo $this -> Html -> link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteCalificacionesOperador'), array('class' => 'prev button'));?>
		</li>
	</ul>
</div>
<div class="csv-export">
	<?php
	$fields = urlencode('id,cal_fecha_expedicion,cal_fecha_expiracion,cal_estado,cal_rama,cal_tipo_de_calificacion');
	$headers = urlencode('Código,Fecha De Expedición,Fecha De Expiración,Estado,Rama,Tipo De Artesano');
	echo $this -> Html -> link('Exportar el resultado a CSV', array('action' => 'CSVExport', 'fields' => $fields, 'headers' => $headers), array('class' => 'button'));
	?>
</div>