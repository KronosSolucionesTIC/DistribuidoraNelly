<script type="text/javascript">
	//Informe
	function carga_informe(cod_estado){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_estado="+cod_estado+"&tipo=informe_equipo_estado",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    	cadena = '<thead class="bg-dark text-white">';
	    	cadena += '<th>Articulo</th>';
	    	cadena += '<th>Descripción</th>';
	    	cadena += '<th>Canon</th>';
	    	cadena += '<th>Deposito</th>';
	    	cadena += '<th>Valor alquiler</th>';
	    	cadena += '</thead>';
			for(i=0; i<data.length; i++){
				cadena += '<tr>';
				cadena += '<td>'+ data[i]['consecutivo_equipo'] +'</td>';
				if(data[i]['nom_equipo'] != null){
					nom_equipo = data[i]['nom_equipo'];
				} else {
					nom_equipo = '';
				}
				cadena += '<td>'+ data[i]['nom_clase'] + ' ' + nom_equipo + ' ' + data[i]['desc_tipo_equipos'] +'</td>';
				cadena += '<td>'+ data[i]['canon_arrend_equipo'] +'</td>';
				cadena += '<td>'+ data[i]['valor_deposito'] +'</td>';
				cadena += '<td>'+ (parseInt(data[i]['canon_arrend_equipo']) + parseInt(data[i]['valor_deposito'])) +'</td>';
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