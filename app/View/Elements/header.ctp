<div id="header">
	<a class="logo" href="/"><img src="/img/logo_header.png" /></a> 
	<div class='menu-container'>
	<ul id='user-menu'>
		<?php if(!$this -> Session -> read("Auth.User.id")) { ?>
		<li>
			<?php echo $this -> Html -> link(__('Iniciar Sesión', true), array("controller" => "users", "action" => "login"), array('class' => 'ajax-login')); ?>
			<?php echo $this -> element('ajax-login'); ?>
		</li>
		<?php } else { ?>
		<li>
			<?php echo 'Ha iniciado sesión como <b>' . $this -> Session -> read('Auth.User.usu_nombre_de_usuario') . '</b> :: ' . $this -> Html -> link(__('Cerrar Sesión', true), array('controller' => 'usuarios', 'action' => 'logout')); ?>
		</li>
		<?php } ?>
	</ul>
	<div style='clear:both;'></div>
	<?php echo $this -> element('menu');?>
	</div>
</div>