$(function() {
	/*$.tools.dateinput.localize("es",  {
		   months:        'enero,febrero,marzo,abril,mayo,junio,julio,agosto,' +
		                   	'septiembre,octubre,noviembre,diciembre',
		   shortMonths:   'ene,feb,mar,abr,may,jun,jul,ago,sep,oct,nov,dic',
		   days:          'domingo,lunes,martes,miercoles,jueves,viernes,sabado',
		   shortDays:     'dom,lun,mar,mie,jue,vie,sab'
		});
	$(":date,input.date").dateinput({
		// this is displayed to the user
		format : 'yyyy-mm-dd',
		offset : [0, 0],
		lang: 'es',
		firstDay: 1,
		selectors: true,
		yearRange: [-100,100]
	});*/
	$(".index .search-generic").click(function() {
		search();
	});
	$(".text-search-generic").keypress(function(e) {
		if(e.keyCode == 13){
			search();
		}
	});
	
	function search() {
		var url = BJS.setParam('query', $(".index .search input[type='text']").val());
		var indexQuery = url.indexOf('query');
		console.log(indexQuery);
		var beforeQuery = url.substring(0, indexQuery);
		var afterQuery = url.substring(indexQuery);
		// console.log();
		if(url.indexOf("index") < 0) {
			document.location = beforeQuery + "index/" + afterQuery;
		} else {
			document.location = beforeQuery + afterQuery;
		}
	}
	
	/*FUNCIONALIDAD PROPIA DEL PROYECT*/
	$.each($("#main-menu > ul > li"),function(i,val){
		if($(val).find("ul").length){
			$(val).addClass("opened");
		}
	});
	$("#main-menu > ul > li").click(function(e){
		if($(e.target).is("#main-menu > ul > li")){// Si el evento lo lanza el li
			if($(this).is('.opened')){
				$(this).removeClass('opened');
				$(this).addClass('closed')
			}else{
				if($(this).is('.closed')){
					$(this).removeClass('closed');
					$(this).addClass('opened')
				}
			}
		}
	});
	//VALIDATOR
	$.tools.validator.localize("es", {
		'*'			: 'Valor del campo no valido',
		':email'  	: 'Formato de email no valido',
		':number' 	: 'Este campo debe ser númerico',
		':url' 		: 'Formato de URL no valido',
		'[max]'	 	: 'Este campo no puede ser mayor que $1',
		'[min]'		: 'Este campo no puede ser menor que 	$1',
		'[required]'	: 'Campo obligatorio'
	});
	$('form[id!=registro]').validator({lang:'es',messageClass:'error-form'});
	
	//TOOLTIPS
	$(".actions a[title]").tooltip({ position: "bottom center", opacity: 1});
	
	//TRANSFORMACION A MAYUSCULA
	$("input[type='text']").keyup(function(e){
		$(this).val($(this).val().toUpperCase());
	});
	
	//Mascaras
	$.mask2.definitions['2']='[12]';
	$.mask2.definitions['3']='[123]';
	$(".telefono").mask2("(99) 9999-999"); 
	$(":date").mask2("9999-39-92"); 
	$("input.date").mask2("9999-39-92");
	$(":date , input.date").attr('placeholder','aaaa-mm-dd');
	$('input.valor').setMask({ mask : '99,999.999.999.999', type : 'reverse', defaultValue: '000' });
	$('input.number').setMask({ mask : '9999', type : 'repeat' });
});
