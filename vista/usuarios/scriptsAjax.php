<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_usuario(cod_usu){
	    $.ajax({
	        url: "../../controlador/ajaxUsuario.php",
	        data: "cod_usu="+cod_usu+"&tipo=consulta",
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

	//Funcion para guardar el usuario
	function crea_usuario(){
		var formElement = document.getElementById("form_usuario");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxUsuario.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_usuario").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("usuarioModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el usuario
	function edita_usuario(){
		var formElement = document.getElementById("form_usuario");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxUsuario.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_usuario").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("usuarioModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el usuario
	function elimina_usuario(cod_usu){
	    $.ajax({
	      url: "../../controlador/ajaxUsuario.php",
	      data: 'cod_usu='+cod_usu+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_usuario").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("usuarioModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	     always(function(data) {
	      console.log(data);
	    });
	}
</script>