<script type="text/javascript">
	//Funcion para guardar el pago
	function crea_pago(){
		var formElement = document.getElementById("form_pago");
		formData = new FormData(formElement);
		formData.append("tipo", "inserta");

	  	$.ajax({
	  		url:  "../../controlador/ajaxPagoAdelantado.php",
	  		type: 'POST',
	  		data: formData,
	  		cache: false,
      		contentType: false,
      		processData: false,
	  		success:function(r){
	  			console.log(r);
	      		$("#btn_guardar_pago").hide();
	      		$("#btn_guardando").show();
	      		alertify.success('Creado correctamente');
		  		setTimeout('cargar_sitio("pagoModal")',1000);
			}
		}) 
	}

	//Funcion boton detalle
	$("[name*='btn_ver']").click(function(){
		id_factura = $(this).attr('data-id-factura');
		carga_empresa();
		carga_factura(id_factura);
 	});

	//Carga datos empresa
	function carga_empresa(){
	    $.ajax({
	        url: "../../controlador/ajaxPago.php",
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

	//Carga datos detalle
	function carga_factura(cod_fac){
	    $.ajax({
	        url: "../../controlador/ajaxPagoAdelantado.php",
	        data: "cod_fac="+cod_fac+"&tipo=factura",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	        $.each(data[0], function( key, value ) {
	        	formatear_campo(key, value);
	        });
	    	cadena = '';
	    	for (var i = 0; i < data.length; i++) {
	    		cadena += '<tr>';
				cadena += '<td class="textotabla1"><div>' + data[i]['consecutivo'] + '</div></td>';
				if(data[i]['nom_equipo'] != null){
					nom_equipo = data[i]['nom_equipo'];
				} else {
					nom_equipo = '';
				}
				cadena += '<td class="textotabla1"><div>' + data[i]['nom_clase'] + ' ' + nom_equipo + ' ' + data[i]['desc_tipo_equipos'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="center">' + data[i]['fecha_ini_pago'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="center">' + data[i]['fecha_fin_pago'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="right">' + data[i]['valor_pago'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="right">' + data[i]['valor_descuento'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="right">' + data[i]['valor_con_descuento'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="right">' + data[i]['valor_recibido'] + '</div></td>';
				cadena += '<td class="textotabla1"><div align="right">' + data[i]['saldo'] + '</div></td>';
				cadena += '</tr>';
	    	}
	    	$("#tablaFactura >tbody").html(cadena);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Formatea campo
	function formatear_campo(key, value){
		cadena = '';
		valor = 0;
		switch (key) {
		  case 'total_deuda':
	        convertido = convertir_cedula(value);
			$("."+key).html(convertido);
		    break;
		  case 'total_descuento':
	        convertido = convertir_cedula(value);
			$("."+key).html(convertido);
		    break;
		  case 'total_calculado':
	        convertido = convertir_cedula(value);
			$("."+key).html(convertido);
		    break;
		  case 'total_recibido':
	        convertido = convertir_cedula(value);
			$("."+key).html(convertido);
	        convertidoLetra = NumeroALetras(value);
			$("#total_recibido_letra").html(convertidoLetra);
		    break;
		  case 'total_saldo':
	        convertido = convertir_cedula(value);
			$("."+key).html(convertido);
			if(value >= 0){
				cadena += 'de deuda de (' + NumeroALetras(value) + ') $ (' + convertir_cedula(value) + ')';
				$("#saldo_texto").html(cadena);
			} else {
				valor = value * -1;
				cadena += 'a favor de (' + NumeroALetras(valor) + ') $ (' + convertir_cedula(valor) + '), a la fecha';
			}
		    break;
		  default:
		    $("."+key).html(value);
		    break;
		}
	}
</script>