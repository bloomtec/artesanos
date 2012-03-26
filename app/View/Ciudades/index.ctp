<h2>
		Ciudades
	</h2>
<table class="info-geografica-ciudades">
	<tr>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($ciudades as $key => $ciudad) :
	?>
	<tr class="fila-ciudad">
		<td><?php echo $ciudad['Ciudad']['ciu_nombre'];?></td>
		<td class="actions"><?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'view')))) :
		?>
		<a href="/ciudades/view/<?php echo $ciudad['Ciudad']['id'];?>" class="view" title="Ver">Ver</a><?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'edit')))) :
		?>
		<a href="/ciudades/edit/<?php echo $ciudad['Ciudad']['id'];?>" class="edit" title="Modificar">Editar</a><?php endif;?></td>
	</tr>
	<?php endforeach;?>
</table>
<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'add')))) :
?>
<a href="/ciudades/add" class="cancelar">Añadir Ciudad</a>
<?php endif;?>