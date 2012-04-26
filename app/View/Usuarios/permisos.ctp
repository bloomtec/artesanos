<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Asignar Permisos Usuario');?></h2>
		<p style="text-align: left;">
			Los permisos correspondientes a la inspección de la calificación son asignados automaticamente
			a los usuarios con rol de inspector
		</p>
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
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Artesanos.add', array('title' => 'Actualmente habilitado de manera global', 'label' => 'Calificar', 'type' => 'checkbox', 'checked' => 'checked', 'disabled' => 'disabled'));?></td>
				<td class="accion"></td>
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
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">ACTIVOS FIJOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.ActivosFijos.indexActivosFijos', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.ActivosFijos.agregarActivoFijo', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>			
			</tr>
			<tr>
				<th class="nombre"></th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.ActivosFijos.asignarActivoFijo', array('label' => 'Asignar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.ActivosFijos.desasignarActivoFijo', array('label' => 'Desasignar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.ActivosFijos.traspasoActivoFijo', array('label' => 'Traspaso', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">SUMINISTROS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Suministros.indexSuministros', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Suministros.agregarSuministro', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Suministros.deleteSuministro', array('label' => 'Egresar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>			
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">CAPACITACIONES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Solicitudes.index', array('label' => 'Listar Solicitudes', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Solicitudes.view', array('label' => 'Ver Solicitudes', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Solicitudes.add', array('label' => 'Agregar Solicitud', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Solicitudes.revision', array('label' => 'Aprovar/Rechazar Solicitud', 'type' => 'checkbox'));?></td>
			</tr>
			<tr class="modulo">
				<th class="nombre"></th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Cursos.index', array('label' => 'Listar Cursos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Cursos.view', array('label' => 'Ver Cursos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Cursos.edit', array('label' => 'Editar Cursos', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>			
			</tr>
			<tr class="modulo">
				<th class="nombre"></th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Cursos.verAlumnos', array('label' => 'Ver Alumnos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Cursos.ingresarCalificaciones', array('label' => 'Ingresar Calificaciones', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>			
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">TITULACIONES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.SolicitudesTitulaciones.index', array('label' => 'Listar Solicitudes', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.SolicitudesTitulaciones.view', array('label' => 'Ver Solicitudes', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.SolicitudesTitulaciones.add', array('label' => 'Agregar Solicitud', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.SolicitudesTitulaciones.refrendar', array('label' => 'Refrendar', 'type' => 'checkbox'));?></td>
			</tr>			
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">ESPECIES VALORADAS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.IngresosEspecies.index', array('label' => 'Listar Ingresos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.IngresosEspecies.view', array('label' => 'Ver Ingresos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.IngresosEspecies.add', array('label' => 'Realizar Ingreso', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
			</tr>
			<tr>
				<th class="nombre"></th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.VentasEspecies.add', array('label' => 'Vender A Un Artesano', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.VentasEspecies.addToOthers', array('label' => 'Vender A Otros', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>			
		</table>
		<!-- SECCIÓN DE PARÁMETROS Y MANTENIMIENTOS -->
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
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Informativos.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Informativos.view', array('label' => 'Ver', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Informativos.modificar', array('label' => 'Modificar', 'type' => 'checkbox'));?></td>
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
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.activos_fijos', array('label' => 'Activos Fijos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.suministros', array('label' => 'Suministros', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
			<tr>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.capacitaciones', array('label' => 'Capacitaciones', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.titulaciones', array('label' => 'Titulaciones', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.especies', array('label' => 'Especies Valoradas', 'type' => 'checkbox'));?></td>
			</tr>
		</table>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>