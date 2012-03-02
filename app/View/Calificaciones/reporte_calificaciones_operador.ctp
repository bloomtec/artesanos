<div class=" informe">
	<table>
		<tr>
			<th><?php echo $this -> Paginator -> sort('id', 'Código');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_fecha_expedicion', 'Fecha De Expedición');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_fecha_expiracion', 'Fecha De Expiración');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_rama', 'Rama');?></th>
			<th><?php echo $this -> Paginator -> sort('cal_tipo_de_calificacion', 'Tipo De Artesano');?></th>
			<th> Acciones </th>
		</tr>
		<?php foreach ($calificaciones as $calificacion): ?>
		<tr>
			<td><?php echo h($calificacion['Calificacion']['id']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['cal_fecha_expedicion']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['cal_fecha_expiracion']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['cal_rama']);?>&nbsp;</td>
			<td><?php echo h($calificacion['Calificacion']['cal_tipo_de_calificacion']);?>&nbsp;</td>
			<td class='actions'>
				<?php 
					if($calificacion['Calificacion']['cal_estado'] == 1 && $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Calificaciones', 'imprimir')))) {
						echo $this -> Html -> link('Especie Valorada',array("action"=>"imprimir",$calificacion['Calificacion']['id']),array('target'=>'blank_', 'class'=>'informe','title'=>'Especie Valorada'));
					}
					if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Calificaciones', 'view')))) {
						echo $this -> Html -> link('Ver',array("action"=>"view",$calificacion['Calificacion']['id']),array('target'=>'blank_', 'class'=>'view', 'title' => 'Ver'));
					} 
					if($calificacion['Calificacion']['cal_estado'] == 0 && $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'modificarCalificacion')))) {
						echo $this -> Html -> link('Modificar',array("controller" => "artesanos", "action"=>"modificarCalificacion", $calificacion['Calificacion']['id']),array('class'=>'edit', 'title'=>'Modificar'));
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
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'reportes', 'action' => 'reporteCalificacionesOperador'), array('class' => 'prev button')); ?> </li>
	</ul>
</div>