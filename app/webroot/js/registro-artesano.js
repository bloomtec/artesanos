$(function(){
	// FUNCIONALIDAD REGISTRO
	$('#wizard .page').css('width',$("#wizard").width());
	$('#wizard').css('height',$(".items").height());
	$('.porcentaje').hide();
	$(':number').keydown(function(e){
		var key = e.charCode || e.keyCode || 0;
		console.log(key);
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
	$('#ArtesanoDatTipoDiscapacidad').change(function(){
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
				if($("#wizard #ArtesanoArtCedula").val()){
					validarCalificacion();
				}
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
		console.log(i);
		$("#status li").removeClass("active").eq(i).addClass("active");
		return true;
	});
	
	function validarCalificacion(){
		BJS.post('/artesanos/validarCalificacion',{cedula:$("#ArtesanoArtCedula").val(),tipoDeCalificacion:$("#ArtesanoTipoCalificaion option:selected").val(),rama:$('#ArtesanoRama option:selected').val()},function(response){
			if(response.Calificar){
				
			}else{
				alert(response.Mensaje);
			}
		});
	}
});
