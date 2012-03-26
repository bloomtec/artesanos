<h2>Provincias</h2>
<table class="info-geografica-provincias">
	<tr>
		<th>Nombre</th>
		<th>Acciones</th>
	</tr>
	<?php foreach ($provincias as $key => $provincia) :
	?>
	<tr class="fila-provincia">
		<td><?php echo $provincia;?></td>
		<td class="actions"><?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'view')))) :
		?>
		<a href="/provincias/view/<?php echo $key; ?>" class="view" title='Ver'>Ver</a><?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'edit')))) :
		?>
		<a href="/provincias/edit/<?php echo $key; ?>" class="edit" title="Modificar" >Editar</a><?php endif;?></td>
	</tr>
	<?php endforeach;?>
</table>
<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'add')))) :
?>
<a href="/provincias/add" class="cancelar">Añadir Provincia</a>
<?php endif;?>