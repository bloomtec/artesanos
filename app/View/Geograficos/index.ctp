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
								<a href="/provincias/view/<?php echo $provincia['Provincia']['id']; ?>" class="view">Ver</a>
								<a href="/provincias/edit/<?php echo $provincia['Provincia']['id']; ?>" class="edit">Editar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<a href="/provincias/add" class="cancelar">Añadir Provincia</a>
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
								<a href="/cantones/view/<?php echo $canton['Canton']['id']; ?>" class="view">Ver</a>
								<a href="/cantones/edit/<?php echo $canton['Canton']['id']; ?>" class="edit">Editar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<a href="/cantones/add" class="cancelar">Añadir Canton</a>
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
								<a href="/ciudades/view/<?php echo $ciudad['Ciudad']['id']; ?>" class="view">Ver</a>
								<a href="/ciudades/edit/<?php echo $ciudad['Ciudad']['id']; ?>" class="edit">Editar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<a href="/ciudades/add" class="cancelar">Añadir Ciudad</a>
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
								<a href="/sectores/view/<?php echo $sector['Sector']['id']; ?>" class="view">Ver</a>
								<a href="/sectores/edit/<?php echo $sector['Sector']['id']; ?>" class="edit">Editar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<a href="/sectores/add" class="cancelar">Añadir Sector</a>
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
								<a href="/parroquias/view/<?php echo $parroquia['Parroquia']['id']; ?>" class="view">Ver</a>
								<a href="/parroquias/edit/<?php echo $parroquia['Parroquia']['id']; ?>" class="edit">Editar</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</table>
				<a href="/parroquias/add" class="cancelar">Añadir Parroquia</a>
			</td>
		</tr>
	</table>
</div>