<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
	<fieldset>
		<h2><?php echo __('Traspaso Activo Fijo');?></h2>
		<?php
		echo $this -> Form -> input('ItemsPersona.id', array('label' => 'Asignaciones', 'options' => $asignaciones, 'empty' => 'Seleccione...'));
		echo $this -> Form -> input('departamento_id', array('label' => 'Departamento'));
		echo $this -> Form -> input('ItemsPersona.persona_id', array('label' => 'Persona'));
		echo $this -> Form -> input('ItemsPersona.ite_cantidad', array('label' => 'Cantidad', 'type' => 'select', 'empty' => 'Seleccione...'));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		
		var listarPersonas = function() {
			BJS.updateSelect($('#ItemsPersonaPersonaId'), '/personas/getPersonasByDepartment/' + $('#ItemDepartamentoId').val(), {}, function(data) {
				
			});
		}
		
		var listarCantidades = function() {
			BJS.updateSelect($('#ItemsPersonaIteCantidad'), '/items/getCantidadAsignada/' + $('#ItemsPersonaId').val(), {}, function(data) {
				
			});
		}
		
		listarCantidades();
		
		listarPersonas();
		
		$('#ItemDepartamentoId').change(function() {
			listarPersonas();
		});
		
		$('#ItemsPersonaId').change(function() {
			listarCantidades();
		});
		
	});
</script>