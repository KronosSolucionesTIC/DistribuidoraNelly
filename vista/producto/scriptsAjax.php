<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_producto(cod_producto){
	    $.ajax({
	        url: "../../controlador/ajaxProducto.php",
	        data: "cod_producto="+cod_producto+"&tipo=consulta",
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

	//Funcion para guardar el producto
	function crea_producto(){
		var formElement = document.getElementById("form_producto");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxProducto.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_producto").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("productoModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el producto
	function edita_producto(){
		var formElement = document.getElementById("form_producto");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxProducto.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_producto").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("productoModal")',1000);
			}
		}) 
	}

	//Funcion para eliminar el producto
	function elimina_producto(cod_producto){
	    $.ajax({
	      url: "../../controlador/ajaxProducto.php",
	      data: 'cod_producto='+cod_producto+'&tipo=elimina_logico'
	    })
	    .done(function(data) {
	      //---------------------
	      $("#btn_eliminar_producto").hide();
	      $("#btn_cancelar").hide();
	      $("#btn_eliminando").show();
	      alertify.success('Eliminado correctamente');
		  setTimeout('cargar_sitio("productoModal")',1000);
	    })
	    .fail(function(data) {
	      console.log(data);
	    })
	    .always(function(data) {
	      console.log(data);
	    });
	}
</script>