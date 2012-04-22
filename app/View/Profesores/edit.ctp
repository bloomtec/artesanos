<div class="profesores form">
<?php echo $this->Form->create('Profesor');?>
	<fieldset>
		<h2><?php echo __('Modificar Profesor'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('centros_artesanal_id',array('label'=>'Centro Artesanal'));
		echo $this->Form->input('pro_nombres',array('label'=>'Nombres'));
		$selectedCedula = $this->data['Profesor']['pro_is_cedula']?$this->data['Profesor']['pro_is_cedula']:0;
		echo $this->Form->input('pro_is_cedula', array('value'=>$selectedCedula,'label' => false, 'div' => 'input select usu-cedula', 'type' => 'select', 'options' => array('1' => 'Cédula: ', '0' => 'Pasaporte: ')));
		echo $this->Form->input('pro_documento_de_identificacion', array('label' => false, "style" => "margin-top:5px"));
		echo $this->Form->input('pro_direccion',array('label'=>'Direccion'));
		echo $this->Form->input('pro_telefono',array('label'=>'Teléfono'));
		echo $this->Form->input('pro_fecha_de_nacimiento',array('label'=>'Fecha De Nacimiento','type'=>'text','class'=>'date'));
		echo $this->Form->input('pro_tipo_de_sangre',array('label'=>'Tipo De Sangre','options'=>$tipos_de_sangre));
		echo $this->Form->input('pro_sexo',array('label'=>'Sexo','options'=>$sexos));
		echo $this->Form->input('pro_nacionalidad',array('label'=>'Nacionalidad','options'=>$nacionalidades));
		echo $this->Form->input('pro_correo_electronico',array('label'=>'Correo Electronico'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>