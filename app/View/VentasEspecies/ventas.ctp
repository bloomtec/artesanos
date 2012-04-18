<div class="ventasEspecies ventas">
    <h2><?php echo __('Facturas de ventas');?></h2>
    <table cellpadding="0" cellspacing="0">
    <tr>
        <th># Factura</th>
        <th>Comprobante</th>
        <th>Artesano</th>
        <th>Cantidad especies vendidas</th>
        <td>Detalle</td>
        <th class="actions"><?php echo __('Acciones');?></th>
    </tr>
   <?php for($i=0; $i<count($ventasEspecies); $i++) { ?>
     <tr>
        <td><?php echo $ventasEspecies[$i]["Factura"]["fac_numero"]; ?></td>
        <td><?php echo $ventasEspecies[$i]["Factura"]["fac_comprobante_deposito"]; ?></td>
        <td><?php echo $ventasEspecies[$i]["Artesano"]["art_cedula"]; ?></td>
        <td><?php echo $ventasEspecies[$i]["VentasEspecie"]["ven_cantidad"]; ?></td>
        <td>&nbsp;</td>
    </tr>
    <?php } ?>
</div>