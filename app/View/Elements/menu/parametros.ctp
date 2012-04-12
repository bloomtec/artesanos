<?php
if(
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index'))) ||
$this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))
) :

?>
<li class="parametros">
	<a href="/pages/display/parametros">PARAMETROS</a>
	<ul>
		
		<li>
			<a href="#">Mantenimientos</a>
			<ul>
				<li>
					<a href="/centros_artesanales">Centros Artesanales</a>
					<ul>
						<li>
							<a href="/centros_artesanales/add">Agregar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/items"> Activos y Suministros </a>
					<ul>
						<li>
							<a href="/items/add">Agregar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/tipos_especies_valoradas">Tipos  de Especie Valoradas</a>
					<ul>
						<!--<li>
							<a href="/tipos_especies_valoradas/add">Agregar</a>
						</li>-->
					</ul>
				</li>
				<li>
					<a href="/juntas_provinciales">Juntas Provinciales</a>
					<ul>
						<li>
							<a href="/juntas_provinciales/add"> Agregar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/personas">Personas</a>
					<ul>
						<li>
							<a href="/personas/add"> Agregar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/proveedores">Proveedores</a>
					<ul>
						<li>
							<a href="/proveedores/add"> Agregar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/titulos"> Titulos</a>
					<ul>
						<li>
							<a href="/titulos/add"> Agregar</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="/alumnos"> Alumnos</a>
					<ul>
						<li>
							<a href="/alumnos/add"> Agregar</a>
						</li>
					</ul>
				<li>
					<a href="/instructores"> Instructores</a>
					<ul>
						<li>
							<a href="/instructores/add"> Agregar</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'ParametrosInformativos', 'index')))) :
		?>
		<li>
			<a href="/parametros_informativos">Campos Parametrizables</a>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Geograficos', 'index')))) :
		?>
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
						<?php endif; ?>
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
						<?php endif; ?>
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
						<?php endif; ?>
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
						<?php endif; ?>
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
						<?php endif; ?>
					</ul>
				</li>
			</ul>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'index')))) :
		?>
		<li>
			<a href="/configuraciones">Configuraciones</a>
		</li>
		<?php endif;?>
		<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index'))) || $this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'index')))) :
		?>
		<li>
			<a href="/ramas">Ramas</a>
			<ul>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'index')))) :
				?>
				<li>
					<a href="/grupos_de_ramas">Grupos de ramas</a>
					<ul>
						<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'GruposDeRamas', 'add')))) :
						?>
						<li>
							<a href="/grupos_de_ramas/add">Agregar</a>
						</li>
						<?php endif;?>
					</ul>
				</li>
				<?php endif;?>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ramas', 'index')))) :
				?>
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
			</ul>
		</li>
		<?php endif;?>
		<li>
			<a href="/feriados">Feriados</a>
		</li>
	</ul>
</li>
<?php endif;?>