<div class="artesanos view">
<h2><?php  echo __('Artesano');?></h2>
		<label><?php echo __('Art Cedula'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['art_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($artesano['Artesano']['modified']); ?>
			&nbsp;
		</h3>
		<div style="clear:both;"></div>
</div>
<div>
<h2>Calificaciones</h2>
	<table>
		<tr>
			<th>Código</th>
			<th>Estado</th>
			<th> Fecha De Expedición</th>
			<th>Fecha De Expiración</th>
			<th>Rama</th>
			<th>Tipo De Calificacion</th>
			<th>Acciones</th>
		</tr>
		<?php foreach ($artesano['Calificacion'] as $calificacion):
		?>
		<tr>
			<td><?php echo h($calificacion['id']);?>&nbsp;</td>
			<td>
				<?php 
				if($calificacion['cal_estado'] == 0) {
					echo 'Pendiente';
				} elseif($calificacion['cal_estado'] == 1) {
					echo  'Aprobada';
				} elseif($calificacion['cal_estado'] == -1) {
					echo 'Denegada';
				} elseif($calificacion['cal_estado'] == -2) {
					echo 'Deshabilitada';
				}
				?>
				&nbsp;
			</td>
			<td><?php echo h($calificacion['cal_fecha_expedicion']);?>&nbsp;</td>
			<td><?php echo h($calificacion['cal_fecha_expiracion']);?>&nbsp;</td>
			<td><?php echo h($calificacion['rama_id']);?>&nbsp;</td>
			<td><?php echo h($calificacion['tipos_de_calificacion_id']);?>&nbsp;</td>
			<td class='actions'><?php
				if ($calificacion['cal_estado'] == 1 && $this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Calificaciones', 'imprimir')))) {
					echo $this -> Html -> link('Especie Valorada', array("action" => "imprimir", $calificacion['id']), array('target' => 'blank_', 'class' => 'informe', 'title' => 'Especie Valorada'));
				}
				if ($this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Calificaciones', 'view')))) {
					echo $this -> Html -> link('Ver', array('controller'=>'calificaciones',"action" => "view", $calificacion['id']), array('target' => 'blank_', 'class' => 'view', 'title' => 'Ver'));
				}
				if ($calificacion['cal_estado'] == 0 && $this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Artesanos', 'modificarCalificacion')))) {
					echo $this -> Html -> link('Modificar', array("controller" => "artesanos", "action" => "modificarCalificacion", $calificacion['id']), array('class' => 'edit', 'title' => 'Modificar'));
				}
			?></td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Artesanos'), array('action' => 'index')); ?> </li>
		
	</ul>
</div>