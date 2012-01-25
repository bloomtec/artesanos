<div class="locales view">
<h2><?php  echo __('Local');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($local['Local']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pichincha'); ?></dt>
		<dd>
			<?php echo h($local['Local']['pichincha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Canton'); ?></dt>
		<dd>
			<?php echo h($local['Local']['canton']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ciudad'); ?></dt>
		<dd>
			<?php echo h($local['Local']['ciudad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parroquia'); ?></dt>
		<dd>
			<?php echo h($local['Local']['parroquia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Calle O Avenida'); ?></dt>
		<dd>
			<?php echo h($local['Local']['calle_o_avenida']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($local['Local']['numero']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Interseccion'); ?></dt>
		<dd>
			<?php echo h($local['Local']['interseccion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Barrio'); ?></dt>
		<dd>
			<?php echo h($local['Local']['barrio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono Celular'); ?></dt>
		<dd>
			<?php echo h($local['Local']['telefono_celular']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Telefono Convencional'); ?></dt>
		<dd>
			<?php echo h($local['Local']['telefono_convencional']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Referencia'); ?></dt>
		<dd>
			<?php echo h($local['Local']['referencia']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($local['Local']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Artesano'); ?></dt>
		<dd>
			<?php echo $this->Html->link($local['Artesano']['nombres'], array('controller' => 'artesanos', 'action' => 'view', $local['Artesano']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($local['Local']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($local['Local']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Local'), array('action' => 'edit', $local['Local']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Local'), array('action' => 'delete', $local['Local']['id']), null, __('Are you sure you want to delete # %s?', $local['Local']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artesanos'), array('controller' => 'artesanos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artesano'), array('controller' => 'artesanos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aprendices'), array('controller' => 'aprendices', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aprendiz'), array('controller' => 'aprendices', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Balances'), array('controller' => 'balances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Balance'), array('controller' => 'balances', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipos'), array('controller' => 'equipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipo'), array('controller' => 'equipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inspecciones'), array('controller' => 'inspecciones', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inspeccion'), array('controller' => 'inspecciones', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Materiales'), array('controller' => 'materiales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materiales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Productos'), array('controller' => 'productos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trabajadores'), array('controller' => 'trabajadores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trabajador'), array('controller' => 'trabajadores', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Aprendices');?></h3>
	<?php if (!empty($local['Aprendiz'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Operario'); ?></th>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Fecha De Ingreso'); ?></th>
		<th><?php echo __('Afiliado Seguro'); ?></th>
		<th><?php echo __('Edad'); ?></th>
		<th><?php echo __('Pago Mensual'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($local['Aprendiz'] as $aprendiz): ?>
		<tr>
			<td><?php echo $aprendiz['id'];?></td>
			<td><?php echo $aprendiz['operario'];?></td>
			<td><?php echo $aprendiz['cedula'];?></td>
			<td><?php echo $aprendiz['fecha_de_ingreso'];?></td>
			<td><?php echo $aprendiz['afiliado_seguro'];?></td>
			<td><?php echo $aprendiz['edad'];?></td>
			<td><?php echo $aprendiz['pago_mensual'];?></td>
			<td><?php echo $aprendiz['taller_id'];?></td>
			<td><?php echo $aprendiz['local_id'];?></td>
			<td><?php echo $aprendiz['created'];?></td>
			<td><?php echo $aprendiz['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aprendices', 'action' => 'view', $aprendiz['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aprendices', 'action' => 'edit', $aprendiz['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aprendices', 'action' => 'delete', $aprendiz['id']), null, __('Are you sure you want to delete # %s?', $aprendiz['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aprendiz'), array('controller' => 'aprendices', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Balances');?></h3>
	<?php if (!empty($local['Balance'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Domicilio Propio'); ?></th>
		<th><?php echo __('Domicilio Valor'); ?></th>
		<th><?php echo __('Taller Propio'); ?></th>
		<th><?php echo __('Taller Valor'); ?></th>
		<th><?php echo __('Servicios Basicos'); ?></th>
		<th><?php echo __('Salario Operarios'); ?></th>
		<th><?php echo __('Salario Aprendices'); ?></th>
		<th><?php echo __('Total Egresos'); ?></th>
		<th><?php echo __('Maquinaria Y Herramientas'); ?></th>
		<th><?php echo __('Materia Prima'); ?></th>
		<th><?php echo __('Elaborados'); ?></th>
		<th><?php echo __('Otros Ingresos'); ?></th>
		<th><?php echo __('Total Ingresos'); ?></th>
		<th><?php echo __('Rentabilidad Mensual'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($local['Balance'] as $balance): ?>
		<tr>
			<td><?php echo $balance['id'];?></td>
			<td><?php echo $balance['domicilio_propio'];?></td>
			<td><?php echo $balance['domicilio_valor'];?></td>
			<td><?php echo $balance['taller_propio'];?></td>
			<td><?php echo $balance['taller_valor'];?></td>
			<td><?php echo $balance['servicios_basicos'];?></td>
			<td><?php echo $balance['salario_operarios'];?></td>
			<td><?php echo $balance['salario_aprendices'];?></td>
			<td><?php echo $balance['total_egresos'];?></td>
			<td><?php echo $balance['maquinaria_y_herramientas'];?></td>
			<td><?php echo $balance['materia_prima'];?></td>
			<td><?php echo $balance['elaborados'];?></td>
			<td><?php echo $balance['otros_ingresos'];?></td>
			<td><?php echo $balance['total_ingresos'];?></td>
			<td><?php echo $balance['rentabilidad_mensual'];?></td>
			<td><?php echo $balance['taller_id'];?></td>
			<td><?php echo $balance['local_id'];?></td>
			<td><?php echo $balance['created'];?></td>
			<td><?php echo $balance['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'balances', 'action' => 'view', $balance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'balances', 'action' => 'edit', $balance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'balances', 'action' => 'delete', $balance['id']), null, __('Are you sure you want to delete # %s?', $balance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Balance'), array('controller' => 'balances', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Equipos');?></h3>
	<?php if (!empty($local['Equipo'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Maquinaria Y Herramientas'); ?></th>
		<th><?php echo __('Tipo De Adquisicion'); ?></th>
		<th><?php echo __('Fecha De Adquisicion'); ?></th>
		<th><?php echo __('Valor Comercial'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($local['Equipo'] as $equipo): ?>
		<tr>
			<td><?php echo $equipo['id'];?></td>
			<td><?php echo $equipo['cantidad'];?></td>
			<td><?php echo $equipo['maquinaria_y_herramientas'];?></td>
			<td><?php echo $equipo['tipo_de_adquisicion'];?></td>
			<td><?php echo $equipo['fecha_de_adquisicion'];?></td>
			<td><?php echo $equipo['valor_comercial'];?></td>
			<td><?php echo $equipo['local_id'];?></td>
			<td><?php echo $equipo['taller_id'];?></td>
			<td><?php echo $equipo['created'];?></td>
			<td><?php echo $equipo['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'equipos', 'action' => 'view', $equipo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'equipos', 'action' => 'edit', $equipo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'equipos', 'action' => 'delete', $equipo['id']), null, __('Are you sure you want to delete # %s?', $equipo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Equipo'), array('controller' => 'equipos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Inspecciones');?></h3>
	<?php if (!empty($local['Inspeccion'])):?>
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
		foreach ($local['Inspeccion'] as $inspeccion): ?>
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
<div class="related">
	<h3><?php echo __('Related Materiales');?></h3>
	<?php if (!empty($local['Material'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Tipo De Materia Prima'); ?></th>
		<th><?php echo __('Procedencia'); ?></th>
		<th><?php echo __('Valor Comercial'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($local['Material'] as $material): ?>
		<tr>
			<td><?php echo $material['id'];?></td>
			<td><?php echo $material['cantidad'];?></td>
			<td><?php echo $material['tipo_de_materia_prima'];?></td>
			<td><?php echo $material['procedencia'];?></td>
			<td><?php echo $material['valor_comercial'];?></td>
			<td><?php echo $material['local_id'];?></td>
			<td><?php echo $material['taller_id'];?></td>
			<td><?php echo $material['created'];?></td>
			<td><?php echo $material['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'materiales', 'action' => 'view', $material['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'materiales', 'action' => 'edit', $material['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'materiales', 'action' => 'delete', $material['id']), null, __('Are you sure you want to delete # %s?', $material['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Material'), array('controller' => 'materiales', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Productos');?></h3>
	<?php if (!empty($local['Producto'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Detalle'); ?></th>
		<th><?php echo __('Procedencia'); ?></th>
		<th><?php echo __('Valor Comercial'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($local['Producto'] as $producto): ?>
		<tr>
			<td><?php echo $producto['id'];?></td>
			<td><?php echo $producto['cantidad'];?></td>
			<td><?php echo $producto['detalle'];?></td>
			<td><?php echo $producto['procedencia'];?></td>
			<td><?php echo $producto['valor_comercial'];?></td>
			<td><?php echo $producto['taller_id'];?></td>
			<td><?php echo $producto['local_id'];?></td>
			<td><?php echo $producto['created'];?></td>
			<td><?php echo $producto['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'productos', 'action' => 'view', $producto['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'productos', 'action' => 'edit', $producto['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'productos', 'action' => 'delete', $producto['id']), null, __('Are you sure you want to delete # %s?', $producto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Producto'), array('controller' => 'productos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trabajadores');?></h3>
	<?php if (!empty($local['Trabajador'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Operario'); ?></th>
		<th><?php echo __('Cedula'); ?></th>
		<th><?php echo __('Fecha De Ingreso'); ?></th>
		<th><?php echo __('Afiliado Seguro'); ?></th>
		<th><?php echo __('Edad'); ?></th>
		<th><?php echo __('Pago Mensual'); ?></th>
		<th><?php echo __('Taller Id'); ?></th>
		<th><?php echo __('Local Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($local['Trabajador'] as $trabajador): ?>
		<tr>
			<td><?php echo $trabajador['id'];?></td>
			<td><?php echo $trabajador['operario'];?></td>
			<td><?php echo $trabajador['cedula'];?></td>
			<td><?php echo $trabajador['fecha_de_ingreso'];?></td>
			<td><?php echo $trabajador['afiliado_seguro'];?></td>
			<td><?php echo $trabajador['edad'];?></td>
			<td><?php echo $trabajador['pago_mensual'];?></td>
			<td><?php echo $trabajador['taller_id'];?></td>
			<td><?php echo $trabajador['local_id'];?></td>
			<td><?php echo $trabajador['created'];?></td>
			<td><?php echo $trabajador['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trabajadores', 'action' => 'view', $trabajador['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trabajadores', 'action' => 'edit', $trabajador['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trabajadores', 'action' => 'delete', $trabajador['id']), null, __('Are you sure you want to delete # %s?', $trabajador['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Trabajador'), array('controller' => 'trabajadores', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
