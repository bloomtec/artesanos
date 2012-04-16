<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Asignar Permisos Usuario');?></h2>
		<br />
		<br />
		<h3>MODULOS</h3>
		<?php echo $this -> Form -> input('id');?>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">USUARIOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Usuarios.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Usuarios.view', array('label' => 'Ver', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Usuarios.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Usuarios.edit', array('label' => 'Editar', 'type' => 'checkbox'));?></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">ARTESANOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Artesanos.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Artesanos.agregarArtesano', array('label' => 'Registrar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Artesanos.add', array('label' => 'Calificar', 'type' => 'checkbox'));?></td>
				<td class="info">
					<p style="text-align: left;">
						Los permisos correspondientes a la inspección de la calificación son asignados automaticamente
						a los usuarios con rol de inspector
					</p>
				</td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">CALIFICACIONES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Calificaciones.view', array('label' => 'Ver', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Calificaciones.imprimir', array('label' => 'Imprimir', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Calificaciones.modificarCalificacion', array('label' => 'Modificar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
			</tr>
		</table>
		<h3>PARAMETROS</h3>
		<table class="permisos">
			<caption>MANTENIMIENTOS</caption>
			<tr class="modulo">
				<th class="nombre">GRUPOS DE RAMAS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.GruposDeRamas.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.GruposDeRamas.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">RAMAS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Ramas.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Ramas.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">TIPOS DE ESPECIES VALORADAS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.TiposEspeciesValoradas.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.TiposEspeciesValoradas.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">CENTROS ARTESANALES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.CentrosArtesanales.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.CentrosArtesanales.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">ACTIVOS FIJOS Y SUMINISTROS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Items.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Items.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">JUNTAS PROVINCIALES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.JuntasProvinciales.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.JuntasProvinciales.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">PERSONAS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Personas.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Personas.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">PROVEEDORES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Proveedores.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Proveedores.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">TITULOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Titulos.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Titulos.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">ALUMNOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Alumnos.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Alumnos.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr class="modulo">
				<th class="nombre">INSTRUCTORES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Instructores.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Mantenimientos.Instructores.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<caption>CAMPOS PARAMETRIZABLES</caption>
			<tr class="modulo">
				<th class="nombre">INFORMATIVOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Informativos.ParametrosInformativos.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Informativos.ParametrosInformativos.view', array('label' => 'Ver', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Informativos.ParametrosInformativos.modificar', array('label' => 'Modificar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
			</tr>
		</table>
		<h3>REPORTES</h3>
		<table class="permisos">
			<tr class="modulo">
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.artesanos', array('label' => 'Artesanos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.calificaciones_operador', array('label' => 'Calificaciones Por Operador', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.calificaciones_artesano', array('label' => 'Calificaciones Por Artesano', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.inspecciones', array('label' => 'Inspecciones', 'type' => 'checkbox'));?></td>
			</tr>
			<tr class="modulo">
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.artesanos', array('label' => 'Activos Fijos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.calificaciones_operador', array('label' => 'Suministros', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>