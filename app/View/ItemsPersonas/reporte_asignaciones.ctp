<?php if(!$reporte) : ?>
<div class="reporte asignaciones form">
	<?php echo $this -> Form -> create('ItemsPersona'); ?>
	<fieldset>
		<h2><?php echo __('Reporte Asignación De Activos Fijos'); ?></h2>
		<?php
			echo $this -> Form -> input('item_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('departamento_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('persona_id', array('empty' => 'Seleccione...'));
			echo $this -> Form -> input('fecha_inicio', array('value' => $fechaActual, 'class' => 'date'));
			echo $this -> Form -> input('fecha_fin', array('value' => $fechaActual, 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> end('Generar Reporte'); ?>
	<script type="text/javascript">
		$(function() {
			var actualizarPersonas = function() {
				BJS.updateSelect($('#ItemsPersonaPersonaId'), '/personas/getPersonasByDepartment/' + $('#ItemsPersonaDepartamentoId').val());
			}
			actualizarPersonas();
			$('#ItemsPersonaDepartamentoId').change(function() {
				BJS.updateSelect($('#ItemsPersonaPersonaId'), '/personas/getPersonasByDepartment/' + $('#ItemsPersonaDepartamentoId').val());
			});
		});
	</script>
</div>
<?php endif; ?>
<?php if($reporte) : ?>
<div class="reporte asignaciones resultado">
	<table id="ReporteAsignaciones">
		<tr>
			<th><?php echo $this -> Paginator -> sort('Persona.per_departamento', 'Departamento') ?></th>
			<th><?php echo $this -> Paginator -> sort('Persona.datos_completos', 'Persona') ?></th>
			<th><?php echo $this -> Paginator -> sort('Item.ite_nombre', 'Item') ?></th>
			<th><?php echo $this -> Paginator -> sort('ite_cantidad', 'Cantidad') ?></th>
		</tr>
		<?php foreach($asignaciones as $key => $asignacion) : ?>
		<tr>
			<td><?php echo $asignacion['Persona']['per_departamento']; ?></td>
			<td><?php echo $asignacion['Persona']['datos_completos']; ?></td>
			<td><?php echo $asignacion['Item']['ite_nombre']; ?></td>
			<td><?php echo $asignacion['ItemsPersona']['ite_cantidad']; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<div class="paging">
		<!--<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
		));
		?>	</p>-->
		<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
		?>
	</div>
	<div class="actions">
		<a href="/items_personas/reporteAsignaciones" class="button">Volver</a>
		&nbsp;
		<a class='button' href="/items_personas/descargarReporte">Descargar pdf</a>
	</div>
</div>
<?php endif; ?>