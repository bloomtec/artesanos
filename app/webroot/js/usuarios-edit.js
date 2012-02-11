$(function() {
	$(document).ready(function() {
		//$('.permisos-acl :input').attr('disabled', 'disabled');
		if ($('#UsuarioRolId').val() == 2) {
			$('.permisos-acl :input').removeAttr('disabled');
		} else {
			$('.permisos-acl :input').attr('disabled', 'disabled');
			//$('.permisos-acl :input').attr('checked', 'checked');
		}
	});
	$('#UsuarioRolId').change(function() {
		if ($('#UsuarioRolId').val() == 2) {
			$('.permisos-acl :input').removeAttr('disabled');
			//$('.permisos-acl :input').removeAttr('checked');
		} else {
			if(confirm('Se le asignaran todos los permisos a este usuario si continua.')) {
				$('.permisos-acl :input').attr('disabled', 'disabled');
				$('.permisos-acl :input').attr('checked', 'checked');
			}
		}
	});
});