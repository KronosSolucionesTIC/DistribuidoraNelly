<script type="text/javascript">
	//Carga el venta por el ID
	function carga_venta(cod_venta){
	    $.ajax({
	        url: "../../controlador/ajaxVenta.php",
	        data: "cod_venta="+cod_venta+"&tipo=consulta",
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

	//Funcion para guardar el venta
	function crea_venta(){
		var formElement = document.getElementById("form_venta");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxVenta.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_venta").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("ventaModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el venta
	function edita_venta(){
		var formElement = document.getElementById("form_venta");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxVenta.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_venta").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("ventaModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el venta
	function elimina_venta(cod_venta){
	    $.ajax({
	      url: "../../controlador/ajaxVenta.php",
	      data: 'cod_venta='+cod_venta+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_venta").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("ventaModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}
</script>