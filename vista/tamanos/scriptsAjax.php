<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_tamano_equipos(cod_tam_equipos){
	    $.ajax({
	        url: "../../controlador/ajaxTamano_equipos.php",
	        data: "cod_tam_equipos="+cod_tam_equipos+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {
	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
	          $("#"+key).val(value);
	        });
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el tamano_equipos
	function crea_tamano_equipos(){
		var formElement = document.getElementById("form_tamano_equipos");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxTamano_equipos.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_tamano_equipos").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("tamano_equiposModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el tamano_equipos
	function edita_tamano_equipos(){
		var formElement = document.getElementById("form_tamano_equipos");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxTamano_equipos.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_tamano_equipos").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("tamano_equiposModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el tamano_equipos
	function elimina_tamano_equipos(cod_tam_equipos){
	    $.ajax({
	      url: "../../controlador/ajaxTamano_equipos.php",
	      data: 'cod_tam_equipos='+cod_tam_equipos+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_tamano_equipos").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("tamano_equiposModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}
</script>