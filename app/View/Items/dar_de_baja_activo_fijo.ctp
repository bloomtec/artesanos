<div class="items form">
	<?php echo $this -> Form -> create('Item');?>
	<fieldset>
		<h2><?php echo __('Dar De Baja Activo Fijo');?></h2>
		<?php
			
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