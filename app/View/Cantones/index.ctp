<h2>Cantones</h2>
<table class="info-geografica-cantones">
	<tr>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($cantones as $key => $canton) :
	?>
	<tr class="fila-canton">
		<td><?php echo $canton; ?></td>
		<td class="actions"><?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'view')))) :
		?>
		<a href="/cantones/view/<?php echo $key; ?>" class="view" title="Ver">Ver</a><?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'edit')))) :
		?>
		<a href="/cantones/edit/<?php echo $key;?>" class="edit" title="Modificar">Editar</a><?php endif;?></td>
	</tr>
	<?php endforeach;?>
</table>
<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'add')))) :
?>
<a href="/cantones/add" class="cancelar">Añadir Canton</a>
<?php endif;?>