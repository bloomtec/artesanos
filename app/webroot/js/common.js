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
	/*$.tools.dateinput.localize("es",  {
		   months:        'enero,febrero,marzo,abril,mayo,junio,julio,agosto,' +
		                   	'septiembre,octubre,noviembre,diciembre',
		   shortMonths:   'ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic',
		   days:          'domingo,lunes,martes,miercoles,jueves,viernes,sabado',
		   shortDays:     'dom,lun,mar,mie,jue,vie,sab'
		});
	$(":date,input.date").dateinput({
		// this is displayed to the user
		format : 'yyyy-mm-dd',
		offset : [0, 0],
		lang: 'es',
		firstDay: 1,
		selectors: true,
		yearRange: [-100,100]
	});*/
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
	$("input[type='text']").keyup(function(e){
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
	$("#UsuarioEditForm , #UsuarioAddForm").submit(function(e){
		if($("#UsuarioUsuIsCedula option:selected").val()=="1"){
			if(!checkCedulaEcuador($("#UsuarioUsuNumeroIdentificacion").val())){
				e.preventDefault();
				$("#UsuarioUsuNumeroIdentificacion").focus();
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
});
