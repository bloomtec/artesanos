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
<div class="<?php echo $pluralVar;?> view">
<h2><?php echo "<?php  echo __('{$singularHumanName}');?>";?></h2>
<?php
foreach ($fields as $field) {
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t\t<label><?php echo __('" . Inflector::humanize(Inflector::underscore($alias)) . "'); ?></label>\n";
				echo "\t\t<h3>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t\t&nbsp;\n\t\t</h3>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		if($field == 'is_active'){
			echo "\t\t<label><?php echo __('Activo'); ?></label>\n";
			echo "\t\t<?php if(\${$singularVar}['{$modelClass}']['{$field}']){ ?> \n";
			echo "\t\t\t <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> \n";
			echo "\t\t <?php }else{ ?> \n";
			echo "\t\t\t <input type='checkbox' disabled='true' class='checkbox'/>\n";
			echo "\t\t <?php } ?>\n";
			echo "\t\t<h3>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</h3>\n";
		}else{
			if(!in_array($field, array('id','created','updated'))){
			echo "\t\t<label><?php echo __('" . Inflector::humanize($field) . "'); ?></label>\n";
			echo "\t\t<h3>\n\t\t\t<?php echo h(\${$singularVar}['{$modelClass}']['{$field}']); ?>\n\t\t\t&nbsp;\n\t\t</h3>\n";
			}
		}
	}
}
?>
	
</div>
<div class="actions">
	<ul>
<?php
	echo "\t\t<li><?php echo \$this->Html->link(__('Volver " . $pluralHumanName . "'), array('action' => 'index')); ?> </li>\n";
	echo "\t\t<li><?php echo \$this->Html->link(__('Modificar " . $singularHumanName ."'), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?> </li>\n";
?>
	</ul>
</div>