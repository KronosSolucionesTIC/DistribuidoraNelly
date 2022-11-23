<script type="text/javascript">
	//Alquilados
	function total_alquilado(cod_clase, cod_tipo){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_clase="+cod_clase+"&cod_tipo="+cod_tipo+"&tipo=total_alquilado",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	boton = '<br><button type="button" class="btn btn-primary text-center" name="btn_detalles" data-clase="'+ cod_clase +'" data-tipo="'+ cod_tipo +'" data-estado="1" data-bs-target="#detalleModal" data-bs-toggle="modal">Ver detalles</button>';
			$('.equipo').html(data[0]['equipo']);
			$('.alquilado').html(data[0]['total_alquilado'] + boton);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Libre
	function total_libre(cod_clase, cod_tipo){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_clase="+cod_clase+"&cod_tipo="+cod_tipo+"&tipo=total_libre",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	boton = '<br><button type="button" class="btn btn-primary text-center" name="btn_detalles" data-clase="'+ cod_clase +'" data-tipo="'+ cod_tipo +'" data-estado="2" data-bs-target="#detalleModal" data-bs-toggle="modal">Ver detalles</button>';
			$('.libre').html(data[0]['total_libre'] + boton);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Mantenimiento
	function total_mantenimiento(cod_clase, cod_tipo){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_clase="+cod_clase+"&cod_tipo="+cod_tipo+"&tipo=total_mantenimiento",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	boton = '<br><button type="button" class="btn btn-primary text-center" name="btn_detalles" data-clase="'+ cod_clase +'" data-tipo="'+ cod_tipo +'" data-estado="3" data-bs-target="#detalleModal" data-bs-toggle="modal">Ver detalles</button>';
			$('.mantenimiento').html(data[0]['total_mantenimiento'] + boton);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Baja
	function total_baja(cod_clase, cod_tipo){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_clase="+cod_clase+"&cod_tipo="+cod_tipo+"&tipo=total_baja",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	boton = '<br><button type="button" class="btn btn-primary text-center" name="btn_detalles" data-clase="'+ cod_clase +'" data-tipo="'+ cod_tipo +'" data-estado="4" data-bs-target="#detalleModal" data-bs-toggle="modal">Ver detalles</button>';
			$('.baja').html(data[0]['total_baja'] + boton);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Total
	function total_equipos(cod_clase, cod_tipo){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_clase="+cod_clase+"&cod_tipo="+cod_tipo+"&tipo=total_equipos",
	        dataType: 'json'
	    })
	    .done(function(data) {
			$('.total').html(data[0]['total_equipos']);
			cargar_funciones();
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga el select de tipo
	function select_tipo(clase_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "clase_equipo="+clase_equipo+"&tipo=consultaTipo",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#tipo').empty();
	    	$('#tipo').append(new Option('Seleccione un tipo...', 0));
	    	for(i=0; i < data.length ; i++){
	    		$('#tipo').append(new Option(data[i]["desc_tipo_equipos"], data[i]["cod_tipo_equipos"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Detalle
	function carga_detalle(cod_clase, cod_tipo, estado){
	    $.ajax({
	        url: "../../controlador/ajaxInformes.php",
	        data: "cod_clase="+cod_clase+"&cod_tipo="+cod_tipo+"&estado="+estado+"&tipo=detalle",
	        dataType: 'json'
	    })
	    .done(function(data) {
			cadena = '<thead class="bg-dark text-white">';
            cadena += '<th class="text-center">Contrato</th>';
            cadena += '<th class="text-center">Articulo</th>';
            cadena += '<th class="text-center">Descripción</th>';
            cadena += '<th class="text-center">Cliente</th>';
            cadena += '<th class="text-center">Fecha entrega</th>';
            cadena += '<th class="text-center">Fecha devolución</th>';
            cadena += '</thead>';
            for(i=0; i<data.length; i++){
				cadena += '<tr>';
				if(data[i]['consecutivo'] != null) {
					cadena += '<td>'+  data[i]['consecutivo'] +'</td>';
				} else {
					cadena += '<td></td>';
				}
				if(data[i]['consecutivo_equipo'] != null) {
					cadena += '<td>'+  data[i]['consecutivo_equipo'] +'</td>';
				} else {
					cadena += '<td></td>';
				}				
				if(data[i]['nom_equipo'] != null){
					nom_equipo = data[i]['nom_equipo'];
				} else {
					nom_equipo = '';
				}
				cadena += '<td>'+ data[i]['nom_clase'] + ' ' + nom_equipo + ' ' + data[i]['desc_tipo_equipos'] +'</td>';
				if(data[i]['nombre_cliente'] != null){
					cadena += '<td>'+  data[i]['nombre_cliente'] +'</td>';
				} else {
					cadena += '<td></td>';
				}
				if(data[i]['fecha_ini_contrato'] != null){
					cadena += '<td>'+  data[i]['fecha_ini_contrato'] +'</td>';
				} else {
					cadena += '<td></td>';
				}
				if(data[i]['fecha_fin_contrato'] != null){
					cadena += '<td>'+  data[i]['fecha_fin_contrato'] +'</td>';
				} else {
					cadena += '<td></td>';
				}
				cadena += '</tr>';
            }
            $('#tablaDetalle').html(cadena);
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
			clase = $(this).attr('data-clase');
			tipo = $(this).attr('data-tipo');
			estado = $(this).attr('data-estado');
			carga_detalle(clase, tipo, estado);
		});
	}
</script>