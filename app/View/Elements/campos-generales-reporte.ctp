<div class="input">
	<label for="CdrFechaInicial">Fecha Inicial</label>
	<input type="date" id="CdrFechaInicial" class="input" name="data[Cdr][fecha_inicial][fecha]" value="<?php echo $ayer[0]."-".$ayer[1]."-".$ayer[2]?>" />
</div>
<div class="input">
	<label for="CdrHoraFinal">Hora Inicial</label>
	<!--<input type="time" id="CdrHoraInicial" class="input" required="required" name="data[Cdr][hora_inicial]" />-->
	<input type="number" class='time hour' max="23" min="0"   class="input" name="data[Cdr][fecha_inicial][hora]" value="<?php echo $hoy[3];?>" />
	<input type="number" class='time minute' max="59" min="0" class="input" name="data[Cdr][fecha_inicial][minuto]" value="<?php echo $hoy[4];?>" />
	<input type="number" class='time second' max="59" min="0" class="input" name="data[Cdr][fecha_inicial][segundo]" value="<?php echo $hoy[5];?>" />
	<span class='description'> &nbsp;&nbsp;(hora-minuto-segundo) </span>
</div>
<div class="input">
	<label for="CdrFechaFinal">Fecha Final</label>
	<input type="date" id="CdrFechaFinal" class="input" name="data[Cdr][fecha_final][fecha]" value="<?php echo $hoy[0]."-".$hoy[1]."-".$hoy[2]?>" />
</div>
<div class="input">
	<label for="CdrHoraFinal">Hora Inicial</label>
	<!--<input type="time" id="CdrHoraInicial" class="input" required="required" name="data[Cdr][hora_inicial]" />-->
	<input type="number" class='time hour' max="23" min="0"   class="input" name="data[Cdr][fecha_final][hora]" value="<?php echo $hoy[3];?>" />
	<input type="number" class='time minute' max="59" min="0" class="input" name="data[Cdr][fecha_final][minuto]" value="<?php echo $hoy[4];?>" />
	<input type="number" class='time second' max="59" min="0" class="input" name="data[Cdr][fecha_final][segundo]" value="<?php echo $hoy[5];?>" />
	<span class='description'> &nbsp;&nbsp;(hora-minuto-segundo) </span>
</div>