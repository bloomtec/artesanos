<div class="cantones view">
<h2><?php  echo __('Canton');?></h2>
		<label><?php echo __('Provincia'); ?></label>
		<h3>
			<?php echo $this->Html->link($canton['Provincia']['pro_nombre'], array('controller' => 'provincias', 'action' => 'view', $canton['Provincia']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($canton['Canton']['can_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($canton['Canton']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($canton['Canton']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="cantones related">
	<?php $ciudades = $this -> requestAction('/ciudades/getCiudades/'.$canton['Canton']['id']); ?>
	<table>
		<caption>Ciudades Relacionadas</caption>
		<tr><th>Nombre</th><th>Acciones</th></tr>
		<?php foreach($ciudades as $key => $ciudad) : ?>
			<tr>
				<td><?php echo $ciudad['Ciudad']['ciu_nombre']; ?></td>
				<td class="actions">
					<a href="/ciudades/view/<?php echo $ciudad['Ciudad']['id']; ?>" class="view">Ver</a>
					<a href="/ciudades/edit/<?php echo $ciudad['Ciudad']['id']; ?>" class="edit">Editar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'Provincias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Canton'), array('action' => 'edit', $canton['Canton']['id'])); ?> </li>
	</ul>
</div>