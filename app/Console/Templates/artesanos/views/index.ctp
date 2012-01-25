<?php
/**
 *
 * PHP 5
 *
 * EZ CMS : The easiest CMS
 * Copyright 2011, Bloom web company. (http://bloomweb.co)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2011,  Bloom web company. (http://bloomweb.co)
 * @link          http://bloomwebcompany.co 
  */
?>
<div class="<?php echo $pluralVar;?> index">
	<h2><?php echo "<?php echo __('{$pluralHumanName}');?>";?></h2>
	<div class="search">
		<label>BUSCAR:</label>
		<input type="text" />
		<input type="button" class="submit search-generic" value="Search" />
	</div>
	<table cellpadding="0" cellspacing="0">
	<tr>
	<?php if(in_array('is_active',$fields)): ?>
		<th class="actions"><?php echo "<?php echo __('Activo');?>";?></th>
	<?php endif; ?>
	<?php  foreach ($fields as $field):?>
		<?php if(!in_array($field, array('id','is_active'))): ?>
		<th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>";?></th>
		<?php endif; ?>
	<?php endforeach;?>
		<th class="actions"><?php echo "<?php echo __('Actions');?>";?></th>
	</tr>
	<?php
	echo "<?php
	\$i = 0;
	foreach (\${$pluralVar} as \${$singularVar}): ?>\n";
	echo "\t<tr>\n";
		if(in_array('is_active',$fields)){// columana activa de primera
			echo "\t\t<td>\n";
			echo "\t\t\t<?php if(\${$singularVar}['{$modelClass}']['{$field}']){ ?> \n";
			echo "\t\t\t\t <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> \n";
			echo "\t\t\t <?php }else{ ?> \n";
			echo "\t\t\t\t <input type='checkbox' disabled='true' class='checkbox'/>\n";
			echo "\t\t\t <?php } ?>\n";
			echo "\t\t</td>\n";
		}	
		foreach ($fields as $field) {
			$isKey = false;
			if (!empty($associations['belongsTo'])) {
				foreach ($associations['belongsTo'] as $alias => $details) {
					if ($field === $details['foreignKey']) {
						$isKey = true;
						echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
						break;
					}
				}
			}
			if ($isKey !== true) {
				if(!in_array($field, array('id','is_active'))){
				echo "\t\t<td><?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>&nbsp;</td>\n";
				}
			}
		}

		echo "\t\t<td class=\"actions\">\n";
		echo "\t\t\t<?php echo \$this->Html->link(__('View'), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'view')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Html->link(__('Edit'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('class'=>'edit')); ?>\n";
	 	echo "\t\t\t<?php echo \$this->Form->postLink(__('Delete'), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']), array('class'=>'delete'), __('Esta seguro que quiere eliminar el registro?', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
		echo "\t\t</td>\n";
	echo "\t</tr>\n";

	echo "<?php endforeach; ?>\n";
	?>
	</table>


	<div class="paging">
	<!--<p>
	<?php echo "<?php
	echo \$this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>";?>
	</p>-->
	<?php
		echo "<?php\n";
		echo "\t\techo \$this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));\n";
		echo "\t\techo \$this->Paginator->numbers(array('separator' => ''));\n";
		echo "\t\techo \$this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));\n";
		echo "\t?>\n";
	?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo "<?php echo \$this->Html->link(__('Agregar " . $singularHumanName . "'), array('action' => 'add')); ?>";?></li>
	</ul>
</div>
