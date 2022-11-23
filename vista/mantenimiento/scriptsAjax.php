<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_mantenimiento(cod_mantenimientos){
	    $.ajax({
	        url: "../../controlador/ajaxMantenimiento.php",
	        data: "cod_mantenimientos="+cod_mantenimientos+"&tipo=consulta",
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

	//Funcion para guardar el mantenimiento
	function crea_mantenimiento(){
		var formElement = document.getElementById("form_mantenimiento");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxMantenimiento.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_mantenimiento").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("mantenimientoModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el mantenimiento
	function edita_mantenimiento(){
		var formElement = document.getElementById("form_mantenimiento");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxMantenimiento.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_mantenimiento").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("mantenimientoModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el mantenimiento
	function elimina_mantenimiento(cod_mantenimientos){
	    $.ajax({
	      url: "../../controlador/ajaxMantenimiento.php",
	      data: 'cod_mantenimientos='+cod_mantenimientos+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_mantenimiento").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("mantenimientoModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}
</script>