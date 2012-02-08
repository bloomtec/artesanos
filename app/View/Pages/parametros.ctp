<div class="contenedor-parametros">
	<!-- the tabs -->
	<ul class="tabs">
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))) : ?>
		<li>
			<a href="#">PARÁMETROS INFORMATIVOS</a>
		</li>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))
			) :
		?>
		<li>
			<a href="#">PARÁMETROS GEOGRÁFICOS</a>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))) : ?>
		<li>
			<a href="#">PARÁMETROS DE CONFIGURACIÓN</a>
		</li>
		<?php endif; ?>
	</ul>
	<!-- tab "panes" -->
	<div class="panes">
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))) : ?>
		<div>
			<iframe src="/parametros_informativos"></iframe>
		</div>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))
			) :
		?>
		<div>
			<iframe src="/geograficos"></iframe>
		</div>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))) : ?>
		<div>
			<iframe src="/configuraciones"></iframe>
		</div>
		<?php endif; ?>
	</div>
</div>
<script type="text/javascript">
	$("ul.tabs").tabs("div.panes > div");

</script>