<?php echo $this -> Html -> css('registro-artesano',false);?>
<div class="artesanos form calificar">
	<!-- twitter style "drawer" for displaying validation errors -->
	<div id="drawer">
		[Hay campos no validos en el formulario, por favor verifiquelos] <br /> Recuerde que todos los campos marcados con (*) son obligatorios
	</div>
	<!-- the form -->
	<?php echo $this -> Form -> create('Artesano',array('id'=>'registro')); ?>
		<!-- scrollable root element -->
		<div id="wizard">
			<!-- status bar -->
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
			<!-- scrollable items -->
			<div class="items">
				<!-- pages -->
				<div class="page">
					<?php echo $this -> element('registro_paso_1');?>
				</div>
				<div class="page">
					<?php echo $this -> element('registro_paso_2');?>
				</div>
				<div class="page">
					<?php echo $this -> element('registro_paso_3');?>
				</div>
			</div>
		</div>
		<div style='clear:both'></div>
		
	<?php echo $this -> Form -> end(); ?>
	<!--<div class="submit">
		<a href="#" class="finalizar-registro-artesano cancelar">Finalizar Registro</a>
	</div>-->
</div>
<?php echo $this -> Html -> script('registro-artesano',false);?>
