<div class="talleres view">
<h2><?php  echo __('Taller');?></h2>
		<label><?php echo __('Calificacion'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $taller['Calificacion']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Razon Social O Nombre Comercial'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_razon_social_o_nombre_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $taller['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $taller['Canton']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $taller['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sector'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Sector']['sec_nombre'], array('controller' => 'sectores', 'action' => 'view', $taller['Sector']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Parroquia'); ?></label>
		<h3>
			<?php echo $this->Html->link($taller['Parroquia']['par_nombre'], array('controller' => 'parroquias', 'action' => 'view', $taller['Parroquia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Calle O Avenida'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_calle_o_avenida']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Numero'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_numero']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Interseccion'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_interseccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Barrio'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_barrio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Telefono Celular'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_telefono_celular']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Telefono Convencional'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_telefono_convencional']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Referencia'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_referencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tal Email'); ?></label>
		<h3>
			<?php echo h($taller['Taller']['tal_email']); ?>
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