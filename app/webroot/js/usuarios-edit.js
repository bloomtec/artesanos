$(function() {
	$(document).ready(function() {
		if ($('#UsuarioRolId').val() != 1) {
			$('.permisos-acl :input').removeAttr('disabled');
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
			$('.permisos-acl :input').attr('disabled', 'disabled');
			$('.campos-inspector').css('visibility', 'hidden');
		}
	});
	$('#UsuarioRolId').change(function() {
		if ($('#UsuarioRolId').val() != 1) {
			$('.permisos-acl :input').removeAttr('disabled');
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
			if($('#UsuarioRolId').val() == 1 && confirm('Se le asignaran todos los permisos a este usuario si continua.')) {
				$('.permisos-acl :input').attr('disabled', 'disabled');
				$('.permisos-acl :input').attr('checked', 'checked');
			}
			$('.campos-inspector').css('visibility', 'hidden');
		}
	});
});