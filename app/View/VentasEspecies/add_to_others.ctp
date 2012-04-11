<style>
	.form form, table {
		width: 100%;
	}
	table tr td td {
		height: auto;
	}
</style>
<div class="ventasEspecies form">
	<?php echo $this -> Form -> create('VentasEspecie');?>
	<div class='especie'>
		<table id="ventasEspeciesValoradas" >
			<tr>
				<th>Tipo Especie valorda</th>
				<th>Cantidad</th>
				<th>Artesanos</th>
			</tr>
			<?php $i=0;
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
					echo $this -> Form -> input('EspeciesValorada.' . $i . '.cantidad', array('div'=>false,'label' => false, 'class' => 'cantidad', "options" => $totales, 'value' => 0));
				} else {
					echo $this -> Form -> hidden('EspeciesValorada.' . $i . '.cantidad', array('div'=>false,'label' => false, 'class' => 'cantidad', "options" => $totales, 'value' => 0));
					echo 'No hay especies disponibles';
				}
				?></td>
				<td><?php  for($k=1; $k<10; $k++):
				?>
				<table>
					<tr row='<?php echo $i;?>'>
						<td row="<?php echo $k;?>">
							<?php echo $this -> Form -> input('EspeciesValorada.' . $i . '.Artesanos.' . $k, array('class' => 'cedula', 'placeHolder' => 'cedula','row'=>$k, 'label' => false, 'div' => false));?>
							<?php echo $this -> Form -> hidden('EspeciesValorada.' . $i . '.Artesanos.' . $k, array('class' => 'cedula', 'placeHolder' => 'cedula','row'=>$k,'label' => false, 'div' => false));?>
						</td>
						<td row="<?php echo $k;?>"> &nbsp; </td>
					</tr>
				</table><?php endfor;?></td>
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
		$('.cantidad').change(function(){
			$that=$(this);
			$inputs=$that.parent().next().find('input');
			console.log($that.val());
			$inputs.val('').show();
			$inputs.filter(':gt(3)').hide();
			
		});
		$('.cedula').blur(function() {
			var $that = $(this);
			if($that.val()) {
				BJS.JSON('/artesanos/getDatosPersonales/' + $that.val(), {}, function(datosPersonales) {
					if(datosPersonales) {
						$('input[type="hidden"][row="'+$that.attr('row')+'"]').val(datosPersonales.Artesano.id);
						$('hi.nombre').text(datosPersonales.Artesano.nombre_completo);
					} else {
						alert('el artesano no esta registrado');
						$('input[type="hidden"][row="'+$that.attr('row')+'"]').val('');
						$that.focus();
					}

				});
			}
		});
	});

</script>