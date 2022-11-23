<script type="text/javascript">
	//Funcion para guardar el equipo
	function crea_equipo(){
		var formElement = document.getElementById("form_equipo");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxEquipos.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_equipo").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('recargar()',1000);
			}
		}) 
	}

	//Funcion para guardar el equipo
	function edita_equipo(){
		var formElement = document.getElementById("form_equipo");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxEquipos.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_equipo").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('recargar()',1000);
			}
		}) 
	}

    //Funcion boton agregar partes
	$("#agregarPartes").click(function(){
		if($('#cod_tipo_parte').val() == '' || $('#cod_parte').val() == ''){
			alertify.alert(
          		'Campos incompletos',
          		'Verifique la parte y el tipo de parte',
          	function(){
            	alertify.error('Campos vacios');
        	});
		} else {
			$("#cod_parte option:selected").each(function () {
            	nomParte=$(this).text();
        	});
			$("#cod_tipo_parte option:selected").each(function () {
            	nomTipoParte=$(this).text();
        	});
        	agregarPartes($('#cod_parte').val(), nomParte, $('#cod_tipo_parte').val(), nomTipoParte);			
		}
	});

	//Funcion para agregar partes
	function agregarPartes(parte, nomParte, tipo_parte, nomTipoParte){
		contador = parseInt($('#contador').val());
		$("#tablaPartes>tbody").append('<tr id="'+ contador + '"><td><input type="hidden" name="cod_parte_'+ contador + '" value="'+ parte + '">' + nomParte + '</td><td><input type="hidden" name="cod_tipo_parte_'+ contador + '" value="'+ tipo_parte + '">' + nomTipoParte + '</td><td><button type="button" id="btn_'+ contador + '" data-parte="' + parte + '" data-tipo-parte="' + tipo_parte + '" class="btn btn-primary w-100" onclick="quitarPartes(' + contador + ')"><i class="fa-solid fa-minus"></i></button></td></tr>');
		contador = contador + 1;
		$('#contador').val(contador);
		limpiarTabla();
	}

	//Funcion para quitar partes
	function quitarPartes(fila){
		$("#" + fila).remove();
	}

	//Funcion para limpiar tabla
	function limpiarTabla(){
		$('#cod_tipo_parte').val('');
		$('#cod_parte').val('');
	}
</script>