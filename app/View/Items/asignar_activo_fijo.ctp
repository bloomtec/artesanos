<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
	<fieldset>
		<h2><?php echo __('Traspaso Activo Fijo');?></h2>
		<table>
			<tr>
				<td>Código</td><td><?php echo $item['Item']['ite_codigo'];?></td>
			</tr>
			<tr>
				<td>Nombre</td><td><?php echo $item['Item']['ite_nombre'];?></td>
			</tr>
		</table>
		<?php
		echo $this -> Form -> hidden('ItemsPersona.item_id', array('value' => $item['Item']['id']));
		echo $this -> Form -> input('departamento_id', array('label' => 'Departamento'));
		echo $this -> Form -> input('ItemsPersona.persona_id', array('label' => 'Persona'));
		echo $this -> Form -> input('ItemsPersona.ite_cantidad', array('label' => 'Cantidad', 'options' => $cantidades));
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
		listarPersonas();
		$('#ItemDepartamentoId').change(function() {
			listarPersonas();
		});
	});
</script>