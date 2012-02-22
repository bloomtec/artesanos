<div class="locales view">
<h2><?php  echo __('Local');?></h2>
		<label><?php echo __('Calificacion'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Calificacion']['id'], array('controller' => 'calificaciones', 'action' => 'view', $local['Calificacion']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $local['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $local['Canton']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $local['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Sector'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Sector']['sec_nombre'], array('controller' => 'sectores', 'action' => 'view', $local['Sector']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Parroquia'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Parroquia']['par_nombre'], array('controller' => 'parroquias', 'action' => 'view', $local['Parroquia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Calle O Avenida'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_calle_o_avenida']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Numero'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_numero']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Interseccion'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_interseccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Barrio'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_barrio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Telefono Celular'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_telefono_celular']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Telefono Convencional'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_telefono_convencional']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Referencia'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_referencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Loc Email'); ?></label>
		<h3>
			<?php echo h($local['Local']['loc_email']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($local['Local']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Locales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Local'), array('action' => 'edit', $local['Local']['id'])); ?> </li>
	</ul>
</div>