<?php 
	if(
		$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Calificaciones', 'inspecciones')))
		&& $this -> Session -> read('Auth.User.rol_id') == 3
	) : 
?>
<li class="inspectores">
	<a href="/calificaciones/inspecciones/<?php echo $this -> Session -> read('Auth.User.id');?>">INSPECCIONES</a>
</li>
<?php endif;?>