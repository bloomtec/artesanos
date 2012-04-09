<div id="header">
	<a class="logo" href="/pages/display/home"><img src="/img/logo_header.png" /></a> 
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
	<div class='menu-container'>	
	<?php echo $this -> element('menu');?>
	</div>
	<div style="clear: both;"></div>
</div>