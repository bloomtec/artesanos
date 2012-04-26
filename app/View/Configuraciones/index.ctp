<div class="configuraciones view">
<h2><?php  echo __('Configuracion');?></h2> <br />
		<label><?php echo __('Capital Máximo de inversión'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_capital_maximo_de_inversion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Salario Básico unificado'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_salario_basico_unificado']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Años para renovación artesano autónomo'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_renovacion_artesanos_autonomos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Años para renovación artesanos normales'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_renovacion_artesanos_normales']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Años para pasar de operario a aprendiz'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_pasar_de_aprendiz_a_operario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Años para que un operario se pueda calificar'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_anos_operario_se_pueda_calificar']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Correos para solicitudes'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_correos_solicitudes']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Correos para vitrina Virtual'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_correo_vitrina']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Calificación mínima'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_calificacion_minima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Calificación máxima'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_calificacion_maxima']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Calificación para aprobar cursos'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_calificacion_para_aprobar_curso']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('I.V.A.'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_iva']); ?>
			&nbsp;
		</h3>
		
		
		
		<label><?php echo __('Presidente de la Junta'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_presidente_de_la_junta']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Secretario General'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_secretario_general']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Director Nacional Técnico'); ?></label>
		<h3>
			<?php echo h($configuracion['Configuracion']['con_director_nacional_tecnico']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Técnico en capacitación y calificación '); ?></label>
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