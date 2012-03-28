<div class="ventasEspecies form">
<?php echo $this->Form->create('VentasEspecie');?>
	<fieldset>
		<h2><?php echo __('Ventas De Especies Valoradas'); ?></h2>
	<?php
		echo $this -> Form -> input('what_is', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('artesanoSelect'=>'Artesano: ','juntaSelect'=>'Junta: '),'id'=>'whatIs'));	
	?>
	<div class="cliente">
	<?php	echo $this->Form->input('juntas_provincial_id',array('class'=>'juntaSelect controlSelects','label'=>false)); ?>
		<div class='cedula-box'>
		<?php echo $this->Form->input('cedula_artesanos',array('class'=>'artesanoSelect controlSelects cedula','label'=>false,'type'=>'text')); ?>
		<a class='button validarCedula' href='#'>validar</a>
		</div>
	</div>
	</fieldset>
	<div class="form-venta">
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
						<?php 	echo $this->Form->input('EspeciesValorada.'.$i.'.cantidad',array('label'=>false,'class'=>'cantidad mil')); ?>
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
				console.log(datosPersonales.DatosPersonal.nombre_completo);
			}else{
				$('.form-venta').hide();
				alert('No existe un artesano con este documento en la base de datos');
			}
			
		});
	});
});
</script>