<div class="configuraciones form">
	<?php echo $this -> Form -> create('Configuracion');?>
	<fieldset>
		<h2><?php echo __('Modificar Parámetros De Configuración');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('con_capital_maximo_de_inversion', array('label' => 'Capital Máximo De Inversión'));
		echo $this -> Form -> input('con_salario_basico_unificado', array('label' => 'Salario Básico Unificado'));
		echo $this -> Form -> input('con_anos_renovacion_artesanos_autonomos', array('label' => 'Años Para Renovación Artesanos Autónomos'));
		echo $this -> Form -> input('con_anos_renovacion_artesanos_normales', array('label' => 'Años Para Renovación Artesanos Normales'));
		echo $this -> Form -> input('con_anos_pasar_de_aprendiz_a_operario', array('label' => 'Años Para Pasar De Aprendiz A Operario'));
		echo $this -> Form -> input('con_anos_operario_se_pueda_calificar', array('label' => 'Años Para Que Un Operario Se Pueda Calificar'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>