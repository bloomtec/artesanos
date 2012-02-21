<div class="configuraciones index">
	<h2><?php echo __('Parámetros De Configuración');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('con_capital_maximo_de_inversion', 'Capital Máximo De Inversión');?></th>
			<th><?php echo $this -> Paginator -> sort('con_salario_basico_unificado', 'Salario Básico Unificado');?></th>
			<th><?php echo $this -> Paginator -> sort('con_anos_renovacion_artesanos_autonomos', 'Años Para Renovación Artesanos Autónomos');?></th>
			<th><?php echo $this -> Paginator -> sort('con_anos_renovacion_artesanos_normales', 'Años Para Renovación Artesanos Normales');?></th>
			<th><?php echo $this -> Paginator -> sort('con_anos_pasar_de_aprendiz_a_operario', 'Años Para Pasar De Aprendiz A Operario');?></th>
			<th><?php echo $this -> Paginator -> sort('con_anos_operario_se_pueda_calificar', 'Años Para Que Un Operario Se Pueda Calificar');?></th>
			<th class="actions"><?php echo __('Acciones');?></th>
		</tr>
		<?php $i = 0; foreach ($configuraciones as $configuracion):	?>
		<tr>
			<td><?php echo h($configuracion['Configuracion']['con_capital_maximo_de_inversion']);?>&nbsp;</td>
			<td><?php echo h($configuracion['Configuracion']['con_salario_basico_unificado']);?>&nbsp;</td>
			<td><?php echo h($configuracion['Configuracion']['con_anos_renovacion_artesanos_autonomos']);?>&nbsp;</td>
			<td><?php echo h($configuracion['Configuracion']['con_anos_renovacion_artesanos_normales']);?>&nbsp;</td>
			<td><?php echo h($configuracion['Configuracion']['con_anos_pasar_de_aprendiz_a_operario']);?>&nbsp;</td>
			<td><?php echo h($configuracion['Configuracion']['con_anos_operario_se_pueda_calificar']);?>&nbsp;</td>
			<td class="actions">
				<?php
					if($this -> requestAction('/usuarios/verificarAcceso/' , array('ruta'=>array('controllers', 'Configuraciones', 'edit')))) {
						echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $configuracion['Configuracion']['id']), array('class' => 'edit', 'title'=>'Modificar'));
					}
				?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>