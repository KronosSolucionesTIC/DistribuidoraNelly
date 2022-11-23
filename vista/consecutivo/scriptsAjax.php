<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_consecutivo(cod_cons){
	    $.ajax({
	        url: "../../controlador/ajaxConsecutivo.php",
	        data: "cod_cons="+cod_cons+"&tipo=consulta",
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


	//Funcion para guardar el consecutivo
	function edita_consecutivo(){
		var formElement = document.getElementById("form_consecutivo");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxConsecutivo.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_consecutivo").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("consecutivoModal")',1000);
			}
		}) 
	}
</script>