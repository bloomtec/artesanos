<div class="centrosArtesanales view">
<h2><?php  echo __('Centros Artesanal');?></h2>
		<label><?php echo __('Cen Ruc'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_ruc']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Nombre'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $centrosArtesanal['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $centrosArtesanal['Canton']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $centrosArtesanal['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Parroquia'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Parroquia']['par_nombre'], array('controller' => 'parroquias', 'action' => 'view', $centrosArtesanal['Parroquia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Direccion'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['direccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Centros Artesanales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Centros Artesanal'), array('action' => 'edit', $centrosArtesanal['CentrosArtesanal']['id'])); ?> </li>
	</ul>
</div>