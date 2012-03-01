<div class="usuarios form">
	<?php echo $this -> Form -> create('Usuario');?>
	<fieldset>
		<h2><?php echo __('Asignar Permisos Usuario');?></h2>
		<br />
		<br />
		<caption>
			Modulos Y Acciones Disponibles
		</caption>
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
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Artesanos.add', array('label' => 'Calificar', 'type' => 'checkbox'));?></td>
				<td class="info">
					<p>
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
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">PARAMETROS</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Parametros.edit', array('label' => 'Editar', 'type' => 'checkbox'));?></td>
			</tr>
		</table>
		<table class="permisos">
			<tr class="modulo">
				<th class="nombre">REPORTES</th>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.artesanos', array('label' => 'Artesanos', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.calificaciones_operador', array('label' => 'Calificaciones Por Operador', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.calificaciones_artesano', array('label' => 'Calificaciones Por Artesano', 'type' => 'checkbox'));?></td>
				<td class="accion"><?php echo $this -> Form -> input('Permisos.Reportes.inspecciones', array('label' => 'Inspecciones', 'type' => 'checkbox'));?></td>
			</tr>
		</table>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action' => 'index'), array('class' => 'cancelar button'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<style>
	table.permisos tr.modulo th.nombre {
		width: 100px;
	}
	table.permisos tr.modulo td.accion {
		/*width: 100px;*/
	}
</style>