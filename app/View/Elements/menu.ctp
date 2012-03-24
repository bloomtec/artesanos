<div id="main-menu">
	<!-- <a class="logo" href="/"><img src="/img/logo_menu.png" /></a> -->
	<ul>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'index')))) : ?>
		<li class="usuarios">
			<a href="/usuarios">USUARIOS</a>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Usuarios', 'add')))) : ?>
			<ul>
				<li>
					<a href="/usuarios/add">Agregar</a>
				</li>
			</ul>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'index')))) : ?>
		<li class="artesanos">
			<a href="/artesanos">ARTESANOS</a>
			<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Artesanos', 'add')))) : ?>
			<ul>
				<li>
					<a href="/artesanos/add">Calificar</a>
				</li>
			</ul>
			<?php endif; ?>
		</li>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Calificaciones', 'inspecciones'))) &&
				$this -> Session -> read('Auth.User.rol_id') == 3
			) :
		?>
		<li class="inspectores">
			<a href="/calificaciones/inspecciones/<?php echo $this -> Session -> read('Auth.User.id'); ?>">INSPECCIONES</a>
		</li>
		<?php endif; ?>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
			) :
		?>
		<li class="parametros">
			<a href="/pages/display/parametros">PARAMETROS</a>
		</li>
		<?php endif; ?>
		<!--
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Auditorias', 'index')))) : ?>
		<li class="auditorias">
			<a href="/auditorias">AUDITORIAS</a>
		</li>
		<?php endif; ?>
		-->
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano'))) ||
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))
			) :
		?>
		<li class="reportes">
			<a href="#">REPORTES</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteArtesanos')))) : ?>
				<li>
					<a href="/reportes/reporteArtesanos">Artesanos</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesOperador')))) : ?>
				<li>
					<a href="/reportes/reporteCalificacionesOperador">Calificaciones Operador</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteCalificacionesArtesano')))) : ?>
				<li>
					<a href="/reportes/reporteCalificacionesArtesano">Calificaciones Artesano</a>
				</li>
				<?php endif; ?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Reportes', 'reporteInspecciones')))) : ?>
				<li>
					<a href="/reportes/reporteInspecciones">Inspecciones</a>
				</li>
				<?php endif; ?>
				
				<li>
					<a href="/ingresosDeInventarios/reporteIngresosInventarios">Ingresos inventarios</a>
				</li>
				
				<li>
					<a href="/EgresosDeInventarios/reporteEgresosInventarios">Egresos inventarios</a>
				</li>
				
			</ul>
		</li>
		<?php endif; ?>
		
		
		
		<li class="inventarios">
			<a href="#">INVENTARIOS</a>
			<ul>
				<li> 
					<a href="#">Mantenimientos</a>
					<ul>
						<li>
							<a href="/personas">Personas</a>
						</li>
						<li>
							<a href="/proveedores">Proveedores</a>
						</li>
					</ul>	
				</li>
				<li> <a href="/items/indexActivosFijos">Activos Fijos </a>
					<ul>
						<li>
							<a href="/items/agregarActivoFijo">Agregar</a>
						</li>
						<li>
							<a href="/items/egresoActivoFijo">Egresar</a>
						</li>
					</ul>
				</li>
				<li> <a href="#">Suministros y Materiales </a></li>
			</ul>
			
		</li>
		
		<li class="capacitaciones last">
			<a href="#">CAPACITACIONES</a>
			<ul>
				<li> <a href="/solicitudes"> Mantenimientos</a> 
					<ul>
						<li> <a href="/alumnos"> Alumnos</a> 
						<li> <a href="/instructores"> Instructores</a> 
					</ul>	
				</li>
				<li> <a href="/solicitudes"> Solicitudes</a> 
					<ul>
						<li> <a href="/solicitudes/add"> Agregar</a> 
					</ul>	
				</li>
				<li> <a href="/cursos"> Cursos</a> 
					<ul>
						<li><a href="/cursos/add"> Agregar</a> </li>
					</ul>	
				</li>
			</ul>
		</li>
		
	</ul>
</div>