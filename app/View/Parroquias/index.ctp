<h2>
		Parroquias
	</h2>
<table class="info-geografica-parroquias">
	<tr>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($parroquias as $key => $parroquia) :
	?>
	<tr class="fila-parroquia">
		<td><?php echo $parroquia; ?></td>
		<td class="actions"><?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'view')))) :
		?>
		<a href="/parroquias/view/<?php echo $key; ?>" class="view" title='Ver'>Ver</a><?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'edit')))) :
		?>
		<a href="/parroquias/edit/<?php echo $key; ?>" class="edit" title='Modificar'>Editar</a><?php endif;?></td>
	</tr>
	<?php endforeach;?>
</table>
<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'add')))) :
?>
<a href="/parroquias/add" class="cancelar">Añadir Parroquia</a>
<?php endif;?>