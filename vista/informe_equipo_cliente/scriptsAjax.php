<script type="text/javascript">
	//Informe
	function carga_informe(cod_cliente){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_cliente="+cod_cliente+"&tipo=informe_equipo_cliente",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    	cadena = '<thead class="bg-dark text-white">';
	    	cadena += '<th>Contrato</th>';
	    	cadena += '<th>Articulo</th>';
	    	cadena += '<th>Descripción</th>';
	    	cadena += '<th>Cliente</th>';
	    	cadena += '<th>Fecha entrega</th>';
	    	cadena += '<th>Fecha devolución</th>';
	    	cadena += '</thead>';
			for(i=0; i<data.length; i++){
				cadena += '<tr>';
				cadena += '<td>'+ data[i]['consecutivo'] +'</td>';
				cadena += '<td>'+ data[i]['consecutivo_equipo'] +'</td>';
				if(data[i]['nom_equipo'] != null){
					nom_equipo = data[i]['nom_equipo'];
				} else {
					nom_equipo = '';
				}
				cadena += '<td>'+ data[i]['nom_clase'] + ' ' + nom_equipo + ' ' + data[i]['desc_tipo_equipos'] +'</td>';
				cadena += '<td>'+ data[i]['nombre_cliente'] +'</td>';
				cadena += '<td>'+ data[i]['fecha_ini_contrato'] +'</td>';
				cadena += '<td>'+ data[i]['fecha_fin_contrato'] +'</td>';
				cadena += '</tr>';
			}
			$('#tablaInforme').html(cadena);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>