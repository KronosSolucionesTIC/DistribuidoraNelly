<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
	//Ver
	$("#btn_ver").click(function(){
		campos_incompletos('form_informes');
		$("#informesModalLabel").text("Informe equipos por estado - " + $('#estado option:selected').text());
		carga_informe($("#estado").val());
	});

	//Funcion para imprimir
    $("#btn_imprimir").click(function(){
        printDiv('contenidoDetalle');
        return false;
    });
</script>