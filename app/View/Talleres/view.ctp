<div class="talleres view">
<h2><?php  echo __('Taller');?></h2>
		<label><?php echo __('Razon Social O Nombre Comercial'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['razon_social_o_nombre_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Pichincha'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['pichincha']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['canton']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['ciudad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Parroquia'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['parroquia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Calle O Avenida'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['calle_o_avenida']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Numero'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['numero']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Interseccion'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['interseccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Barrio'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['barrio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Telefono Celular'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['telefono_celular']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Telefono Convencional'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['telefono_convencional']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Referencia'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['referencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Email'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['email']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Artesano'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $taller['Artesano']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Talleres'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Taller'), array('action' => 'edit', $taller['Taller']['id'])); ?> </li>
	</ul>
</div>