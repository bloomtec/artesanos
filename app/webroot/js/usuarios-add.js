$(function() {
	$(document).ready(function() {
		makeChanges();
	});
	$('#UsuarioRolId').change(function() {
		makeChanges();
	});
	function makeChanges() {
		if ($('#UsuarioRolId').val() != 1) {
			$('.permisos-acl :input').removeAttr('disabled');
			$('.permisos-acl :input').removeAttr('checked');
			if($('#UsuarioRolId').val() == 3) {
				$('.campos-inspector').css('visibility', 'visible');
				$('#UsuarioCiudadId').removeAttr('disabled');
				$('#UsuarioSectorId').removeAttr('disabled');
			} else {
				$('#UsuarioCiudadId').attr('disabled', 'true');
				$('#UsuarioSectorId').attr('disabled', 'true');
				$('.campos-inspector').css('visibility', 'hidden');
			}
		} else {
			$('.permisos-acl :input').attr('disabled', 'true');
			$('.permisos-acl :input').attr('checked', 'checked');
			$('.campos-inspector').css('visibility', 'hidden');
		}
	}
});