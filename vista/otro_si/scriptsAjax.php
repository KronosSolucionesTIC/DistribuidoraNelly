<script type="text/javascript">
	//Carga datos empresa
	function carga_empresa(){
	    $.ajax({
	        url: "../../controlador/ajaxOtro_si.php",
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

	//Carga datos otro si
	function carga_otro_si(cod_otro_si){
		console.log('Entro a cargar otro si:'+cod_otro_si);
	    $.ajax({
	        url: "../../controlador/ajaxOtro_si.php",
	        data: "cod_otro_si="+cod_otro_si+"&tipo=otro_si",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	tipoDoc = '';
	    	convertirDato = '';
	    	tipoDocFirma = '';
	    	if(data[0]["tipo_persona"] == 2){
	        	tipoDoc = '</span><strong>nit<span class="titulosup04">';
	        	convertirDato += convertir_nit(data[0]["cedula_cli"]);  
	        	tipoDocFirma += 'NIT :';
	    	} else {
	    	    tipoDoc = '</span></strong>c&eacute;dula de ciudadan&iacute;a<span class="titulosup04">';
	        	convertirDato += convertir_cedula(data[0]["cedula_cli"]);  
	        	tipoDocFirma += 'C.C. :';  		
	    	}
	       	$(".tipoDoc").html(tipoDoc);
	       	$("#tipoDocFirma").html(tipoDocFirma);
	        $(".convertirDato").html(convertirDato); 
	        $("#cedulaPaciente").html(convertir_cedula(data[0]["cedula_pac"]));
	        $("#mesLetra").html(mesALetra(data[0]["mes"]));
	        $("#mesLetraOtroSi").html(mesALetra(data[0]["mes_otro_si"]));
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

	//Carga datos equipos
	function carga_equipos(cod_otro_si){
	    $.ajax({
	        url: "../../controlador/ajaxOtro_si.php",
	        data: "cod_otro_si="+cod_otro_si+"&tipo=listadoEquipos",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	cadena = '';
	    	valor = 0;
	    	valor_total = 0;
	    	cadena += "<br>";
			cadena += "<table width='771' height='28' border='1' class='titulosup04'>";
			cadena += "<tr>";
			cadena += "<td width='150'><strong><div align='center'>Articulo</div></strong></td>";
			cadena += "<td width='150'><strong><div align='center'>Descripción</div></strong></td>";
			cadena += "<td width='150'><strong><div align='center'>Fecha de entrega</div></strong></td>";
			cadena += "<td width='150'><strong><div align='center'>Fecha devolucion</div></strong></td>";
			cadena += "<td width='150'><strong><div align='center'>Valor Canon</div></strong></td>";
			cadena += "<td width='150'><strong><div align='center'>Valor deposito</div></strong></td>";
			cadena += "<td width='150'><strong><div align='center'>Valor total</div></strong></td>";
			cadena += "</tr>";
			    
			for(i=0; i<data.length; i++){
				valor = parseInt(data[i]['canon_arrend_equipo']) + parseInt(data[i]['valor_deposito']);
			    valor_total = valor_total + valor;
			 	cadena += '<tr>';
			    cadena += '<td width="150"><div align="center">' + data[i]['consecutivo_equipo'] + '</div></td>';
			    cadena += '<td width="150"><div align="center">' + data[i]['nom_clase'] + data[i]['nom_equipo'] + data[i]['desc_tipo_equipos'] + '</div></td>';
			    cadena += '<td width="150"><div align="center">' + data[i]['fecha_ini_contrato'] + '</div></td>';
			    cadena += '<td width="150"><div align="center">&nbsp;</div></td>';
			    cadena += '<td width="150"><div align="center">' + data[i]['canon_arrend_equipo'] + '</div></td>';
			    cadena += '<td width="150"><div align="center">' + data[i]['valor_deposito'] + '</div></td>';
			    cadena += '<td width="150"><div align="center">' + valor + '</div></td>';
			    cadena += '</tr>';
			}
				    
			cadena +=  '<tr>';
			cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
			cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
			cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
			cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
			cadena +=  '<td width="150"><div align="center">&nbsp;</div></td>';
			cadena +=  '<td width="150"><div align=center">Valor total alquiler</div></td>';
			cadena +=  '<td width="150"><div align="center">' + valor_total + '</div></td>';
			cadena +=  '</tr>';
			cadena +=  '</table>';
	    	$('#listaEquipos').html(cadena);
	    	$('#canonTotalLetra').html(NumeroALetras(data[0]["total_canon"]));
	    	$('#canonTotal').html(convertir_cedula(data[0]["total_canon"]));
	    	$('#depositoTotalLetra').html(NumeroALetras(data[0]["total_deposito"]));
	    	$('#depositoTotal').html(convertir_cedula(data[0]["total_deposito"]));
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
</script>