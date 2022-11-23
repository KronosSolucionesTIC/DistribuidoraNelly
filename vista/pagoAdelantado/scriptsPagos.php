<script type="text/javascript">
	//Calcula saldo
	function calcula_saldo(){
		if(parseInt($('#descuento').val()) > parseInt($('#total_deuda').val())){
			alertify.alert(
	          	'Valor descuento',
	          	'El valor del descuento no puede ser mayor a la deuda',
	          	function(){
	            	alertify.error('Valor descuento');
	            }
	        );
	        return false;
		}
		if(parseInt($('#valor_pago').val()) < 0){
			alertify.alert(
	          	'Valor pago',
	          	'El valor del pago no puede ser negativo',
	          	function(){
	            	alertify.error('Valor pago');
	            }
	        );
	        return false;
		}
		if(parseInt($('#total').val()) - parseInt($('#valor_pago').val()) < 0){
			alertify.alert(
	          	'Valor pago',
	          	'El valor del pago no puede ser mayor al saldo',
	          	function(){
	            	alertify.error('Valor pago');
	            }
	        );
        } else {
        	$('#total').val(parseInt($('#total_deuda').val()) - parseInt($('#descuento').val()));
        	$('#saldo_pago').val(parseInt($('#total').val()) - parseInt($('#valor_pago').val()));
        	$('#total_descuento').val(parseInt($('#descuento').val()));
        }
	}

	//Valida equipos
	function valida_equipos(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=validaEquipos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	if(data[0]['cantidad'] == 0){
				alertify.alert(
	          		'Equipos',
	          		'El contrato seleccionado no tiene equipos asociados',
	          		function(){
	            		alertify.error('Equipos');
	            	}
	        	);
	        	$("#contrato").val('0');
	       		return false;	    		
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Valida saldo
	function valida_saldo(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=validaSaldo",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	if(data[0]['saldo_pago'] > 0){
				alertify.alert(
	          		'Saldo',
	          		'El contrato seleccionado tiene saldo pendiente',
	          		function(){
	            		alertify.error('Saldo');
	            	}
	        	);
	        	$("#contrato").val('0');
	       		return false;	    		
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Valida meses
	function valida_meses(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=validaMeses",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	if(data[0]['meses'] > 0){
				alertify.alert(
	          		'Cuotas pendientes',
	          		'El contrato seleccionado tiene saldo pendiente de meses anteriores',
	          		function(){
	            		alertify.error('Cuotas pendientes');
	            	}
	        	);
	        	$("#contrato").val('0');
	       		return false;	    		
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Inserta los pagos
	function calcula_pagos(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=calculaPagos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Calcula pago entrega
	function calcula_entrega(){
		ultimaCuotaOriginal = parseInt($('#ultimaCuotaOriginal').val());
		FechaInicial = $('#fecha_ini_pago').val();
		FechaFinal = $('#fecha_fin_pago').val();
		//Cacula fecha actual
		var d = new Date(); 
		var month = String(d.getMonth()+1); 
		var day = d.getDate();
		var anio = d.getFullYear();
		$('#fechaFinPagoLetras').val(day + ' de ' + mesALetra(month) + ' del ' + anio);
		var dias = daysBetween(anio + '-' + month + '-' + day,FechaInicial);
		valor_nuevo = Math.round(parseInt((ultimaCuotaOriginal/30) * dias));
		$('#ultimaCuota').val(valor_nuevo);
		$('#valor_tot_pago').val(valor_nuevo);
		calcula_total(ultimaCuotaOriginal, valor_nuevo);
	}

	//Calcula total
	function calcula_total(ultimaCuotaOriginal, valor_nuevo){
		$('#total_deuda').val(parseInt($('#total_deuda').val()) - ultimaCuotaOriginal + valor_nuevo);
		calcula_saldo();
	}

	//Retorna entrega
	function retorna_entrega(){
		ultimaCuota = parseInt($('#ultimaCuota').val());
		ultimaCuotaOriginal = parseInt($('#ultimaCuotaOriginal').val());
		$('#fechaFinPagoLetras').val($('#fechaFinPagoLetrasOriginal').val());
		$('#ultimaCuota').val(ultimaCuotaOriginal);
		calcula_total(ultimaCuota, ultimaCuotaOriginal);
	}

	//Guardar
	$("#btn_guardar_pago").click(function(){
		resultado = campos_incompletos('form_pago');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_pago();
			}
			if(accion == 'editar'){
				edita_pago();
			}
		}
	});

    //Funcion para imprimir
    $("#btn_imprimir").click(function(){
        console.log('Entro a imprimir');
        printDiv('contenidoFactura');
        return false;
    });
</script>