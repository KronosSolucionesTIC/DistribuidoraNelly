<script type="text/javascript">
	//Carga el inventario por el ID
	function carga_inventario(cod_inventario){
	    $.ajax({
	        url: "../../controlador/ajaxInventario.php",
	        data: "cod_inventario="+cod_inventario+"&tipo=consulta",
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

	//Funcion para guardar el inventario
	function crea_inventario(){
		var formElement = document.getElementById("form_inventario");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxInventario.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_inventario").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("inventarioModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el inventario
	function edita_inventario(){
		var formElement = document.getElementById("form_inventario");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxInventario.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_inventario").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("inventarioModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el inventario
	function elimina_inventario(cod_inventario){
	    $.ajax({
	      url: "../../controlador/ajaxInventario.php",
	      data: 'cod_inventario='+cod_inventario+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_inventario").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("inventarioModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}
</script>