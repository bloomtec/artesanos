<div id="calificaciondd"> 
<?php switch ( $inspeccion['Calificacion']['cal_estado']) { 
	case 1:
?>

	 <?php if($inspeccion['Calificacion']['tipos_de_calificacion_id']==1){
	 			echo $this -> element('especie_normal');
	 		}else{
	 			echo $this -> element('especie_autonomo');
	 		}
	 ?> 
	<?php break; ?>
	<?php default: ?>
	No se puede mostrar la calificación
	<?php break;?>
<?php } ?>
</div>