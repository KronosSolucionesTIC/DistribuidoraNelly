<script type="text/javascript">
	//Carga el select de tipo
	function select_tipo(clase_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "clase_equipo="+clase_equipo+"&tipo=consultaTipo",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#tipo_equipo').empty();
	    	$('#tipo_equipo').append(new Option('Seleccione un tipo...', 0));
	    	for(i=0; i < data.length ; i++){
	    		$('#tipo_equipo').append(new Option(data[i]["desc_tipo_equipos"], data[i]["cod_tipo_equipos"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga el select de tamano
	function select_tamano(clase_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "clase_equipo="+clase_equipo+"&tipo=consultaTamano",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#tamano_equipo').empty();
	    	$('#tamano_equipo').append(new Option('Seleccione un tamaño...', 0));
	    	for(i=0; i < data.length ; i++){
	    		$('#tamano_equipo').append(new Option(data[i]["desc_tam_equipos"], data[i]["cod_tam_equipos"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga el select de parte
	function select_parte(clase_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "clase_equipo="+clase_equipo+"&tipo=consultaParte",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#cod_parte').empty();
	    	$('#cod_parte').append(new Option('Seleccione una parte...', ''));
	    	for(i=0; i < data.length ; i++){
	    		$('#cod_parte').append(new Option(data[i]["desc_partes"], data[i]["cod_partes"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga el select de tipo parte
	function select_tipo_parte(cod_parte){
	    $.ajax({
	        url: "../../controlador/ajaxEquipos.php",
	        data: "cod_parte="+cod_parte+"&tipo=consultaTipoParte",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	for(i=0; i < data.length ; i++){
	    		$('#cod_tipo_parte').append(new Option(data[i]["desc_tipo_partes"], data[i]["cod_tipo_partes"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>