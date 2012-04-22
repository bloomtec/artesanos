<div class="profesores view">
<h2><?php  echo __('Profesor');?></h2>
		<label><?php echo __('Centros Artesanal'); ?></label>
		<h3>
			<?php echo $this->Html->link($profesor['CentrosArtesanal']['cen_nombre'], array('controller' => 'centros_artesanales', 'action' => 'view', $profesor['CentrosArtesanal']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Nombres'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_nombres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Is Cedula'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_is_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Documento De Identificacion'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_documento_de_identificacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Direccion'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_direccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Telefono'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_telefono']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Fecha De Nacimiento'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_fecha_de_nacimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Tipo De Sangre'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_tipo_de_sangre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Sexo'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_sexo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Nacionalidad'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_nacionalidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pro Correo Electronico'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['pro_correo_electronico']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($profesor['Profesor']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Profesores'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Profesor'), array('action' => 'edit', $profesor['Profesor']['id'])); ?> </li>
	</ul>
</div>