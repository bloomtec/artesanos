<div class="equiposDeTrabajos view">
<h2><?php  echo __('Equipos De Trabajo');?></h2>
		<label><?php echo __('Taller'); ?></label>
		<h3>
			<?php echo $this->Html->link($equiposDeTrabajo['Taller']['id'], array('controller' => 'talleres', 'action' => 'view', $equiposDeTrabajo['Taller']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Equ Cantidad'); ?></label>
		<h3>
			<?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_cantidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Equ Maquinaria Y Herramientas'); ?></label>
		<h3>
			<?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_maquinaria_y_herramientas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Equ Tipo De Adquisicion'); ?></label>
		<h3>
			<?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_tipo_de_adquisicion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Equ Fecha De Adquisicion'); ?></label>
		<h3>
			<?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_fecha_de_adquisicion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Equ Valor Comercial'); ?></label>
		<h3>
			<?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['equ_valor_comercial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($equiposDeTrabajo['EquiposDeTrabajo']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Equipos De Trabajos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Equipos De Trabajo'), array('action' => 'edit', $equiposDeTrabajo['EquiposDeTrabajo']['id'])); ?> </li>
	</ul>
</div>