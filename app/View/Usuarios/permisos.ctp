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
				<th class="nombre">Grupos De Ramas</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Grupos De Ramas.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Grupos De Ramas.add', array('label' => 'Agregar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">JUNTAS PROVINCIALES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.JuntasProvinciales.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">PERSONAS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Personas.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">PROVEEDORES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Proveedores.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">ALUMNOS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Alumnos.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">INSTRUCTORES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Instructores.index', array('label' => 'Listar', 'type' => 'checkbox'));?></td>
				<td class="accion"></td>
				<td class="accion"></td>
				<td class="accion"></td>
			</tr>
		</table>
		<h4>REPORTES</h4>
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