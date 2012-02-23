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
		echo $this -> Html -> css('styles');

		echo $this -> Html -> script('jquery');
		echo $this -> Html -> script('jquery.tools.min');
		echo $this -> Html -> script('bjs');
		echo $this -> Html -> script('default');
		echo $this -> Html -> script('common');
		echo $scripts_for_layout;
		?>
		<script type="text/javascript">
			$(function(){
				$('.imprimir').click(function(){
					
					window.print();
				});
			});
		</script>
		<style>
			   div.breakhere {page-break-before: always}
		</style>
	</head>
	<body>
		<div id="container">
	
			<div id="content">
				<div class="imprimir top"> imprimir </div>
				<?php echo $content_for_layout;?>
				<div class="imprimir bottom"> imprimir </div>
				<div class="volver bottom"> <?php echo $this -> Html -> link('volver',array('controller'=>'pages','action'=>'display','home'));?> </div>
			</div>
		</div>
		<?php echo $this -> element('sql_dump');?>
	</body>
</html>
