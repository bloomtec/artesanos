<div class="usuarios view">
	<h2><?php  echo __('Usuario');?></h2>
		<label><?php echo __('Nombre De Usuario'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_nombre_de_usuario']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Rol'); ?></label>
		<h3>
			<?php echo h($usuario['Rol']['rol_nombre']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Unidad'); ?></label>
		<h3>
			<?php
				echo h($this -> requestAction('/parametros_informativos/getNombreItemParametro/13/'.$usuario['Usuario']['usu_unidad']));
			?>
			&nbsp;
		</h3>
		<label><?php echo __('Cedula'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_cedula']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Nombres Y Apellidos'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['usu_nombres_y_apellidos']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Activo'); ?></label>
		<h3>
			<?php // echo h($usuario['Usuario']['usu_activo']); ?>
			<?php if($usuario['Usuario']['usu_activo']) { ?> 
				 <input type='checkbox' checked='checked' disabled='true' class='checkbox'/> 
			 <?php } else { ?> 
				 <input type='checkbox' disabled='true' class='checkbox'/>
			 <?php } ?>
			&nbsp;
		</h3>
		<label><?php echo __('Creado'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['created']); ?>
			&nbsp;
		</h3>
		<label><?php echo __('Modificado'); ?></label>
		<h3>
			<?php echo h($usuario['Usuario']['modified']); ?>
			&nbsp;
		</h3>
</div>
<?php // if($usuario['Usuario']['rol_id'] != 1) : ?>
<div class="permisos-acl" style="margin-top: 280px;">
	<h2><?php echo __('Permisos');?></h2>
	<br />
	<br />
	<?php
	$modulos = $this -> requestAction('/usuarios/getInfoPermisos');
	foreach ($modulos as $key => $modulo) {
		echo '<div class="modulo-' . key($modulo) . '">';
		echo '<p><b>'. key($modulo) .'</b></p>';
		echo '<table class="tabla-permisos"><tr>';
		foreach($modulo[key($modulo)] as $key => $accion) {
			echo '<td class="accion-permiso">';
			if($permisos['Permisos'][key($modulo)][$key]) {
				echo $this -> Form -> input('Permisos.'.key($modulo).'.'.$key, array('type'=>'checkbox', 'label'=>$accion, 'checked'=>'checked'));
			} else {
				echo $this -> Form -> input('Permisos.'.key($modulo).'.'.$key, array('type'=>'checkbox', 'label'=>$accion));
			}
			echo '</td>';
		}
		echo '</tr></table>';
		echo '</div>';
	}
	?>
</div>
<script type="text/javascript">
	$(function() {
		$(document).ready(function() {
			$('.permisos-acl :input').attr('disabled', 'disabled');
		});
	});
</script>
<?php // endif; ?>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(__('Volver Usuarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Modificar Usuario'), array('action' => 'edit', $usuario['Usuario']['id'])); ?> </li>
	</ul>
</div>