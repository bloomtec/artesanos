<div class="certificados view">
<h2><?php  echo __('Certificado');?></h2>
	
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Certificados'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Certificado'), array('action' => 'edit', $certificado['Certificado']['id'])); ?> </li>
	</ul>
</div>