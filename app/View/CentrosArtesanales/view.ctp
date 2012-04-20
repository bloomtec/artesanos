<div class="centrosArtesanales view">
<h2><?php  echo __('Centros Artesanal');?></h2>
		<label><?php echo __('Rama Id'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['rama_id']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Ruc'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_ruc']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Nombre'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $centrosArtesanal['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $centrosArtesanal['Canton']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $centrosArtesanal['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Parroquia'); ?></label>
		<h3>
			<?php echo $this->Html->link($centrosArtesanal['Parroquia']['par_nombre'], array('controller' => 'parroquias', 'action' => 'view', $centrosArtesanal['Parroquia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Direccion'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['direccion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['modified']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Sostenimiento'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_sostenimiento']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Tipo'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_tipo']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Fecha Periodo Inicial'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_fecha_periodo_inicial']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Fecha Periodo Final'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_fecha_periodo_final']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Modalidad'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_modalidad']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Lenguaje'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_lenguaje']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Condiciones Local'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_condiciones_local']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Costo Mensual Local'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_costo_mensual_local']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Nombre Del Director'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_nombre_del_director']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Numero Aulas Talleres'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_numero_aulas_talleres']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Dimension Total Area Pedagogica'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_dimension_total_area_pedagogica']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Estado Area Pedagogica'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_estado_area_pedagogica']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Baterias Sanitarias'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_baterias_sanitarias']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Lavabos'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_lavabos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Duchas'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_duchas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Estado Area Servicios'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_estado_area_servicios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Dimension Total Area Servicios'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_dimension_total_area_servicios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Patios'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_patios']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Canchas'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_canchas']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Areas Verdes'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_areas_verdes']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Otras Areas Recreacion'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_otras_areas_recreacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Estado Areas Recreacion'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_estado_areas_recreacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Cen Dimension Total Area Recreacion'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['cen_dimension_total_area_recreacion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Observaciones'); ?></label>
		<h3>
			<?php echo h($centrosArtesanal['CentrosArtesanal']['observaciones']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Centros Artesanales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Centros Artesanal'), array('action' => 'edit', $centrosArtesanal['CentrosArtesanal']['id'])); ?> </li>
	</ul>
</div>