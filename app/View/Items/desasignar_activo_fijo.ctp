<?php //debug($personas); ?>
<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
	<fieldset>
		<h2><?php echo __('Desasignar Activo Fijo');?></h2>
		<table>
			<?php if(!$personas) : ?>
				<caption>NO HAY PERSONAS CON ESTE ITEM ASIGNADO</caption>
			<?php endif; ?>
			<tr>
				<th>Persona</th><th>Cantidad A Desasignar</th>
			</tr>
			<?php if($personas) : ?>
			<?php foreach($personas as $key => $persona) : ?>
			<tr>
				<td><?php echo $persona['Persona']['datos_completos'];?></td>
				<td>
					<?php
						echo $this -> Form -> hidden("$key.ItemsPersona.id", array('value' => $persona['ItemsPersona']['id']));
						echo $this -> Form -> hidden("$key.ItemsPersona.ite_cantidad", array('value' => $persona['ItemsPersona']['ite_cantidad']));
						$cantidades = array();
						for($i = 0; $i <= $persona['ItemsPersona']['ite_cantidad']; $i += 1) {
							$cantidades[$i] = $i;
						}
						echo $this -> Form -> input("$key.ItemsPersona.cantidad_desasignar", array('type' => 'select', 'options' => $cantidades, 'label' => false, 'div' => false, 'class' => false));
					?>
				</td>
			</tr>
			<?php endforeach; ?>
			<?php endif; ?>
		</table>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'indexActivosFijos'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<!--<script type="text/javascript">
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
</script>-->