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
?>
<div id="content">
	<?php echo $this -> Html -> css('styles'); ?>
	<?php 
		echo $this -> Html -> script('jquery');
		echo $this -> Html -> script('jquery.tools.min');
		echo $this -> Html -> script('bjs');
		echo $this -> Html -> script('default');
		echo $this -> Html -> script('jquery.meio.mask');
			echo $this -> Html -> script('jquery.dateentry.min');
		echo $this -> Html -> script('common');
			
	?>
	<?php echo $this -> Session -> flash('auth'); ?>
	<?php echo $this -> Session -> flash(); ?>
	<?php echo $content_for_layout; ?>
</div>	