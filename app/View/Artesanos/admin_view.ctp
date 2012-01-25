<div class="artesanos view">
<h2><?php  echo __('Artesano');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido Paterno'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['apellido_paterno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Apellido Materno'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['apellido_materno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombres'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['nombres']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nacionalidad'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['nacionalidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cedula De Ciudadania'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['cedula_de_ciudadania']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha De Nacimiento'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['fecha_de_nacimiento']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo De Sangre'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['tipo_de_sangre']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estado Civil'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['estado_civil']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Edad'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['edad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Grado De Estudio'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['grado_de_estudio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sexo'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['sexo']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hijos Mayores'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['hijos_mayores']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hijos Menores'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['hijos_menores']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo De Discapacidad'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['tipo_de_discapacidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($artesano['Artesano']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Artesano'), array('action' => 'edit', $artesano['Artesano']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Artesano'), array('action' => 'delete', $artesano['Artesano']['id']), null, __('Are you sure you want to delete # %s?', $artesano['Artesano']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Artesanos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artesano'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Locales');?></h3>
	<?php if (!empty($artesano['Local'])):?>
		<dl>
			<dt><?php echo __('Id');?></dt>
		<dd>
	<?php echo $artesano['Local']['id'];?>
&nbsp;</dd>
		<dt><?php echo __('Pichincha');?></dt>
		<dd>
	<?php echo $artesano['Local']['pichincha'];?>
&nbsp;</dd>
		<dt><?php echo __('Canton');?></dt>
		<dd>
	<?php echo $artesano['Local']['canton'];?>
&nbsp;</dd>
		<dt><?php echo __('Ciudad');?></dt>
		<dd>
	<?php echo $artesano['Local']['ciudad'];?>
&nbsp;</dd>
		<dt><?php echo __('Parroquia');?></dt>
		<dd>
	<?php echo $artesano['Local']['parroquia'];?>
&nbsp;</dd>
		<dt><?php echo __('Calle O Avenida');?></dt>
		<dd>
	<?php echo $artesano['Local']['calle_o_avenida'];?>
&nbsp;</dd>
		<dt><?php echo __('Numero');?></dt>
		<dd>
	<?php echo $artesano['Local']['numero'];?>
&nbsp;</dd>
		<dt><?php echo __('Interseccion');?></dt>
		<dd>
	<?php echo $artesano['Local']['interseccion'];?>
&nbsp;</dd>
		<dt><?php echo __('Barrio');?></dt>
		<dd>
	<?php echo $artesano['Local']['barrio'];?>
&nbsp;</dd>
		<dt><?php echo __('Telefono Celular');?></dt>
		<dd>
	<?php echo $artesano['Local']['telefono_celular'];?>
&nbsp;</dd>
		<dt><?php echo __('Telefono Convencional');?></dt>
		<dd>
	<?php echo $artesano['Local']['telefono_convencional'];?>
&nbsp;</dd>
		<dt><?php echo __('Referencia');?></dt>
		<dd>
	<?php echo $artesano['Local']['referencia'];?>
&nbsp;</dd>
		<dt><?php echo __('Email');?></dt>
		<dd>
	<?php echo $artesano['Local']['email'];?>
&nbsp;</dd>
		<dt><?php echo __('Artesano Id');?></dt>
		<dd>
	<?php echo $artesano['Local']['artesano_id'];?>
&nbsp;</dd>
		<dt><?php echo __('Created');?></dt>
		<dd>
	<?php echo $artesano['Local']['created'];?>
&nbsp;</dd>
		<dt><?php echo __('Modified');?></dt>
		<dd>
	<?php echo $artesano['Local']['modified'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Local'), array('controller' => 'locales', 'action' => 'edit', $artesano['Local']['id'])); ?></li>
			</ul>
		</div>
	</div>
		<div class="related">
		<h3><?php echo __('Related Talleres');?></h3>
	<?php if (!empty($artesano['Taller'])):?>
		<dl>
			<dt><?php echo __('Id');?></dt>
		<dd>
	<?php echo $artesano['Taller']['id'];?>
&nbsp;</dd>
		<dt><?php echo __('Razon Social O Nombre Comercial');?></dt>
		<dd>
	<?php echo $artesano['Taller']['razon_social_o_nombre_comercial'];?>
&nbsp;</dd>
		<dt><?php echo __('Pichincha');?></dt>
		<dd>
	<?php echo $artesano['Taller']['pichincha'];?>
&nbsp;</dd>
		<dt><?php echo __('Canton');?></dt>
		<dd>
	<?php echo $artesano['Taller']['canton'];?>
&nbsp;</dd>
		<dt><?php echo __('Ciudad');?></dt>
		<dd>
	<?php echo $artesano['Taller']['ciudad'];?>
&nbsp;</dd>
		<dt><?php echo __('Parroquia');?></dt>
		<dd>
	<?php echo $artesano['Taller']['parroquia'];?>
&nbsp;</dd>
		<dt><?php echo __('Calle O Avenida');?></dt>
		<dd>
	<?php echo $artesano['Taller']['calle_o_avenida'];?>
&nbsp;</dd>
		<dt><?php echo __('Numero');?></dt>
		<dd>
	<?php echo $artesano['Taller']['numero'];?>
&nbsp;</dd>
		<dt><?php echo __('Interseccion');?></dt>
		<dd>
	<?php echo $artesano['Taller']['interseccion'];?>
&nbsp;</dd>
		<dt><?php echo __('Barrio');?></dt>
		<dd>
	<?php echo $artesano['Taller']['barrio'];?>
&nbsp;</dd>
		<dt><?php echo __('Telefono Celular');?></dt>
		<dd>
	<?php echo $artesano['Taller']['telefono_celular'];?>
&nbsp;</dd>
		<dt><?php echo __('Telefono Convencional');?></dt>
		<dd>
	<?php echo $artesano['Taller']['telefono_convencional'];?>
&nbsp;</dd>
		<dt><?php echo __('Referencia');?></dt>
		<dd>
	<?php echo $artesano['Taller']['referencia'];?>
&nbsp;</dd>
		<dt><?php echo __('Email');?></dt>
		<dd>
	<?php echo $artesano['Taller']['email'];?>
&nbsp;</dd>
		<dt><?php echo __('Artesano Id');?></dt>
		<dd>
	<?php echo $artesano['Taller']['artesano_id'];?>
&nbsp;</dd>
		<dt><?php echo __('Created');?></dt>
		<dd>
	<?php echo $artesano['Taller']['created'];?>
&nbsp;</dd>
		<dt><?php echo __('Modified');?></dt>
		<dd>
	<?php echo $artesano['Taller']['modified'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Taller'), array('controller' => 'talleres', 'action' => 'edit', $artesano['Taller']['id'])); ?></li>
			</ul>
		</div>
	</div>
	<div class="related">
	<h3><?php echo __('Related Inspecciones');?></h3>
	<?php if (!empty($artesano['Inspeccion'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Usuario Id'); ?></th>
		<th><?php echo __('Artesano Id'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($artesano['Inspeccion'] as $inspeccion): ?>
		<tr>
			<td><?php echo $inspeccion['id'];?></td>
			<td><?php echo $inspeccion['usuario_id'];?></td>
			<td><?php echo $inspeccion['artesano_id'];?></td>
			<td><?php echo $inspeccion['taller_id'];?></td>
			<td><?php echo $inspeccion['local_id'];?></td>
			<td><?php echo $inspeccion['created'];?></td>
			<td><?php echo $inspeccion['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'inspecciones', 'action' => 'view', $inspeccion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'inspecciones', 'action' => 'edit', $inspeccion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'inspecciones', 'action' => 'delete', $inspeccion['id']), null, __('Are you sure you want to delete # %s?', $inspeccion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
