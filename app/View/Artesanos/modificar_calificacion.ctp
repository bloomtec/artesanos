<div class='modificarCalificacion'>
	<?php // debug($calificacion);?>
<?php echo $this -> Html -> css('registro-artesano',false);?>
<?php 
	echo $this -> Html ->scriptBlock('var capitalMaximoInversion='.$this->requestAction('/configuraciones/getValorConfiguracion/con_capital_maximo_de_inversion'),
	array('inline'=>false));
	echo $this -> Html ->scriptBlock('var salarioMinimoUnificado='.$this->requestAction('/configuraciones/getValorConfiguracion/con_salario_basico_unificado'),
	array('inline'=>false));

?>
<div class="artesanos form calificar">
	<div id="drawer">
		[Hay campos no validos en el formulario, por favor verifiquelos] <br /> Recuerde que todos los campos marcados con (*) son obligatorios
	</div>
	<?php echo $this -> Form -> create('Artesano',array('id'=>'registro','action'=>'modificarCalificacion')); ?>
		<div id="wizard">
			<!--<div class='overlay-espera'> Verificando... </div>-->
			<ul id="status">
				<li class="active">
					<strong>1.</strong> Datos Personales, Taller y Local
				</li>
				<li>
					<strong>2.</strong> Equipo De Trabajo, Materia Prima Y Productos
				</li>
				<li>
					<strong>3.</strong> Trabajadores y Balance
				</li>
				<div style='clear:both'></div>
			</ul>

			<div class="items">
				<!-- pages -->
				<div class="page">
					<?php echo $this -> element('registro_paso_1m');?>
				</div>
				<div class="page">
					<?php echo $this -> element('registro_paso_2m');?>
				</div>
				<div class="page">
					<?php echo $this -> element('registro_paso_3m');?>
				</div>
			</div>
		</div>
		<div style='clear:both'></div>
		
	<?php echo $this -> Form -> end(); ?>
	<!--<div class="submit">
		<a href="#" class="finalizar-registro-artesano cancelar">Finalizar Registro</a>
	</div>-->
</div>
<?php echo $this -> Html -> script('llenado_de_datos.js',false);?>
<?php echo $this -> Html -> script('balances',false);?>
<?php echo $this -> Html -> script('registro-artesano',false);?>
<script type="text/javascript">
	$(function(){
		BJS.JSON('/artesanos/datosCalificacion/<?php echo $calificacion['Calificacion']['id']?>',null,function(response){
			if(response.Datos){
					$("#wizard .validar").css('visibility','visible');
					$("#wizard .error").removeClass('error');
					if(typeof response.Datos != 'undefined'){
						if(response.Datos.DatosPersonal.length) llenarDatos('DatosPersonal',response.Datos.DatosPersonal[0]);
						indiceOperador=indiceAprendiz=0;						
						if(response.Datos.Local.length) llenarDatos('Local',response.Datos.Local[0]);
						if(response.Datos.Taller.length){
							if(llenarDatos('Taller',response.Datos.Taller[0])){
								if(llenarDatos('Calificacion',response.Datos.Calificacion)){
									actualizarSalarioOperario();
									actualizarSalarioAprendiz();
									actualizarCapital();
									actualizarIngresos();
									actualizarEgresos();
									actualizarRentabilidad();
								}
							}
						} 
					}else{
						$(".validar input[type!='hidden'][type!='checkbox']").val("");
						$(".validar input[type='checkbox']").attr('checked',false);
						//$('.validar select option:first-child').attr('selected',true).parent().change();
					}
				}else{
					$("#wizard .validar").css('visibility','hidden');
					$(".validar input[type!='hidden'][type!='checkbox']").val("");
					//$('input.valor').setMask({ mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' });
					$(".validar input[type='checkbox']").attr('checked',false);
					//$('.validar select option:first-child').attr('selected',true).parent().change();
				}
		});
		
	});
</script>
</div>