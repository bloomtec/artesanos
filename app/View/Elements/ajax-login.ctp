<div class='ajax-login'>
	<?php echo $this -> Form -> create('Usuario', array('controller' => 'usuarios', 'action' => 'login'));?>
	<?php echo $this -> Form -> input('usu_nombre_de_usuario', array('label' => 'Nombre De Usuario', 'required' => 'required'));?>
	<?php echo $this -> Form -> input('usu_contrasena', array('label' => 'Contraseña', 'type' => 'password', 'required' => 'required'));?>
	<span class='login-message'></span>
	<?php echo $this -> Form -> end(__('Iniciar Sesión', true));?>
</div>