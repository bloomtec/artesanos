<div class="proveedores view">
<h2><?php  echo __('Proveedor');?></h2>
		<label><?php echo __('Pro Ruc'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['pro_rut']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Nombre Razon Social'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['pro_nombre_razon_social']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Representante Legal'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['pro_representante_legal']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Telefono Fijo'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['pro_telefono_fijo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Celular'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['pro_celular']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Observaciones'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['pro_observaciones']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($proveedor['Proveedor']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Proveedores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Proveedor'), array('action' => 'edit', $proveedor['Proveedor']['id'])); ?> </li>
	</ul>
</div>