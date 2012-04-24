<div class="solicitudes form">
<?php echo $this->Form->create('Solicitud');?>
	<fieldset>
		<h2><?php echo __('Modificar Solicitud'); ?></h2>
	<?php
		echo $this->Form->input('id');
		$tipo = $this -> data['Solicitud']['juntas_provincial_id']?'capacitacion':'curso';
		echo $this -> Form -> input('tipo',array('id'=>'tipo','options'=>array('curso'=>'CURSO','capacitacion'=>'CAPACITACIÓN'),'value'=>$tipo));
		echo $this -> Form -> input('juntas_provincial_id', array('class'=>'tipo capacitacion','label' => 'Junta Provincial', 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('centros_artesanal_id', array('class'=>'tipo curso','label' => 'Centro Artesanal', 'empty' => 'Seleccione...'));
		
		echo $this -> Form -> input('sol_numero_de_memorandum', array('label' => 'Numero De Memorandum','type'=>'text'));
		echo $this -> Form -> input('sol_nombre_de_la_capacitacion', array('label' => 'Nombre De La Capacitacion', 'type' => 'text'));
		echo $this -> Form -> input('sol_duracion', array('label' => 'Duracion En Días', 'type' => 'text','class'=>'number'));
		echo $this -> Form -> input('sol_fecha_inicio_de_la_capacitacion', array('label' => 'Fecha Inicio De La Capacitacion','type'=>'text','class'=>'date'));
		echo $this -> Form -> input('sol_fecha_de_fin_de_la_capacitacion', array('label' => 'Fecha De Fin De La Capacitacion','type'=>'text','class'=>'date'));
		echo $this -> Form -> input('sol_costos', array('label' => 'Costos', 'type' => 'text', 'value' => str_replace('.',',',$this->data['Solicitud']['sol_costos']), 'class' => 'valor'));
		echo $this -> Form -> input('sol_numero_de_participantes', array('label' => 'Numero De Participantes','type'=>'text','class'=>'number'));
	?>
	
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<script>
	$(function(){
		checkTipo();
		$('#tipo').change(function(){
			checkTipo();
		});
		function checkTipo(){
			switch($('#tipo').val()){
				case "curso":
					$('select.tipo').attr('disabled',true).parent().hide();
					$('select.tipo.curso').removeAttr('disabled').parent().show();
				break;
				case 'capacitacion':
				$('select.tipo').attr('disabled',true).parent().hide();
				$('select.tipo.capacitacion').removeAttr('disabled').parent().show();
				break;
			}
		}

		var today= new Date();
		var today=today.getFullYear()+"-"+(today.getMonth() + 1)+"-"+today.getDate();
		$('form').submit(function(e){
			if(BJS.verificarFechaMayorOIgual($("#SolicitudSolFechaInicioDeLaCapacitacion").val(),$("#SolicitudSolFechaDeFinDeLaCapacitacion").val())){
				e.preventDefault();
				alert('La fecha final del curso no puede ser posterior a la fecha de inicio');
			}else{
				if(BJS.verificarFechaMayorOIgual($("#SolicitudSolFechaInicioDeLaCapacitacion").val(),today)){
					e.preventDefault();
					alert('La fecha de inicio del curso no puede ser posterior a la fecha de hoy');
				}
			}
		});
	});
</script>