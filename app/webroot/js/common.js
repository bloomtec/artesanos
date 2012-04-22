var checkCedulaEcuador = function(cedula) {
	array = cedula.split("");
	num = array.length;
	if(num == 10) {
		total = 0;
		digito = (array[9] * 1);
		for( i = 0; i < (num - 1); i++) {
			mult = 0;
			if((i % 2 ) != 0) {
				total = total + (array[i] * 1 );
			} else {
				mult = array[i] * 2;
				if(mult > 9)
					total = total + (mult - 9 );
				else
					total = total + mult;
			}
		}
		decena = total / 10;
		decena = Math.floor(decena);
		decena = (decena + 1 ) * 10;
		nfinal = (decena - total );
		if((nfinal == 10 && digito == 0 ) || (nfinal == digito )) {
			return true;
		} else {
			alert("La c\xe9dula NO es v\xe1lida!!!");
			return false;
		}
	} else {
		alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
		return false;
	}
}
var checkRucEcuador = function(numero) {

	var suma = 0;
	var residuo = 0;
	var pri = false;
	var pub = false;
	var nat = false;
	var numeroProvincias = 22;
	var modulo = 11;

	/* Verifico que el campo no contenga letras */
	var ok = 1;
	for( i = 0; i < numero.length && ok == 1; i++) {
		var n = parseInt(numero.charAt(i));
		if(isNaN(n))
			ok = 0;
	}
	if(ok == 0) {
		alert("No puede ingresar caracteres en el número RUC");
		return false;
	}

	if(numero.length < 13) {
		alert('El número RUC ingresado no es válido');
		return false;
	}

	/* Los primeros dos digitos corresponden al codigo de la provincia */
	provincia = numero.substr(0, 2);
	if(provincia < 1 || provincia > numeroProvincias) {
		alert('El código de la provincia (dos primeros dígitos) es inválido');
		return false;
	}

	/* Aqui almacenamos los digitos de la cedula en variables. */
	d1 = numero.substr(0, 1);
	d2 = numero.substr(1, 1);
	d3 = numero.substr(2, 1);
	d4 = numero.substr(3, 1);
	d5 = numero.substr(4, 1);
	d6 = numero.substr(5, 1);
	d7 = numero.substr(6, 1);
	d8 = numero.substr(7, 1);
	d9 = numero.substr(8, 1);
	d10 = numero.substr(9, 1);

	/* El tercer digito es: */
	/* 9 para sociedades privadas y extranjeros   */
	/* 6 para sociedades publicas */
	/* menor que 6 (0,1,2,3,4,5) para personas naturales */

	if(d3 == 7 || d3 == 8) {
		alert('El tercer dígito ingresado es inválido');
		return false;
	}

	/* Solo para personas naturales (modulo 10) */
	if(d3 < 6) {
		nat = true;
		p1 = d1 * 2;
		if(p1 >= 10)
			p1 -= 9;
		p2 = d2 * 1;
		if(p2 >= 10)
			p2 -= 9;
		p3 = d3 * 2;
		if(p3 >= 10)
			p3 -= 9;
		p4 = d4 * 1;
		if(p4 >= 10)
			p4 -= 9;
		p5 = d5 * 2;
		if(p5 >= 10)
			p5 -= 9;
		p6 = d6 * 1;
		if(p6 >= 10)
			p6 -= 9;
		p7 = d7 * 2;
		if(p7 >= 10)
			p7 -= 9;
		p8 = d8 * 1;
		if(p8 >= 10)
			p8 -= 9;
		p9 = d9 * 2;
		if(p9 >= 10)
			p9 -= 9;
		modulo = 10;
	}

	/* Solo para sociedades publicas (modulo 11) */
	/* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
	else if(d3 == 6) {
		pub = true;
		p1 = d1 * 3;
		p2 = d2 * 2;
		p3 = d3 * 7;
		p4 = d4 * 6;
		p5 = d5 * 5;
		p6 = d6 * 4;
		p7 = d7 * 3;
		p8 = d8 * 2;
		p9 = 0;
	}

	/* Solo para entidades privadas (modulo 11) */
	else if(d3 == 9) {
		pri = true;
		p1 = d1 * 4;
		p2 = d2 * 3;
		p3 = d3 * 2;
		p4 = d4 * 7;
		p5 = d5 * 6;
		p6 = d6 * 5;
		p7 = d7 * 4;
		p8 = d8 * 3;
		p9 = d9 * 2;
	}
	suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
	residuo = suma % modulo;

	/* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
	digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

	/* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
	if(pub == true) {
		if(digitoVerificador != d9) {
			alert('El ruc de la empresa del sector público es incorrecto.');
			return false;
		}
		/* El ruc de las empresas del sector publico terminan con 0001*/
		if(numero.substr(9, 4) != '0001') {
			alert('El ruc de la empresa del sector público debe terminar con 0001');
			return false;
		}
	} else if(pri == true) {
		if(digitoVerificador != d10) {
			alert('El ruc de la empresa del sector privado es incorrecto.');
			return false;
		}
		if(numero.substr(10, 3) != '001') {
			alert('El ruc de la empresa del sector privado debe terminar con 001');
			return false;
		}
	} else if(nat == true) {
		if(digitoVerificador != d10) {
			alert('El número de cédula de la persona natural es incorrecto.');
			return false;
		}
		if(numero.length > 10 && numero.substr(10, 3) != '001') {
			alert('El ruc de la persona natural debe terminar con 001');
			return false;
		}
	}
	return true;
}
var checkRucCiEcuador = function(numero) {

	var suma = 0;
	var residuo = 0;
	var pri = false;
	var pub = false;
	var nat = false;
	var numeroProvincias = 22;
	var modulo = 11;

	/* Verifico que el campo no contenga letras */
	var ok = 1;
	for( i = 0; i < numero.length && ok == 1; i++) {
		var n = parseInt(numero.charAt(i));
		if(isNaN(n))
			ok = 0;
	}
	if(ok == 0) {
		alert("No puede ingresar caracteres en el número RUC");
		return false;
	}



	/* Los primeros dos digitos corresponden al codigo de la provincia */
	provincia = numero.substr(0, 2);
	if(provincia < 1 || provincia > numeroProvincias) {
		alert('El código de la provincia (dos primeros dígitos) es inválido');
		return false;
	}

	/* Aqui almacenamos los digitos de la cedula en variables. */
	d1 = numero.substr(0, 1);
	d2 = numero.substr(1, 1);
	d3 = numero.substr(2, 1);
	d4 = numero.substr(3, 1);
	d5 = numero.substr(4, 1);
	d6 = numero.substr(5, 1);
	d7 = numero.substr(6, 1);
	d8 = numero.substr(7, 1);
	d9 = numero.substr(8, 1);
	d10 = numero.substr(9, 1);

	/* El tercer digito es: */
	/* 9 para sociedades privadas y extranjeros   */
	/* 6 para sociedades publicas */
	/* menor que 6 (0,1,2,3,4,5) para personas naturales */

	if(d3 == 7 || d3 == 8) {
		alert('El tercer dígito ingresado es inválido');
		return false;
	}

	/* Solo para personas naturales (modulo 10) */
	if(d3 < 6) {
		nat = true;
		p1 = d1 * 2;
		if(p1 >= 10)
			p1 -= 9;
		p2 = d2 * 1;
		if(p2 >= 10)
			p2 -= 9;
		p3 = d3 * 2;
		if(p3 >= 10)
			p3 -= 9;
		p4 = d4 * 1;
		if(p4 >= 10)
			p4 -= 9;
		p5 = d5 * 2;
		if(p5 >= 10)
			p5 -= 9;
		p6 = d6 * 1;
		if(p6 >= 10)
			p6 -= 9;
		p7 = d7 * 2;
		if(p7 >= 10)
			p7 -= 9;
		p8 = d8 * 1;
		if(p8 >= 10)
			p8 -= 9;
		p9 = d9 * 2;
		if(p9 >= 10)
			p9 -= 9;
		modulo = 10;
	}

	/* Solo para sociedades publicas (modulo 11) */
	/* Aqui el digito verficador esta en la posicion 9, en las otras 2 en la pos. 10 */
	else if(d3 == 6) {
		pub = true;
		p1 = d1 * 3;
		p2 = d2 * 2;
		p3 = d3 * 7;
		p4 = d4 * 6;
		p5 = d5 * 5;
		p6 = d6 * 4;
		p7 = d7 * 3;
		p8 = d8 * 2;
		p9 = 0;
	}

	/* Solo para entidades privadas (modulo 11) */
	else if(d3 == 9) {
		pri = true;
		p1 = d1 * 4;
		p2 = d2 * 3;
		p3 = d3 * 2;
		p4 = d4 * 7;
		p5 = d5 * 6;
		p6 = d6 * 5;
		p7 = d7 * 4;
		p8 = d8 * 3;
		p9 = d9 * 2;
	}
	suma = p1 + p2 + p3 + p4 + p5 + p6 + p7 + p8 + p9;
	residuo = suma % modulo;

	/* Si residuo=0, dig.ver.=0, caso contrario 10 - residuo*/
	digitoVerificador = residuo == 0 ? 0 : modulo - residuo;

	/* ahora comparamos el elemento de la posicion 10 con el dig. ver.*/
	if(pub == true) {
		if(digitoVerificador != d9) {
			alert('El ruc de la empresa del sector público es incorrecto.');
			return false;
		}
		/* El ruc de las empresas del sector publico terminan con 0001*/
		if(numero.substr(9, 4) != '0001') {
			alert('El ruc de la empresa del sector público debe terminar con 0001');
			return false;
		}
	} else if(pri == true) {
		if(digitoVerificador != d10) {
			alert('El ruc de la empresa del sector privado es incorrecto.');
			return false;
		}
		if(numero.substr(10, 3) != '001') {
			alert('El ruc de la empresa del sector privado debe terminar con 001');
			return false;
		}
	} else if(nat == true) {
		if(digitoVerificador != d10) {
			alert('El número de cédula de la persona natural es incorrecto.');
			return false;
		}
		if(numero.length > 10 && numero.substr(10, 3) != '001') {
			alert('El ruc de la persona natural debe terminar con 001');
			return false;
		}
	}
	return true;
}
var actualizarGeoUsuario = function() {
	BJS.updateSelect($("#UsuarioCantonId"), "/cantones/getByProvincia/" + $("#UsuarioProvinciaId option:selected").val(), function() {
		BJS.updateSelect($("#UsuarioCiudadId"), "/ciudades/getByCanton/" + $("#UsuarioCantonId option:selected").val(), function() {
			BJS.updateSelect($("#UsuarioSectorId"), "/sectores/getByCiudad/" + $("#UsuarioCiudadId option:selected").val(), function() {
				BJS.updateSelect($("#UsuarioParroquiaId"), "/parroquias/getBySector/" + $("#UsuarioSectorId option:selected").val(), function() {
				});
			});
		});
	});
}
$(function() {
	$(".index .search-generic").click(function() {
		search();
	});
	$(".text-search-generic").keypress(function(e) {
		if(e.keyCode == 13) {
			search();
		}
	});
	function search() {
		var url = BJS.setParam('query', $(".index .search input[type='text']").val());
		var indexQuery = url.indexOf('query');
		console.log(indexQuery);
		var beforeQuery = url.substring(0, indexQuery);
		var afterQuery = url.substring(indexQuery);
		// console.log();
		if(url.indexOf("index") < 0) {
			document.location = beforeQuery + "index/" + afterQuery;
		} else {
			document.location = beforeQuery + afterQuery;
		}
	}

	/*FUNCIONALIDAD PROPIA DEL PROYECT*/
	$.each($("#main-menu > ul > li"), function(i, val) {
		if($(val).find("ul").length) {
			$(val).addClass("opened");
		}
	});
	$("#main-menu > ul > li").click(function(e) {
		if($(e.target).is("#main-menu > ul > li")) {// Si el evento lo lanza el li
			if($(this).is('.opened')) {
				$(this).removeClass('opened');
				$(this).addClass('closed')
			} else {
				if($(this).is('.closed')) {
					$(this).removeClass('closed');
					$(this).addClass('opened')
				}
			}
		}
	});
	//VALIDATOR
	$.tools.validator.localize("es", {
		'*' : 'Valor del campo no valido',
		':email' : 'Formato de email no valido',
		':number' : 'Este campo debe ser númerico',
		':url' : 'Formato de URL no valido',
		'[max]' : 'Este campo no puede ser mayor que $1',
		'[min]' : 'Este campo no puede ser menor que 	$1',
		'[required]' : 'Campo obligatorio'
	});
	$('form[id!=registro]').validator({
		lang : 'es',
		messageClass : 'error-form'
	});

	//TOOLTIPS
	$(".actions a[title]").tooltip({
		position : "bottom center",
		opacity : 1
	});

	//TRANSFORMACION A MAYUSCULA
	$("input[type='text']").blur(function(e) {
		$(this).val($(this).val().toUpperCase());

	});
	//Mascaras
	//	$.mask.rules['u']=/[1-9]/;
	//$("input.date").setMask({'mask':"9999-19-39", });
	$("input.date").dateEntry({
		dateFormat : 'ymd-',
		spinnerImage : ""
	});
	
	//$(":date , input.date").attr('placeholder','aaaa-mm-dd');
	$('input.valor').setMask({
		mask : '99,999.999.999.999.999',
		type : 'reverse',
		defaultValue : '000'
	});
	$('input.number').setMask({
		mask : '9999',
		type : 'repeat'
	});
	$('input.mil').setMask({
		mask : '999.999.999.999.999.999.999',
		type : 'repeat',
		type : 'reverse'
	});
	$('input.porcentaje').setMask({
		mask : '999%'
	});
	$(".telefono").setMask({
		mask : "9-999 99 99"
	});
	$(".celular").setMask({
		mask : "999-999-999"
	});
	$.mask.rules.H = /([0-1][0-9]|2[0-3])/;  // 24 hours
	$.mask.masks.time = 'H:59';
	$("#txtTime").setMask('time');
	$("input.hour").setMask('29:69').keypress(function() {
		  var currentMask = $(this).data('mask').mask;
		  var newMask = $(this).val().match(/^2.*/) ? "23:59" : "29:59";
		  if (newMask != currentMask) {
		    $(this).setMask(newMask);
		  }
	});
	
	// CREAR Y MODIFICAR USUARIOS
	$("#UsuarioUsuIsCedula").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#UsuarioUsuNumeroIdentificacion').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#UsuarioUsuNumeroIdentificacion').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	$("#UsuarioEditForm , #UsuarioAddForm").submit(function(e) {
		if($("#UsuarioUsuIsCedula option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#UsuarioUsuNumeroIdentificacion").val())) {
				e.preventDefault();
				$("#UsuarioUsuNumeroIdentificacion").focus();
			}
		}
	});
	// CREAR Y MODIFICAR ARTESANOS
	$("#ArtesanoArtIsCedula").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#ArtesanoArtCedula').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#ArtesanoArtCedula').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	$("#ArtesanoAgregarArtesanoForm").submit(function(e) {
		//alert($("#ArtesanoArtIsCedula option:selected").val());
		if($("#ArtesanoArtIsCedula option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#ArtesanoArtCedula").val())) {
				e.preventDefault();
				$("#ArtesanoArtCedula").focus();
			}
		}
	});
	//VALIDAR RUC EN PROVEEDORES
	$("#ProveedorEditForm , #ProveedorAddForm").submit(function(e) {
		//if($("#UsuarioUsuIsCedula option:selected").val()=="1"){
		if(!checkRucEcuador($("#ProveedorProRut").val())) {
			e.preventDefault();
			$("#ProveedorProRut").focus();
		}
		//}
	});
	// CREAR Y MODIFICAR PERSONAS
	$("#PersonaPerIsCedula").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#PersonaPerDocumentoDeIdentidad').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#PersonaPerDocumentoDeIdentidad').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	$("#PersonaAddForm , #PersonaAddForm").submit(function(e) {
		if($("#PersonaPerIsCedula option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#PersonaPerDocumentoDeIdentidad").val())) {
				e.preventDefault();
				$("#PersonaPerDocumentoDeIdentidad").focus();
			}
		}
	});
	// CREAR Y MODIFICAR INSTRUCTOR
	$("#InstructorInsIsCedula").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#InstructorInsDocumentoDeIdentificacion').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#InstructorInsDocumentoDeIdentificacion').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	$("#InstructorAddForm , #InstructorEditForm").submit(function(e) {
		if($("#InstructorInsIsCedula option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#InstructorInsDocumentoDeIdentificacion").val())) {
				e.preventDefault();
				$("#InstructorInsDocumentoDeIdentidad").focus();
			}
		}
	});
	// CREAR Y MODIFICAR ALUMNO
	$("#AlumnoAluIsCedula").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#AlumnoAluDocumentoDeIdentificacion').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#AlumnoAluDocumentoDeIdentificacion').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	
	$("#AlumnoAddForm , #AlumnoEditForm").submit(function(e) {
		if($("#AlumnoAluIsCedula option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#AlumnoAluDocumentoDeIdentificacion").val())) {
				e.preventDefault();
				$("#AlumnoAluDocumentoDeIdentidad").focus();
			}
		}
	});
	//CREAR Y MODIFICAR PROFESOR
	$("#ProfesorProIsCedula").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#ProfesorProDocumentoDeIdentificacion').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#ProfesorProDocumentoDeIdentificacion').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	$("#ProfesorAddForm , #ProfesorEditForm").submit(function(e) {
		if($("#ProfesorProIsCedula option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#ProfesorProDocumentoDeIdentificacion").val())) {
				e.preventDefault();
				$("#ProfesorProDocumentoDeIdentificacion").focus();
			}
		}
	});
	// ACTUALIZACIONES GEOGRAFICAS USUARIOS

	$("#UsuarioProvinciaId").change(function() {
		actualizarGeoUsuario();
	});
	$("#UsuarioCantonId").change(function() {
		BJS.updateSelect($("#UsuarioCiudadId"), "/ciudades/getByCanton/" + $("#UsuarioCantonId option:selected").val(), function() {
			BJS.updateSelect($("#UsuarioSectorId"), "/sectores/getByCiudad/" + $("#UsuarioCiudadId option:selected").val(), function() {
				BJS.updateSelect($("#UsuarioParroquiaId"), "/parroquias/getBySector/" + $("#UsuarioSectorId option:selected").val(), function() {
				});
			});
		});
	});
	$("#UsuarioCiudadId").change(function() {
		BJS.updateSelect($("#UsuarioSectorId"), "/sectores/getByCiudad/" + $("#UsuarioCiudadId option:selected").val(), function() {
			BJS.updateSelect($("#UsuarioParroquiaId"), "/parroquias/getBySector/" + $("#UsuarioSectorId option:selected").val(), function() {
			});
		});
	});
	$("#UsuarioSectorId").change(function() {
		BJS.updateSelect($("#UsuarioParroquiaId"), "/parroquias/getBySector/" + $("#UsuarioSectorId option:selected").val(), function() {
		});
	});
	$('form, .input').append('<div style="clear:both;"></div>');

	// FUNCIONALIDADES AÑADIR FILAS
	var tables = {};
	tables.update = function(jtable) {
		if(jtable['show'] <= jtable['till']) {
			if(jtable['show'] == jtable['till']) {
				jtable['button'].addClass('disabled');
			}
			jtable['show'] += 1;
			jtable['jTable'].find('tr').hide();
			jtable['jTable'].find('tr:lt(' + jtable['show'] + ')').show();
			$("#wizard").height($("#wizard").find(".page").eq(api.getIndex()).height());
		}
	}
	$.each($('.add-row'), function(i, val) {
		tables[$(val).attr('rel')] = {};
		tables[$(val).attr('rel')]['button'] = $(val);
		tables[$(val).attr('rel')]['jTable'] = $($(val).attr('rel'));
		tables[$(val).attr('rel')]['show'] = $($(val).attr('rel')).attr('show');
		tables[$(val).attr('rel')]['till'] = parseInt($($(val).attr('rel')).attr('till'));
		tables[$(val).attr('rel')]['show'] = parseInt($($(val).attr('rel')).attr('show')) + 1;
		tables[$(val).attr('rel')]['jTable'].find('tr').hide();
		tables[$(val).attr('rel')]['jTable'].find('tr:lt(' + tables[$(val).attr('rel')]['show'] + ')').show();
	});

	$(".add-row").click(function(e) {
		e.preventDefault();
		tables.update(tables[$(this).attr('rel')]);
	});
	
	$('#divCampos').validate();
	
	
	//Formulario modal
	$('#regAlumno').click(function(e) {
		// alert("Hola");
		$('#modal_registro_alumnos').modal({
			close : true
		});
		return false;
	});
	
	
	$("#btnModalRegAlumno").click(function() {
	
	   if($("#txtTipoDoc option:selected").val() == "1") {
			if(!checkCedulaEcuador($("#txtId").val())) {
				e.preventDefault();
				$("#txtId").focus();
			}
		}
		
		$.post("/alumnos/modalRegNuevoAlumno", $('#divCampos :input').serialize(), resultado, "json");
		
		function resultado(msj) {
			if (msj.res==true) {
				alert(msj.msj);
				$(".modal #btnCerrar").click();
			} else if(msj.res==false){
				alert(msj.msj);
			} else {
				alert("No se pudo registrar el alumno. Por favor, intente de nuevo");
			}
		}
	});
	
	 
    $(".modal #btnCerrar").click(function(){
        $(".modalCloseImg").click();
    });
    
    // CREAR Y MODIFICAR ALUMNO
	$("#txtTipoDoc").change(function() {
		switch($(this).val()) {
			case "0":
				// PASAPORTE
				$('#txtId').setMask({
					mask : '*',
					type : 'repeat'
				}).val('');
				break;
			case "1":
				// CEDULA
				$('#txtId').setMask({
					mask : '9999',
					type : 'repeat'
				}).val();
				break;
		}
	});
	
	
	//Solicitudes titulación
	$("#SolicitudesTitulacionTiposSolicitudesTitulacionId").change(function(){
		var val = $("#SolicitudesTitulacionTiposSolicitudesTitulacionId option:selected").val();
		if (val==""){
			$("#archivos1").hide(); 
			$("#archivos2").hide(); 
		}if (val==1){
			$("#archivos1").show(); 
			$("#archivos2").hide(); 
		} else if(val==2 || val==3){
			$("#archivos1").hide(); 
			$("#archivos2").show(); 
		}
	});
	
	
	
	$("#btnModalRegArtesano").click(function() {
		$('#modal_registro_artesano').modal({
			close : true
		});
		return false;
	});
	
	
	 $(".modal2 #btnCerrar").click(function(){
        $(".modalCloseImg").click();
    });
    
    
	$("#btnModalRegArtesano2").click(function() {
		/*if(!checkCedulaEcuador($("#txtCedula").val())) {
			e.preventDefault();
			$("#txtCedula").focus();
		} */
		
		$.post("/artesanos/modalRegNuevoArtesano", $('#camposModalRegArtesano :input').serialize(), resultado2, "json");
		
		function resultado2(msj) {
			if (msj.res==true) {
				alert(msj.msj);
				$(".modal2 #btnCerrar").click();
			} else if(msj.res==false){
				alert(msj.msj);
			} else {
				alert("No se pudo registrar el artesano. Por favor, intente de nuevo");
			}
		} 
	});
});
