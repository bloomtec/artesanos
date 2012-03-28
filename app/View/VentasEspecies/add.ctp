<div class="ventasEspecies form">
<?php echo $this->Form->create('VentasEspecie');?>
	<fieldset>
		<h2><?php echo __('Agregar Ventas Especie'); ?></h2>
	<?php
		echo $this -> Form -> input('what_is', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('artesanoSelect'=>'Artesano: ','juntaSelect'=>'Junta: '),'id'=>'whatIs'));	
	?>
	<div class="cliente">
		
	
	<?php	
		echo $this->Form->input('juntas_provincial_id',array('class'=>'juntaSelect controlSelects','label'=>false));
		echo $this->Form->input('cedula_artesanos',array('class'=>'artesanoSelect controlSelects cedula','label'=>false,'type'=>'text'));
		echo $this->Form->input('artesano_id',array('class'=>'artesanoSelect controlSelects','label'=>false,'type'=>'hidden'));
		
	?>
	</div>
	
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>
<style>
	.cliente{
		float:left;
		clear:none;
	}
	.cliente div{
		
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
	});	
	$('.cedula').blur(function(){
		BJS.JSON('/artesanos/getDatosPersonales/'+$(this).val(),{},function(){
			
		});
	});
});
</script>