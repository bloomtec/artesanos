<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))):
?>
<li class="usuarios">
	<a href="/usuarios">USUARIOS</a>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'add')))):
	?>
	<ul>
		<li>
			<a href="/usuarios/add">Agregar</a>
		</li>
	</ul>
	<?php endif;?>
</li>
<?php endif;?>