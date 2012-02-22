<div class="parametrosInformativos view">
<h2><?php  echo __('Parámetro Informativo');?></h2>
		<label><?php echo __('Nombre'); ?></label>
		<h3>
			<?php echo h($parametrosInformativo['ParametrosInformativo']['par_nombre']); ?>
			&nbsp;
		</h3>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?> </li>
	</ul>
</div>
<div class="parametrosInformativos related">
	<table>
		<caption>Valores Relacionados</caption>
		<tr><th>Nombre</th><th>Acciones</th></tr>
		<?php foreach($valores as $key => $valor) : ?>
			<tr>
				<td><?php echo $valor['Valor']['val_nombre']; ?></td>
				<td class="actions">
					<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Valores', 'view')))) : ?>
					<a href="/valores/view/<?php echo $valor['Valor']['id']; ?>" class="view">Ver</a>
					<?php endif; ?>
					<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Valores', 'edit')))) : ?>
					<a href="/valores/edit/<?php echo $valor['Valor']['id']; ?>" class="edit">Editar</a>
					<?php endif; ?>
					<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Valores', 'delete')))) : ?>
					<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'valores', 'action' => 'delete', $valor['Valor']['id']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', $valor['Valor']['id'])); ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver'), array('action' => 'index')); ?> </li>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Valores', 'add')))) : ?>
		<li><?php echo $this->Html->link(__('Agregar Valor'), array('controller' => 'valores', 'action' => 'add', $parametrosInformativo['ParametrosInformativo']['id'])); ?> </li>
		<?php endif; ?>
	</ul>
</div>