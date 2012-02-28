/*
 var capitalMaximoInversion: capital maximo de inversion pasado por php al entorno global
 var salarioMinimoUnificado: 
 * */
var totalRentabilidad=0;
var totalInversion=0;
var indiceOperador=indiceAprendiz=0;
$(function(){
	// FUNCIONALIDAD REGISTRO
	$('#wizard .page').css('width',$("#wizard").width());
	$('#wizard').css('height',$(".items").height());
	$('.porcentaje').hide();
	$('.submit').click(function(){
		$('form').submit();
	});
	$('#DatosPersonalDatTipoDiscapacidad').change(function(){
		if($(this).find('option:selected').val()){
			$('.porcentaje').show();	
		}else{
			$('.porcentaje').hide();
		}
	});
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
	$('.cantidad_maquinas , .valor_maquinas').blur(function(){
		actualizarMaquinariaYHerramientas();
	});
	$('.cantidad_materia_prima , .valor_materia_prima').blur(function(){
		actualizarMateriaPrima();
	});
	$('.cantidad_productos_elaborados , .valor_productos_elaborados').blur(function(){
		actualizarProductosElaborados();
	});
	
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
		var materiaPrima = parseFloat($('#CalificacionCalCompraDeMateriaPrimaMensual').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalCompraDeMateriaPrimaMensual').val().replace(/[.]/g,'').replace(',','.')):0;	
		var otrosSalarios = parseFloat($('#CalificacionCalOtrosSalarios').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalOtrosSalarios').val().replace(/[.]/g,'').replace(',','.')):0;
	 	var total= (totalSalarioAprendices+totalSalarioOperarios+domicilio+taller+agua+luz+telefono+servicios+materiaPrima+otrosSalarios).toFixed(2);
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
	$('.salarioAprendiz').blur(function(){
		actualizarSalarioAprendiz();
	});
	$('.salarioOperarios').blur(function(){
		actualizarSalarioOperario();
	});
	$('.egresos input').blur(function(){
		actualizarEgresos();
	});
	$("#CalificacionCalDomicilioPropio").click(function(){
		if($(this).is(':checked')){
			$('#CalificacionCalDomicilioValor').val(0).attr('disabled',true);
		}else{
			$('#CalificacionCalDomicilioValor').attr('disabled',false);
		}	
		actualizarEgresos();
	});
	
	$("#CalificacionCalTallerPropio").click(function(){
		if($(this).is(':checked')){
			$('#CalificacionCalTallerValor').val(0).attr('disabled',true);	
		}else{
			$('#CalificacionCalTallerValor').attr('disabled',false);
		}	
		actualizarEgresos();
	});
	
	/*_______INGRESOS____________*/
	var actualizarIngresos= function(){
		//parseFloat(valor.replace('.','').replace(',','.'));
		var porventas = parseFloat($('#CalificacionCalIngresosPorVentas').val().replace(/[.]/g,'').replace(',','.'))? parseFloat($('#CalificacionCalIngresosPorVentas').val().replace(/[.]/g,'').replace(',','.')):0;
		var otros= parseFloat($('#CalificacionCalOtrosIngresos').val().replace(/[.]/g,'').replace(',','.'))?  parseFloat($('#CalificacionCalOtrosIngresos').val().replace(/[.]/g,'').replace(',','.')):0; 
		var total=(porventas + otros).toFixed(2);
		$('#CalificacionCalTotalIngresos, #CalificacionCalBalanceTotalIngresos').val(BJS.formatComma(BJS.formatNumber(total)));
		actualizarRentabilidad();
	}
	$('.ingresos input').blur(function(){
		actualizarIngresos();
	});
	

	actualizarSalarioOperario();
	actualizarSalarioAprendiz();
	actualizarCapital();
	actualizarIngresos();
	actualizarEgresos();
	actualizarRentabilidad();
	
	
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
	var llenarDatosIndexado = function(Model,datos,indice){
		var input=null;		
		for(atributo in datos){
			input = $("[name='data["+Model+"]["+indice+"]["+atributo+"]']");
			if(input.length){
				input.val(datos[atributo]);
			}
		}
		return true;
	}
	var llenarTrabajadoresIndexado = function(Model,datos,indice){
		
		switch(datos['tipos_de_trabajador_id']){
			case '1':
			indice=indiceOperador++;
			break;
			case '2':
			indice= 15 + indiceAprendiz++;
			break;
		}
		var input=null;		
			for(atributo in datos){
				input = $("[name='data["+Model+"]["+indice+"]["+atributo+"]']");
				if(input.length){
					input.val(datos[atributo]);
				}
			}
			return true;
	}
	var llenarDatos = function(Model,datosPersonales){
		var input=null;
		for(atributo in datosPersonales){
			input = $("[name='data["+Model+"]["+atributo+"]']");
			if(input.length){
				if(atributo != "tipos_de_calificacion_id" && atributo != "grupos_de_rama_id" && atributo != "rama_id" && atributo != "art_is_cedula"){
					input.val(datosPersonales[atributo]);
				}
			}
			
		}
		if(Model=="Taller"){
			for(indice in datosPersonales['EquiposDeTrabajo']){
				llenarDatosIndexado('EquiposDeTrabajo',datosPersonales['EquiposDeTrabajo'][indice],indice);
			}
			for(indice in datosPersonales['MateriasPrima']){
				llenarDatosIndexado('MateriasPrima',datosPersonales['MateriasPrima'][indice],indice);
			}
			for(indice in datosPersonales['ProductosElaborado']){
				llenarDatosIndexado('ProductosElaborado',datosPersonales['ProductosElaborado'][indice],indice);
			}
			
			for(indice in datosPersonales['Trabajador']){
				if(llenarTrabajadoresIndexado('Trabajador',datosPersonales['Trabajador'][indice],indice)){
					
				}
			}
								
		}
		return true;
	}
	var validarCalificacion = function (){
		if($('.validarCalificacion #ArtesanoArtIsCedula option:selected').val()==0/*si es pasaporte*/ || checkCedulaEcuador($("#wizard #ArtesanoArtCedula").val())){
			if($("#wizard #ArtesanoArtCedula").val()==""){
				alert('No ha escrito un numero de pasaporte');
				return false;
			}
			BJS.JSONP('/artesanos/validarCalificacion',{cedula:$("#ArtesanoArtCedula").val(),tipoDeCalificacion:$("#CalificacionTiposDeCalificacionId option:selected").val(),rama:$('#CalificacionRamaId option:selected').val()},function(response){
				
				if(response.Mensaje){
					alert(response.Mensaje);
				}
				if(response.Calificar){
					$("#wizard .validar").css('visibility','visible');
					if(typeof response.Datos != 'undefined'){
						if(response.Datos.DatosPersonal.length) llenarDatos('DatosPersonal',response.Datos.DatosPersonal[0]);
						indiceOperador=indiceAprendiz=0;						
						if(response.Datos.Local.length) llenarDatos('Local',response.Datos.Local[0]);
						if(response.Datos.Taller.length){
							if(llenarDatos('Taller',response.Datos.Taller[0])){
								if(llenarDatos('Calificacion',response.Datos.Calificacion)){
									actualizarSalarioOperario();
									actualizarSalarioAprendiz();
									actualizarCapital();
									actualizarIngresos();
									actualizarEgresos();
									actualizarRentabilidad();
								}
							}
						} 
					}else{
						$(".validar input[type!='hidden'][type!='checkbox']").val("");
						$(".validar input[type='checkbox']").attr('checked',false);
						$('.validar select option:first-child').attr('selected',true).parent().change();
					}
				}else{
					$("#wizard .validar").css('visibility','hidden');
					$(".validar input[type!='hidden'][type!='checkbox']").val("");
					$(".validar input[type='checkbox']").attr('checked',false);
					$('.validar select option:first-child').attr('selected',true).parent().change();
				}
			});
		}
	}
	BJS.updateSelect($("#CalificacionRamaId"),"/ramas/obtenerPorGrupo/"+$("#ArtesanoGruposDeRamaId option:selected").val());
	$("#ArtesanoGruposDeRamaId").change(function(){
		BJS.updateSelect($("#CalificacionRamaId"),"/ramas/obtenerPorGrupo/"+$("#ArtesanoGruposDeRamaId option:selected").val());
	});
	/*$("#wizard .validarCalificacion select").change(function(){
		if($(this).attr('id') == "ArtesanoGruposDeRamaId"){//actualiza el selects de ramas
			BJS.updateSelect($("#CalificacionRamaId"),"/ramas/obtenerPorGrupo/"+$("#ArtesanoGruposDeRamaId option:selected").val(),function(){
					validarCalificacion();
			});
		}else{
			if($("#wizard #ArtesanoArtCedula").val()){
					validarCalificacion();
				}
		}
	});
	$("#wizard #ArtesanoArtCedula").blur(function(){
		validarCalificacion();
	});*/
	$('.validarCalificacion a').click(function(e){
		e.preventDefault();
		validarCalificacion();
	});
	/*_________PARAMETROS GEOGRAFICOS*/
	/*___________TALLER_______________*/
	var actualizarGeoTaller = function(){
		BJS.updateSelect($("#TallerCantonId"),"/cantones/getByProvincia/"+$("#TallerProvinciaId option:selected").val(),function(){
			BJS.updateSelect($("#TallerCiudadId"),"/ciudades/getByCanton/"+$("#TallerCantonId option:selected").val(),function(){
				BJS.updateSelect($("#TallerSectorId"),"/sectores/getByCiudad/"+$("#TallerCiudadId option:selected").val(),function(){
					BJS.updateSelect($("#TallerParroquiaId"),"/parroquias/getBySector/"+$("#TallerSectorId option:selected").val(),function(){});	
				});	
			});	
		});
	}
	
	$("#TallerProvinciaId").change(function(){
		actualizarGeoTaller();
	});
	$("#TallerCantonId").change(function(){
		BJS.updateSelect($("#TallerCiudadId"),"/ciudades/getByCanton/"+$("#TallerCantonId option:selected").val(),function(){
			BJS.updateSelect($("#TallerSectorId"),"/sectores/getByCiudad/"+$("#TallerCiudadId option:selected").val(),function(){
				BJS.updateSelect($("#TallerParroquiaId"),"/parroquias/getBySector/"+$("#TallerSectorId option:selected").val(),function(){});	
			});	
		});	
	});
	$("#TallerCiudadId").change(function(){
		BJS.updateSelect($("#TallerSectorId"),"/sectores/getByCiudad/"+$("#TallerCiudadId option:selected").val(),function(){
			BJS.updateSelect($("#TallerParroquiaId"),"/parroquias/getBySector/"+$("#TallerSectorId option:selected").val(),function(){});	
		});	
	});
	$("#TallerSectorId").change(function(){
		BJS.updateSelect($("#TallerParroquiaId"),"/parroquias/getBySector/"+$("#TallerSectorId option:selected").val(),function(){});	
	});
	/*__________________LOCAL_________________________*/
	var actualizarGeoLocal = function(){
		BJS.updateSelect($("#LocalCantonId"),"/cantones/getByProvincia/"+$("#LocalProvinciaId option:selected").val(),function(){
			BJS.updateSelect($("#LocalCiudadId"),"/ciudades/getByCanton/"+$("#LocalCantonId option:selected").val(),function(){
				BJS.updateSelect($("#LocalSectorId"),"/sectores/getByCiudad/"+$("#LocalCiudadId option:selected").val(),function(){
					BJS.updateSelect($("#LocalParroquiaId"),"/parroquias/getBySector/"+$("#LocalSectorId option:selected").val(),function(){});	
				});	
			});	
		});
	}

	$("#LocalProvinciaId").change(function(){
		actualizarGeoLocal();
	});
	$("#LocalCantonId").change(function(){
		BJS.updateSelect($("#LocalCiudadId"),"/ciudades/getByCanton/"+$("#LocalCantonId option:selected").val(),function(){
			BJS.updateSelect($("#LocalSectorId"),"/sectores/getByCiudad/"+$("#LocalCiudadId option:selected").val(),function(){
				BJS.updateSelect($("#LocalParroquiaId"),"/parroquias/getBySector/"+$("#LocalSectorId option:selected").val(),function(){});	
			});	
		});	
	});
	$("#LocalCiudadId").change(function(){
		BJS.updateSelect($("#LocalSectorId"),"/sectores/getByCiudad/"+$("#LocalCiudadId option:selected").val(),function(){
			BJS.updateSelect($("#LocalParroquiaId"),"/parroquias/getBySector/"+$("#LocalSectorId option:selected").val(),function(){});	
		});	
	});
	$("#LocalSectorId").change(function(){
		BJS.updateSelect($("#LocalParroquiaId"),"/parroquias/getBySector/"+$("#LocalSectorId option:selected").val(),function(){});	
	});
	/*______________________________*/
	$('#ArtesanoHasLocal').click(function(){
		if($(this).is(":checked")){
			$(".datos-local").addClass('tovalidate');
			$(".datos-local .fila-datos").show();
			$("#wizard").height($("#wizard").find(".page").eq(0).height());
		}else{
			$(".datos-local").removeClass('tovalidate');
			$(".datos-local .fila-datos").hide();
			$("#wizard").height($("#wizard").find(".page").eq(0).height());
		}
	});
	$("#wizard").height($("#wizard").find(".page").eq(0).height());
	var root = $("#wizard").scrollable();
	var api = root.scrollable();
	var drawer = $("#drawer");
	api.onBeforeSeek(function(event, i) {
		if (api.getIndex() < i) {
			var page = root.find(".page").eq(api.getIndex()),
				 inputs = page.find(".tovalidate .required :input").removeClass("error"),
				 empty = inputs.filter(function() {
					return $(this).val().replace(/\s*/g, '') == '';
				 });
				 $("#wizard").height(page.next().height());
				emails=inputs.filter(':email');
				emails = emails.filter(function(){
					var x=$(this).val();
					var atpos=x.indexOf("@");
					var dotpos=x.lastIndexOf(".");
					if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length)
					  {
					  return true;
					  }
				});

			if (empty.length || emails.length) {
				drawer.slideDown(function()  {
					drawer.css({"backgroundColor":"#EFBC00",'color':'black'});
					//setTimeout(function() { drawer.css({"backgroundColor":"#EFBC00",'color':'black'}); }, 1000);
				});
				empty.addClass("error");
				emails.addClass("error");
				return true; /*_________________XXXXXXXXXXXXXXXXXXXXXX_ELIMINAR FILA_XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX*/
				return false;
			} else {
				switch(api.getIndex()){
					case 1:
						if(totalInversion>capitalMaximoInversion){
							alert('El capital de inversión excede el capital máximo permitido ('+capitalMaximoInversion+')');
							return false;
						}
					break;
					case 2:
					break;
				}
				
				drawer.slideUp();
			}
		}
		$("#status li").removeClass("active").eq(i).addClass("active");
		return true;
	});
	
	/*__________VALIDACION ENVIO FORM*/
	$("#registro").submit(function(e){
		var valido=true;
		var page = root.find(".page").eq(api.getIndex()),
		inputs = page.find(".tovalidate :input").removeClass("error"),
		empty = inputs.filter(function() {
			return $(this).val().replace(/\s*/g, '') == '';
		 });
		
		if(totalRentabilidad < salarioMinimoUnificado){
			valido=false;
			e.preventDefault();
			alert('La rentabilidad es menor al mìnimo permitido para permitir una calificación');
		}
		if(!$("#CalificacionCalDomicilioPropio").is(":checked") && $("#CalificacionCalDomicilioValor").val()=="0,00"){
			$("#CalificacionCalDomicilioValor").addClass('error');
			valido=false;
			drawer.slideDown(function()  {
					drawer.css({"backgroundColor":"#EFBC00",'color':'black'});
					//setTimeout(function() { drawer.css({"backgroundColor":"#EFBC00",'color':'black'}); }, 1000);
				});
			e.preventDefault();		
		}
		if(!$("#CalificacionCalTallerPropio").is(":checked") && $("#CalificacionCalTallerValor").val()=="0,00"){
			$("#CalificacionCalTallerValor").addClass('error');
			valido=false;
			drawer.slideDown(function()  {
					drawer.css({"backgroundColor":"#EFBC00",'color':'black'});
					//setTimeout(function() { drawer.css({"backgroundColor":"#EFBC00",'color':'black'}); }, 1000);
			});
			e.preventDefault();	
		}
		if(valido){
			return true;	
		}
	});
	//_________________OTRAS VALIDACIONES
	var llenarDatosTrabajador= function(trabajador,$inputCedula){
		if(BJS.objectSize(trabajador)){
			var $tr=$inputCedula.parent().parent();
			$tr.find('.nombres').val(trabajador.Trabajador.tra_nombres_y_apellidos);
			$tr.find('.sexo').val(trabajador.Trabajador.tra_sexo);
				if(trabajador.Trabajador.tra_afiliado_seguro){
					$tr.find('.afiliado_seguro').attr('checked',true);
				}else{
					$tr.find('.afiliado_seguro').attr('checked',false);
				}
			$tr.find('.fecha_nacimiento').val(trabajador.Trabajador.tra_fecha_nacimiento);
		}
	
	}
	$(".selectCedula").change(function(){
		if(api.getIndex()){
			$(this).parent().parent().find('input').focus();
		}
	});
	$("input.cedulaUnica").blur(function(){
		var $that=$(this);
		var coincidencias=0;
		$.each($("input.cedulaUnica"),function(i,input){
			if($that.val() == $(input).val() && $that.val()!=""){
				coincidencias+=1;
				if(coincidencias == 2){
					$that.val('');
					alert('Esta cedula ya se encuentra en el formulario');
				}else{
					switch($that.parent().find('select option:checked').val()){
						case "1"://CEDULA
							if(checkCedulaEcuador($that.val())){
								BJS.post("/artesanos/verificarCedula/"+$that.val()+"/1",{},function(data){
									if(data){
										$that.val('');
										alert('La persona se encuentra registrada como Artesano');
									}else{
										BJS.JSON("/trabajadores/getData/"+$that.val()+"/1",{},function(trabajador){
											llenarDatosTrabajador(trabajador,$that);
										});
									}
								});
							}else{
								$that.val('');
							}
						break;
						case "0"://PASAPORTE
							BJS.post("/artesanos/verificarCedula/"+$that.val()+"/0",{},function(data){
								if(data){
									$that.val('');
									alert('La persona se encuentra registrada como Artesano');
								}else{
									BJS.JSON("/trabajadores/getData/"+$that.val()+"/0",{},function(trabajador){
										
										llenarDatosTrabajador(trabajador,$that);
									});
								}
							});
						break;
						
					}
				}
			}
		});
	});
	// FUNCIONALIDADES AÑADIR FILAS
	var tables={};
	tables.update= function(jtable){
		if(jtable['show'] <= jtable['till']){
			if(jtable['show'] == jtable['till']){
				jtable['button'].addClass('disabled');
			}
			jtable['show']+=1;
			jtable['jTable'].find('tr').hide();
			jtable['jTable'].find('tr:lt('+jtable['show']+')').show();
			$("#wizard").height($("#wizard").find(".page").eq(api.getIndex()).height());
		}
	}
	$.each($('.add-row'),function(i,val){
		tables[$(val).attr('rel')]={};
		tables[$(val).attr('rel')]['button']=$(val);
		tables[$(val).attr('rel')]['jTable']=$($(val).attr('rel'));
		tables[$(val).attr('rel')]['show']=$($(val).attr('rel')).attr('show');
		tables[$(val).attr('rel')]['till']=parseInt($($(val).attr('rel')).attr('till'));
		tables[$(val).attr('rel')]['show']=parseInt($($(val).attr('rel')).attr('show'))+1;
		tables[$(val).attr('rel')]['jTable'].find('tr').hide();
		tables[$(val).attr('rel')]['jTable'].find('tr:lt('+tables[$(val).attr('rel')]['show']+')').show();
	});
	
	$(".add-row").click(function(e){
		e.preventDefault();
		tables.update(tables[$(this).attr('rel')]);
	});
});
