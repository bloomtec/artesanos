<div class="reportes form">
<br />
<br />
<h2><?php echo __('Reporte ventas de especies');?></h2>
<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha'); ?></th>
		<th><?php echo $this -> Paginator -> sort('ven_cantidad', 'Cantidad'); ?></th>
		<th><?php echo $this -> Paginator -> sort('ven_valor', 'Valor'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach($ingresos as $key => $ingreso) : ?>
	<tr>
		<td><?php echo $ingreso['VentasEspecie']['created']; ?> </td>
		<td><?php echo $ingreso['VentasEspecie']['ven_cantidad']; ?></td>
		<td><?php echo $ingreso['VentasEspecie']['ven_valor']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ingreso['VentasEspecie']['id']),array('class'=>'view','title'=>'Ver')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>