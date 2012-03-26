<h2>
		Sectores
	</h2>
<table class="info-geografica-sectores">
	<tr>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($sectores as $key => $sector) :
	?>
	<tr class="fila-sector">
		<td><?php echo $sector;?></td>
		<td class="actions"><?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'view')))) :
		?>
		<a href="/sectores/view/<?php echo $key;?>" class="view" title="Ver">Ver</a><?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'edit')))) :
		?>
		<a href="/sectores/edit/<?php echo $key; ?>" class="edit" title="Modificar">Editar</a><?php endif;?></td>
	</tr>
	<?php endforeach;?>
</table>
<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'add')))) :
?>
<a href="/sectores/add" class="cancelar">Añadir Sector</a>
<?php endif;?>