<script type="text/javascript">
	//Carga las partes
	function cargaPartes(cod_equipo){
		$.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "cod_equipo="+cod_equipo+"&tipo=listadoPartes",
	        dataType: 'json'
	    })	
	    .done(function(data) {
	    	parte = '';
	        tipo = '';
	        cadena = '';
	        if(data.length > 0){
	        	cadena += '<tr class="text-center">';
	            cadena += '<th colspan="5">PARTES</th>';
	            cadena += '</tr>';
	            cadena += '<tr class="text-center">';
	            cadena += '<th>Parte:</th>';
	            cadena += '<th>Tipo Parte:</th>';
	            cadena += '</tr>';
	        }
	        for(i=0; i<data.length; i++){
	            cadena += '<tr>';
	            cadena += '<td class="text-center">' + data[i]["desc_partes"] + '</td>';
	            cadena += '<td class="text-center">' + data[i]["desc_tipo_partes"] + '</td>';
	           	cadena += '</tr>';
	        }
	        cadena += '</tr>';
	        $("#tablaPartes").html(cadena);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	}

	//Carga las garantias
	function cargaGarantia(cod_equipo){
		$.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "cod_equipo="+cod_equipo+"&tipo=garantia",
	        dataType: 'json'
	    })	
	    .done(function(data) {
	    	consecutivo = '';
	    	tiempo = '';
	        inicial = '';
	        final = '';
	        $.each(data[0], function( key, value ) {
	        	console.log(key+"--"+value);
	          	if(key == 'consecutivo_equipo'){
	          		consecutivo = value;
	          	}
	        	if(key == 'cant_garantia'){
	          		tiempo = value;
	          	}
	          	if(key == 'fecha_ini_garantia'){
	          		inicial = value;
	          	}
	          	if(key == 'fecha_fin_garantia'){
	          		final = value;
	          	}	          	
            	cadena = '<tr class="text-center">';
              	cadena += '<th colspan="5">GARANTIA DEL EQUIPO</th>';
            	cadena += '</tr>';
            	cadena += '<tr>';
              	cadena += '<td>Referencia:</td>';
              	cadena += '<td>' + consecutivo + '</td>';
              	cadena += '<td></td>';
              	cadena += '<td>Tiempo(meses):</td>';
              	cadena += '<td>' + tiempo + '</td>';
            	cadena += '</tr>';
            	cadena += '<tr>';
              	cadena += '<td>Fecha compra:</td>';
              	cadena += '<td>' + inicial + '</td>';
              	cadena += '<td></td>';
              	cadena += '<td>Fecha fin:</td>';
              	cadena += '<td>' + final + '</td>';
            	cadena += '</tr>';
          		$("#tablaGarantia").html(cadena);
	        });
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	}

	//Carga empresa
	function cargaEmpresa(){
		$.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "tipo=empresa",
	        dataType: 'json'
	    })	
	    .done(function(data) {
	    	empresa = '';
	        $.each(data[0], function( key, value ) {
	          	if(key == 'empresa'){
	          		empresa = value;
	          	}	          	
            	cadena = '<tr class="text-center" align="center">';
              	cadena += '<td colspan="5"><p class="fst-italic">' + empresa + '</p></td>';
            	cadena += '</tr>';
          		$("#tablaEmpresa").html(cadena);
	        });
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	}
</script>