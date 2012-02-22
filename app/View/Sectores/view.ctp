<div class="sectores view">
<h2><?php  echo __('Sector');?></h2>
		<label><?php echo __('Ciudad'); ?></label>
		<h3>
			<?php echo $this->Html->link($sector['Ciudad']['ciu_nombre'], array('controller' => 'ciudades', 'action' => 'view', $sector['Ciudad']['id'])); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($sector['Sector']['sec_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($sector['Sector']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($sector['Sector']['modified']); ?>
			&nbsp;
		</h3>
	
</div>
<div class="sectores related">
	<?php $parroquias = $this -> requestAction('/parroquias/getParroquias/'.$sector['Sector']['id']); ?>
	<table>
		<caption>Parroquias Relacionadas</caption>
		<tr><th>Nombre</th><th>Acciones</th></tr>
		<?php foreach($parroquias as $key => $parroquia) : ?>
			<tr>
				<td><?php echo $parroquia['Parroquia']['par_nombre']; ?></td>
				<td class="actions">
					<a href="/parroquias/view/<?php echo $parroquia['Parroquia']['id']; ?>" class="view">Ver</a>
					<a href="/parroquias/edit/<?php echo $parroquia['Parroquia']['id']; ?>" class="edit">Editar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'geograficos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Sector'), array('action' => 'edit', $sector['Sector']['id'])); ?> </li>
	</ul>
</div>