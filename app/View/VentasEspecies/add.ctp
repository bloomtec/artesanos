<div class="ventasEspecies form">
<?php echo $this->Form->create('VentasEspecie');?>
	<fieldset>
		<h2><?php echo __('Ventas De Especies Valoradas'); ?></h2>
	<?php
		echo $this -> Form -> input('what_is', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('artesanoSelect'=>'Artesano: '),'id'=>'whatIs'));	
	?>
	<div class="cliente">
	<?php	echo $this->Form->input('juntas_provincial_id',array('empty' => 'Seleccione...', 'class'=>'juntaSelect controlSelects','label'=>false)); ?>
		<div class='cedula-box'>
		<?php echo $this->Form->input('cedula_artesanos',array('class'=>'artesanoSelect controlSelects cedula','label'=>false,'type'=>'text','placeholder'=>'digite la cedula del artesano')); ?>
		<a class='button validarCedula' href='#'>validar</a>
		<!--<a class='button' id="btnModalRegArtesano" href='#'>Registrar artesano</a>
		-->
		</div>
	</div>
	</fieldset>
	<div class="form-venta">
		<br />
		<h1 class='nombre'></h1>
		<table id="ventasEspeciesValoradas">
			<tr>
				<th>Tipo Especie valorda</th>
				<th>Cantidad</th>
			</tr>
			<?php $i=0; 
				foreach($tiposEspeciesValorada as $tiposEspecie): 
			?>
				<tr>
					<td>
						<p>
							<?php echo $tiposEspecie['TiposEspeciesValorada']['tip_nombre']?>
							<?php echo $this->Form->hidden('EspeciesValorada.'.$i.'.tipos_especies_valorada_id',array('value'=>$tiposEspecie['TiposEspeciesValorada']['id'])); ?>
						</p>
					</td>
					<td> 
						<?php 
							$totales[0]=0; 
							for($j=1;$j <=$tiposEspecie['TiposEspeciesValorada']['total_especies_para_vender'];$j++){
								$totales[$j]=$j;
							}
						?>
						<?php 	echo $this->Form->input('EspeciesValorada.'.$i.'.cantidad',array('label'=>false,'class'=>'cantidad',"options"=>$totales,'value'=>0)); ?>
					</td>
				</tr>
			<?php 
				$i++;
				endforeach;
			?>
		</table>
	<?php echo $this->Form->input('artesano_id',array('class'=>'artesanoSelect','label'=>false,'type'=>'hidden'));	 ?>
	<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
	<?php echo $this->Form->end(__('Guardar'));?>
	</div>	
</div>

<style>
	.ventasEspecies.form form{
		width: 550px;
	}
	 .cliente a.button{
	 	float:left;
	 	margin-left:10px;
	 
	 }
	 .cedula-box .input{
	 	float:left;
	 	margin:0;
	 }
	.cliente{
		float:left;
		clear:none;
	}
	.cliente div{
		
	}
	.form-venta{
		display:none;
	}
	.controlSelects{
		display:none;
	}
</style>
<script type="text/javascript">
$(function(){
	$('.'+$('#whatIs option:selected').val()).show();
	$('#whatIs').change(function(){
		$('.controlSelects').hide();
		$('.'+$('#whatIs option:selected').val()).show();
		if($('#whatIs option:selected').val()=='juntaSelect'){
			$('.cedula-box').hide();
			$('.form-venta').show();
			$('#VentasEspecieArtesanoId').val("");
		}else{
			$('.form-venta').hide();
			$('.cedula').val('');
			$('#VentasEspecieArtesanoId').val("");
			$('.cedula-box').show();
		}
	});
	
		
	$('.validarCedula').click(function(){
		BJS.JSON('/artesanos/getDatosPersonales/'+$('.cedula').val(),{},function(datosPersonales){
			if(datosPersonales){
				$('.form-venta').show();
				$('#VentasEspecieArtesanoId').val(datosPersonales.Artesano.id);
				$('hi.nombre').text(datosPersonales.Artesano.nombre_completo);
			}else{
				$('.form-venta').hide();
				alert('No existe un artesano con este documento en la base de datos');
				$('#VentasEspecieArtesanoId').val('');
				$('h1.nombre').text('');
			}
			
		});
	});
	$('body').keyup(function(e){
		var code = (e.keyCode ? e.keyCode : e.which);
		if(code == 13){
			
		}
	});
	$('form').submit(function(e){
		var cantidadTotal=0;
		var length = $('.cantidad').length - 1 ;
		$.each($('.cantidad'),function(i,val){
			cantidadTotal+=parseInt($(val).val());
			if(i == length){
				if(!cantidadTotal){
					e.preventDefault();
					alert('No ha completado el formulario');
				}
			}
		});
		
	});
});
</script>

<?php echo $this -> element('registrar_artesano'); ?>