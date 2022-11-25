<script type="text/javascript">
	//Informe
	function carga_informe(fecha){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "fecha="+fecha+"&tipo=informe_ventas",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    	cadena = '<thead class="bg-dark text-white">';
	    	cadena += '<th>Total</th>';
	    	cadena += '</thead>';
			for(i=0; i<data.length; i++){
				if(data[i]['total_venta'] != null){
					valor = data[i]['total_venta'];
				} else {
					valor = 'No existen ventas para la fecha consultada';
				}
				cadena += '<tr>';
				cadena += '<td>'+ valor +'</td>';
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