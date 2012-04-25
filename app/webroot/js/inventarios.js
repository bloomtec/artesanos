var cantidad=0;
var valorUnitario=0;
var valorTotal= 0;
var inventarios={};
var elIva=0;

inventarios.actualizarTabla = function(){
	var subtotal = 0;
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
			$(val).find('input.valorTotal').val(BJS.formatComma(BJS.formatNumber((new Number(valorTotal)).toFixed(2)))); 
		}
		if(i == length){
			$('input.subtotal').val(BJS.formatComma(BJS.formatNumber((new Number(subtotal)).toFixed(2))));
			elIva= iva * subtotal;
			elIva= (new Number(elIva)).toFixed(2);
			total= parseFloat(elIva) + parseFloat(subtotal);
			total = (new Number(total)).toFixed(2);
			//console.log(total);
			$('input.iva').val(BJS.formatComma(BJS.formatNumber((new Number(elIva)).toFixed(2))));
			$('input.total').val(BJS.formatComma(BJS.formatNumber((new Number(total)).toFixed(2)))); 
		}
		
	});
	
}

$(function(){
	
	if(BJS.objectSize($("#PersonaPerDepartamento"))>0){
		BJS.updateSelect($(".inv-persona"),'/personas/getPersonasByDepartment/'+$("#PersonaPerDepartamento").val());
	}
	
	$("#PersonaPerDepartamento").change(function(){
		BJS.updateSelect($(".inv-persona"),'/personas/getPersonasByDepartment/'+$("#PersonaPerDepartamento").val());
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
	$('.getCantidad').change(function(){
		var select=$(".cantidadValida[row='"+$(this).attr('row')+"']");
		BJS.updateSelect2(select,'/items/getCantidad/'+$(this).val());
	});
	
});