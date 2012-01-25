<div class="equipos view">
<h2><?php  echo __('Equipo');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['cantidad']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maquinaria Y Herramientas'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['maquinaria_y_herramientas']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tipo De Adquisicion'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['tipo_de_adquisicion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fecha De Adquisicion'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['fecha_de_adquisicion']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Valor Comercial'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['valor_comercial']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Local'); ?></dt>
		<dd>
			<?php echo $this->Html->link($equipo['Local']['id'], array('controller' => 'locales', 'action' => 'view', $equipo['Local']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Taller'); ?></dt>
		<dd>
			<?php echo $this->Html->link($equipo['Taller']['razon_social_o_nombre_comercial'], array('controller' => 'talleres', 'action' => 'view', $equipo['Taller']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($equipo['Equipo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Equipo'), array('action' => 'edit', $equipo['Equipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Equipo'), array('action' => 'delete', $equipo['Equipo']['id']), null, __('Are you sure you want to delete # %s?', $equipo['Equipo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Equipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Equipo'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locales'), array('controller' => 'locales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Local'), array('controller' => 'locales', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Talleres'), array('controller' => 'talleres', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Taller'), array('controller' => 'talleres', 'action' => 'add')); ?> </li>
	</ul>
</div>
