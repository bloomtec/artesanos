<div class="locales view">
<h2><?php  echo __('Local');?></h2>
		<label><?php echo __('Pichincha'); ?></label>
		<h3>
			<?php echo h($local['Local']['pichincha']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo h($local['Local']['canton']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo h($local['Local']['ciudad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Parroquia'); ?></label>
		<h3>
			<?php echo h($local['Local']['parroquia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Calle O Avenida'); ?></label>
		<h3>
			<?php echo h($local['Local']['calle_o_avenida']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Numero'); ?></label>
		<h3>
			<?php echo h($local['Local']['numero']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Interseccion'); ?></label>
		<h3>
			<?php echo h($local['Local']['interseccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Barrio'); ?></label>
		<h3>
			<?php echo h($local['Local']['barrio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Telefono Celular'); ?></label>
		<h3>
			<?php echo h($local['Local']['telefono_celular']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Telefono Convencional'); ?></label>
		<h3>
			<?php echo h($local['Local']['telefono_convencional']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Referencia'); ?></label>
		<h3>
			<?php echo h($local['Local']['referencia']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Email'); ?></label>
		<h3>
			<?php echo h($local['Local']['email']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Artesano'); ?></label>
		<h3>
			<?php echo $this->Html->link($local['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $local['Artesano']['id'])); ?>
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