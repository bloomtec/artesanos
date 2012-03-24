<style>
#registroAlumnos input{
	width:100px;
}
</style>

<div class="buscador-alumnos">
	<table  id="registroAlumnos" show="10" till="200">
		<tr>
			<th>Documento de identidad</th>
			<th>Nombre completo</th>
		</tr>
		<?php for($i=0; $i<200; $i++):?>
		<tr>
			<td>
				<input type='text' class='inputDocumento' rel='<?php echo $i; ?>' value="<?php if(isset($alumnos['Alumno'][$i])) echo $alumnos['Alumno'][$i]['alu_documento_de_identificacion']?>" />
				<?php 
				$id = isset($alumnos['Alumno'][$i])?$alumnos['Alumno'][$i]['id']:"";
					echo $this -> Form -> hidden('Alumno.Alumno.'.$i,array('class'=>'id','rel'=>$i, "value"=>$id)) 
				?>
			</td>
			<td>
				<span rel='<?php echo $i; ?>'> <?php if(isset($alumnos['Alumno'][$i])) echo $alumnos['Alumno'][$i]['alu_nombres']." ".$alumnos['Alumno'][$i]['alu_apellido_paterno']." ".$alumnos['Alumno'][$i]['alu_apellido_materno']?> </span>
			</td>
		</tr>
		<?php endfor;?>
	</table>
	<a class="add-row button" href="#" rel="#registroAlumnos">Agregar Otro</a>
</div>

<div class="alumnos-container">
	
</div>
<script type="text/javascript">
	$(function(){
		$(".inputDocumento").keydown(function(){
			var $that=$(this);
			$("input.id[rel='"+$that.attr('rel')+"']").val("");
		});
		$(".inputDocumento").blur(function(){
			var $that=$(this);
			if($that.val()){
				BJS.JSON("/alumnos/get/"+$that.val(),{},function(data){
					if(data){
						$("input.id[rel='"+$that.attr('rel')+"']").val(data.Alumno.id);
						$("span[rel='"+$that.attr('rel')+"']").text(data.Alumno.alu_nombres+" "+data.Alumno.alu_apellido_paterno+" "+data.Alumno.alu_apellido_materno);
					}else{
						$that.focus();
						alert('El alumno no se encuentra registrado');
					}
				});
			}
		});
	});
</script>