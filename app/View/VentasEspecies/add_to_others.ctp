<style>
	.form form, table {
		width: 100%;
	}
	table tr td {
		vertical-align: top;
		padding: 20px 0;
	}
	table tr td td {
		height: auto;
		padding: 5px 0;
	}
	input {
		width: 50%;
	}
</style>
<div class="ventasEspecies form">
	<?php echo $this -> Form -> create('VentasEspecie');?>
	<?php echo $this -> element('factura');?>
	<div class='especie'>
		<table id="ventasEspeciesValoradas" >
			<tr>
				<th style='width:40%;'>Tipo Especie valorda</th>
				<th style='width:10%;'>Cantidad</th>
				<th style='width:50%;'>Artesanos</th>
			</tr>
			<?php
$i=0;
foreach($tiposEspeciesValorada as $tiposEspecie):
			?>
			<tr>
				<td>
				<p style='text-align: left;'>
					<?php echo $tiposEspecie['TiposEspeciesValorada']['tip_nombre']
					?>
					<?php echo $this -> Form -> hidden('EspeciesValorada.' . $i . '.tipos_especies_valorada_id', array('value' => $tiposEspecie['TiposEspeciesValorada']['id']));?>
				</p></td>
				<td row='<?php echo $i;?>'><?php
				$totales = array();
				for ($j = 0; $j <= $tiposEspecie['TiposEspeciesValorada']['total_especies_para_vender']; $j += 1) {
					$totales[$j] = $j;
				}
				//debug($tiposEspecie);
				?>
				<?php
				if (count($totales) > 1) {
					echo $this -> Form -> input('EspeciesValorada.' . $i . '.cantidad', array('div' => false, 'label' => false, 'class' => 'cantidad', "options" => $totales, 'value' => 0));
				} else {
					echo $this -> Form -> hidden('EspeciesValorada.' . $i . '.cantidad', array('div' => false, 'label' => false, 'class' => 'cantidad', "options" => $totales, 'value' => 0));
					echo 'No hay especies disponibles';
				}
				?></td>
				<td>
				<table>
					<?php  for($k=1; $k<50; $k++):
					?>
					<tr row='<?php echo $i;?>'  style='display:none;'>
						<td row="<?php echo $k;?>"><?php echo $this -> Form -> input('EspeciesValorada.' . $i . '.Artesanos.' . $k, array('disabled' => true, 'class' => 'cedula', 'placeHolder' => 'cedula', 'fila' => $i, 'row' => $k, 'label' => false, 'div' => false, 'style' => 'display:none;'));?>
						<?php echo $this -> Form -> hidden('EspeciesValorada.' . $i . '.Artesanos.' . $k, array('disabled' => true, 'class' => 'cedula', 'placeHolder' => 'cedula', 'fila' => $i, 'row' => $k, 'label' => false, 'div' => false));?></td>
						<td row="<?php echo $k;?>"></td>
					</tr>
					<?php endfor;?>
				</table></td>
			</tr>
			<?php
			$i++;
			endforeach;
			?>
		</table>
	</div>
	<?php echo $this -> Form -> end('Guardar');?>
</div>
<script type="text/javascript">
	$(function() {
		$('.cantidad').change(function() {
			$that = $(this);
			$inputs = $that.parent().next().find('input');
			cantidad = parseInt($that.val());
			row = 0;
			$.each($inputs, function(i, val) {
				row = parseInt($(val).attr('row'));
				if(row > cantidad) {
					$(val).val('').hide().attr('disabled', true).parent().parent().hide();
				} else {
					$(val).show().removeAttr('disabled').parent().show().parent().show();
				}
			});
		});
		$('.cedula').blur(function() {
			var $that = $(this);
			if($that.val()) {
				BJS.JSON('/artesanos/getDatosPersonales/' + $that.val(), {}, function(datosPersonales) {
					if(datosPersonales) {
						$('input[type="hidden"][row="' + $that.attr('row') + '"][fila="' + $that.attr('fila') + '"]').val(datosPersonales.Artesano.id);
						$('input[type="hidden"][row="' + $that.attr('row') + '"][fila="' + $that.attr('fila') + '"]').parent().next().text(datosPersonales.Artesano.art_nombres);
					} else {
						alert('el artesano no esta registrado');
						$('input[type="hidden"][row="' + $that.attr('row') + '"]').val('');
						$that.focus();
					}

				});
			}
		});
		switch($('#VentasEspecieUsuIsCedula').val()) {
			case "0":
				// PASAPORTE
				$('#FacturaFacRucDoc').setMask({
					mask : '*',
					type : 'repeat'
				}).val();
				break;
			case "1":
				// CEDULA
				$('#FacturaFacRucDoc').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
		$('#VentasEspecieUsuIsCedula').change(function(){
			switch($('#VentasEspecieUsuIsCedula').val()) {
			case "0":
				// PASAPORTE
				$('#FacturaFacRucDoc').setMask({
					mask : '*',
					type : 'repeat'
				}).val();
				break;
			case "1":
				// CEDULA
				$('#FacturaFacRucDoc').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
			}
		});
		$('#VentasEspecieAddToOthersForm').submit(function(e) {
			switch($('#VentasEspecieUsuIsCedula').val()) {
			case "0":
				// PASAPORTE
				
				break;
			case "1":
				// CEDULA
				if(checkRucCiEcuador($("#FacturaFacRucDoc").val())) {

				} else {
					e.preventDefault();
				}
				break;
			}
		});
	});

</script>