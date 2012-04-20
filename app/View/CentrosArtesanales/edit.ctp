<style>
	form {
		width: 600px;
	}
	.usu-cedula{
		width: 225px;
	}
	form .input label {
		display: block;
		float: left;
		font-size: 13px;
		height: 16px;
		margin: 0 0 2px;
		padding: 8px 0 0;
		width: 225px;
	}
	form .input.checkbox input{
		float:right;
		width: 25px;
		margin-right: 348px;
	}
</style>
<div class="centrosArtesanales form">
<?php echo $this->Form->create('CentrosArtesanal');?>
	<fieldset>
		<h2><?php echo __('Agregar Centros Artesanal'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('cen_tipo',array('label'=>'Tipo','options'=>$tipos,'empty'=>'seleccione...'));
		echo $this->Form->input('rama_id');
		echo $this->Form->input('cen_ruc',array('label'=>'Ruc'));
		echo $this->Form->input('cen_nombre',array('label'=>'Nombre'));
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('canton_id',array('val'=>$this -> data['CentrosArtesanal']['canton_id']));
		echo $this->Form->input('ciudad_id',array('val'=>$this -> data['CentrosArtesanal']['ciudad_id']));
		echo $this->Form->input('parroquia_id',array('val'=>$this -> data['CentrosArtesanal']['parroquia_id']));
		echo $this->Form->input('direccion',array('label'=>'Dirección'));
		echo $this->Form->input('cen_sostenimiento',array('label'=>'Sostenimiento','options'=>$sostenimientos,'empty'=>'seleccione...'));
		echo $this->Form->input('cen_fecha_periodo_inicial',array('label'=>'Fecha Periodo Inicial','type'=>'text','class'=>'date'));
		echo $this->Form->input('cen_fecha_periodo_final',array('label'=>'Fecha Periodo Final','type'=>'text','class'=>'date'));
		echo $this->Form->input('cen_modalidad',array('label'=>'Modalidad','options'=>$modalidades,'empty'=>'seleccione...'));
		echo $this->Form->input('cen_lenguaje',array('label'=>'Lenguaje','options'=>$lenguajes,'empty'=>'seleccione...'));
		echo $this->Form->input('cen_condiciones_local',array('label'=>'Condiciones Local','options'=>$condiciones,'empty'=>'seleccione...'));
		echo $this->Form->input('cen_costo_mensual_local',array('label'=>'Costo Mensual Local','type'=>'text','class'=>'valor'));
		echo $this->Form->input('cen_nombre_del_director',array('label'=>'Nombre Del Director'));
		echo $this->Form->input('cen_numero_aulas_talleres',array('label'=>'Numero Aulas Talleres','type'=>'text','class'=>'number'));
		echo $this->Form->input('cen_dimension_total_area_pedagogica',array('label'=>'Dimension Total Area Pedagogica'));
		echo $this->Form->input('cen_estado_area_pedagogica',array('label'=>'Estado Area Pedagogica','options'=>$estados,'empty'=>'seleccione...'));
		
		
		echo $this->Form->input('cen_baterias_sanitarias',array('label'=>'Baterias Sanitarias'));
		echo $this->Form->input('cen_lavabos',array('label'=>'Lavabos'));
		echo $this->Form->input('cen_duchas',array('label'=>'Duchas'));
		echo $this->Form->input('cen_estado_area_servicios',array('label'=>'Estado Area Servicios','options'=>$estados,'empty'=>'seleccione...'));
		echo $this->Form->input('cen_dimension_total_area_servicios',array('label'=>'Dimension Total Area Servicios'));
		echo $this->Form->input('cen_patios',array('label'=>'Patios'));
		echo $this->Form->input('cen_canchas',array('label'=>'Canchas'));
		echo $this->Form->input('cen_areas_verdes',array('label'=>'Areas Verdes'));
		echo $this->Form->input('cen_otras_areas_recreacion',array('label'=>'Otras Areas Recreacion'));
		echo $this->Form->input('cen_estado_areas_recreacion',array('label'=>'Estado Areas Recreacion','options'=>$estados,'empty'=>'seleccione...'));
		echo $this->Form->input('cen_dimension_total_area_recreacion',array('label'=>'Dimension Total Area Recreacion'));
		echo $this->Form->input('observaciones',array('label'=>'Observaciones'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function() {
		var actualizarGeoTaller = function() {
			BJS.updateSelect($("#CentrosArtesanalCantonId"), "/cantones/getByProvincia/" + $("#CentrosArtesanalProvinciaId option:selected").val(), function() {
				BJS.updateSelect($("#CentrosArtesanalCiudadId"), "/ciudades/getByCanton/" + $("#CentrosArtesanalCantonId option:selected").val(), function() {
					BJS.updateSelect($("#CentrosArtesanalParroquiaId"), "/parroquias/getByCiudad/" + $("#CentrosArtesanalCiudadId option:selected").val());
				});
			});
		}
		$('#CentrosArtesanalProvinciaId').change(function() {
			actualizarGeoTaller();
		});
		$('#CentrosArtesanalCantonId').change(function() {
			BJS.updateSelect($("#CentrosArtesanalCiudadId"), "/ciudades/getByCanton/" + $("#CentrosArtesanalCantonId option:selected").val(), function() {
				BJS.updateSelect($("#CentrosArtesanalParroquiaId"), "/parroquias/getByCiudad/" + $("#CentrosArtesanalCiudadId option:selected").val());
			});
		});
		$('#CentrosArtesanalCiudadId').change(function() {
			BJS.updateSelect($("#CentrosArtesanalParroquiaId"), "/parroquias/getByCiudad/" + $("#CentrosArtesanalCiudadId option:selected").val());
		});
		actualizarGeoTaller();
		$('form').submit(function(e){
			if(!checkRucEcuador($('#CentrosArtesanalCenRuc').val())){
				e.preventDefault();
			}
		});
	});

</script>