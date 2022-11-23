<script type="text/javascript">
	//Informe
	function carga_informe(fecha_inicial, fecha_final){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "fecha_inicial="+fecha_inicial+"&fecha_final="+fecha_final+"&tipo=informe_pagos_diario",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	console.log(data);
	    	cadena = '<thead class="bg-dark text-white text-center">';
	    	cadena += '<th>Fecha</th>';
	    	cadena += '<th>Total</th>';
	    	cadena += '<th>Detalle</th>';
	    	cadena += '</thead>';
			for(i=0; i<data.length; i++){
				cadena += '<tr>';
				cadena += '<td style="text-align:center;">'+ data[i]['fech_factura'] +'</td>';
				cadena += '<td style="text-align:right;">$ '+ convertir_cedula(data[i]['total_factura']) +'</td>';
				cadena += '<td style="text-align:center;"><button name="btn_detalles" data-fecha="'+ data[i]['fech_factura'] +'" class="btn btn-primary" data-bs-target="#detalleModal" data-bs-toggle="modal"> Ver detalle</button></td>';
				cadena += '</tr>';
			}
			$('#tablaInforme').html(cadena);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	function cargar_funciones(){
   		//Detalle
		$("[name*='btn_detalles']").click(function(){
			fecha = $(this).attr('data-fecha');
			carga_detalle(fecha);
		});

		//Factura
		$("[name*='btn_factura']").click(function(){
			factura = $(this).attr('data-factura');
			console.log(factura);
			carga_empresa();
			carga_factura(factura);
	 	});
	}

	//Detalle
	function carga_detalle(fecha){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "fecha="+fecha+"&tipo=detallePago",
	        dataType: 'json'
	    })
	    .done(function(data) {
			cadena = '<thead class="bg-dark text-white">';
            cadena += '<th style="text-align:center;">No factura</th>';
            cadena += '<th style="text-align:center;">Fecha factura</th>';
            cadena += '<th style="text-align:center;">Total factura</th>';
            cadena += '<th style="text-align:center;">Cliente</th>';
            cadena += '<th style="text-align:center;">Forma de pago</th>';
            cadena += '<th style="text-align:center;">Ver factura</th>';
            cadena += '</thead>';
            for(i=0; i<data.length; i++){
				cadena += '<tr>';
					cadena += '<td style="text-align:center;">'+  data[i]['cod_fac'] +'</td>';
					cadena += '<td style="text-align:center;">'+  data[i]['fech_factura'] +'</td>';
					cadena += '<td style="text-align:center;">$ '+ convertir_cedula(data[i]['total_factura']) +'</td>';
					cadena += '<td style="text-align:center;">'+  data[i]['nombre_cliente'] +'</td>';
					cadena += '<td style="text-align:center;">'+  data[i]['desc_tipo_pago'] +'</td>';
					cadena += '<td style="text-align:center;"><button name="btn_factura" data-factura="'+ data[i]['cod_fac'] +'" class="btn btn-primary" data-bs-target="#facturaModal" data-bs-toggle="modal"> Ver factura</button></td>';
					cadena += '<td></td>';	
				cadena += '</tr>';
            }
            $('#tablaDetalle').html(cadena);
            cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga datos empresa
	function carga_empresa(){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
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
	        url: "../../controlador/ajaxInformes.php",
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
				cadena += '<td class="textotabla1"><div align="center">' + data[i]['consecutivo'] + '</div></td>';
				if(data[i]['nom_equipo'] != null){
					nom_equipo = data[i]['nom_equipo'];
				} else {
					nom_equipo = '';
				}
				cadena += '<td class="textotabla1"><div align="center">' + data[i]['nom_clase'] + ' ' + nom_equipo + ' ' + data[i]['desc_tipo_equipos'] + '</div></td>';
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
</script>