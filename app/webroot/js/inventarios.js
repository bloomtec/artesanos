var cantidad=0;
var valorUnitario=0;
var valorTotal= 0;
var inventarios={};
inventarios.actualizarTabla = function(){
	var subtotal = 0;
	var iva = 0;
	var total = 0;
	var rows=$('table.inventario').find('tr');
	var length=rows.length -1;
	$.each(rows,function(i,val){

		cantidad=$(val).find('input.cantidad').val();
		valorUnitario=$(val).find('input.valorUnitario').val();
		if(cantidad != undefined && valorUnitario != undefined){
			cantidad=parseFloat(cantidad?cantidad.replace(/[.]/g,'').replace(',','.'):0);
			valorUnitario=parseFloat(valorUnitario?valorUnitario.replace(/[.]/g,'').replace(',','.'):0);
			valorTotal=cantidad*valorUnitario;
			subtotal+=valorTotal;
			$(val).find('input.valorTotal').val(BJS.formatComma(BJS.formatNumber(valorTotal)));
		}
		if(i == length){
			$('input.subtotal').val(BJS.formatComma(BJS.formatNumber(subtotal)));
			iva=subtotal * 0.12;
			total=iva + subtotal;
			$('input.iva').val(BJS.formatComma(BJS.formatNumber(iva)));
			$('input.total').val(BJS.formatComma(BJS.formatNumber(total)));
			
		}
		
	});
}
$(function(){
	
	if(BJS.objectSize($("#PersonaPerDepartamento"))>0){
		BJS.updateSelect($("#IngresosDeInventarioPersonaId"),'/personas/getPersonasByDepartment/'+$("#PersonaPerDepartamento").val());
	}
	
	$("#PersonaPerDepartamento").change(function(){
		BJS.updateSelect($("#IngresosDeInventarioPersonaId"),'/personas/getPersonasByDepartment/'+$("#PersonaPerDepartamento").val());
	});
	
	// Selects de para escoger ciudad
	$("#IngresosDeInventarioIngProvincia").change(function(){
		BJS.updateSelect($("#IngresosDeInventarioIngCanton"),'/cantones/getByProvincia/'+$("#IngresosDeInventarioIngProvincia").val(), function(){
			BJS.updateSelect($("#IngresosDeInventarioIngCiudad"),'/ciudades/getByCanton/'+$("#IngresosDeInventarioIngCanton").val());
		});
	});
	
	$("#IngresosDeInventarioIngCanton").change(function(){
		BJS.updateSelect($("#IngresosDeInventarioIngCiudad"),'/ciudades/getByCanton/'+$("#IngresosDeInventarioIngCanton").val());
	});
	
	//tabla de inventarios
	$('.items input.valor, .items input.number').blur(function(){
		inventarios.actualizarTabla();
	});
	
	
	
});


