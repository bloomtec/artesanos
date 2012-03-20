<div class="inspecciones index">
	<h2><?php echo __('Mis Inspecciones'); ?></h2>
	<?php if(!empty($talleres)) : ?>
	<table class="talleres">
		<caption>Talleres</caption>
		<tr>
			<th><?php echo __('Artesano'); ?></th>
			<th><?php echo __('Fecha'); ?></th>
			<th><?php echo __('Estado'); ?></th>
			<th><?php echo __('Acciones'); ?></th>
		</tr>
		<?php foreach($talleres as $key => $taller) : ?>
		<tr>
			<td><?php echo h($this -> requestAction('/datos_personales/getNombreArtesano/'. $taller['Calificacion']['id'])); ?></td>
			<td><?php echo h($taller['Calificacion']['cal_fecha_inspeccion_taller']); ?></td>
			<td>
				<?php
					if($taller['Calificacion']['cal_taller_aprobado'] == 1) {
						echo h('Aprobado');
					} elseif($taller['Calificacion']['cal_taller_aprobado'] == -1) {
						echo h('Denegado');
					} else {
						echo h('Pendiente');
					}
				?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'verInspeccion', $taller['Calificacion']['id'], 1), array('class'=>'view','title'=>'Ver')); ?>

			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<?php if(!empty($locales)) : ?>
	<table class="locales">
		<caption>Locales</caption>
		<tr>
			<th><?php echo __('Artesano'); ?></th>
			<th><?php echo __('Fecha'); ?></th>
			<th><?php echo __('Estado'); ?></th>
			<th><?php echo __('Acciones'); ?></th>
		</tr>
		<?php foreach($locales as $key => $local) : ?>
		<tr>
			<td><?php echo h($this -> requestAction('/datos_personales/getNombreArtesano/'. $local['Calificacion']['id'])); ?></td>
			<td><?php echo h($local['Calificacion']['cal_fecha_inspeccion_local']); ?></td>
			<td>
				<?php
					if($local['Calificacion']['cal_local_aprobado'] == 1) {
						echo h('Aprobado');
					} elseif($local['Calificacion']['cal_local_aprobado'] == -1) {
						echo h('Denegado');
					} else {
						echo h('Pendiente');
					}
				?>
			</td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('action' => 'verInspeccion', $local['Calificacion']['id'], 2),array('class'=>'view')); ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	<?php if(empty($talleres) && empty($locales)) : ?>
	<div class="no-hay-inspecciones">
		<h3 class='message'><?php echo __('No tiene inspecciones asignadas actualmente'); ?></h3>		
	</div>
	<?php endif; ?>	
</div>