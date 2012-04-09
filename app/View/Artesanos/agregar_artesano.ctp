<div class="artesanos form">
	<?php echo $this -> Form -> create('Artesano');?>
	<fieldset>
		<h2><?php echo __('Agregar Artesano');?></h2>
		<?php
		echo $this -> Form -> input('art_is_cedula', array('label' => false, 'div'=>'input select usu-cedula', 'type' => 'select','options'=>array('1'=>'Cédula: ','0'=>'Pasaporte: ')));
		echo $this -> Form -> input('art_cedula', array('label' => false,"style"=>"margin-top:5px","class"=>""));
		?>
	</fieldset>
	<?php echo $this -> Html -> link(__('Cancelar'), array('action'=>'index'), array('class' => 'cancelar'));?>
	<?php echo $this -> Form -> end(__('Guardar'));?>
</div>
<script type="text/javascript">
	$(function(){
		switch($('#ArtesanoArtIsCedula').val()){
			case "0": // PASAPORTE
			$('#ArtesanoArtCedula').setMask({ mask : '*', type : 'repeat' }).val();
			break;
			case "1": // CEDULA
			$('#ArtesanoArtCedula').setMask({ mask : '9999', type : 'repeat' }).val();
			break;
		}
	});
</script>