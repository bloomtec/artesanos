<div class="artesanos index">
	<h2><?php echo __('Artesanos');?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('art_nombres', 'Nombre');?></th>
			<th><?php echo $this -> Paginator -> sort('art_apellido_paterno', 'Apellido Paterno');?></th>
			<th><?php echo $this -> Paginator -> sort('art_apellido_materno', 'Apellido Materno');?></th>
			<th><?php echo $this -> Paginator -> sort('art_nacionalidad', 'Nacionalidad');?></th>
			<th><?php echo $this -> Paginator -> sort('art_cedula', 'Cédula');?></th>
			<!--<th class="actions"><?php echo __('Acciones');?></th>-->
		</tr>
		<?php
			$i = 0;
			foreach ($artesanos as $artesano):
		?>
		<tr>
			<td><?php echo h($artesano['Artesano']['art_nombres']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_apellido_paterno']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_apellido_materno']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_nacionalidad']);?>&nbsp;</td>
			<td><?php echo h($artesano['Artesano']['art_cedula']);?>&nbsp;</td>
			<!--<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $artesano['Artesano']['id']), array('class' => 'view'));?>
				<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $artesano['Artesano']['id']), array('class' => 'edit'));?>
				<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $artesano['Artesano']['id']), array('class' => 'delete'), __('Esta seguro que quiere eliminar el registro?', $artesano['Artesano']['id']));?>
			</td>-->
		</tr>
		<?php endforeach;?>
	</table>
	<div class="paging">
		<!--<p>
		<?php
		echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
		));
		?>	</p>-->
		<?php
		echo $this -> Paginator -> prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('Agregar Artesano'), array('action' => 'add'));?>
		</li>
	</ul>
</div>
