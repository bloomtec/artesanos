<style>
#calificacion{
	width:750px;
	margin: 0 auto;
	font-size:13px;
	font-family: Arial, Helvetica, sans-serif;
}
h1{
	text-align:center;

	font-size:40px;
}
h2{

	font-size:20px;
}
h3{
	text-align: right;
	padding-right: 10px;
}
.center{
	text-align: center;
}
p{
	text-align:center;
	margin-top:50px;
}
.bold{
	font-weight: bold;
}
.imprimir.bottom{
	background: url("../img/icono_imprimir.png") no-repeat scroll 0 0 transparent;
    cursor: pointer;
    float: left;
    font-size: 18px;
    font-weight: bold;
    height: 38px;
    left: 0;
    line-height: 62px;
    padding-bottom: 17px;
    padding-left: 55px;
    position: fixed;
    text-transform: uppercase;
    top: 50%;
    vertical-align: middle;
}

h4{
	margin-top:80px;
	font-size:30px;
	text-align: center;
}
h5{
	font-size:30px;
}
</style>
<div id="calificacion">
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