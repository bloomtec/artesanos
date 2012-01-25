<div class="certificados form">
<?php echo $this->Form->create('Certificado');?>
	<fieldset>
		<legend><?php echo __('Admin Add Certificado'); ?></legend>
	<?php
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Certificados'), array('action' => 'index'));?></li>
	</ul>
</div>
