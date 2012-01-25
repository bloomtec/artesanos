<div class="certificados view">
<h2><?php  echo __('Certificado');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($certificado['Certificado']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Certificado'), array('action' => 'edit', $certificado['Certificado']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Certificado'), array('action' => 'delete', $certificado['Certificado']['id']), null, __('Are you sure you want to delete # %s?', $certificado['Certificado']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Certificados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Certificado'), array('action' => 'add')); ?> </li>
	</ul>
</div>
