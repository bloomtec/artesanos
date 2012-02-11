<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<?php $legend = ($action == 'add' || $action == 'admin_add')? 'Agregar' : 'Modificar'; ?>
<div class="<?php echo $pluralVar;?> form">
<?php echo "<?php echo \$this->Form->create('{$modelClass}');?>\n";?>
	<fieldset>
		<h2><?php printf("<?php echo __('%s %s'); ?>", $legend, $singularHumanName); ?></h2>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				switch($field){
					case "verified_email":
					case "is_active":
						if($action == 'add'){
							echo "\t\techo \$this->Form->input('{$field}',array('checked'=>true));\n";
						}else{
							echo "\t\techo \$this->Form->input('{$field}');\n";
						}
					break;
					default:
						echo "\t\techo \$this->Form->input('{$field}');\n";
					break;
				}	
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	echo "<?php echo \$this->Html->link(__('Cancelar'),array('action'=>'index'),array('class'=>'cancelar'));?>\n";
	echo "<?php echo \$this->Form->end(__('Guardar'));?>\n";
?>
</div>