<?php include '../scriptsNumeroALetras.php'; ?>
<script type="text/javascript">
	//Funcion boton detalle
	$("[name*='btn_ver']").click(function(){
		$("#detalleModalLabel").text("Formato contrato CAE");
		id_contrato = $(this).attr('data-id-contrato');
		carga_empresa();
		carga_detalle(id_contrato);
		carga_equipos(id_contrato);
 	});

	//Carga datos empresa
	function carga_empresa(){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "tipo=empresa",
	        dataType: 'json'
	    })
	    .done(function(data) {
	        $.each(data[0], function( key, value ) {
	          console.log(key+"--"+value);
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

	//Carga datos detalle
	function carga_detalle(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=detalle",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	cadena = '';
	    	tipoDoc = '';
	    	tipoDocFirma = '';
	    	convertirDato = '';
	    	cuarta = '';
	    	quinta = '';
	    	sexta = '';
	    	septima = '';
	    	octava = '';
	    	novena = '';
	    	decima = '';
	    	undecima = '';
	    	ciudad = '';
	    	if(data[0]["tipo_contrato"] == 2){
	    		cadena += ' (CONVENIO ' + $.trim(data[0]["nombre_cliente"]) + ')';
	    		cuarta += '<br/>';
	    		cuarta += '<strong> CUARTA:</strong><strong> - EL ARRENDATARIO</strong> se compromete a entregar las ordenes m&eacute;dicas correspondientes de los art&iacute;culos arrendados en las oficinas de <strong>ORT&Oacute;PEDICOS WILLIAMSON Y WILLIAMSON, </strong>si los art&iacute;culos  NO se devuelven en la fecha indicada el valor del alquiler a partir de dicha fecha correr&aacute; por cuenta del arrendador.<br>';
          		quinta +='<strong>QUINTA:</strong>El arrendatario se compromete a entregar los art&iacute;culos alquilados al finalizar el contrato en el mismo estado como fueron recibidos, el transporte correra por cuenta del arrendatario, tanto para llevar, como para devolverlo.<br/><strong>';
          		sexta +='<strong>SEXTA: GARANTIA- </strong>El arrendatario firmar&aacute; una letra por el valor comercial de los art&iacute;culos, con esta el arrendatario autoriza al representante legal para que llene y liquide los intereses de mora que se causen en caso de incumplimiento.<br /><strong>';
          		septima += '<strong>S&Eacute;PTIMA: REPARACIONES</strong> <strong>EL ARRENDATARIO</strong> - no podrá hacer modificaciones a los bienes alquilados. El mantenimiento y servicio técnico será suministrado por el arrendador. Los daños que se ocasionen serán pagados por <strong>EL ARRENDATARIO.</strong><br>';
          		octava += '<strong>OCTAVA:</strong> Ortop&eacute;dicos W y W no asume responsabilidad alguna por los perjuicios que el mal uso del art&iacute;culo arrendado pueda causar.<br />';
          		novena += '<strong>NOVENA:</strong><span>&nbsp;Este contrato tiene una duraci&oacute;n de Un (1) mes, prorrogable de forma autom&aacute;tica por&nbsp;&nbsp;solicitud del&nbsp;<strong>ARRENDATARIO</strong>&nbsp;y el&nbsp;&nbsp;&nbsp;pago del canon de arrendamiento correspondiente o por la no devoluci&oacute;n de los art&iacute;culos en la fecha&nbsp; de devoluci&oacute;n acordada inicialmente en&nbsp;este contrato.</span><br>';
          		decima += '<strong>DECIMA : AUTORIZACION CONSULTA Y REPORTE EN CENTRALES DE RIESGO</strong>          Declaro que la informaci&oacute;n suministrada es ver&iacute;dica.&nbsp;Autorizo a Ortop&eacute;dicos Williamson y Williamson a consultar, reportar y suministrar informaci&oacute;n a Datacr&eacute;dito Experian sobre mi comportamiento comercial.<br>';
          		undecima += 'Este contrato es de conocimiento de ' + $.trim(data[0]["nombre_cliente"] + '.');
	    	} else {
				cuarta += '<br/>';
          		cuarta += '<strong>CUARTA:  CANON DE ARRENDAMIENTO.-</strong>';
          		cuarta += 'El canon de arrendamiento mensual estipulado en el presente contrato es la suma  de ' + NumeroALetras(data[0]["total_canon"]);
          		cuarta += '<strong>(' + convertir_cedula(data[0]["total_canon"]) +')</strong>';
          		cuarta += ', que <strong>EL ARRENDATARIO</strong> pagar&aacute; a <strong>EL ARRENDADOR</strong> de forma anticipada</strong>.<strong> PAR&Aacute;GRAFO:</strong> DEP&Oacute;SITO: ' + NumeroALetras(data[0]["total_deposito"]);
          		cuarta += '<strong>('+ convertir_cedula(data[0]["total_deposito"]) + ')</strong>';
          		cuarta += '.  El cual ser&aacute; reembolsado a la terminaci&oacute;n del presente contrato.<br/>';
          		quinta += '<strong>QUINTA:  LUGAR PARA EL PAGO.- EL ARRENDATARIO </strong> puede pagar el canon de arrendamiento: En nuestra oficina <strong>ORT&Oacute;PEDICOS WYW SAS</strong>  a traves de nuestra pagina web: www.ortopedicoswyw.com o consignar&aacute; en  la cuenta corriente No. 981190523 mediante formulario de recaudo en l&iacute;nea en cualquier oficina del BANCO DE BOGOTA a nombre de ortop&eacute;dicos  W y W indicando el nombre del arrendador y su n&uacute;mero de identificaci&oacute;n.<br>';
          		sexta +='<strong>SEXTA:</strong> El arrendatario se compromete a entregar los art&iacute;culos alquilados al finalizar el contrato en el mismo estado como fueron recibidos, el transporte correra por cuenta del arrendatario, tanto para llevar, como para devolverlo.<br>';
          		septima += '<strong>S&Eacute;PTIMA: GARANTIA- </strong>El arrendatario firmar&aacute; una letra por el valor comercial de los art&iacute;culos, con esta el arrendatario autoriza al representante legal para que llene y liquide los intereses de mora que se causen en caso de incumplimiento.<br>';
          		octava += '<strong>OCTAVA: REPARACIONES</strong> <strong>EL ARRENDATARIO</strong> - no podrá hacer modificaciones a los bienes alquilados. El mantenimiento y servicio técnico será suministrado por el arrendador. Los daños que se ocasionen serán pagados por <strong>EL ARRENDATARIO.</strong>';
          		novena += '<br><strong>NOVENA:</strong> Ortop&eacute;dicos W y W no asume responsabilidad alguna por los perjuicios que el mal uso del art&iacute;culo arrendado pueda causar.<br />';
          		decima += '<strong>DECIMA:</strong><span>&nbsp;Este contrato tiene una duraci&oacute;n de Un (1) mes, prorrogable de forma autom&aacute;tica por&nbsp;&nbsp;solicitud del&nbsp;<strong>ARRENDATARIO</strong>&nbsp;y el&nbsp;&nbsp;&nbsp;pago del canon de arrendamiento correspondiente o por la no devoluci&oacute;n de los art&iacute;culos en la fecha&nbsp; de devoluci&oacute;n acordada inicialmente en&nbsp;este contrato.</span><br>';
          		undecima += '<strong>UNDECIMA : AUTORIZACION CONSULTA Y REPORTE EN CENTRALES DE RIESGO</strong>          Declaro que la informaci&oacute;n suministrada es ver&iacute;dica.&nbsp;Autorizo a Ortop&eacute;dicos Williamson y Williamson a consultar, reportar y suministrar informaci&oacute;n a Datacr&eacute;dito Experian sobre mi comportamiento comercial.<br>';
	    	}
	    	if(data[0]["tipo_persona"] == 1){
				tipoDoc += ' con c&eacute;dula de ciudadan&iacute;a No.';
				tipoDocFirma += 'C.C. :';
				convertirDato += convertir_cedula(data[0]["cedula_cli"]);         
	    	} else {
	    		tipoDoc += ' con  NIT';
	    		tipoDocFirma += 'NIT :';
	    		convertirDato += convertir_nit(data[0]["cedula_cli"]);
	    	}
	    	$('.convenio').html(cadena);
	    	$('#tipoDoc').html(tipoDoc);  
	    	$('#tipoDocFirma').html(tipoDocFirma);  
	    	$('.convertirDato').html(convertirDato); 
	    	$('#cuarta').html(cuarta); 
	    	$('#quinta').html(quinta);
	    	$('#sexta').html(sexta);
	    	$('#septima').html(septima);
	    	$('#octava').html(octava);
	    	$('#novena').html(novena);	
	    	$('#decima').html(decima);
	    	$('#undecima').html(undecima);
	    	$('.consecutivo').html(data[0]["consecutivo"]);
	    	$('.arrendador').html(data[0]["nombre_cliente"]);
	    	$('#ciudad').html(data[0]["nom_ciu"]);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga datos equipos
	function carga_equipos(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=listadoEquipos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	cadena = '';
	    	valor_total = 0;
	    	cadena += "<br>";
			cadena += "<br>";
			cadena += "<table width='771' height='28' border='1' class='titulosup04'>";
	    	if(data[0]["tipo_contrato"] == 1){
			    cadena += "<tr>";
			    cadena += "<td width='150'><strong><div align='center'>Articulo</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Fecha de entrega</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Fecha devolucion</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Valor Canon</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Valor deposito</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Valor total</div></strong></td>";
			    cadena += "</tr>";
			    for(i=0; i<data.length; i++){
			        valor_total    = valor_total + parseInt(data[i]['total_equipo']);
			    	cadena += '<tr>';
			        cadena += '<td width="150"><div align="center">' + data[i]['nom_clase'] + ' ' + data[i]['desc_tipo_equipos'] + '</div></td>';
			        cadena += '<td width="150"><div align="center">' + data[i]['fecha_ini_contrato'] + '</div></td>';
			        cadena += '<td width="150"><div align="center">' + data[i]['fecha_fin_contrato'] + '</div></td>';
			        cadena += '<td width="150"><div align="center">' + data[i]['canon_equipo'] + '</div></td>';
			        cadena += '<td width="150"><div align="center">' + data[i]['deposito_equipo'] + '</div></td>';
			        cadena += '<td width="150"><div align="center">' + data[i]['total_equipo'] + '</div></td>';
			        cadena += '</tr>';
			    }
				    cadena +=  '<tr>';
				    cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
				    cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
				    cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
				    cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
				    cadena +=  '<td width="150"><div align="center">Valor total alquiler</div></td>';
				    cadena +=  '<td width="150"><div align="center">' + valor_total + '</div></td>';
				    cadena +=  '</tr>';
				    cadena +=  '</table>';
	    	} else {
			    cadena += "<tr>";
			    cadena += "<td width='150'><strong><div align='center'>Articulo</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Fecha de entrega</div></strong></td>";
			    cadena += "<td width='150'><strong><div align='center'>Fecha devolucion</div></strong></td>";
			    cadena += "</tr>";
			    for(i=0; i<data.length; i++){
			        valor_total    = valor_total + parseInt(data[i]['total_equipo']);
			    	cadena += '<tr>';
			    	if(data[i]['clase_equipo'] == 5){
			    		cadena += '<td width="150"><div align="center">' + data[i]['nom_equipo'] + ' ' + data[i]['desc_tipo_equipos'] + '</div></td>';
			    	} else {
			    		cadena += '<td width="150"><div align="center">' + data[i]['nom_clase'] + ' ' + data[i]['desc_tipo_equipos'] + '</div></td>';
			    	}
			        cadena += '<td width="150"><div align="center">' + data[i]['fecha_ini_contrato'] + '</div></td>';
			        cadena += '<td width="150"><div align="center">' + data[i]['fecha_fin_contrato'] + '</div></td>';
			        cadena += '</tr>';
			    }
	    	}
	    	cadena += "</table>";
	    	$('#listaEquipos').html(cadena);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>