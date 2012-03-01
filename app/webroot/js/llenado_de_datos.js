var llenarDatosIndexado = function(Model, datos, indice) {
	var input = null;
	for(atributo in datos) {
		input = $("[name='data[" + Model + "][" + indice + "][" + atributo + "]']");
		if(input.length) {
			if(input.is('.valor')){
				input.val(BJS.formatComma(BJS.formatNumber(datos[atributo])));
			}else{
				input.val(datos[atributo]);
			}
		}
	}
	return true;
}
var llenarTrabajadoresIndexado = function(Model, datos, indice) {

	switch(datos['tipos_de_trabajador_id']) {
		case '1':
			indice = indiceOperador++;
			break;
		case '2':
			indice = 15 + indiceAprendiz++;
			break;
	}
	var input = null;
	for(atributo in datos) {
		input = $("[name='data[" + Model + "][" + indice + "][" + atributo + "]']");
		if(input.length) {
			if(input.is('.valor')){
				input.val(BJS.formatComma(BJS.formatNumber(datos[atributo])));
			}else{
				console.log(atributo);
				console.log(datos[atributo]);
				input.val(datos[atributo]);
			}
		}
	}
	return true;
}
var llenarDatos = function(Model, datosPersonales) {
	var input = null;
	for(atributo in datosPersonales) {
		var isGeo = false;
		input = $("[name='data[" + Model + "][" + atributo + "]']");
		if(input.length) {
			if(atributo != "tipos_de_calificacion_id" && atributo != "grupos_de_rama_id" && atributo != "rama_id" && atributo != "art_is_cedula") {
				switch(atributo){// FUNCIONALIDAD PARA LLENADO DE DATOS GEOGRAFICOS
					case 'canton_id':
						input.attr('val',datosPersonales[atributo]);
						BJS.updateSelect(input,"/cantones/getByProvincia/"+datosPersonales['provincia_id'])
						isGeo=true;
						break;
					case 'ciudad_id':
						input.attr('val',datosPersonales[atributo]);
						BJS.updateSelect(input,"/ciudades/getByCanton/"+datosPersonales['canton_id'])
						isGeo=true;
						break;
					case 'sector_id':
						input.attr('val',datosPersonales[atributo]);
						BJS.updateSelect(input,"/sectores/getByCiudad/"+datosPersonales['ciudad_id'])
						isGeo=true;
						break;
					case 'parroquia_id':
						input.attr('val',datosPersonales[atributo]);
						BJS.updateSelect(input,"/parroquias/getBySector/"+datosPersonales['sector_id'])
						isGeo=true;
						break;
				}
				if(!isGeo){// si no son datos geograficos
					if(input.is('.valor')){
						input.val(BJS.formatComma(BJS.formatNumber(datosPersonales[atributo])));
					}else{
						input.val(datosPersonales[atributo]);
					}	
				}
			}
		}

	}
	if(Model == "Taller") {
		for(indice in datosPersonales['EquiposDeTrabajo']) {
			llenarDatosIndexado('EquiposDeTrabajo', datosPersonales['EquiposDeTrabajo'][indice], indice);
		}
		for(indice in datosPersonales['MateriasPrima']) {
			llenarDatosIndexado('MateriasPrima', datosPersonales['MateriasPrima'][indice], indice);
		}
		for(indice in datosPersonales['ProductosElaborado']) {
			llenarDatosIndexado('ProductosElaborado', datosPersonales['ProductosElaborado'][indice], indice);
		}

		for(indice in datosPersonales['Trabajador']) {
			if(llenarTrabajadoresIndexado('Trabajador', datosPersonales['Trabajador'][indice], indice)) {

			}
		}

	}
	return true;
}