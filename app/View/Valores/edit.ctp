<div class="valores form">
	<?php echo $this -> Form -> create('Valor');?>
	<fieldset>
		<h2><?php echo __('Modificar Valor');?></h2>
		<?php
		echo $this -> Form -> input('id');
		echo $this -> Form -> input('parametros_informativo_id');
		echo $this -> Form -> input('val_nombre');
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), $referer, array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>