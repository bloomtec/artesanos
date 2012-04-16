<?php if(!isset($ingresos)) : ?>
	
<div class="reportes form">
	<?php echo $this -> Form -> create('VentasEspecie');?>
	<h2><?php echo __('Reporte ventas de especies'); ?></h2>
	<fieldset>
		<?php
		echo $this -> Form -> input('fecha_inicio', array('value' => $fechaActual, 'type' => 'text', 'label' => 'Fecha Inicio', 'class' => 'date'));
		echo $this -> Form -> input('fecha_fin', array('value' => $fechaActual, 'type' => 'text', 'label' => 'Fecha Fin', 'class' => 'date'));
		?>
	</fieldset>
	<?php echo $this -> Form -> submit('Buscar');?> 
	<?php echo $this -> Form -> end();?>
</div>
<?php endif; ?>
<?php if(isset($ingresos)) : ?>
<br />
<br />
<h2><?php echo __('Reporte ventas de especies');?></h2>
<table id="TablaReporteVenta">
	<tr>
		<th class="col-num-fac">No. Factura</th>
		<th class="col-detalle">Detalle</th>
		<th class="col-rangos">Rangos De Series</th>
		<th class="col-cantidad">Cantidad</th>
		<th class="col-valor">Precio Unitario</th>
		<th class="col-valor">Valor Total</th>
		<th class="col-nombres">Nombres</th>
		<th class="col-ruc-doc">R.U.C./C.I.</th>
		<th class="col-tel">Teléfono</th>
		<!--<th class="actions"><?php echo __('Acciones'); ?></th>-->
	</tr>
	<?php foreach($ingresos as $key => $ingreso) : ?>
	<tr>
		<td><?php echo $ingreso['Factura']['fac_numero']; ?></td>
		<td class="col-detalle">
			<?php
				$nombres = array();
				$tipoEspecieId = 0;
				foreach($ingreso['EspeciesValorada'] as $llaveEspecie => $especieValorada) {
					if($tipoEspecieId != $especieValorada['tipos_especies_valorada_id']) {
						$tipoEspecieId = $especieValorada['tipos_especies_valorada_id'];
						$nombres[] = $especieValorada['nombre_especie'];
					}
				}
			?>
			<br />
			<?php
				foreach($nombres as $llaveNombre => $nombre) :
			?>
			<?php echo $nombre; ?><br /><?php if($llaveNombre < count($nombres) - 1) : ?><br /><?php endif; ?>
			<?php	
				endforeach;
			?>
			<br />
		</td>
		<td><!-- columna rango -->
			<?php
				if(count($ingreso['EspeciesValorada']) == 1) {
					echo $ingreso['EspeciesValorada'][0]['esp_serie'];
				} else {
					$especies = array();
					$llaveEspecies = 0;
					$tipoEspecieId = 0;
					$llaveRangos = 0;
					$tmpRango = 0;
					foreach($ingreso['EspeciesValorada'] as $llaveEspecie => $especieValorada) {
						if($tipoEspecieId != $especieValorada['tipos_especies_valorada_id']) {
							$tipoEspecieId = $especieValorada['tipos_especies_valorada_id'];
							$especies[$llaveEspecies] = array('rangos' => array());
							$llaveEspecies += 1;
							$llaveRangos = 0;
							$tmpRango = $especieValorada['esp_serie'];
							$especies[$llaveEspecies - 1]['rangos'][$llaveRangos] = $tmpRango . ' - ' . $tmpRango;
						} else {
							$tmpRango1 = $tmpRango + 1;
							$tmpRango2 = $especieValorada['esp_serie'];
							if($tmpRango1 == $tmpRango2) { // Número siguiente
								$dato = explode(' - ', $especies[$llaveEspecies - 1]['rangos'][$llaveRangos]);
								$especies[$llaveEspecies - 1]['rangos'][$llaveRangos] = $dato[0] . ' - ' . $tmpRango2;
								$tmpRango = $tmpRango2;
							} else { // Nueva secuencia
								$llaveRangos += 1;
								$tmpRango = $tmpRango2;
								$especies[$llaveEspecies - 1]['rangos'][$llaveRangos] = $tmpRango2 . ' - ' . $tmpRango2;
							}
						}
					}
			?>
			<br />
			<br />
			<?php
					foreach($especies as $llaveEspecie => $especie) :
						//echo '<br />';
						if(count($especie['rangos']) == 1) {
							echo $especie['rangos'][0];
						} else {
							foreach($especie['rangos'] as $llaveRango => $rango) :
			?>
			<?php
								
				 				if($llaveRango < count($especie['rangos']) - 1) {
				 					echo $rango.';&nbsp;';
				 				} else {
				 					echo $rango;
				 				}
			?>
			<?php
							endforeach;
						}
						echo '<br /><br />';
					endforeach;
				}
			?>
			<br />
		</td>
		<td>
			<?php
				$cantidades = array();
				$llaveCantidades = 0;
				$tipoEspecieId = 0;
				foreach($ingreso['EspeciesValorada'] as $llaveEspecie => $especieValorada) {
					if($tipoEspecieId != $especieValorada['tipos_especies_valorada_id']) {
						$tipoEspecieId = $especieValorada['tipos_especies_valorada_id'];
						$cantidades[$llaveCantidades] = 1;
						$llaveCantidades += 1;
					} else {
						$cantidades[$llaveCantidades - 1] += 1;
					}
				}
			?>
			<br />
			<?php
				foreach($cantidades as $llaveCantidad => $cantidad) :
			?>
			<nobr><?php echo $cantidad; ?></nobr><br />
			<?php	
				endforeach;
			?>
			<br />
		</td>
		<td>
			<?php
				//echo $ingreso['VentasEspecie']['ven_valor_unitario'];
				$valores = array();
				$tipoEspecieId = 0;
				foreach($ingreso['EspeciesValorada'] as $llaveEspecie => $especieValorada) {
					if($tipoEspecieId != $especieValorada['tipos_especies_valorada_id']) {
						$tipoEspecieId = $especieValorada['tipos_especies_valorada_id'];
						$valores[] = $especieValorada['valor_unitario'];
					}
				}
			?>
			<br />
			<?php
				foreach($valores as $llaveValor => $valor) :
			?>
			<nobr><?php echo $valor; ?></nobr><br />
			<?php	
				endforeach;
			?>
			<br />
		</td>
		<td>
			<?php
				echo $ingreso['VentasEspecie']['ven_valor'];
			?>
		</td>
		<td><?php echo $ingreso['Factura']['fac_cliente']; ?></td>
		<td><?php echo $ingreso['Factura']['fac_ruc_doc']; ?></td>
		<td><?php echo $ingreso['Factura']['fac_telefono']; ?></td>
		<!--<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ingreso['VentasEspecie']['id']),array('class'=>'view','title'=>'Ver')); ?>
		</td>-->
	</tr>
	<?php endforeach; ?>
