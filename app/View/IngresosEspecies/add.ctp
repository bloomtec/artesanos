<style>
	#tablaIngresoEspecies{
		width:950px;
	}
	#tablaIngresoEspecies td input{
		width:100px;
	}
	#tablaIngresoEspecies .error td{
		background: #FFDACC;
	}
</style>

<div class="ingresosEspecies form">
<?php echo $this->Form->create('IngresosEspecie', array('type' => 'file'));?>
	<fieldset>
		<h2><?php echo __('Ingresos De Especies'); ?></h2>
	<?php echo $this -> Form -> input('ing_documento_soporte', array('label'=>'Documento De Soporte', 'type' => 'file')); ?>
	<table id="tablaIngresoEspecies" class="ingreso-especies">
			<tr>
				<th>Tipo Especie valorda</th>
				<th>Serie Inicial</th>
				<th>Serie Final</th>
				<th>Cantidad</th>
			</tr>
			<?php $i = 1; foreach($tiposEspeciesValoradas as $tiposEspecie): ?>
			<tr class="activo-fijo-valores">
				<td>
					<p>
						<?php echo $tiposEspecie['TiposEspeciesValorada']['tip_nombre']?>
						<?php echo $this->Form->hidden('EspeciesValorada.'.$i.'.tipos_especies_valorada_id',array('value'=>$tiposEspecie['TiposEspeciesValorada']['id'])); ?>
					</p>
				</td>
				<td>
					<?php 	echo $this->Form->input('EspeciesValorada.'.$i.'.serie_inicial',array('label'=>false,'class'=>'mil serie_inicial','type'=>'text')); ?>
				</td>
				<td>
					<?php 	echo $this->Form->input('EspeciesValorada.'.$i.'.iserie_final',array('label'=>false,'class'=>'mil serie_final','type'=>'text')); ?>
				</td>
				<td>
					<?php 	echo $this->Form->input('EspeciesValorada.'.$i.'.cantidad',array('label'=>false,'class'=>'cantidad mil','disabled'=>true)); ?>
					<?php 	echo $this->Form->hidden('EspeciesValorada.'.$i.'.cantidad',array('label'=>false,'class'=>'cantidad')); ?>
				</td
			</tr>
			<?php 	$i++ ;
					endforeach; 
			?>
		</table>		
	<?php
		echo $this->Form->input('ing_fecha',array('label'=>'Fecha','type'=>'text','class'=>'date'));
		echo $this->Form->input('ing_cantidad_total',array('label'=>'Cantidad Total','class'=>'cantidadTotal','disabled'=>true));
		echo $this->Form->hidden('ing_cantidad_total',array('label'=>false,'class'=>'cantidadTotal'));
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<script type="text/javascript">
	var cantidadTotal2=0;	
	var serieInicial=0;
	var serieFinal=0;
	var ingresoEspecies={};
	var tieneErrores=false;

ingresoEspecies.actualizar = function(){
	var cantidadTotal=0;
	var rows=$('table.ingreso-especies').find('tr');
	var length=rows.length -1;
	$.each(rows,function(i,val){
		serieInicial=$(val).find('input.serie_inicial').val();
		serieFinal=$(val).find('input.serie_final').val();
		if(serieInicial != undefined ){
			serieInicial=parseFloat(serieInicial?serieInicial.replace(/[.]/g,'').replace('.',''):0);
		}
		if(serieFinal != undefined){
			serieFinal=parseFloat(serieFinal?serieFinal.replace(/[.]/g,'').replace('.',''):0);
		}
		if(serieInicial && serieFinal){
			cantidad = parseInt(serieFinal)-parseInt(serieInicial)+1;
			if(cantidad > 0){
				cantidadTotal+=cantidad;
				tieneErrores=false;
				$(val).removeClass('error');
				$(val).find('input.cantidad').val(cantidad);
			}else{
				$(val).addClass('error');
				tieneErrores=true;
			}
			
		}else{
			if(serieInicial){
				 $(val).find('input.cantidad').val(1);
				cantidadTotal+=1;
			}
		}
		if(i == length){
			$('.cantidadTotal').val(cantidadTotal);
			cantidadTotal2=cantidadTotal;
			
		}
		
	});	
}

$(function(){
	
	//tabla de inventarios
	$('input').keyup(function(){
		ingresoEspecies.actualizar();
	});
	$("#IngresosEspecieIngFecha").keyup(function(){
		$(this).parent().parent().removeClass('error');
	});
	$('form').submit(function(e){
		if(tieneErrores || cantidadTotal2 <= 0 || $("#IngresosEspecieIngFecha").val()==""){
			e.preventDefault();
			if( $("#IngresosEspecieIngFecha").val()==""){
				$("#IngresosEspecieIngFecha").parent().parent().addClass('error');
			}
			alert('Tiene errores en el formulario');
			
		}
	});
	
});
</script>