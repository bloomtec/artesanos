<div class="gruposDeRamas view">
<h2><?php  echo __('Grupos De Rama');?></h2>
		<label><?php echo __('Gru Nombre'); ?></label>
		<h3>
			<?php echo h($gruposDeRama['GruposDeRama']['gru_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Gru Descipcion'); ?></label>
		<h3>
			<?php echo h($gruposDeRama['GruposDeRama']['gru_descipcion']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modified'); ?></label>
		<h3>
			<?php echo h($gruposDeRama['GruposDeRama']['modified']); ?>
			&nbsp;
		</h3>
</div>
<div class="gruposDeRamas related">
	<table>
		<caption>Ramas Relacionados</caption>
		<tr><th>Nombre</th><th>Acciones</th></tr>
		<?php foreach($ramas as $key => $rama) : ?>
			<tr>
				<td><?php echo $rama['Rama']['ram_nombre']; ?></td>
				<td class="actions">
					<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'view')))) : ?>
					<a href="/ramas/view/<?php echo $rama['Rama']['id']; ?>" class="view">Ver</a>
					<?php endif; ?>
					<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'edit')))) : ?>
					<a href="/ramas/edit/<?php echo $rama['Rama']['id']; ?>" class="edit">Editar</a>
					<?php endif; ?>
					<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'delete')))) : ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'valores', 'action' => 'delete', $rama['Rama']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $rama['Rama']['id'])); ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Grupo De Rama'), array('action' => 'edit', $gruposDeRama['GruposDeRama']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Añadir Rama'), array('controller' => 'ramas', 'action' => 'add', $gruposDeRama['GruposDeRama']['id'])); ?> </li>
	</ul>
</div>