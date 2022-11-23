<script type="text/javascript">
	//Carga datos entrega
    function carga_entrega(cod_entrega){
        $.ajax({
            url: "../../controlador/ajaxEntrega.php",
            data: "cod_entrega="+cod_entrega+"&tipo=entrega",
            dataType: 'json'
        })
        .done(function(data) {
            $.each(data[0], function( key, value ) {
              $("."+key).html(value);
            });
          	cadena = '<thead>';
			cadena += '<th width="200"><strong><div align="center">Articulo</div></strong></th>';
           	cadena += '<th width="200"><strong><div align="center">Descripcion</div></strong></th>';
           	cadena += '<th width="200"><strong><div align="center">Fecha de entrega</div></strong></th>';
          	cadena += '</thead>';
            for(i=0; i < data.length; i++){	
				cadena += '<tr>';
				cadena += '<td width="200"><div align="center">'+ data[i]['consecutivo_equipo'] +'</div></td>';
				if (data[i]['cod_clase'] == 5){
           			cadena += '<td width="200"><div align="center">'+ data[i]['nom_clase'] +' '+ data[i]['nom_equipo'] +' '+ data[i]['desc_tipo_equipos'] +'</div></td>';
				} else {
					cadena += '<td width="200"><div align="center">'+ data[i]['nom_clase'] +' '+ data[i]['desc_tipo_equipos'] +'</div></td>';
				}
           		cadena += '<td width="200"><div align="center">'+ data[i]['fecha_entrega'] +'</div></td>';
          		cadena += '</tr>';
			}
			$('#saldoLetra').html(NumeroALetras(data[0]['saldo_deuda']));
			$('#saldo_deuda').html(convertir_cedula(data[0]['saldo_deuda']));
	    	if(data[0]["tipo_persona"] == 1){
				tipoDocFirma = 'C.C. :';
				convertirDato = convertir_cedula(data[0]["cedula_cli"]);         
	    	} else {
	    		tipoDocFirma = 'NIT :';
	    		convertirDato = convertir_nit(data[0]["cedula_cli"]);
	    	}
	    	$('#tipoDocFirma').html(tipoDocFirma);  
	    	$('.convertirDato').html(convertirDato); 
			$('#tablaDetalle').html(cadena);
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    };

    //Funcion para imprimir
    $("#btn_imprimir").click(function(){
        console.log('Entro a imprimir');
        printDiv('contenidoDetalle');
        return false;
    });
</script>