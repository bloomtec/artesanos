//BALANCES
	var actualizarRentabilidad = function(){
		var ingresos = parseFloat($('#CalificacionCalBalanceTotalIngresos').val().replace(/[.]/g,'').replace(',','.'))?parseFloat($('#CalificacionCalBalanceTotalIngresos').val().replace(/[.]/g,'').replace(',','.')):0;
		var egresos = parseFloat($('#CalificacionCalBalanceTotalEgresos').val().replace(/[.]/g,'').replace(',','.'))?parseFloat($('#CalificacionCalBalanceTotalEgresos').val().replace(/[.]/g,'').replace(',','.')):0;
		var total=(ingresos-egresos).toFixed(2);;
		$(".balance_rentabilidad_mensual").val(BJS.formatComma(BJS.formatNumber(total)));

		totalRentabilidad=total;
	}
	/*____________CAPITAL__________________*/
	var actualizarCapital=function(){
		var totalMaquinas = parseFloat($('.maquinas_y_herramientas').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('.maquinas_y_herramientas').val().replace(/[.]/g,'').replace(',','.')):0;
		var totalMateriaPrima = parseFloat($('.materia_prima').val().replace(/[.]/g,'').replace(',','.'))?  parseFloat($('.materia_prima').val().replace(/[.]/g,'').replace(',','.')):0; 
		var totalProductosElaborados = parseFloat($('.productos_elaborados').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('.productos_elaborados').val().replace(/[.]/g,'').replace(',','.')):0;
		var total=(totalMaquinas+totalMateriaPrima+totalProductosElaborados).toFixed(2);;
		$('.total_capital').val(BJS.formatComma(BJS.formatNumber(total)));
		totalInversion = total;
	}
	var actualizarMaquinariaYHerramientas=function(){
		var total=0;
		var $maquinas =$('.valor_maquinas');
		var lenght = $maquinas.length-1;
		var cantidad=0;
		var valor=0;
		$.each($maquinas,function(i,val){
			cantidad=parseInt($($('.cantidad_maquinas')[i]).val());
			valor=$(val).val().replace(/[.]/g,'').replace(',','.');;
			if( valor && cantidad){
				
				total+=cantidad*parseFloat(valor);
			}
			if( lenght == i){
				total=total.toFixed(2);
				$('.maquinas_y_herramientas').val(BJS.formatComma(BJS.formatNumber(total)));
				actualizarCapital();
			}
		});
	}
	var actualizarMateriaPrima=function(){
		var total=0;
		var $maquinas =$('.valor_materia_prima');
		var lenght = $maquinas.length-1;
		var cantidad=0;
		var valor=0;
		$.each($maquinas,function(i,val){
			cantidad=parseInt($($('.cantidad_materia_prima')[i]).val());
			valor=$(val).val().replace(/[.]/g,'').replace(',','.');
			if( valor && cantidad){
				total+=cantidad*parseFloat(valor);
			}
			if( lenght == i){
				total=total.toFixed(2);
				$('.materia_prima').val(BJS.formatComma(BJS.formatNumber(total)));
				actualizarCapital();
			}
		});
		
	}

	var actualizarProductosElaborados=function(){
		var total=0;
		var $maquinas =$('.valor_productos_elaborados');
		var lenght = $maquinas.length-1;
		var cantidad=0;
		var valor=0;
		$.each($maquinas,function(i,val){
			cantidad=parseInt($($('.cantidad_productos_elaborados')[i]).val());
			valor=$(val).val().replace(/[.]/g,'').replace(',','.');;
			if( valor && cantidad){
				total+=cantidad*parseFloat(valor);
			}
			if( lenght == i){
				total=total.toFixed(2);
				$('.productos_elaborados').val(BJS.formatComma(BJS.formatNumber(total)));
				actualizarCapital();
			}
		});
	}
	
	
	/*____________EGRESOS__________________*/
	var actualizarEgresos=function($callback){
	 	var totalSalarioAprendices = parseFloat($('.salario_aprendices').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('.salario_aprendices').val().replace(/[.]/g,'').replace(',','.')):0;
		var totalSalarioOperarios= parseFloat($('.salario_operarios').val().replace(/[.]/g,'').replace(',','.'))?  parseFloat($('.salario_operarios').val().replace(/[.]/g,'').replace(',','.')):0; 
		var domicilio =  parseFloat($('#CalificacionCalDomicilioValor').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalDomicilioValor').val().replace(/[.]/g,'').replace(',','.')):0;
		var taller = parseFloat($('#CalificacionCalTallerValor').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalTallerValor').val().replace(/[.]/g,'').replace(',','.')):0;
		var agua = parseFloat($('#CalificacionCalAgua').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalAgua').val().replace(/[.]/g,'').replace(',','.')):0;
		var luz = parseFloat($('#CalificacionCalLuz').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalLuz').val().replace(/[.]/g,'').replace(',','.')):0;
		var telefono = parseFloat($('#CalificacionCalTelefono').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalTelefono').val().replace(/[.]/g,'').replace(',','.')):0;
		var servicios = parseFloat($('#CalificacionCalServiciosBasicos').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalServiciosBasicos').val().replace(/[.]/g,'').replace(',','.')):0;
		$('.servicios_basicos').val(BJS.formatComma(BJS.formatNumber(servicios)));
		var materiaPrima = parseFloat($('#CalificacionCalCompraDeMateriaPrimaMensual').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalCompraDeMateriaPrimaMensual').val().replace(/[.]/g,'').replace(',','.')):0;	
		var otrosSalarios = parseFloat($('#CalificacionCalOtrosSalarios').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalOtrosSalarios').val().replace(/[.]/g,'').replace(',','.')):0;
	 	var total= (totalSalarioAprendices+totalSalarioOperarios+domicilio+taller+agua+luz+telefono+materiaPrima+otrosSalarios).toFixed(2);
	 	
	 	$('.total_egresos, #CalificacionCalBalanceTotalEgresos').val(BJS.formatComma(BJS.formatNumber(total)));
		actualizarRentabilidad();
	}
	var actualizarSalarioOperario=function(){
		var total=0;
		var $salarios =$('.salarioOperarios');
		var lenght = $salarios.length-1;
		var valor=0;
		$.each($salarios,function(i,val){
			valor=$(val).val();
			
			if( valor){
				total+=parseFloat(valor.replace(/[.]/g,'').replace(',','.'));
			}
			if( lenght == i){
				total=total.toFixed(2);
				$('.salario_operarios').val(BJS.formatComma(BJS.formatNumber(total)));
				actualizarEgresos();
			}
		});
		
		
	}
	var actualizarSalarioAprendiz=function(){
		var total=0;
		var $salarios =$('.salarioAprendiz');
		var lenght = $salarios.length-1;
		var valor=0;
		$.each($salarios,function(i,val){
			valor=$(val).val();
			if( valor){
				total+=parseFloat(valor.replace(/[.]/g,'').replace(',','.'));
			}
			if( lenght == i){
				total=total.toFixed(2);
				$('.salario_aprendices').val(BJS.formatComma(BJS.formatNumber(total)));
				actualizarEgresos();
			}
		});
		
	}
		
	/*_______INGRESOS____________*/
	var actualizarIngresos= function(){
		//parseFloat(valor.replace('.','').replace(',','.'));
		var porventas = parseFloat($('#CalificacionCalIngresosPorVentas').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalIngresosPorVentas').val().replace(/[.]/g,'').replace(',','.')):0;
		var otros= parseFloat($('#CalificacionCalOtrosIngresos').val().replace(/[.]/g,'').replace(',','.'))?  parseFloat($('#CalificacionCalOtrosIngresos').val().replace(/[.]/g,'').replace(',','.')):0; 
		var total=(porventas + otros).toFixed(2);
		$('#CalificacionCalTotalIngresos, #CalificacionCalBalanceTotalIngresos').val(BJS.formatComma(BJS.formatNumber(total)));
		actualizarRentabilidad();
	}