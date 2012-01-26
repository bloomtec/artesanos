<div class='login'>
	<?php echo $this -> Form -> create('Usuario', array('action' => 'login'));?>
	<legend>
		<?php __('Login', true);?>
	</legend>
	<?php echo $this -> Form -> input('usuario', array('label'=>'Usuario', 'required' => 'required'));?>
	<?php echo $this -> Form -> input('contrasena', array('label'=>'Contraseña', 'type' => 'password', 'required' => 'required'));?>
	<?php echo $this -> Form -> end(__('Login', true));?>
</div>