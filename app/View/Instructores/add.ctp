<div class="instructores form">
<?php echo $this->Form->create('Instructor');?>
	<fieldset>
		<h2><?php echo __('Agregar Instructor'); ?></h2>
	<?php
		echo $this->Form->input('ins_nacionalidad',array('label'=>'Nacionalidad'));
		
		echo $this -> Form -> input('ins_is_cedula', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: ')));	
		echo $this->Form->input('ins_documento_de_identificacion',array('label' => false,"style"=>"margin-top:5px"));
		
		echo $this->Form->input('ins_apellido_paterno',array('label'=>'Apellido_paterno'));
		echo $this->Form->input('ins_apellido_materno',array('label'=>'Apellido_materno'));
		echo $this->Form->input('ins_nombres',array('label'=>'Nombres'));
		echo $this->Form->input('ins_fecha_de_nacimiento',array('label'=>'Fecha_de_nacimiento','class'=>'date','type'=>'text'));
		echo $this->Form->input('ins_tipo_de_sangre',array('label'=>'Tipo_de_sangre'));
		echo $this->Form->input('ins_estado_civil',array('label'=>'Estado_civil'));
		echo $this->Form->input('ins_especialidad',array('label'=>'Especialidad'));
		echo $this->Form->input('ins_experiencia',array('label'=>'Experiencia'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		switch($('#InstructorInsIsCedula').val()){
			case "0": // PASAPORTE
			$('#InstructorInsDocumentoDeIdentificacion').setMask({ mask : '*', type : 'repeat' }).val();
			break;
			case "1": // CEDULA
			$('#InstructorInsDocumentoDeIdentificacion').setMask({ mask : '9999', type : 'repeat' }).val();
			break;
		}
	});
</script>