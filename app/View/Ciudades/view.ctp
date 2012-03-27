<div class="ciudades view">
<h2><?php  echo __('Ciudad');?></h2>
		<label><?php echo __('Canton'); ?></label>
		<h3>
			<?php echo $this->Html->link($ciudad['Canton']['can_nombre'], array('controller' => 'cantones', 'action' => 'view', $ciudad['Canton']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($ciudad['Ciudad']['ciu_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($ciudad['Ciudad']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($ciudad['Ciudad']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<!--
<div class="ciudades related">
	<?php $sectores = $this -> requestAction('/sectores/getSectores/'.$ciudad['Ciudad']['id']); ?>
	<table>
		<caption>Sectores Relacionados</caption>
		<tr><th>Nombre</th><th>Acciones</th></tr>
		<?php foreach($sectores as $key => $sector) : ?>
			<tr>
				<td><?php echo $sector['Sector']['sec_nombre']; ?></td>
				<td class="actions">
					<a href="/sectores/view/<?php echo $sector['Sector']['id']; ?>" class="view">Ver</a>
					<a href="/sectores/edit/<?php echo $sector['Sector']['id']; ?>" class="edit">Editar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
-->
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'Provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Ciudad'), array('action' => 'edit', $ciudad['Ciudad']['id'])); ?> </li>
	</ul>
</div>