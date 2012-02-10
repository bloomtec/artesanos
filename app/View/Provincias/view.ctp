<div class="provincias view">
<h2><?php  echo __('Provincia');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($provincia['Provincia']['pro_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($provincia['Provincia']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($provincia['Provincia']['modified']); ?>
			&nbsp;
		</h3>	
</div>
<div class="provincias related">
	<?php $cantones = $this -> requestAction('/cantones/getCantones/'.$provincia['Provincia']['id']); ?>
	<table>
		<caption>Cantones Relacionados</caption>
		<tr><th>Nombre</th><th>Acciones</th></tr>
		<?php foreach($cantones as $key => $canton) : ?>
			<tr>
				<td><?php echo $canton['Canton']['can_nombre']; ?></td>
				<td class="actions">
					<a href="/cantones/view/<?php echo $canton['Canton']['id']; ?>" class="view">Ver</a>
					<a href="/cantones/edit/<?php echo $canton['Canton']['id']; ?>" class="edit">Editar</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('controller' => 'geograficos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Provincia'), array('action' => 'edit', $provincia['Provincia']['id'])); ?> </li>
	</ul>
</div>