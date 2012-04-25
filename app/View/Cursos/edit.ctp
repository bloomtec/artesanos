<div class="cursos form form2">
	<?php echo $this -> Form -> create('Curso');?>
	<?php //debug($this -> data);?>
	<fieldset>
		<h2><?php echo __('Administrar Curso');?></h2>
		<?php
		echo $this -> Form -> input('id');
		//echo $this -> Form -> input('solicitud_id');
		if($curso['Solicitud']['juntas_provincial_id']){// es capacitacion y tiene instructur
			echo $this -> Form -> input('instructor_id', array('empty' => 'Seleccione...'));
		}else{
			echo $this -> Form -> input('profesor_id', array('empty' => 'Seleccione...'));	
		}
		echo $this -> Form -> input('cur_nombre', array('label' => 'Nombre'));
		echo $this -> Form -> input('cur_contenido', array('label' => 'Contenido'));
		echo $this -> Form -> input('cur_fecha_de_inicio', array('label' => 'Fecha De Inicio', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_fecha_de_fin', array('label' => 'Fecha De Fin', 'type' => 'text', 'class' => 'date'));
		echo $this -> Form -> input('cur_costo', array('label' => 'Costo', 'class' => 'valor', 'type' => 'text'));

		echo $this -> Form -> input('cur_numero_horas', array('label' => 'Número de horas', 'class' => 'number', 'type' => 'text'));
		echo $this -> Form -> input('cur_horario_inicio', array('label' => 'Hora inicial', 'class' => 'hour', 'type' => 'text'));
		echo $this -> Form -> input('cur_horario_fin', array('label' => 'Hora Final', 'class' => 'hour', 'type' => 'text'));

		echo $this -> Form -> input('provincia_id');
		echo $this -> Form -> input('canton_id', array('options' => array(), 'empty' => 'seleccione','val'=>$this->data['Curso']['canton_id']));
		echo $this -> Form -> input('ciudad_id', array('options' => array(), 'empty' => 'seleccione','val'=>$this->data['Curso']['ciudad_id']));
		echo $this -> Form -> input('parroquia_id', array('options' => array(), 'empty' => 'seleccione','val'=>$this->data['Curso']['parroquia_id']));

		echo $this -> Form -> input('cur_direccion', array('label' => 'Dirección', 'type' => 'text'));
		?>
	</fieldset>
	<fieldset>
		<h2><?php echo __('Registro de alumnos');?></h2>
		<?php
		//debug($losAlumnos);
		if($curso['Solicitud']['centros_artesanal_id']) echo $this -> element('registro_de_alumnos', array('alumnos' => $losAlumnos,'curso'=>$curso));
		//echo $this -> Form -> input('Alumno', array('label' => 'Alumnos'));
		?>
	</fieldset>
	<div style="clear:both;">
		<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
		<?php echo $this -> Form -> end(__('Guardar'));?>
	</div>
</div>
<script type="">
	$(function() {
		var actualizarGeoTaller = function() {
			BJS.updateSelect($("#CursoCantonId"), "/cantones/getByProvincia/" + $("#CursoProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#CursoCiudadId"), "/ciudades/getByCanton/" + $("#CursoCantonId option:selected").val(), function() {
					BJS.updateSelect($("#CursoParroquiaId"), "/parroquias/getByCiudad/" + $("#CursoCiudadId option:selected").val());
				});
			});
		}
		$('#CursoProvinciaId').change(function() {
			actualizarGeoTaller();
		});
		$('#CursoCantonId').change(function() {
			BJS.updateSelect($("#CursoCiudadId"), "/ciudades/getByCanton/" + $("#CursoCantonId option:selected").val(), function() {
				BJS.updateSelect($("#CursoParroquiaId"), "/parroquias/getByCiudad/" + $("#CursoCiudadId option:selected").val());
			});
		});
		$('#CursoCiudadId').change(function() {
				BJS.updateSelect($("#CursoParroquiaId"), "/parroquias/getByCiudad/" + $("#CursoCiudadId option:selected").val());	
		});
		actualizarGeoTaller();
	});

</script>