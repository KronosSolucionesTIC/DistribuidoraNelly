<script type="text/javascript">
	//Carga el select de tipo
	function select_tipo(clase_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxPrecio.php",
	        data: "clase_equipo="+clase_equipo+"&tipo=consultaTipo",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#tipo_equipo').empty();
	    	$('#tipo_equipo').append(new Option('Seleccione un tipo...', 0));
	    	for(i=0; i < data.length ; i++){
	    		$('#tipo_equipo').append(new Option(data[i]["desc_tipo_equipos"], data[i]["cod_tipo_equipos"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el precio
	function crea_precio(){
		var formElement = document.getElementById("form_precio");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxPrecio.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_precio").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("precioModal")',1000);
			}
		}) 
	}
</script>