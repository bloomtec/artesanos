<?php
	if(
		   $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Feriados', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'TiposEspeciesValoradas', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'CentrosArtesanales', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'JuntasProvinciales', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Personas', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Proveedores', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Titulos', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'index')))
		|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Instructores', 'index')))
	) :
?>
<li class="parametros">
	<a href="#">PARAMETROS</a>
	<ul>
		<?php
			if(
				$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'TiposEspeciesValoradas', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'CentrosArtesanales', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'JuntasProvinciales', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Personas', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Proveedores', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Titulos', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'index')))
				|| $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Instructores', 'index')))
			) :
		?>
		<li>
			<a href="#">Mantenimientos</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index')))) : ?>
				<li>
					<a href="/grupos_de_ramas">Grupos de ramas</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'add')))) : ?>
						<li>
							<a href="/grupos_de_ramas/add">Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'index')))) : ?>
				<li>
					<a href="/ramas">Ramas</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'add')))) :
						?>
						<li>
							<a href="/ramas/add">Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'TiposEspeciesValoradas', 'index')))) : ?>
				<li>
					<a href="/tipos_especies_valoradas">Tipos de especies valoradas</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'TiposEspeciesValoradas', 'add')))) : ?>
						<li>
							<a href="/tipos_especies_valoradas/add">Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'CentrosArtesanales', 'index')))) : ?>
				<li>
					<a href="/centros_artesanales">Centros Artesanales</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'CentrosArtesanales', 'add')))) : ?>
						<li>
							<a href="/centros_artesanales/add">Agregar</a>
						</li>
						<?php endif;?>
					</ul>					
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'index')))) : ?>
				<li>
					<a href="/items"> Activos y Suministros </a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Items', 'add')))) : ?>
						<li>
							<a href="/items/add">Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'JuntasProvinciales', 'index')))) : ?>
				<li>
					<a href="/juntas_provinciales">Juntas Provinciales</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'JuntasProvinciales', 'add')))) : ?>
						<li>
							<a href="/juntas_provinciales/add"> Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Personas', 'index')))) : ?>
				<li>
					<a href="/personas">Personas</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Personas', 'add')))) : ?>
						<li>
							<a href="/personas/add"> Agregar</a>
						</li>
						<?php endif;?>
					</ul>					
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Proveedores', 'index')))) : ?>
				<li>
					<a href="/proveedores">Proveedores</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Proveedores', 'add')))) : ?>
						<li>
							<a href="/proveedores/add"> Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Titulos', 'index')))) : ?>
				<li>					
					<a href="/titulos"> Titulos</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Titulos', 'add')))) : ?>
						<li>
							<a href="/titulos/add"> Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'index')))) : ?>
				<li>
					<a href="/alumnos"> Alumnos</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Alumnos', 'add')))) : ?>
						<li>
							<a href="/alumnos/add"> Agregar</a>
						</li>
						<?php endif;?>
					</ul>					
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Instructores', 'index')))) : ?>
				<li>					
					<a href="/instructores"> Instructores</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Instructores', 'add')))) : ?>
						<li>
							<a href="/instructores/add"> Agregar</a>
						</li>
						<?php endif;?>
					</ul>					
				</li>
				<?php endif;?>
			</ul>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))) : ?>
		<li>
			<a href="/parametros_informativos">Campos Parametrizables</a>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))) : ?>
		<li>
			<a href="#">Geográficos</a>
			<ul>
				<li>
					<a href="/provincias">Provincias</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'add')))) :
						?>
						<li>
							<a href="/provincias/add">agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<li>
					<a href="/cantones">Cantones</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'add')))) :
						?>
						<li>
							<a href="/cantones/add">agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<li>
					<a href="/ciudades">Ciudades</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'add')))) :
						?>
						<li>
							<a href="/ciudades/add">agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<li>
					<a href="/sectores">Sectores</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'add')))) :
						?>
						<li>
							<a href="/sectores/add">agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<li>
					<a href="/parroquias">Parroquias</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'add')))) :
						?>
						<li>
							<a href="/parroquias/add">agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
			</ul>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))) : ?>
		<li>
			<a href="/configuraciones">Configuraciones</a>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Feriados', 'index')))) : ?>
		<li>
			<a href="/feriados">Feriados</a>
		</li>
		<?php endif;?>
	</ul>
</li>
<?php endif;?>