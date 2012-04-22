<div class="centrosArtesanales form">
<?php echo $this->Form->create('CentrosArtesanal');?>
	<fieldset>
		<h2><?php echo __('Agregar Centros Artesanal'); ?></h2>
	<?php
		echo $this->Form->input('rama_id');
		echo $this->Form->input('cen_ruc',array('label'=>'Ruc'));
		echo $this->Form->input('cen_nombre',array('label'=>'Nombre'));
		echo $this->Form->input('provincia_id');
		echo $this->Form->input('canton_id');
		echo $this->Form->input('ciudad_id');
		echo $this->Form->input('parroquia_id');
		echo $this->Form->input('direccion',array('label'=>'Ccion'));
		echo $this->Form->input('cen_sostenimiento',array('label'=>'Sostenimiento'));
		echo $this->Form->input('cen_tipo',array('label'=>'Tipo'));
		echo $this->Form->input('cen_fecha_periodo_inicial',array('label'=>'Fecha Periodo Inicial'));
		echo $this->Form->input('cen_fecha_periodo_final',array('label'=>'Fecha Periodo Final'));
		echo $this->Form->input('cen_modalidad',array('label'=>'Modalidad'));
		echo $this->Form->input('cen_lenguaje',array('label'=>'Lenguaje'));
		echo $this->Form->input('cen_condiciones_local',array('label'=>'Condiciones Local'));
		echo $this->Form->input('cen_costo_mensual_local',array('label'=>'Costo Mensual Local'));
		echo $this->Form->input('cen_nombre_del_director',array('label'=>'Nombre Del Director'));
		echo $this->Form->input('cen_numero_aulas_talleres',array('label'=>'Numero Aulas Talleres'));
		echo $this->Form->input('cen_dimension_total_area_pedagogica',array('label'=>'Dimension Total Area Pedagogica'));
		echo $this->Form->input('cen_estado_area_pedagogica',array('label'=>'Estado Area Pedagogica'));
		echo $this->Form->input('cen_baterias_sanitarias',array('label'=>'Baterias Sanitarias'));
		echo $this->Form->input('cen_lavabos',array('label'=>'Lavabos'));
		echo $this->Form->input('cen_duchas',array('label'=>'Duchas'));
		echo $this->Form->input('cen_estado_area_servicios',array('label'=>'Estado Area Servicios'));
		echo $this->Form->input('cen_dimension_total_area_servicios',array('label'=>'Dimension Total Area Servicios'));
		echo $this->Form->input('cen_patios',array('label'=>'Patios'));
		echo $this->Form->input('cen_canchas',array('label'=>'Canchas'));
		echo $this->Form->input('cen_areas_verdes',array('label'=>'Areas Verdes'));
		echo $this->Form->input('cen_otras_areas_recreacion',array('label'=>'Otras Areas Recreacion'));
		echo $this->Form->input('cen_estado_areas_recreacion',array('label'=>'Estado Areas Recreacion'));
		echo $this->Form->input('cen_dimension_total_area_recreacion',array('label'=>'Dimension Total Area Recreacion'));
		echo $this->Form->input('observaciones',array('label'=>'Rvaciones'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>