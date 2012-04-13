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
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Junta Nacional de defensa del artesano');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $this -> Html -> charset();?>
		<title><?php echo $title_for_layout;?></title>
		<?php
			echo $this -> Html -> meta('icon');
			
			echo $this -> Html -> css('tabs-no-images');
			echo $this -> Html -> css('forms-vitrina');
			echo $this -> Html -> css('basic');
			
			echo $this -> Html -> css(' http://www.jnda.gob.ec/templates/ypainc-jnda/css/template.css');
			echo $this -> Html -> css('http://www.jnda.gob.ec/templates/ypainc-jnda/css/joomla.css');
			echo $this -> Html -> css('http://www.jnda.gob.ec/templates/ypainc-jnda/css/layout.css');
			
			echo $this -> Html -> script('jquery');
			echo $this -> Html -> script('jquery.tools.min');
			echo $this -> Html -> script('bjs');
			echo $this -> Html -> script('default');
			echo $this -> Html -> script('common');
			echo $this -> Html -> script('jquery.meio.mask');
			echo $this -> Html -> script('jquery.dateentry.min');
			echo $this -> Html -> script('jquery.simplemodal');
			echo $this -> Html -> script('modal');
			echo $this -> Html -> script('jquery.validate.min');
			
			//echo $this -> Html -> script('jquery.maskedinput-1.2.2');
			
			/*
			echo $this -> Html -> script('jquery.inputmask');
			echo $this -> Html -> script('jquery.inputmask.extentions');
			*/
			echo $scripts_for_layout;
		?>
	</head>
	<body>
		
		<div id="container">
			<div id="content">
				<?php echo $this -> Session -> flash('auth'); ?>
				<?php echo $this -> Session -> flash(); ?>

				<?php echo $content_for_layout; ?>
				
			</div>		
		</div>
	</body>
</html>