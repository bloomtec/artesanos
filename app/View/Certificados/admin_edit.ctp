<div class="certificados form">
<?php echo $this->Form->create('Certificado');?>
	<fieldset>
		<legend><?php echo __('Admin Edit Certificado'); ?></legend>
	<?php
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Certificado.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Certificado.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Certificados'), array('action' => 'index'));?></li>
	</ul>
</div>
