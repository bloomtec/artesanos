<div class="configuraciones view">
<h2><?php  echo __('Configuracion');?></h2>
		<label><?php echo __('Con Capital Maximo De Inversion'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_capital_maximo_de_inversion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Salario Basico Unificado'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_salario_basico_unificado']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Anos Renovacion Artesanos Autonomos'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_renovacion_artesanos_autonomos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Anos Renovacion Artesanos Normales'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_renovacion_artesanos_normales']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Anos Pasar De Aprendiz A Operario'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_pasar_de_aprendiz_a_operario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Anos Operario Se Pueda Calificar'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_operario_se_pueda_calificar']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Correos Solicitudes'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_correos_solicitudes']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Correo Vitrina'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_correo_vitrina']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Calificacion Minima'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_calificacion_minima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Calificacion Maxima'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_calificacion_maxima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Con Calificacion Para Aprobar Curso'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_calificacion_para_aprobar_curso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('I.V.A.'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_iva']); ?>
			&nbsp;
		</h3>
		<h1> Certificaciones </h1>
		
		<label><?php echo __('Presidente De La junta'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_presidente_de_la_junta']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Secretario General'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_secretario_general']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Director Nacional Tecnico'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_director_nacional_tecnico']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Tecnico en Capacitación y Calificación'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_tecnico_en_capacitacion_y_calificacion']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Modificar Configuracion'), array('action' => 'edit', $configuracion['Configuracion']['id'])); ?> </li>
	</ul>
</div>