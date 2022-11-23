<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_empresa(cod_empresa){
	    $.ajax({
	        url: "../../controlador/ajaxEmpresa.php",
	        data: "cod_empresa="+cod_empresa+"&tipo=consulta",
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

	//Funcion para guardar el empresa
	function edita_empresa(){
		var formElement = document.getElementById("form_empresa");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxEmpresa.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_empresa").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("empresaModal")',1000);
			}
		}) 
	}
</script>