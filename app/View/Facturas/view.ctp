<div class="facturas view">
<h2><?php  echo __('Factura');?></h2>
		<label><?php echo __('Fac Numero'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_numero']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fac Comprobante Deposito'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_comprobante_deposito']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fac Cliente'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_cliente']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($factura['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $factura['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo $this->Html->link($factura['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $factura['Canton']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($factura['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $factura['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fac Direccion'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_direccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fac Telefono'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_telefono']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fac Ruc Doc'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_ruc_doc']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fac Fecha Emision'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['fac_fecha_emision']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($factura['Factura']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Facturas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Factura'), array('action' => 'edit', $factura['Factura']['id'])); ?> </li>
	</ul>
</div>