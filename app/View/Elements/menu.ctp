<div id="main-menu">
	<ul>
		<?php 
			echo $this -> element('menu/usuarios');
		?>
		<?php 
			echo $this -> element('menu/artesanos');
		?>
		<?php 
			echo $this -> element('menu/parametros');
		?>
		<?php 
			echo $this -> element('menu/inventarios');
		?>
		<?php 
			echo $this -> element('menu/capacitaciones');
		?>
		<?php 
			//echo $this -> element('menu/especies');
		?>
	</ul>
</div>
<script type="text/javascript">
	$(function(){
		var menuFirstLevel=$('#main-menu > ul > li');
		menuFirstLevel.last().addClass('last').prev().addClass('last');
	});
</script>