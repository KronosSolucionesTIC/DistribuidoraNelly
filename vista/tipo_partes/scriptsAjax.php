<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_tipo_partes(cod_tipo_partes){
	    $.ajax({
	        url: "../../controlador/ajaxTipo_partes.php",
	        data: "cod_tipo_partes="+cod_tipo_partes+"&tipo=consulta",
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

	//Funcion para guardar el tipo_partes
	function crea_tipo_partes(){
		var formElement = document.getElementById("form_tipo_partes");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxTipo_partes.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_tipo_partes").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("tipo_partesModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el tipo_partes
	function edita_tipo_partes(){
		var formElement = document.getElementById("form_tipo_partes");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxTipo_partes.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_tipo_partes").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("tipo_partesModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el tipo_partes
	function elimina_tipo_partes(cod_tipo_partes){
	    $.ajax({
	      url: "../../controlador/ajaxTipo_partes.php",
	      data: 'cod_tipo_partes='+cod_tipo_partes+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_tipo_partes").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("tipo_partesModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}
</script>