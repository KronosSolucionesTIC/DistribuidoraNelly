<script type="text/javascript">
	//Carga el select de paciente
	function select_paciente(cod_cliente, seleccionado){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_cliente="+cod_cliente+"&tipo=consultaPaciente",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	for(i=0; i < data.length ; i++){
	    		$('#cod_paciente').append(new Option(data[i]["nombre"], data[i]["cod_pac"]));
	    	}
	    	if(seleccionado != ''){
	    		$("#cod_paciente option[value=" + seleccionado + "]").attr("selected",true);
	    	}	    	
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga el select de consecutivo
	function select_consecutivo(cod_clase){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_clase="+cod_clase+"&tipo=consultaConsecutivo",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#equipo').empty();
	    	$('#equipo').append(new Option('Seleccione una clase...', 0));
	    	for(i=0; i < data.length ; i++){
	    		$('#equipo').append(new Option(data[i]["equipo"], data[i]["cod_equipo"]))
	    	}
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Carga valores
	function carga_valores(cod_equipo){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_equipo="+cod_equipo+"&tipo=consultaValores",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	total = 0;
	    	total = parseInt(data[0]["canon_arrend_equipo"]) + parseInt(data[0]["valor_deposito"]);
	    	$('#canon').val(data[0]["canon_arrend_equipo"]);
	    	$('#deposito').val(data[0]["valor_deposito"]);
	    	$('#total').val(data[0]["canon_arrend_equipo"]);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

	//Calcula numero contrato
	function calculaNumero(){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "tipo=consultaNumero",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	$('#divNumero').html('<strong>No de contrato: ' + data[0]["numero"] + '</strong>');
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};

   	//Funcion para select dependiente
    $("#tipo_contrato").on('change', function () {
        $("#tipo_contrato option:selected").each(function () {
            elegido=$(this).val();
            bloquearDesbloquearSelect(elegido);
        });
   	});
</script>