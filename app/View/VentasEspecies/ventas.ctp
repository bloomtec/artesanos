<div class="ventasEspecies ventas">
    <h2><?php echo __('Facturas de ventas');?></h2>
    <div class="search">
        <label>BUSCAR:</label>
        <input type="text" />
        <input type="button" class="submit search-generic" value="Search" />
    </div>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th>Factura</th>
        <th>Comprobante</th>
        <th>Artesano</th>
        <th>Cantidad</th>
        <th>Detalles</th>
        <th>Total</th>
        <th class="actions"><?php echo __('Acciones');?></th>
    </tr>
   <?php for($i=0; $i<count($ventasEspecies); $i++) { ?>
     <tr>
        <td><?php echo $ventasEspecies[$i]["Factura"]["fac_numero"]; ?></td>
        <td><?php echo $ventasEspecies[$i]["Factura"]["fac_comprobante_deposito"]; ?></td>
        <td><?php echo $ventasEspecies[$i]["Artesano"]["art_cedula"]; ?></td>
        <td><?php echo $ventasEspecies[$i]["VentasEspecie"]["ven_cantidad"]; ?></td>
        <td>
            <?php
            foreach($ventasEspecies[$i]["EspeciesValorada"] as $especieValorada) {
                echo "<li>".$especieValorada["nombre_especie"]." (".$especieValorada["id"].") - Valor Unitario: <b>".$especieValorada["valor_unitario"]."</b></li>";
            }
            ?>
        </td>
        <td><?php echo $ventasEspecies[$i]["VentasEspecie"]["ven_valor"]; ?></td>
        <td><?php echo $this->Html->link(__('Generar factura'), array('action' => 'factura', $ventasEspecies[$i]["VentasEspecie"]['factura_id']),array('class'=>'calificar','title'=>'Factura')); ?></td>
    </tr>
    <?php } ?>
   </table>
</div>