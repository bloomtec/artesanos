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
});