</table>
<style>
	table#TablaReporteVenta th { vertical-align: middle; }
	table#TablaReporteVenta th.col-num-fac { height: 40px; text-align: justify; width: 80px; }
	table#TablaReporteVenta th.col-detalle { height: 40px; text-align: justify; }
	table#TablaReporteVenta th.col-detalle, table#TablaReporteVenta td.col-detalle { min-width: 300px; }
	table#TablaReporteVenta th.col-valor { height: 40px; text-align: justify; width: 50px; }
	table#TablaReporteVenta th.col-cantidad { height: 40px; text-align: justify; width: 60px; }
	table#TablaReporteVenta th.col-rangos { height: 40px; text-align: left; width: 100px; }
	table#TablaReporteVenta th.col-nombres { height: 40px; text-align: justify; width: 100px; }
	table#TablaReporteVenta th.col-ruc-doc { height: 40px; text-align: justify; width: 114px; }
	table#TablaReporteVenta th.col-tel { height: 40px; text-align: justify; width: 80px; }
</style>
<!--<table>
	<tr>
		<th><?php echo $this -> Paginator -> sort('created', 'Fecha'); ?></th>
		<th>Numero de factura</th>
		<th>Cliente</th>
		<th><?php echo $this -> Paginator -> sort('ven_cantidad', 'Cantidad'); ?></th>
		<th><?php echo $this -> Paginator -> sort('ven_valor', 'Valor'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php foreach($ingresos as $key => $ingreso) : ?>
	<tr>
		<td><?php echo $ingreso['VentasEspecie']['created']; ?> </td>
		<td><?php echo $ingreso['Factura']['fac_numero']; ?> </td>
		<td><?php echo $ingreso['Factura']['fac_cliente']; ?></td>
		
		<td><?php echo $ingreso['VentasEspecie']['ven_cantidad']; ?></td>
		<td><?php echo $ingreso['VentasEspecie']['ven_valor']; ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $ingreso['VentasEspecie']['id']),array('class'=>'view','title'=>'Ver')); ?>
		</td>
	</tr>
	<?php debug($ingreso); endforeach; ?>
</table>-->

	<div class="paging">
	<!--<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, mostrando {:current} registro de {:count} totales, comenzando en el registro record {:start}, hasta el registro {:end}')
	));
	?>	</p>-->
	<?php
		echo $this->Paginator->first('<< ', array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Siguiente') . ' >', array(), null, array('class' => 'next disabled'));
		echo $this->Paginator->last('>> ', array(), null, array('class' => 'next disabled'));
	?>
	</div>
<div class="actions">
	<a class='button' href="/ventas_especies/reporte">Volver</a>
	&nbsp;
	<a class='button' href="/ventas_especies/imprimirReporte">Descargar pdf</a>
	&nbsp;
	<!--<a class='button' href="/ventas_especies/export_csv">Exportar a CSV</a>
	&nbsp;-->
</div>
<?php endif; ?>