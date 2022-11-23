<script type="text/javascript">
	//Carga el select de contrato
	function select_contrato(cod_cliente, seleccionado){
	    $.ajax({
	        url: "../../controlador/ajaxPago.php",
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

	//Carga los pagos
	function calculaPagos(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxPago.php",
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
				cadena += '<td><input type="hidden" value="' + data[i]['valor_tot_pago'] + '" name="valor_tot_pago_' + i + '" id="valor_tot_pago"><input type="text" value="'+ data[i]['dia_fin'] + ' de ' + mesALetra(data[i]['num_mes_fin']) + ' del ' + data[i]['anio_fin'] +'" id="fechaFinPagoLetras" class="form-control" readonly><input type="hidden" value="'+ data[i]['dia_fin'] + ' de ' + mesALetra(data[i]['num_mes_fin']) + ' del ' + data[i]['anio_fin'] +'" id="fechaFinPagoLetrasOriginal"></td>';
				cadena += '<td><input type="number" class="form-control" value="' + data[i]['saldo_pago'] + '" readonly id="ultimaCuota" name="saldo_pago_' + i + '"><input type="hidden" value="' + data[i]['saldo_pago'] + '" id="ultimaCuotaOriginal"><input type="hidden" value="' + data[i]['fecha_ini_pago'] + '" id="fecha_ini_pago"><input type="hidden" value="' + data[i]['fecha_fin_pago'] + '" id="fecha_fin_pago"></td>';
				cadena += '<td><input type="number" class="form-control descuento" value="0" name="valor_descuento_' + i + '"></td>';
				
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
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Total descuento:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="number" readonly style="text-align:right;" value="0" id="total_descuento" name="total_descuento"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
			cadena += '<tr>';
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Total:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="number" readonly style="text-align:right;" value="' + total_deuda + '" id="total" name="total_calculado"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
			cadena += '<tr>';
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Valor pago:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="number" style="text-align:right;" value="0" id="valor_pago" min="0" name="total_factura"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
			cadena += '<tr>';
			cadena += '<td colspan="4" class="bg-dark text-white" align="right">Saldo:</td>';
			cadena += '<td class="text-right"><input class="form-control" type="text" readonly style="text-align:right;" value="' + total_deuda + '" id="saldo_pago" name="saldo_deuda"></td>';
			cadena += '<td class="text-right"></td>';
			cadena += '</tr>';
            cadena += '<tr>';
            cadena += '<td colspan="4" class="bg-dark text-white" align="right">Pago de entrega:</td>';
            cadena += '<td><div class="mb-2"><div class="form-check"><input class="form-check-input" type="checkbox" id="pagoEntrega"></div></div></td>';
            cadena += '<td class="text-right"></td>';
            cadena += '</tr>';
			$('#tablaPagos').html(cadena);
			cargar_funciones();   	
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>