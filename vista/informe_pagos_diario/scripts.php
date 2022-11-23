<?php include "../transversales.php"; ?>
<?php include '../scriptsNumeroALetras.php'; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
	//Ver
	$("#btn_ver").click(function(){
		campos_incompletos('form_informes');
		$("#informesModalLabel").text("Pagos diario");
		carga_informe($("#fecha_inicial").val(), $("#fecha_final").val());
	});

	//Funcion para imprimir
    $("#btn_imprimir").click(function(){
        printDiv('contenidoInforme');
        return false;
    });

	//Funcion para imprimir detalle
    $("#btn_imprimir_detalle").click(function(){
        printDiv('contenidoDetalle');
        return false;
    });

	//Funcion para imprimir factura
    $("#btn_imprimir_factura").click(function(){
        printDiv('contenidoFactura');
        return false;
    });

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