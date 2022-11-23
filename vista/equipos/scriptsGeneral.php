<script type="text/javascript">
	//Carga el cliente por el ID
	function cargaEquipo(cod_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "cod_equipo="+cod_equipo+"&tipo=consulta",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	consecutivo = '';
	        clase = '';
	        tipo = '';
	        tamano = '';
	        canon = '';
	        deposito = '';
	        desc = '';
	        result = '';
	        $.each(data[0], function( key, value ) {
	          	if(key == 'consecutivo_equipo'){
	          		consecutivo = value;
	          	}
	          	if(key == 'nom_clase'){
	          		clase = value;
	          	}
	          	if(key == 'desc_tipo_equipos'){
	          		tipo = value;
	          	}
	          	if(key == 'desc_tam_equipos'){
	          		tamano = value;
	          	}
	          	if(key == 'canon_arrend_equipo'){
	          		canon = value;
	          	}
	 	        if(key == 'valor_deposito'){
	          		deposito = value;
	          	}
	          	if(key == 'desc_equipo'){
	          		desc = value;
	          	}
	          	cadena = '<thead class="text-center">';
              	cadena += '<tr>';
              	cadena += '<th colspan="5">HOJA DE INVENTARIO DE EQUIPOS ORTOPEDICOS</th>';
            	cadena += '</tr>';
            	cadena += '<tr>';
            	cadena += '<th colspan="5">DATOS GENERALES DEL EQUIPO</th>';
            	cadena += '</tr>';
          		cadena += '</thead>';
          		cadena += '<tbody>';
            	cadena += '<tr>';
              	cadena += '<td><strong>EQUIPO No. ' + consecutivo + '</strong></td>';
            	cadena += '</tr>';
            	cadena += '<tr>';
              	cadena += '<td>Clase:</td>';
              	cadena += '<td>' + clase + '</td>';
              	cadena += '<td></td>';
              	cadena += '<td>Tipo:</td>';
              	cadena += '<td>' + tipo + '</td>';
            	cadena += '</tr>';
            	cadena += '<tr>';
              	cadena += '<td>Tamaño:</td>';
              	cadena += '<td>' + tamano + '</td>';
              	cadena += '<td></td>';
              	cadena += '<td>Canon:</td>';
              	cadena += '<td>' + canon + '</td>';
            	cadena += '</tr>';
            	cadena += '<tr>';
              	cadena += '<td>Valor depositado:</td>';
              	cadena += '<td>' + deposito + '</td>';
              	cadena += '<td></td>';
              	cadena += '<td>Descripción:</td>';
              	cadena += '<td>' + desc + '</td>';
            	cadena += '</tr>';
            	cadena += '<tr>';            	
              	cadena += '<td colspan="5"></td>';
            	cadena += '</tr>';
          		cadena += '</tbody>';
          		$("#tablaInventario").html(cadena);
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