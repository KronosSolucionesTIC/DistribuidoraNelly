<script type="text/javascript">
	//Funcion para guardar el paciente
	function crea_paciente(){
		var formElement = document.getElementById("form_paciente");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxPaciente.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_paciente").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("pacienteModal")',1000);
			}
		}) 
	}

	//Carga el cliente por el ID
	function carga_paciente(cod_pac){
	    $.ajax({
	        url: "../../controlador/ajaxPaciente.php",
	        data: "cod_pac="+cod_pac+"&tipo=consulta",
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

	//Funcion para guardar el paciente
	function edita_paciente(){
		var formElement = document.getElementById("form_paciente");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxPaciente.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_paciente").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("pacienteModal")',1000);
			}
		}) 
	}
</script>