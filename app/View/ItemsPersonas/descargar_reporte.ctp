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
</div>