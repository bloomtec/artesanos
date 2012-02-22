<div class="contenedor-parametros">
	<!-- the tabs -->
	<ul class="tabs">
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))) : ?>
		<li>
			<a href="#">INFORMATIVOS</a>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))) : ?>
		<li>
			<a href="#">GEOGRÁFICOS</a>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))) : ?>
		<li>
			<a href="#">CRON JOBS</a>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index')))) : ?>
		<li>
			<a href="#">GRUPOS DE RAMAS</a>
		</li>
		<?php endif; ?>
		<li>
			<a href="#">FERIADOS</a>
		</li>
	</ul>
	<!-- tab "panes" -->
	<div class="panes">
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))) : ?>
		<div>
			<iframe src="/parametros_informativos"></iframe>
		</div>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))) : ?>
		<div>
			<iframe src="/geograficos"></iframe>
		</div>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))) : ?>
		<div>
			<iframe src="/configuraciones"></iframe>
		</div>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index')))) : ?>
		<div>
			<iframe src="/grupos_de_ramas"></iframe>
		</div>
		<?php endif; ?>
		<div>
			<iframe src="/feriados"></iframe>
		</div>
	</div>
</div>
<script type="text/javascript">
	$("ul.tabs").tabs("div.panes > div");
</script>