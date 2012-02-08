<div class="valores form">
	<?php echo $this -> Form -> create('Valor');?>
	<fieldset>
		<h2><?php echo __('Agregar Valor');?></h2>
		<?php
		echo $this -> Form -> hidden('parametros_informativo_id');
		echo $this -> Form -> input('val_nombre', array('label' => 'Nombre'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), $referer, array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>