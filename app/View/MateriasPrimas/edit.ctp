<div class="materiasPrimas form">
<?php echo $this->Form->create('MateriasPrima');?>
	<fieldset>
		<h2><?php echo __('Modificar Materias Prima'); ?></h2>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('taller_id');
		echo $this->Form->input('mat_cantidad');
		echo $this->Form->input('mat_tipo_de_materia_prima');
		echo $this->Form->input('mat_procedencia');
		echo $this->Form->input('mat_valor_comercial');
	?>
	</fieldset>
<?php echo $this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>
<?php echo $this->Form->end(__('Guardar'));?>
</div>