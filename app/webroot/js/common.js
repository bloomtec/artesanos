var checkCedulaEcuador = function ( cedula ){
	  array = cedula.split( "" );
	  num = array.length;
	  if ( num == 10 ){
	    total = 0;
	    digito = (array[9]*1);
	    for( i=0; i < (num-1); i++ ){
	      mult = 0;
	      if ( ( i%2 ) != 0 ) {
	        total = total + ( array[i] * 1 );
	      }
	      else
	      {
	        mult = array[i] * 2;
	        if ( mult > 9 )
	          total = total + ( mult - 9 );
	        else
	          total = total + mult;
	      }
	    }
	    decena = total / 10;
	    decena = Math.floor( decena );
	    decena = ( decena + 1 ) * 10;
	    nfinal = ( decena - total );
	    if ( ( nfinal == 10 && digito == 0 ) || ( nfinal == digito ) ) {
	      return true;
	    }
	    else
	    {
	      alert( "La c\xe9dula NO es v\xe1lida!!!" );
	      return false;
	    }
	  }
	  else
	  {
	    alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
	    return false;
	  }
	}

	var actualizarGeoUsuario = function(){
		BJS.updateSelect($("#UsuarioCantonId"),"/cantones/getByProvincia/"+$("#UsuarioProvinciaId option:selected").val(),function(){
			BJS.updateSelect($("#UsuarioCiudadId"),"/ciudades/getByCanton/"+$("#UsuarioCantonId option:selected").val(),function(){
				BJS.updateSelect($("#UsuarioSectorId"),"/sectores/getByCiudad/"+$("#UsuarioCiudadId option:selected").val(),function(){
					BJS.updateSelect($("#UsuarioParroquiaId"),"/parroquias/getBySector/"+$("#UsuarioSectorId option:selected").val(),function(){});	
				});	
			});	
		});
	}


$(function() {
	$(".index .search-generic").click(function() {
		search();
	});
	$(".text-search-generic").keypress(function(e) {
		if(e.keyCode == 13){
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
	$.each($("#main-menu > ul > li"),function(i,val){
		if($(val).find("ul").length){
			$(val).addClass("opened");
		}
	});
	$("#main-menu > ul > li").click(function(e){
		if($(e.target).is("#main-menu > ul > li")){// Si el evento lo lanza el li
			if($(this).is('.opened')){
				$(this).removeClass('opened');
				$(this).addClass('closed')
			}else{
				if($(this).is('.closed')){
					$(this).removeClass('closed');
					$(this).addClass('opened')
				}
			}
		}
	});
	//VALIDATOR
	$.tools.validator.localize("es", {
		'*'			: 'Valor del campo no valido',
		':email'  	: 'Formato de email no valido',
		':number' 	: 'Este campo debe ser númerico',
		':url' 		: 'Formato de URL no valido',
		'[max]'	 	: 'Este campo no puede ser mayor que $1',
		'[min]'		: 'Este campo no puede ser menor que 	$1',
		'[required]'	: 'Campo obligatorio'
	});
	$('form[id!=registro]').validator({lang:'es',messageClass:'error-form'});
	
	//TOOLTIPS
	$(".actions a[title]").tooltip({ position: "bottom center", opacity: 1});
	
	//TRANSFORMACION A MAYUSCULA
	$("input[type='text']").blur(function(e){
		$(this).val($(this).val().toUpperCase());
		
	});
	
	//Mascaras
//	$.mask.rules['u']=/[1-9]/;
	//$("input.date").setMask({'mask':"9999-19-39", });
	$("input.date").dateEntry({dateFormat: 'ymd-',spinnerImage:null});
	//$(":date , input.date").attr('placeholder','aaaa-mm-dd');
	$('input.valor').setMask({ mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' });
	$('input.number').setMask({ mask : '9999', type : 'repeat' });
	$('input.porcentaje').setMask({ mask : '999%'});
	$(".telefono").setMask({mask:"9-999 99 99"}); 
	$(".celular").setMask({mask:"999-999-999"}); 
	
	
	// CREAR Y MODIFICAR USUARIOS
	$("#UsuarioUsuIsCedula").change(function(){
		switch($(this).val()){
			case "0": // PASAPORTE
			$('#UsuarioUsuNumeroIdentificacion').setMask({ mask : '*', type : 'repeat' }).val('');
			break;
			case "1": // CEDULA
			$('#UsuarioUsuNumeroIdentificacion').setMask({ mask : '9999', type : 'repeat' }).val();
			break;
		}
	});
	$("#UsuarioEditForm , #UsuarioAddForm").submit(function(e){
		if($("#UsuarioUsuIsCedula option:selected").val()=="1"){
			if(!checkCedulaEcuador($("#UsuarioUsuNumeroIdentificacion").val())){
				e.preventDefault();
				$("#UsuarioUsuNumeroIdentificacion").focus();
			}
		}
	});
	// CREAR Y MODIFICAR PERSONAS
	$("#PersonaPerIsCedula").change(function(){
		switch($(this).val()){
			case "0": // PASAPORTE
			$('#PersonaPerDocumentoDeIdentidad').setMask({ mask : '*', type : 'repeat' }).val('');
			break;
			case "1": // CEDULA
			$('#PersonaPerDocumentoDeIdentidad').setMask({ mask : '9999', type : 'repeat' }).val();
			break;
		}
	});
	$("#PersonaAddForm , #PersonaAddForm").submit(function(e){
		if($("#PersonaPerIsCedula option:selected").val()=="1"){
			if(!checkCedulaEcuador($("#PersonaPerDocumentoDeIdentidad").val())){
				e.preventDefault();
				$("#PersonaPerDocumentoDeIdentidad").focus();
			}
		}
	});

	// ACTUALIZACIONES GEOGRAFICAS USUARIOS
	
	$("#UsuarioProvinciaId").change(function(){
		actualizarGeoUsuario();
	});
	$("#UsuarioCantonId").change(function(){
		BJS.updateSelect($("#UsuarioCiudadId"),"/ciudades/getByCanton/"+$("#UsuarioCantonId option:selected").val(),function(){
			BJS.updateSelect($("#UsuarioSectorId"),"/sectores/getByCiudad/"+$("#UsuarioCiudadId option:selected").val(),function(){
				BJS.updateSelect($("#UsuarioParroquiaId"),"/parroquias/getBySector/"+$("#UsuarioSectorId option:selected").val(),function(){});	
			});	
		});	
	});
	$("#UsuarioCiudadId").change(function(){
		BJS.updateSelect($("#UsuarioSectorId"),"/sectores/getByCiudad/"+$("#UsuarioCiudadId option:selected").val(),function(){
			BJS.updateSelect($("#UsuarioParroquiaId"),"/parroquias/getBySector/"+$("#UsuarioSectorId option:selected").val(),function(){});	
		});	
	});
	$("#UsuarioSectorId").change(function(){
		BJS.updateSelect($("#UsuarioParroquiaId"),"/parroquias/getBySector/"+$("#UsuarioSectorId option:selected").val(),function(){});	
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
});