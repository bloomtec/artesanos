<!-- Seccion formulario consulta reporte -->
<?php if(!$mostrar_reporte) : ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('Reporte'); ?>
	<h2><?php echo __('Reporte De Inspecciones'); ?></h2>
	<fieldset>
		<?php
			echo $this -> Form -> input('fecha_inicial');
			echo $this -> Form -> input('fecha_final');
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar'); ?>
	<?php echo $this -> Form -> end(); ?>
</div>
<?php endif;?>
<!-- Sección informe reporte -->
<?php if($mostrar_reporte) : ?>
<div class="reportes informe">
	
</div>
<?php endif;?>