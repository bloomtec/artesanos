<?php echo $this -> Html -> css('registro-artesano'); ?>
<div class="artesanos form">
	<!-- twitter style "drawer" for displaying validation errors -->
	<div id="drawer">
		[ERROR MESSAGE]
	</div>
	<!-- the form -->
	<form action="#">
		<!-- scrollable root element -->
		<div id="wizard">
			<!-- status bar -->
			<ul id="status">
				<li class="active">
					<strong>1.</strong> Datos Personales, Taller Y Local
				</li>
				<li>
					<strong>2.</strong> Equipo De Trabajo, Materia Prima Y Productos
				</li>
				<li>
					<strong>3.</strong> Trabajadores Y Balance
				</li>
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
	</form>
</div>
<?php echo $this -> Html -> script('registro-artesano'); ?>

<!-- original
<div class="artesanos form">
<?php echo $this -> Form -> create('Artesano');?>
<fieldset>
<h2><?php echo __('Agregar Artesano');?></h2>
<?php
echo $this -> Form -> input('art_cedula');
?>
</fieldset>
<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
-->