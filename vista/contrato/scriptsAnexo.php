<script type="text/javascript">
	//Funcion boton anexo
	$("[name*='btn_anexo']").click(function(){
		$("#anexoModalLabel").text("Hoja de entrega");
		id_contrato = $(this).attr('data-id-contrato');
		carga_empresa();
		carga_anexo(id_contrato);
 	});

	//Carga datos anexo
	function carga_anexo(cod_contrato){
	    $.ajax({
	        url: "../../controlador/ajaxContrato.php",
	        data: "cod_contrato="+cod_contrato+"&tipo=anexo",
	        dataType: 'json'
	    })
	    .done(function(data) {
	    	cadena = '';
	    	cod_equipo = '';
	    	convenio = '';
	    	$('#nombre_cliente').html(data[0]["nombre_cliente"]);
	    	$('#nombre_paciente').html(data[0]["nombre_paciente"]);
	    	$('#cedula_cli').html(data[0]["cedula_cli"]);
	    	$('#cedula_pac').html(data[0]["cedula_pac"]);
	    	$('#direccion_cli').html(data[0]["direccion_cli"]);
	    	$('#direccion_pac').html(data[0]["direccion_pac"]);
	    	$('#telefono_cli').html(data[0]["telefono_cli"]);
	    	$('#telefono_pac').html(data[0]["telefono_pac"]);
	    	$('#celular_cli').html(data[0]["celular_cli"]);
	    	$('#celular_pac').html(data[0]["celular_pac"]);

	    	if(data[0]["tipo_contrato"] == 2){
	    		convenio += ' CONVENIO ' + $.trim(data[0]["nombre_cliente"]);
	    	}
	    	$('.convenio').html(convenio);
	    	$('.consecutivo').html(data[0]["consecutivo"]);

	    	for(i=0; i<data.length; i++){
	    		if(cod_equipo != data[i]['cod_equipo']){
	    			if(cod_equipo != ''){
	    				cadena += '</table>';
	    			}
	    			cadena += '<table width="82%" border="1" cellpadding="1" cellspacing="1" bordercolor="#333333" class="table table-bordered border-dark">';
	    			cadena += '<tr>';
					cadena += '<td colspan="4" class="text-center"><strong>' + data[i]['nom_clase'] + ' ' + data[i]['desc_tipo_equipos'] + ' No ' + data[i]['consecutivo_equipo'] + '</strong></td>';
					cadena += '</tr>';
					cadena += '<tr>';
	            	cadena += '<td width="118" style="border:1px;"><div align="center"><strong>PARTE</strong></div></td>';
	           		cadena += '<td width="144" style="border:1px;"><div align="center"><strong>ENTREGA</strong></div></td>';
	            	cadena += '<td width="133" style="border:1px;"><div align="center"><strong>RECIBE</strong></div></td>';
					cadena += '<td width="133" style="border:1px;"><div align="center"><strong>OBSERVACIONES</strong></div></td>';
	          		cadena += '</tr>';
	    		}
				cadena += '<tr>';
				cadena += '<td>' + data[i]['desc_partes'] + '</td>';
				cadena += '<td>&nbsp;</td>';
				cadena += '<td>&nbsp;</td>';
				cadena += '<td>&nbsp;</td>';
				cadena += '</tr>';
				cod_equipo = data[i]['cod_equipo'];
	    	}
	    	$('#equipos').html(cadena);
	    })
	    .fail(function(data) {
	        console.log(data);
	    })
	    .always(function(data) {
	        console.log(data);
	    });
	};
 </script>