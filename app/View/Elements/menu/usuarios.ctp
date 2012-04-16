
<li class="usuarios">
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))){
?>
	<a href="/usuarios">USUARIOS</a>
	<?php }else{ ?>
	<a href="#">USUARIOS</a>
	<?php } ?>
	
	<ul>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'add')))): ?>
		<li>
			<a href="/usuarios/add">Agregar</a>
		</li>
		<?php endif;?>
		<li>
			<a href="/usuarios/modificarContrasena">Cambiar Contraseña</a>
		</li>
		
		<li>
			<a href="/auditorias">Auditorias</a>
		</li>
	</ul>
</li>

