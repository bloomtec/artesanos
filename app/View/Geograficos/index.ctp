<style>
table tr td{
	vertical-align: top;
}
</style>
<div class="info-geografica">
	<table class="info-geografica-conglomerado">
		<caption>Parámetros Geográficos</caption>
		<tr>
			<td>
				<table class="info-geografica-provincias">
					<caption>Provincias</caption>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($provincias as $key => $provincia) : ?>
						<tr class="fila-provincia">
							<td><?php echo $provincia['Provincia']['pro_nombre']; ?></td>
							<td class="actions">
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'view')))) : ?>
								<a href="/provincias/view/<?php echo $provincia['Provincia']['id']; ?>" class="view" title='Ver'>Ver</a>
								<?php endif; ?>
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'edit')))) : ?>
								<a href="/provincias/edit/<?php echo $provincia['Provincia']['id']; ?>" class="edit" title="Modificar" >Editar</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Provincias', 'add')))) : ?>
				<a href="/provincias/add" class="cancelar">Añadir Provincia</a>
				<?php endif; ?>
			</td>
			<td>
				<table class="info-geografica-cantones">
					<caption>Cantones</caption>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($cantones as $key => $canton) : ?>
						<tr class="fila-canton">
							<td><?php echo $canton['Canton']['can_nombre']; ?></td>
							<td class="actions">
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'view')))) : ?>
								<a href="/cantones/view/<?php echo $canton['Canton']['id']; ?>" class="view" title="Ver">Ver</a>
								<?php endif; ?>
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'edit')))) : ?>
								<a href="/cantones/edit/<?php echo $canton['Canton']['id']; ?>" class="edit" title="Modificar">Editar</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Cantones', 'add')))) : ?>
				<a href="/cantones/add" class="cancelar">Añadir Canton</a>
				<?php endif; ?>
			</td>
			<td>
				<table class="info-geografica-ciudades">
					<caption>Ciudades</caption>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($ciudades as $key => $ciudad) : ?>
						<tr class="fila-ciudad">
							<td><?php echo $ciudad['Ciudad']['ciu_nombre']; ?></td>
							<td class="actions">
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'view')))) : ?>
								<a href="/ciudades/view/<?php echo $ciudad['Ciudad']['id']; ?>" class="view" title="Ver">Ver</a>
								<?php endif; ?>
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'edit')))) : ?>
								<a href="/ciudades/edit/<?php echo $ciudad['Ciudad']['id']; ?>" class="edit" title="Modificar">Editar</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Ciudades', 'add')))) : ?>
				<a href="/ciudades/add" class="cancelar">Añadir Ciudad</a>
				<?php endif; ?>
			</td>
			<td>
				<table class="info-geografica-sectores">
					<caption>Sectores</caption>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($sectores as $key => $sector) : ?>
						<tr class="fila-sector">
							<td><?php echo $sector['Sector']['sec_nombre']; ?></td>
							<td class="actions">
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'view')))) : ?>
								<a href="/sectores/view/<?php echo $sector['Sector']['id']; ?>" class="view" title="Ver">Ver</a>
								<?php endif; ?>
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'edit')))) : ?>
								<a href="/sectores/edit/<?php echo $sector['Sector']['id']; ?>" class="edit" title="Modificar">Editar</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Sectores', 'add')))) : ?>
				<a href="/sectores/add" class="cancelar">Añadir Sector</a>
				<?php endif; ?>
			</td>
			<td>
				<table class="info-geografica-parroquias">
					<caption>Parroquias</caption>
					<tr>
						<th>Nombre</th>
						<th>Acciones</th>
					</tr>
					<?php foreach ($parroquias as $key => $parroquia) : ?>
						<tr class="fila-parroquia">
							<td><?php echo $parroquia['Parroquia']['par_nombre']; ?></td>
							<td class="actions">
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'view')))) : ?>
								<a href="/parroquias/view/<?php echo $parroquia['Parroquia']['id']; ?>" class="view" title='Ver'>Ver</a>
								<?php endif; ?>
								<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'edit')))) : ?>
								<a href="/parroquias/edit/<?php echo $parroquia['Parroquia']['id']; ?>" class="edit" title='Modificar'>Editar</a>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<?php if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Parroquias', 'add')))) : ?>
				<a href="/parroquias/add" class="cancelar">Añadir Parroquia</a>
				<?php endif; ?>
			</td>
		</tr>
	</table>
</div>