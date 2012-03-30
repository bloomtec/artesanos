<style>
#registroAlumnos input{
	width:100px;
}
</style>

<div class="buscador-alumnos">
	<?php //debug($alumnos);?>
	<?php //debug($this -> data);?>
	<table  id="registroAlumnos" show="10" till="200">
		<tr>
			<th>Documento de identidad</th>
			<th>Nombre completo</th>
		</tr>
		<?php for($i=0; $i<200; $i++):?>
		<tr>
			<td>
				<?php $id = isset($alumnos[$i]['Alumno'])?$alumnos[$i]['Alumno']['id']:""; ?>
				<?php if($id){ ?>
					<span>
						<?php 
						echo $alumnos[$i]['Alumno']['alu_documento_de_identificacion'] ;
						echo $this -> Form -> hidden('Alumno.Alumno.'.$i,array('class'=>'id','rel'=>$i, "value"=>$id)) ;
						?>
					</span>
				
				<?php }else{ ?>
					<input type='text' class='inputDocumento' rel='<?php echo $i; ?>' value="<?php if(isset($this -> data['Extra']['Alumno'][$i])) echo $this -> data['Extra']['Alumno'][$i]['documento']?>" />
					<?php 
						$idExtra = isset($this -> data['Extra']['Alumno'][$i]['id'])?$this -> data['Extra']['Alumno'][$i]['id']:"";
						$cedulaExtra = isset($this -> data['Extra']['Alumno'][$i]['documento'])?$this -> data['Extra']['Alumno'][$i]['documento']:"";
						$labelExtra = isset($this -> data['Extra']['Alumno'][$i]['label'])?$this -> data['Extra']['Alumno'][$i]['label']:"";
						echo $this -> Form -> hidden('Alumno.Alumno.'.$i,array('class'=>'id','rel'=>$i, "value"=>$idExtra)) ;
						echo $this -> Form -> hidden('Extra.Alumno.'.$i.'.id',array('class'=>'id','rel'=>$i, "value"=>$idExtra)) ;
						echo $this -> Form -> hidden('Extra.Alumno.'.$i.'.documento',array('class'=>'documento','rel'=>$i, "value"=>$cedulaExtra)) ;
						echo $this -> Form -> hidden('Extra.Alumno.'.$i.'.label',array('class'=>'label','rel'=>$i, "value"=>$labelExtra)) ;
					?>
				<?php } ?>
			</td>
			<td>
				<span rel='<?php echo $i; ?>'> 
					<?php 
						if(isset($id) && isset($alumnos[$i]['Alumno'])){
							echo $alumnos[$i]['Alumno']['alu_nombres']." ".$alumnos[$i]['Alumno']['alu_apellido_paterno']." ".$alumnos[$i]['Alumno']['alu_apellido_materno'];
						}else{
							if(isset($this -> data['Extra']['Alumno'][$i])){
									echo $this -> data['Extra']['Alumno'][$i]['label'];
							}
						}
					?> 
				</span>
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
						$("input.id[rel='"+$that.attr('rel')+"'][class='id']").val(data.Alumno.id);
						$("input.documento[rel='"+$that.attr('rel')+"']").val(data.Alumno.alu_documento_de_identificacion);
						$("input.label[rel='"+$that.attr('rel')+"']").val(data.Alumno.alu_nombres+" "+data.Alumno.alu_apellido_paterno+" "+data.Alumno.alu_apellido_materno);
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