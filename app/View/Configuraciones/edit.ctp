<div class="configuraciones form">
	<?php echo $this -> Form -> create('Configuracion');?>
	<fieldset>
		<h2><?php echo __('Modificar Parámetros De Configuración');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('con_capital_maximo_de_inversion', array('label' => 'Capital Máximo De Inversión','type'=>'text','class'=>'valor'));
		echo $this -> Form -> input('con_salario_basico_unificado', array('label' => 'Salario Básico Unificado','type'=>'text','class'=>'valor'));
		echo $this -> Form -> input('con_anos_renovacion_artesanos_autonomos', array('label' => 'Años Para Renovación Artesanos Autónomos','type'=>'text','class'=>'number'));
		echo $this -> Form -> input('con_anos_renovacion_artesanos_normales', array('label' => 'Años Para Renovación Artesanos Normales','type'=>'text','class'=>'number'));
		echo $this -> Form -> input('con_anos_pasar_de_aprendiz_a_operario', array('label' => 'Años Para Pasar De Aprendiz A Operario','type'=>'text','class'=>'number'));
		echo $this -> Form -> input('con_anos_operario_se_pueda_calificar', array('label' => 'Años Para Que Un Operario Se Pueda Calificar','type'=>'text','class'=>'number'));
		echo $this -> Form -> input('con_correos_solicitudes', array('label' => 'Correos Solicitudes (Ingrese los correos deseados separados por coma (,))'));
		
		echo $this -> Form -> input('con_calificacion_minima', array('label' => 'Calificación mínima para los cursos','type'=>'text','class'=>'valor'));
		echo $this -> Form -> input('con_calificacion_maxima', array('label' => 'Calificación máxima para los cursos','type'=>'text','class'=>'valor'));
		echo $this -> Form -> input('con_calificacion_para_aprobar_curso', array('label' => 'Calificación minima para parobar los cursos','type'=>'text','class'=>'valor'));
		echo $this -> Form -> input('con_iva', array('label' => 'I.V.A.','type'=>'text','class'=>'valor'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>