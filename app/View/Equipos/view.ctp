<div class="equipos view">
<h2><?php  echo __('Equipo');?></h2>
		<label><?php echo __('Cantidad'); ?></label>
		<h3>
			<?php echo h($equipo['Equipo']['cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Maquinaria Y Herramientas'); ?></label>
		<h3>
			<?php echo h($equipo['Equipo']['maquinaria_y_herramientas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tipo De Adquisicion'); ?></label>
		<h3>
			<?php echo h($equipo['Equipo']['tipo_de_adquisicion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Fecha De Adquisicion'); ?></label>
		<h3>
			<?php echo h($equipo['Equipo']['fecha_de_adquisicion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Valor Comercial'); ?></label>
		<h3>
			<?php echo h($equipo['Equipo']['valor_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Local'); ?></label>
		<h3>
			<?php echo $this->Html->link($equipo['Local']['id'], array('controller' => 'locales', 'action' => 'view', $equipo['Local']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($equipo['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $equipo['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($equipo['Equipo']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Equipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Equipo'), array('action' => 'edit', $equipo['Equipo']['id'])); ?> </li>
	</ul>
</div>