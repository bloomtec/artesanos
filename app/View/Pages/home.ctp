<div class="home">
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))) :




	?>
	<div class="home_description" href="/usuarios">
		<h2 class="usuarios"> USUARIOS </h2>
		<p>
			Listado de los usuarios que tienen acceso a esta aplicación.
			<br />
		</p>
		<div class="acciones_home">
			<a href="/usuarios/index">Listado</a>
			<a href="/usuarios/add">Añadir</a>
		</div>
	</div>
	<?php endif?>
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) :
	?>
	<div class="home_description">
		<h2 class="calificar"> Calificar Artesano </h2>
		<p>
			Calificación, Registro o Recalificación de un artesano
		</p>
		<div class="acciones_home">
			<a  href="/artesanos/add">Calificar</a>
		</div>
	</div>
	<?php endif?>
	<?php
if(
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
) :
	?>
	<div class="home_description">
		<h2 class="parametros"> Parametros </h2>
		<p>
			Configuración de los parametros del sistema
		</p>
		<div class="acciones_home">
			<a  href="/pages/display/parametros">Administrar Parametros</a>
		</div>
	</div>
	<?php endif?>
<!--
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Auditorias', 'index')))) :
	?>
	<div class="home_description">
		<h2 class="auditorias"> Auditorias </h2>
		<p>
			Registros de actividades por usuario en el sistema
		</p>
		<div class="acciones_home">
			<a  href="/auditorias"> Ver Auditorias</a>
		</div>
	</div>
	<?php endif?>
-->
	<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))
):
	?>
	<!--
	<div class="home_description">
		<h2 class="reportes"> REPORTES </h2>
		<p>
			Reporte de datos del sistema
			<br />
		</p>
		<div class="acciones_home">
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos')))) :
			?>
			<a href="/reportes/reporteArtesanos">Artesanos</a>
			<?php endif;?>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador')))) :
			?>
			<a href="/reportes/reporteCalificacionesOperador">Calificaciones Operador</a>
			<?php endif;?>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano')))) :
			?>
			<a href="/reportes/reporteCalificacionesArtesano">Calificaciones Artesano</a>
			<?php endif;?>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))) :
			?>
			<a href="/reportes/reporteInspecciones">Inspecciones</a>
			<?php endif;?>
		</div>
		<?php endif;?>
	</div>
	-->
	<?php if($this -> Session -> read('Auth.User.rol_id')==3) :
	?>
	<div class="home_description" >
		<h2 class="inspecciones"> Inspecciones </h2>
		<p>
			Inspecciones que se deben realizar
		</p>
		<div class="acciones_home">
			<a href="/calificaciones/inspecciones/<?php echo $this -> Session -> read('Auth.User.id');?>">Listado</a>
		</div>
	</div>
	<?php endif?>
	<div class="home_description" >
		<h2 class="inventarios"> Inventarios </h2>
		<p>
			Gestión de inventarios de activos fijos y suministros de la JNDA
		</p>
		<div class="acciones_home">
			<a href="/items/indexActivosFijos">Activos Fijos</a>
			<a href="/items//items/indexSuministros">Suministros y Materiales</a>
		</div>
	</div>
	<div class="home_description" >
		<h2 class="capacitaciones"> Capacitaciones </h2>
		<p>
			Solicitudes y Gestion de capacitaiones
		</p>
		<div class="acciones_home">
			<a href="/solicitudes"> Solicitudes</a>
			<a href="/cursos"> Cursos</a>
		</div>
	</div>
	<div class="home_description" >
		<h2 class="titulaciones"> Titulaciones </h2>
		<p>
			Solicitudes, gestión y reportes de Titulos
		</p>
		<div class="acciones_home">
			<a href="/solicitudesTitulaciones/add">Solicitar Titulaciones</a>
			<a href="/solicitudesTitulaciones/reporteSolicitudesTitulacion">Reporte de solicitudes</a>
			<a href="/solicitudesTitulaciones/reporteTitulaciones">Reporte de titulaciones</a>
		</div>
	</div>
	<div class="home_description" >
		<h2 class="especies"> Especies Valoradas </h2>
		<p>
			Gestión de las especies valorada de la JNDA
		</p>
		<div class="acciones_home">
			<a href="/ingresos_especies/add">Ingresar Especies</a>
			<a href="/ventas_especies/add">Egresar Especies</a>
			<a href="/ingresos_especies/reporte">Reporte de ingresos</a>
			<a href="/ventas_especies/reporte">Reporte de egresos</a>
			
			
		</div>
	</div>
</div>