<style type="text/css">
#contenedor{
	margin:auto;
	border:1px solid #339;
	width: 1122px;
	height:793px;
}

#contenedor2 {
	width: 950px;
	margin:50px auto;
	height:680px;
}

#sub_cont1{
	height:100px;
}

#sub_cont2{
	height:100px;
}

#imagen1{
	width:100px;
	height:100px;
	float:left;
}

#imagen2{
	width:100px;
	height:100px;
	float:left;
	
}

#encabezado1{
	width:820px;
	height:84px;
	float:right;
	padding:8px;
	
}

#titulo {
	font-size:36px;
}
#encabezado2{
	width:750px;
	height:80px;
	float:left;
	font-family: 'Tangerine', serif;
	font-size: 88px;
	padding:8px;
	text-align:center;
}

#parrafo {
	width:100%;
	height:25px;
	margin-top: 6px;
	font-size: 20px;
	
}

#texto {
	float:left;
	height:25px;
}

#texto_sub1 {
	height:25px;
	float:left;
	margin-left:4px;
	width:926px;
	border-bottom:1px solid #000;
}

#texto_sub2 {
	height:25px;
	float:left;
	margin-left:4px;
	width:748px;
	border-bottom:1px solid #000;
}

#texto_sub3 {
	height:25px;
	float:left;
	margin-left:4px;
	width:735px;
}

#texto_sub4 {
	height:25px;
	float:left;
	margin-top:6px;
	width:100%;
	border-bottom:1px solid #000;
}

#texto_sub5 {
	height:25px;
	float:left;
	margin-top:6px;
	width:100%;
	border-bottom:1px solid #000;
}

#texto_sub6 {
	height:25px;
	float:left;
	margin-top:6px;
	width:240px;
	border-bottom:1px solid #000;
}

#texto_sub7 {
	height:25px;
	float:left;
	width:330px;
	margin-top:6px;
	border-bottom:1px solid #000;
}

#texto_sub8 {
	height:25px;
	float:left;
	width:145px;
	margin-top:6px;
	border-bottom:1px solid #000;
}

#texto_sub9 {
	height:25px;
	float:left;
	width:100px;
	margin-top:6px;
	border-bottom:1px solid #000;
}

#firmas {
	margin-top: 60px;
	height:auto;
	float:left;
	width:100%;
}

#firma1{
	width:auto;
	text-align:center;
	float: left;
}

#firma2 {
	width:auto;
	text-align:center;
	float: left;
	margin-left: 175px;
}

#firma3{
	width:auto;
	text-align:center;
	float: right;
}

#directores {
	float:left;
	margin-top:60px;
	width:100%;
}

#director{
	float:left;
	margin-left:150px;
	width:auto;
}

#instructor{
	float:right;
	margin-right:180px;
	width:auto;
}

#slogan {
	float:left;
	margin-top:40px;
	width:100%;
	text-align:center;
	font-size: 22px;
}

#capa1{
	font-size: 20px;	
}
</style>

<div id="contenedor">
    <div id="contenedor2">
    	<div id="sub_cont1">
            <div id="imagen1">
            	imagen 1
            </div>
            <div id="encabezado1">
           		<span id="titulo"> JUNTA NACIONAL DE DEFENSA DEL ARTESANO</span>
                 <br />
                 <div style="text-align:center; font-size:16px;">PLAN NACIONAL DE CAPACITACIÓN, DIRIGIDO A TODOS LOS ARTESANOS DEL PAÍS<br />
                 CUMPLIDOS CON TODOS LOS REQUISITOS ESTIPULADOS POR LA J.N.D.A CONFIERE EL PRESENTE:</div>
            </div>
        </div>
        <div id="sub_cont2">
            <div id="imagen2">
            imagen 2
            </div>
            <div id="encabezado2">
            Certificado
            </div>
        </div>
        <br />
        <div id="capa1">
                <div id="parrafo">
                    <div id="texto">
                    A:
                    </div>
                    <div id="texto_sub1">
                     <?php echo $alumno["Alumno"]["alu_nombres"].' '.$alumno["Alumno"]["alu_apellido_paterno"].' '.$alumno["Alumno"]["alu_apellido_materno"]; ?>
                    </div>
                </div>
                
                 <div id="parrafo">
                    <div id="texto">
                    quien asistió al curso de:
                    </div>
                    <div id="texto_sub2">
                    Texto sub-rayado2
                    </div>
                </div>
                
                 <div id="parrafo">
                    <div id="texto">
                    con el siguiente contenido:
                    </div>
                    <div id="texto_sub3">
                    Texto sub-rayado3
                    </div>
                </div>
                
                
                 <div id="texto_sub4">
                    Texto sub-rayado3
                  </div>
                  
                   <div id="texto_sub5">
                    Texto sub-rayado3
                  </div>
                  
                  <div id="parrafo">
                        <div id="texto" style="margin-top:6px;">
                        dado y firmado en:
                        </div>
                        <div id="texto_sub6">
                        Texto sub-rayado6
                       </div>
                       <div id="texto" style="margin-top:6px;">
                        de:
                        </div>
                         <div id="texto_sub7">
                        Texto sub-rayado7
                       </div>
                       
                       <div id="texto" style="margin-top:6px;">
                        del 200
                        </div>
                         <div id="texto_sub8">
                        Texto8
                       </div>
                
                   </div>
                   
                    <div id="parrafo">
                        <div id="texto" style="margin-top:6px;">
                        con una duración de:
                        </div>
                        <div id="texto_sub9">
                        Texto 9
                       </div>
                      <div id="texto" style="margin-top:6px;">
                        horas.
                        </div>
          			 </div>
           </div>
           
          <div id="firmas">
          		<div id="firma1">
                <b>Gonzalo Borja Paredes</b><br />
                PRESIDENTE DE LA J.N.D.A
                </div>
                
                <div id="firma2">
                <b>Rocío Almeida Beltrán</b><br />
                SECRETARIA DE LA J.N.D.A
                </div>
                
                <div id="firma3">
                <b>Ángel Ortiz Sánchez</b><br />
                JEFE DE CAPACITACIÓN J.N.D.A
                </div>
          </div>
          
          <div id="directores">
          	<div id="director">
            DIRECTOR/A TÉCNICO/A DE LA J.N.D.A
            </div>
            <div id="instructor">
            INSTRUCTOR
            </div>
          </div>
          
          <div id="slogan">
          <i>TECNIFICADO Y CAPACITADO PARA EL DESARROLLO DEL SECTOR ARTESANAL DEL ECUADOR</i>
          </div>
    </div>
</div>