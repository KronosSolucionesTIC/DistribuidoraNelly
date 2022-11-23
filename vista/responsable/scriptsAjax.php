<script type="text/javascript">
	//Carga el responsable por el ID
	function carga_responsable(cod_cli){
	    $.ajax({
	        url: "../../controlador/ajaxResponsable.php",
	        data: "cod_cli="+cod_cli+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	if(data[0]["tipo_persona"] == 2){
	    		mostrarDiv('divJuridica');
	    		ocultarDiv('divNatural');
	    		$("#cod_cli").val(data[0]["cod_cli"]);
	    		$("#tipo_persona").val(data[0]["tipo_persona"]);
	    		$("#nit_jur").val(data[0]["cedula_cli"]);
	    		$("#rsocial_jur").val(data[0]["nom1_cli"]);
	    		$("#dir_jur").val(data[0]["direccion_cli"]);
	    		$("#ciudad_jur").val(data[0]["ciudad_cli"]);	   
	    		$("#barrio_jur").val(data[0]["barrio_cli"]); 
	    		$("#telefono_jur").val(data[0]["telefono_cli"]);
	    		$("#celular_jur").val(data[0]["celular_cli"]);  	
	    		$("#email_jur").val(data[0]["email_cli"]); 	
	    		$("#repre_legal").val(data[0]["repre_legal"]); 		
	    		$("#cedula_representante").val(data[0]["cedula_representante"]); 
	    		$("#direccion_repre").val(data[0]["direccion_repre"]); 
	    		$("#tel_repre").val(data[0]["tel_repre"]); 	   
	    		$("#celu_repre").val(data[0]["celu_repre"]);
	    		$("#email_repres").val(data[0]["email_repres"]);
	    		$("#ciudad_repre").val(data[0]["ciudad_repre"]);
	    		$("#btn_guardar_responsable").attr("data-accion","editar-juridica"); 		
	    	} else {
	    		mostrarDiv('divNatural');
	    		ocultarDiv('divJuridica');
	    		$.each(data[0], function( key, value ) {
	          		$("#"+key).val(value);
	        	});
	        	$("#btn_guardar_responsable").attr("data-accion","editar-natural"); 
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el responsable
	function crea_responsable_natural(){
		var formElement = document.getElementById("form_responsable");
		formData = new FormData(formElement);
		formData.append("tipo", "insertaNatural");

	  	$.ajax({
	  		url:  "../../controlador/ajaxResponsable.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_responsable").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("responsableModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el responsable
	function crea_responsable_juridica(){
		var formElement = document.getElementById("form_responsable");
		formData = new FormData(formElement);
		formData.append("tipo", "insertaJuridica");

	  	$.ajax({
	  		url:  "../../controlador/ajaxResponsable.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_responsable").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("responsableModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el responsable
	function edita_responsable_natural(){
		var formElement = document.getElementById("form_responsable");
		formData = new FormData(formElement);
		formData.append("tipo", "editaNatural");

	  	$.ajax({
	  		url:  "../../controlador/ajaxResponsable.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_responsable").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("responsableModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el responsable
	function edita_responsable_juridica(){
		var formElement = document.getElementById("form_responsable");
		formData = new FormData(formElement);
		formData.append("tipo", "editaJuridica");

	  	$.ajax({
	  		url:  "../../controlador/ajaxResponsable.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_responsable").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("responsableModal")',1000);
			}
		}) 
	}
</script>