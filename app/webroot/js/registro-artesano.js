/*
 var capitalMaximoInversion: capital maximo de inversion pasado por php al entorno global
 var salarioMinimoUnificado:
 * */
var totalRentabilidad = 0;
var totalInversion = 0;
var indiceOperador = indiceAprendiz = 0;
$(function() {
	// FUNCIONALIDAD REGISTRO
	$('#wizard .page').css('width', $("#wizard").width());
	$('#wizard').css('height', $(".items").height());
	$('.porcentaje').hide();
	$('.submit').click(function() {
		$('form').submit();
	});
	$('#DatosPersonalDatTipoDiscapacidad').change(function() {
		if($(this).find('option:selected').val()) {
			$('.porcentaje').show();
		} else {
			$('.porcentaje').hide();
			$('.porcentaje input').val("");
		}
	});
	// BALANCES
	//CAPITAL
	$('.cantidad_maquinas , .valor_maquinas').blur(function() {
		actualizarMaquinariaYHerramientas();
	});
	$('.cantidad_materia_prima , .valor_materia_prima').blur(function() {
		actualizarMateriaPrima();
	});
	$('.cantidad_productos_elaborados , .valor_productos_elaborados').blur(function() {
		actualizarProductosElaborados();
	});
	// EGRESOS
	$('.salarioAprendiz').blur(function() {
		actualizarSalarioAprendiz();
	});
	$('.salarioOperarios').blur(function() {
		actualizarSalarioOperario();
	});
	$('.egresos input').blur(function() {
		actualizarEgresos();
	});
	$("#CalificacionCalDomicilioPropio").click(function() {
		if($(this).is(':checked')) {
			$('#CalificacionCalDomicilioValor').val(0).attr('disabled', true);
		} else {
			$('#CalificacionCalDomicilioValor').attr('disabled', false);
		}
		actualizarEgresos();
	});

	$("#CalificacionCalTallerPropio").click(function() {
		if($(this).is(':checked')) {
			$('#CalificacionCalTallerValor').val(0).attr('disabled', true);
		} else {
			$('#CalificacionCalTallerValor').attr('disabled', false);
		}
		actualizarEgresos();
	});
	//INGRESOS
	$('.ingresos input').blur(function() {
		actualizarIngresos();
	});
	actualizarSalarioOperario();
	actualizarSalarioAprendiz();
	actualizarCapital();
	actualizarIngresos();
	actualizarEgresos();
	actualizarRentabilidad();

	// FUNCIONALIDAD PARA VALIDAR CALIFICACION Y CONTROLLAR LOS LLENADOS DE DATOS
	$('.validarCalificacion #ArtesanoArtIsCedula').change(function(){
		switch($(this).val()){
			case "0": // PASAPORTE
			$('#ArtesanoArtCedula').setMask({ mask : '*', type : 'repeat' }).val('');
			break;
			case "1": // CEDULA
			$('#ArtesanoArtCedula').setMask({ mask : '9999', type : 'repeat' }).val();
			break;
		}
	});
	var validarCalificacion = function() {
		if($('.validarCalificacion #ArtesanoArtIsCedula option:selected').val() == 0/*si es pasaporte*/ || checkCedulaEcuador($("#wizard #ArtesanoArtCedula").val())) {
			if($("#wizard #ArtesanoArtCedula").val() == "" || $("#wizard #CalificacionRamaId").val() == "") {
				if($("#wizard #ArtesanoArtCedula").val() == "") {
					$("#wizard #ArtesanoArtCedula").addClass('error');
				}
				if($("#wizard #CalificacionRamaId").val() == "") {
					$("#wizard #CalificacionRamaId").addClass('error');
				}
				alert('Hay campos sin llenar necesarios para la validación');
				return false;
			}
			BJS.JSONP('/artesanos/validarCalificacion', {
				cedula : $("#ArtesanoArtCedula").val(),
				tipoDeCalificacion : $("#CalificacionTiposDeCalificacionId option:selected").val(),
				rama : $('#CalificacionRamaId option:selected').val()
			}, function(response) {

				if(response.Mensaje) {
					alert(response.Mensaje);
				}
				if(response.Calificar) {
					$("#wizard .validar").css('visibility', 'visible');
					$("#wizard .error").removeClass('error');
					if( typeof response.Datos != 'undefined') {
						if(response.Datos.DatosPersonal.length)
							llenarDatos('DatosPersonal', response.Datos.DatosPersonal[0]);
						indiceOperador = indiceAprendiz = 0;
						if(response.Datos.Local.length)
							llenarDatos('Local', response.Datos.Local[0]);
						if(response.Datos.Taller.length) {
							if(llenarDatos('Taller', response.Datos.Taller[0])) {
								if(llenarDatos('Calificacion', response.Datos.Calificacion)) {
									actualizarSalarioOperario();
									actualizarSalarioAprendiz();
									actualizarCapital();
									actualizarIngresos();
									actualizarEgresos();
									actualizarRentabilidad();
								}
							}
						}
					} else {
						$(".validar input[type!='hidden'][type!='checkbox']").val("");
						$(".validar input[type='checkbox']").attr('checked', false);
						//$('.validar select option:first-child').attr('selected',true).parent().change();
					}
				} else {
					$("#wizard .validar").css('visibility', 'hidden');
					$(".validar input[type!='hidden'][type!='checkbox']").val("");
					//$('input.valor').setMask({ mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' });
					$(".validar input[type='checkbox']").attr('checked', false);
					//$('.validar select option:first-child').attr('selected',true).parent().change();
				}
			});
		}
	}
	// BUSCAR RAMAS POR CODIGO
	$("#codigoRama").blur(function() {
		BJS.JSON('/ramas/getByCode/' + $(this).val(), {}, function(rama) {
			if(rama) {
				$("#ArtesanoGruposDeRamaId").val(rama.Rama.grupos_de_rama_id);
				BJS.updateSelect($("#CalificacionRamaId"), "/ramas/obtenerPorGrupo/" + rama.Rama.grupos_de_rama_id, function() {
					$("#CalificacionRamaId").val(rama.Rama.id);
				});
			}else{
				alert('código de rama no valido');
			}

		});
	});
	BJS.updateSelect($("#CalificacionRamaId"), "/ramas/obtenerPorGrupo/" + $("#ArtesanoGruposDeRamaId option:selected").val());
	$("#ArtesanoGruposDeRamaId").change(function() {
		BJS.updateSelect($("#CalificacionRamaId"), "/ramas/obtenerPorGrupo/" + $("#ArtesanoGruposDeRamaId option:selected").val());
	});

	$('.validarCalificacion a').click(function(e) {
		e.preventDefault();
		validarCalificacion();
	});
	/*_________PARAMETROS GEOGRAFICOS*/
	/*___________TALLER_______________*/
	var actualizarGeoTaller = function() {
		BJS.updateSelect($("#TallerCantonId"), "/cantones/getByProvincia/" + $("#TallerProvinciaId option:selected").val(), function() {
			BJS.updateSelect($("#TallerCiudadId"), "/ciudades/getByCanton/" + $("#TallerCantonId option:selected").val(), function() {
				BJS.updateSelect($("#TallerSectorId"), "/sectores/getByCiudad/" + $("#TallerCiudadId option:selected").val(), function() {
					BJS.updateSelect($("#TallerParroquiaId"), "/parroquias/getBySector/" + $("#TallerSectorId option:selected").val(), function() {
					});
				});
			});
		});
	}

	$("#TallerProvinciaId").change(function() {
		actualizarGeoTaller();
	});
	$("#TallerCantonId").change(function() {
		BJS.updateSelect($("#TallerCiudadId"), "/ciudades/getByCanton/" + $("#TallerCantonId option:selected").val(), function() {
			BJS.updateSelect($("#TallerSectorId"), "/sectores/getByCiudad/" + $("#TallerCiudadId option:selected").val(), function() {
				BJS.updateSelect($("#TallerParroquiaId"), "/parroquias/getBySector/" + $("#TallerSectorId option:selected").val(), function() {
				});
			});
		});
	});
	$("#TallerCiudadId").change(function() {
		BJS.updateSelect($("#TallerSectorId"), "/sectores/getByCiudad/" + $("#TallerCiudadId option:selected").val(), function() {
			BJS.updateSelect($("#TallerParroquiaId"), "/parroquias/getBySector/" + $("#TallerSectorId option:selected").val(), function() {
			});
		});
	});
	$("#TallerSectorId").change(function() {
		BJS.updateSelect($("#TallerParroquiaId"), "/parroquias/getBySector/" + $("#TallerSectorId option:selected").val(), function() {
		});
	});
	/*__________________LOCAL_________________________*/
	var actualizarGeoLocal = function() {
		BJS.updateSelect($("#LocalCantonId"), "/cantones/getByProvincia/" + $("#LocalProvinciaId option:selected").val(), function() {
			BJS.updateSelect($("#LocalCiudadId"), "/ciudades/getByCanton/" + $("#LocalCantonId option:selected").val(), function() {
				BJS.updateSelect($("#LocalSectorId"), "/sectores/getByCiudad/" + $("#LocalCiudadId option:selected").val(), function() {
					BJS.updateSelect($("#LocalParroquiaId"), "/parroquias/getBySector/" + $("#LocalSectorId option:selected").val(), function() {
					});
				});
			});
		});
	}

	$("#LocalProvinciaId").change(function() {
		actualizarGeoLocal();
	});
	$("#LocalCantonId").change(function() {
		BJS.updateSelect($("#LocalCiudadId"), "/ciudades/getByCanton/" + $("#LocalCantonId option:selected").val(), function() {
			BJS.updateSelect($("#LocalSectorId"), "/sectores/getByCiudad/" + $("#LocalCiudadId option:selected").val(), function() {
				BJS.updateSelect($("#LocalParroquiaId"), "/parroquias/getBySector/" + $("#LocalSectorId option:selected").val(), function() {
				});
			});
		});
	});
	$("#LocalCiudadId").change(function() {
		BJS.updateSelect($("#LocalSectorId"), "/sectores/getByCiudad/" + $("#LocalCiudadId option:selected").val(), function() {
			BJS.updateSelect($("#LocalParroquiaId"), "/parroquias/getBySector/" + $("#LocalSectorId option:selected").val(), function() {
			});
		});
	});
	$("#LocalSectorId").change(function() {
		BJS.updateSelect($("#LocalParroquiaId"), "/parroquias/getBySector/" + $("#LocalSectorId option:selected").val(), function() {
		});
	});
	/*______________________________*/
	$('#ArtesanoHasLocal').click(function() {
		if($(this).is(":checked")) {
			$(".datos-local").addClass('tovalidate');
			$(".datos-local .fila-datos").show();
			$("#wizard").height($("#wizard").find(".page").eq(0).height());
		} else {
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
		if(api.getIndex() < i) {
			var page = root.find(".page").eq(api.getIndex()), inputs = page.find(".tovalidate .required :input").removeClass("error"), empty = inputs.filter(function() {
				console.log($(this).attr('name'));
				return $(this).val().replace(/\s*/g, '') == '';
			});
			$("#wizard").height(page.next().height());
			emails = inputs.filter(':email');
			emails = emails.filter(function() {
				var x = $(this).val();
				var atpos = x.indexOf("@");
				var dotpos = x.lastIndexOf(".");
				if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= x.length) {
					return true;
				}
			});
			if(empty.length || emails.length) {
				drawer.slideDown(function() {
					drawer.css({
						"backgroundColor" : "#EFBC00",
						'color' : 'black'
					});
					//setTimeout(function() { drawer.css({"backgroundColor":"#EFBC00",'color':'black'}); }, 1000);
				});
				empty.addClass("error");
				emails.addClass("error");
				return false;
			} else {
				switch(api.getIndex()) {
					case 1:
						if(totalInversion > capitalMaximoInversion) {
							alert('El capital de inversión excede el capital máximo permitido (' + capitalMaximoInversion + ')');
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
	$("#registro").submit(function(e) {
		var valido = true;
		var page = root.find(".page").eq(api.getIndex()), inputs = page.find(".tovalidate :input").removeClass("error"), empty = inputs.filter(function() {
			return $(this).val().replace(/\s*/g, '') == '';
		});
		if(totalRentabilidad < salarioMinimoUnificado) {
			valido = false;
			e.preventDefault();
			alert('La rentabilidad es menor al mìnimo permitido para permitir una calificación');
		}
		if(!$("#CalificacionCalDomicilioPropio").is(":checked") && $("#CalificacionCalDomicilioValor").val() == "0,00") {
			$("#CalificacionCalDomicilioValor").addClass('error');
			valido = false;
			drawer.slideDown(function() {
				drawer.css({
					"backgroundColor" : "#EFBC00",
					'color' : 'black'
				});
				//setTimeout(function() { drawer.css({"backgroundColor":"#EFBC00",'color':'black'}); }, 1000);
			});
			e.preventDefault();
		}
		if(!$("#CalificacionCalTallerPropio").is(":checked") && $("#CalificacionCalTallerValor").val() == "0,00") {
			$("#CalificacionCalTallerValor").addClass('error');
			valido = false;
			drawer.slideDown(function() {
				drawer.css({
					"backgroundColor" : "#EFBC00",
					'color' : 'black'
				});
				//setTimeout(function() { drawer.css({"backgroundColor":"#EFBC00",'color':'black'}); }, 1000);
			});
			e.preventDefault();
		}
		if(valido) {
			return true;
		}
	});
	//_________________OTRAS VALIDACIONES

	var llenarDatosTrabajador = function(trabajador, $inputCedula) {
		if(BJS.objectSize(trabajador)) {
			var $tr = $inputCedula.parent().parent();
			$tr.find('.nombres').val(trabajador.Trabajador.tra_nombres_y_apellidos);
			$tr.find('.sexo').val(trabajador.Trabajador.tra_sexo);
			if(trabajador.Trabajador.tra_afiliado_seguro) {
				$tr.find('.afiliado_seguro').attr('checked', true);
			} else {
				$tr.find('.afiliado_seguro').attr('checked', false);
			}
			$tr.find('.fecha_nacimiento').val(trabajador.Trabajador.tra_fecha_nacimiento);
		}

	}
	$(".selectCedula").change(function() {
		if(api.getIndex()) {
			$input=$(this).parent().parent().find('input');
			$input.focus();
			switch($(this).val()){
				case "0": // PASAPORTE
				$input.setMask({ mask : '*', type : 'repeat' }).val('');
				break;
				case "1": // CEDULA
				$input.setMask({ mask : '9999', type : 'repeat' }).val();
				break;
			}
			
		}
	});
	$("input.cedulaUnica").blur(function() {
		var $that = $(this);
		var coincidencias = 0;
		$.each($("input.cedulaUnica"), function(i, input) {
			if($that.val() == $(input).val() && $that.val() != "") {
				coincidencias += 1;
				if(coincidencias == 2) {
					$that.val('');
					alert('Esta cedula ya se encuentra en el formulario');
				} else {
					switch($that.parent().find('select option:selected').val()) {
						case "1":
							//CEDULA
							if(checkCedulaEcuador($that.val())) {
								BJS.post("/artesanos/verificarCedula/" + $that.val() + "/1", {}, function(data) {
									if(data) {
										$that.val('');
										alert('La persona se encuentra registrada como Artesano');
									} else {
										BJS.JSON("/trabajadores/getData/" + $that.val() + "/1", {}, function(trabajador) {
											llenarDatosTrabajador(trabajador, $that);
										});
									}
								});
							} else {
								$that.val('');
							}
							break;
						case "0":
							//PASAPORTE
							BJS.post("/artesanos/verificarCedula/" + $that.val() + "/0", {}, function(data) {
								if(data) {
									$that.val('');
									alert('La persona se encuentra registrada como Artesano');
								} else {
									BJS.JSON("/trabajadores/getData/" + $that.val() + "/0", {}, function(trabajador) {

										llenarDatosTrabajador(trabajador, $that);
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
