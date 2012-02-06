$(function() {
	$(document).ready(function() {
		if ($('#UsuarioRolId').val() == 2) {
			$('.permisos-acl :input').removeAttr('disabled');
			$('.permisos-acl :input').removeAttr('checked');
		} else {
			$('.permisos-acl :input').attr('disabled', 'disabled');
		}
	});
	$('#UsuarioRolId').change(function() {
		if ($('#UsuarioRolId').val() == 2) {
			$('.permisos-acl :input').removeAttr('disabled');
			$('.permisos-acl :input').removeAttr('checked');
		} else {
			$('.permisos-acl :input').attr('disabled', 'disabled');
			$('.permisos-acl :input').attr('checked', 'checked');
		}
	});
});