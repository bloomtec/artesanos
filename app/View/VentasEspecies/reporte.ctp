<?php if(!isset($ingresos)) : ?>
<div class="reportes form">
	<?php echo $this -> Form -> create('VentasEspecie');?>
	<h2><?php echo __('Reporte ventas de especies'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('fecha_inicio', array('type' => 'text', 'label' => 'Fecha Inicio', 'class' => 'date'));
		echo $this -> Form -> input('fecha_fin', array('type' => 'text', 'label' => 'Fecha Fin', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<?php endif; ?>
<?php if(isset($ingresos)) : ?>
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
<div class="actions">
	<a class='button' href="/ventas_especies/reporte">Volver</a>
	&nbsp;
	<a class='button' href="/ventas_especies/imprimirReporte">Descargar pdf</a>
	&nbsp;
	<a class='button' href="/ventas_especies/export_csv">Exportar a CSV</a>
</div>
<?php endif; ?>