<script type="text/javascript">
	//Carga el select de contrato
	function select_contrato(cod_cliente, seleccionado){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_cliente="+cod_cliente+"&tipo=consultaContratos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	for(i=0; i < data.length ; i++){
	    		$('#contrato').append(new Option(data[i]["consecutivo"], data[i]["cod_calc"]));
	    	}
	    	if(seleccionado != ''){
	    		$("#contrato option[value=" + seleccionado + "]").attr("selected",true);
	    	}	    	
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Calcula cuotas
	function calcula_cuotas(cod_contrato, valor){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_contrato="+cod_contrato+"&valor="+valor+"&tipo=pagosAdelantados",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	calculaPagos(cod_contrato);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga los pagos
	function calculaPagos(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=consultaPagos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	total_deuda = 0;
	    	total_descuento = 0;
	    	contador = 0;
	    	cadena = '<thead class="bg-dark text-white">';
	    	cadena += '<th>Contrato</th>';
	    	cadena += '<th>Articulo</th>';
	    	cadena += '<th>Fecha inicio</th>';
	    	cadena += '<th>Fecha fin</th>';
	    	cadena += '<th>Saldo</th>';
	    	cadena += '<th>Descuento</th>';
	    	cadena += '</thead>';
			for(i=0; i<data.length; i++){
				cadena += '<tr>';
				cadena += '<td><input type="hidden" value="' + data[i]['saldo_pago'] + '" name="saldo_pago_' + i + '"><input type="hidden" value="' + data[i]['valor_recibido'] + '" name="valor_recibido_' + i + '"><input type="hidden" value="' + data[i]['cod_pago'] + '" name="cod_pago_' + i + '"><input type="hidden" value="' + data[i]['cod_equipo'] + '" name="cod_equipo_' + i + '"><input type="hidden" value="' + data[i]['fecha_ini_pago'] + '" name="fecha_ini_pago_' + i + '"><input type="hidden" value="' + data[i]['fecha_fin_pago'] + '" name="fecha_fin_pago_' + i + '">'+ data[i]['consecutivo'] +'</td>';
				cadena += '<td>'+ data[i]['nom_clase'] + ' ' + data[i]['nom_equipo'] + ' ' + data[i]['desc_tipo_equipos'] +'</td>';
				cadena += '<td>'+ data[i]['dia_ini'] + ' de ' + mesALetra(data[i]['num_mes_ini']) + ' del ' + data[i]['anio_ini'] +'</td>';
				cadena += '<td><input type="hidden" value="' + data[i]['valor_tot_pago'] + '" name="valor_tot_pago_' + i + '"><input type="hidden" value="' + data[i]['saldo_pago'] + '" name="valor_pago_' + i + '">'+ data[i]['dia_fin'] + ' de ' + mesALetra(data[i]['num_mes_fin']) + ' del ' + data[i]['anio_fin'] +'</td>';
				cadena += '<td>' + data[i]['saldo_pago'] + '</td>';
				cadena += '<td><input type="hidden" value="' + data[i]['valor_descuento'] + '" name="valor_descuento_' + i + '">' + data[i]['valor_descuento'] + '</td>';
				cadena += '</tr>';
				total_deuda = total_deuda + parseInt(data[i]['saldo_pago']);
				contador++;
			}
			cadena += '<tr><input type="hidden" name="contador" value="'+ contador +'">';
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Total deuda:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="number" readonly style="text-align:right;" value="' + total_deuda + '" id="total_deuda" name="total_deuda"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
			cadena += '<tr>';
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Valor pago:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="number" readonly style="text-align:right;" value="'+ parseInt($('#valor').val()) +'" id="valor_pago" min="0" name="total_factura"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
			cadena += '<tr>';
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Saldo:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="number" readonly style="text-align:right;" value="' + (total_deuda -  parseInt($('#valor').val())) + '" id="saldo_pago" name="saldo_deuda"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
	        $('#tablaCuotas').html(cadena);	
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>