<script type="text/javascript">
	//Carga el cliente por el ID
	function carga_contrato(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {
	        $.each(data[0], function( key, value ) {
	          if(key == 'consecutivo'){
	          	$('#divNumero').html('<strong>No de contrato: ' + value + '</strong>');
	          }
	          if(key == 'cod_cliente'){
	          	cliente = value;
	          }
	          if(key == 'cod_paciente'){
	          	$('#cod_paciente').empty();
            	$('#cod_paciente').append(new Option('Seleccione un paciente...', 0));
	          	select_paciente(cliente, value); 
	          } 
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

	//Funcion para guardar el contrato
	function crea_contrato(){
		var formElement = document.getElementById("form_contrato");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxContrato.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_contrato").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("contratoModal")',1000);
			}
		}) 
	}

	//Funcion para guardar el contrato
	function edita_contrato(){
		var formElement = document.getElementById("form_contrato");
		formData = new FormData(formElement);
		formData.append("tipo", "edita");

	  	$.ajax({
	  		url:  "../../controlador/ajaxContrato.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_contrato").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Editado correctamente');
		  		setTimeout('cargar_sitio("contratoModal")',1000);
			}
		}) 
	}

    //Carga los equipos
    function cargaEquipos(cod_contrato){
        $.ajax({
            url: "../../controlador/ajaxContrato.php",
            data: "cod_contrato="+cod_contrato+"&tipo=listadoEquipos",
            dataType: 'json'
        })  
        .done(function(data) {
            contador = parseInt($('#contador').val());
            cadena = '';
            for (i=0; i < data.length; i++) {
                cadena += '<tr id=' + i + '>';
                cadena += '<input type="hidden" name="cod_equipo_'+ i + '" value="'+ data[i]["cod_equipo"] + '"><input type="hidden" name="canon_equipo_'+ i + '" value="'+ data[i]["canon_equipo"] + '"><input type="hidden" name="deposito_equipo_'+ i + '" value="'+ data[i]["deposito_equipo"] + '"><input type="hidden" name="total_equipo_'+ i + '" value="'+ data[i]["total_equipo"] + '">';
                cadena += '<td><div class="alert alert-secondary" role="alert">' + data[i]["nom_clase"] + '</div></td>';
                cadena += '<td><div class="alert alert-secondary" role="alert">' + data[i]["consecutivo_equipo"] + '</div></td>';
                cadena += '<td><div class="alert alert-secondary" role="alert">' + data[i]["canon_equipo"] + '</div></td>';
                cadena += '<td><div class="alert alert-secondary" role="alert">' + data[i]["deposito_equipo"] + '</div></td>';
                cadena += '<td><div class="alert alert-secondary" role="alert">' + data[i]["total_equipo"] + '</div></td>';
                cadena += '</tr>';
                contador = contador + 1;
            }
            $('#contador').val(contador);
            $("#tablaEquipos >tbody").html(cadena);
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }
</script>