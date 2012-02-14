<div class="calificaciones view">
<h2><?php  echo __('Calificacion');?></h2>
		<label><?php echo __('Rama'); ?></label>
		<h3>
			<?php echo $this->Html->link($calificacion['Rama']['ram_nombre'], array('controller' => 'ramas', 'action' => 'view', $calificacion['Rama']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Artesano'); ?></label>
		<h3>
			<?php echo $this->Html->link($calificacion['Artesano']['id'], array('controller' => 'artesanos', 'action' => 'view', $calificacion['Artesano']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tipos De Calificacion'); ?></label>
		<h3>
			<?php echo $this->Html->link($calificacion['TiposDeCalificacion']['tip_nombre'], array('controller' => 'tipos_de_calificaciones', 'action' => 'view', $calificacion['TiposDeCalificacion']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Estado'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_estado']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Inspector Local'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_inspector_local']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Fecha Inspeccion Local'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_fecha_inspeccion_local']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Inspector Taller'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_inspector_taller']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Fecha Inspeccion Taller'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_fecha_inspeccion_taller']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Fecha Expiracion'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_fecha_expiracion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Domicilio Propio'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_domicilio_propio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Domicilio Valor'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_domicilio_valor']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Taller Propio'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_taller_propio']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Taller Valor'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_taller_valor']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Agua'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_agua']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Luz'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_luz']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Telefono'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_telefono']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Servicios Basicos'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_servicios_basicos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Compra De Materia Prima Mensual'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_compra_de_materia_prima_mensual']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Salario Operarios'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_salario_operarios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Salario Aprendices'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_salario_aprendices']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Otros Salarios'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_otros_salarios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Maquinas Y Herramientas'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_maquinas_y_herramientas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Materia Prima'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_materia_prima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Productos Elaborados'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_productos_elaborados']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Ingresos Por Ventas'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_ingresos_por_ventas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cal Otros Ingresos'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['cal_otros_ingresos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($calificacion['Calificacion']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Calificaciones'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Calificacion'), array('action' => 'edit', $calificacion['Calificacion']['id'])); ?> </li>
	</ul>
</div>