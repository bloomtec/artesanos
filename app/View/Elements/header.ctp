<div id="header">
	<a class="logo" href="/"><img src="/img/logo_header.png" /></a>
	<ul id='user-menu'>
		<?php if(!$this -> Session -> read("Auth.User.id")){?>
			<li>
				<?php echo $this -> Html -> link(__('Iniciar Sesión',true),array("controller"=>"users","action"=>"login"),array('class'=>'ajax-login')); ?>
				<?php echo $this -> element('ajax-login'); ?>
			</li>
		<?php }else{?>
			<li><?php echo 'Ha iniciado sesión como <b>' . $this -> Session -> read("Auth.User.username") . '</b> :: ' . $this -> Html -> link(__('Cerrar Sesión',true),array("controller"=>"users","action"=>"logout")); ?></li>
		<?php } ?>
	</ul>
</div>