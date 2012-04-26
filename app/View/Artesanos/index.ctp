<div class="artesanos index">
	<h2><?php echo __('Artesanos');?></h2>
	<div class="search">
		<input type="text" class="text-search-generic" />
		<input type="button" class="submit search-generic" value="Buscar" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('art_nombres', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('art_apellido_paterno', 'Apellido Paterno');?></th>
			<th><?php echo $this -> Paginator -> sort('art_apellido_materno', 'Apellido Materno');?></th>
			<th><?php echo $this -> Paginator -> sort('art_nacionalidad', 'Nacionalidad');?></th>
			<th><?php echo $this -> Paginator -> sort('art_cedula', 'Cédula');?></th>
			<th><?php echo $this -> Paginator -> sort('art_estado_calificacion', 'Estado Calificación');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php
$i = 0;
foreach ($artesanos as $artesano):
		?>
		<tr>
			<td><?php echo h($artesano['Artesano']['art_nombres']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_apellido_paterno']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_apellido_materno']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_nacionalidad']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_cedula']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_estado_calificacion']);?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('Ver'), array('action' => 'view', $artesano['Artesano']['id']), array('class' => 'view', 'title' => 'Ver'));?>
			<?php
			if (isset($artesano['Calificacion']) && $artesano['Calificacion']['cal_estado'] == 1 && $this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Calificaciones', 'imprimir')))) {
				echo $this -> Html -> link('Especie Valorada', array('controller' => 'calificaciones', "action" => "imprimir", $artesano['Calificacion']['id']), array('class' => 'informe', 'title' => 'Especie Valorada'));
				
				echo $this -> Html -> link('Carnet', array('controller' => 'artesanos', "action" => "carnet", $artesano['Calificacion']['id']), array('class' => 'carnet', 'title' => 'Carnet de Artesano'));
			}
			?>
			<?php
			if (isset($artesano['Calificacion'])) $especieValorada = $this -> requestAction('/especies_valoradas/verificarEspecieArtesano/' . $artesano['Calificacion']['artesano_id'] . '/1');
			
			if (isset($artesano['Calificacion'])  && $this -> requestAction('/usuarios/verificarAcceso/', array('ruta' => array('controllers', 'Artesanos', 'modificarCalificacion')))) {
				echo $this -> Html -> link('Modificar', array("controller" => "artesanos", "action" => "modificarCalificacion", $artesano['Calificacion']['id']), array('class' => 'edit', 'title' => 'Modificar Calificacion'));
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
			<?php echo $this -> Html -> link(__('Agregar Artesano'), array('action' => 'agregarArtesano'), array('class' => 'button'));?>
		</li>
	</ul>
</div>