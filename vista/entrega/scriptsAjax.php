<script type="text/javascript">
	//Carga el select de contrato
	function select_contrato(cod_cliente, seleccionado){
	    $.ajax({
	        url: "../../controlador/ajaxEntrega.php",
	        data: "cod_cliente="+cod_cliente+"&tipo=consultaContratos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	for(i=0; i < data.length ; i++){
	    		$('#cod_contrato').append(new Option(data[i]["consecutivo"], data[i]["cod_calc"]));
	    	}
	    	if(seleccionado != ''){
	    		$("#cod_contrato option[value=" + seleccionado + "]").attr("selected",true);
	    	}	    	
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Listado equipos
	function listado_equipos(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxEntrega.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=listadoEquipos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    	contador = 0;
	    	cadena = '<thead class="bg-dark text-white">';
	    	cadena += '<th>Contrato</th>';
	    	cadena += '<th>Articulo</th>';
	    	cadena += '<th>Seleccione</th>';
	    	cadena += '</thead>';
			for(i=0; i<data.length; i++){
				cadena += '<tr>';
				cadena += '<td><input type="hidden" name="cod_equipo_'+ i + '" value="'+ data[i]["cod_equipo"] + '">'+ data[i]['consecutivo_equipo'] +'</td>';
				cadena += '<td>'+ data[i]['nom_clase'] + ' ' + data[i]['nombre'] + ' ' + data[i]['desc_tipo_equipos'] +'</td>';
				cadena += '<td><div class="form-check"><input class="form-check-input seleccion" type="checkbox" name="seleccion"></div></td>';
				cadena += '</tr>';
				contador++;
			}
			cadena += '<input type="hidden" name="contador" value="' + contador +'">';
			cadena += '<input type="hidden" name="seleccionados" id="seleccionados" value="0">';
			$('#tablaEquipos').html(cadena);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Funcion para guardar el entrega
	function crea_entrega(){
		var formElement = document.getElementById("form_entrega");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxEntrega.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	      		$("#btn_guardar_entrega").hide();
	      		$("#btn_guardando").show();
	      		alertify.success(r);
		  		setTimeout('cargar_sitio("entregaModal")',1000);
			}
		}) 
	}

    //Carga datos empresa
    function carga_empresa(){
        $.ajax({
            url: "../../controlador/ajaxEntrega.php",
            data: "tipo=empresa",
            dataType: 'json'
        })
        .done(function(data) {
            $.each(data[0], function( key, value ) {
              $("."+key).html(value);
            });
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };
</script>