<div class='login'>
	<?php echo $this -> Form -> create('Usuario', array('action' => 'login'));?>
	<legend>
		<?php __('Login', true);?>
	</legend>
	<?php echo $this -> Form -> input('usu_nombre_de_usuario', array('label'=>'Usuario', 'required' => 'required'));?>
	<?php echo $this -> Form -> input('usu_contrasena', array('label'=>'Contraseña', 'type' => 'password', 'required' => 'required'));?>
	<?php echo $this -> Form -> end(__('Login', true));?>
	<div style='clear:both;'></div>
</div>