/*
 var capitalMaximoInversion: capital maximo de inversion pasado por php al entorno global
 var salarioMinimoUnificado: 
 * */
var totalRentabilidad=0;
var totalInversion=0;
$(function(){
	// FUNCIONALIDAD REGISTRO
	$('#wizard .page').css('width',$("#wizard").width());
	$('#wizard').css('height',$(".items").height());
	$('.porcentaje').hide();
	$(':number').keydown(function(e){
		var key = e.charCode || e.keyCode || 0;
		return (
		     key == 8 || 
		     key == 190 ||
		     key == 188 ||   
		     key == 9 ||
		     key == 46 ||
		     (key >= 37 && key <= 40) ||
		     (key >= 48 && key <= 57) ||
		     (key >= 96 && key <= 105)
		     );
	});
	$('#DatosPersonalDatTipoDiscapacidad').change(function(){
		if($(this).find('option:selected').val()){
			$('.porcentaje').show();	
		}else{
			$('.porcentaje').hide();
		}
	});
	BJS.updateSelect($("#ArtesanoRama"),"/ramas/obtenerPorGrupo/"+$("#ArtesanoGrupoRama option:selected").val());
	$("#wizard .validarCalificacion select").change(function(){
		if($(this).attr('id') == "ArtesanoGrupoRama"){//actualiza el selects de ramas
			BJS.updateSelect($("#ArtesanoRama"),"/ramas/obtenerPorGrupo/"+$("#ArtesanoGrupoRama option:selected").val(),function(){
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
	});
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
	actualizarGeoTaller();
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
	actualizarGeoLocal();
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
	$("#TallerCiudadId").change(function(){
		BJS.updateSelect($("#TallerSectorId"),"/sectores/getByCiudad/"+$("#TallerCiudadId option:selected").val(),function(){
			BJS.updateSelect($("#LocalParroquiaId"),"/parroquias/getBySector/"+$("#TallerSectorId option:selected").val(),function(){});	
		});	
	});
	$("#TallerSectorId").change(function(){
		BJS.updateSelect($("#LocalParroquiaId"),"/parroquias/getBySector/"+$("#TallerSectorId option:selected").val(),function(){});	
	});
	/*______________________________*/
	var root = $("#wizard").scrollable();
	var api = root.scrollable();
	var drawer = $("#drawer");
	api.onBeforeSeek(function(event, i) {
		if (api.getIndex() < i) {
			var page = root.find(".page").eq(api.getIndex()),
				 inputs = page.find(".required :input").removeClass("error"),
				 empty = inputs.filter(function() {
					return $(this).val().replace(/\s*/g, '') == '';
				 });
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
				return false;
			} else {
				switch(api.getIndex()){
					case 1:
						if(totalInversion>capitalMaximoInversion){
							alert('El capital de inversión excede el capital máximo permitido');
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
	
	function validarCalificacion(){
		if(!$("#wizard #ArtesanoArtCedula").val()){// LOGICA DE VALIDACION DE FORMATO DE CEDULA
			alert('No ha escrito la cedula del artesano');	
		}else{
			BJS.JSONP('/artesanos/validarCalificacion',{cedula:$("#ArtesanoArtCedula").val(),tipoDeCalificacion:$("#ArtesanoTipoCalificaion option:selected").val(),rama:$('#ArtesanoRama option:selected').val()},function(response){
				
				if(response.Calificar){
					$("#wizard .validar").css('visibility','visible');
				}else{
					alert(response.Mensaje);
				}
			});
		}
	}
	
	//BALANCES
	var actualizarRentabilidad = function(){
		var ingresos = parseFloat($('#CalificacionCalBalanceTotalIngresos').val())?parseFloat($('#CalificacionCalBalanceTotalIngresos').val()):0;
		var egresos = parseFloat($('#CalificacionCalBalanceTotalEgresos').val())?parseFloat($('#CalificacionCalBalanceTotalEgresos').val()):0;
		$("#CalificacionCalBalanceRentabilidadMensual").val(ingresos-egresos);
		totalRentabilidad=ingresos-egresos;
	}
	/*____________CAPITAL__________________*/
	var actualizarCapital=function(){
		var totalMaquinas = parseFloat($('.maquinas_y_herramientas').val())? parseFloat($('.maquinas_y_herramientas').val()):0;
		var totalMateriaPrima = parseFloat($('.materia_prima').val())?  parseFloat($('.materia_prima').val()):0; 
		var totalProductosElaborados = parseFloat($('.productos_elaborados').val())? parseFloat($('.productos_elaborados').val()):0;
		$('.total_capital').val(totalMaquinas+totalMateriaPrima+totalProductosElaborados);
		totalInversion = totalMaquinas+totalMateriaPrima+totalProductosElaborados;
	}
	var actualizarMaquinariaYHerramientas=function(){
		var total=0;
		var $maquinas =$('.valor_maquinas');
		var lenght = $maquinas.length-1;
		var cantidad=0;
		var valor=0;
		$.each($maquinas,function(i,val){
			cantidad=parseInt($($('.cantidad_maquinas')[i]).val());
			valor=$(val).val();
			if( valor && cantidad){
				total+=cantidad*parseFloat($(val).val());
			}
			if( lenght == i){
				$('.maquinas_y_herramientas').val(total);
			}
		});
		actualizarCapital();
	}
	var actualizarMateriaPrima=function(){
		var total=0;
		var $maquinas =$('.valor_materia_prima');
		var lenght = $maquinas.length-1;
		var cantidad=0;
		var valor=0;
		$.each($maquinas,function(i,val){
			cantidad=parseInt($($('.cantidad_materia_prima')[i]).val());
			valor=$(val).val();
			if( valor && cantidad){
				total+=cantidad*parseFloat($(val).val());
			}
			if( lenght == i){
				$('.materia_prima').val(total);
			}
		});
		actualizarCapital();
	}

	var actualizarProductosElaborados=function(){
		var total=0;
		var $maquinas =$('.valor_productos_elaborados');
		var lenght = $maquinas.length-1;
		var cantidad=0;
		var valor=0;
		$.each($maquinas,function(i,val){
			cantidad=parseInt($($('.cantidad_productos_elaborados')[i]).val());
			valor=$(val).val();
			if( valor && cantidad){
				total+=cantidad*parseFloat($(val).val());
			}
			if( lenght == i){
				$('.productos_elaborados').val(total);
			}
		});
		actualizarCapital();
	}
	$('.cantidad_maquinas , .valor_maquinas').keyup(function(){
		actualizarMaquinariaYHerramientas();
	});
	$('.cantidad_materia_prima , .valor_materia_prima').keyup(function(){
		actualizarMateriaPrima();
	});
	$('.cantidad_productos_elaborados , .valor_productos_elaborados').keyup(function(){
		actualizarProductosElaborados();
	});
	
	/*____________EGRESOS__________________*/
	var actualizarEgresos=function(){
	 	var totalSalarioAprendices = parseFloat($('.salario_aprendices').val())? parseFloat($('.salario_aprendices').val()):0;
		var totalSalarioOperarios= parseFloat($('.salario_operarios').val())?  parseFloat($('.salario_operarios').val()):0; 
		var domicilio = parseFloat($('#CalificacionCalDomicilioValor').val())? parseFloat($('#CalificacionCalDomicilioValor').val()):0;
		var taller = parseFloat($('#CalificacionCalTallerValor').val())? parseFloat($('#CalificacionCalTallerValor').val()):0;
		var agua = parseFloat($('#CalificacionCalificacionCalAgua').val())? parseFloat($('#CalificacionCalificacionCalAgua').val()):0;
		var luz = parseFloat($('#CalificacionCalificacionCalLuz').val())? parseFloat($('#CalificacionCalificacionCalLuz').val()):0;
		var telefono = parseFloat($('#CalificacionCalificacionCalTelefono').val())? parseFloat($('#CalificacionCalificacionCalTelefono').val()):0;
		var servicios = parseFloat($('#CalificacionCalificacionCalServiciosBasicos').val())? parseFloat($('#CalificacionCalificacionCalServiciosBasicos').val()):0;
		var materiaPrima = parseFloat($('#CalificacionCalCompraDeMateriaPrimaMensual').val())? parseFloat($('#CalificacionCalCompraDeMateriaPrimaMensual').val()):0;	
	 	$('.total_egresos, #CalificacionCalBalanceTotalEgresos').val(totalSalarioAprendices+totalSalarioOperarios+domicilio+taller+agua+luz+telefono+servicios+materiaPrima);
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
				total+=parseFloat(valor);
			}
			if( lenght == i){
				$('.number .salario_operarios').val(total);
			}
		});
		actualizarEgresos();
	}
	var actualizarSalarioAprendiz=function(){
		var total=0;
		var $salarios =$('.salarioAprendiz');
		var lenght = $salarios.length-1;
		var valor=0;
		$.each($salarios,function(i,val){
			valor=$(val).val();
			if( valor){
				total+=parseFloat(valor);
			}
			if( lenght == i){
				$('.number .salario_aprendices').val(total);
			}
		});
		actualizarEgresos();
	}
	$('.salarioAprendiz').keyup(function(){
		actualizarSalarioAprendiz();
	});
	$('.salarioOperarios').keyup(function(){
		actualizarSalarioOperario();
	});
	$('.egresos input').keyup(function(){
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
		var porventas = parseFloat($('#CalificacionCalIngresosPorVentas').val())? parseFloat($('#CalificacionCalIngresosPorVentas').val()):0;
		var otros= parseFloat($('#CalificacionCalOtrosIngresos').val())?  parseFloat($('#CalificacionCalOtrosIngresos').val()):0; 
		$('#CalificacionCalTotalIngresos, #CalificacionCalBalanceTotalIngresos').val(porventas+otros);
		actualizarRentabilidad();
	}
	$('.ingresos input').keyup(function(){
		actualizarIngresos();
	});
	
	/*__________VALIDACION ENVIO FORM*/
	$("#registro").submit(function(e){
		if(totalRentabilidad < salarioMinimoUnificado){
			e.preventDefault();
			alert('La rentabilidad es menor al mìnimo permitido para permitir una calificación');
		}else{
			return true;
		}
	});
	actualizarIngresos();
	actualizarEgresos();
	actualizarRentabilidad();

});
