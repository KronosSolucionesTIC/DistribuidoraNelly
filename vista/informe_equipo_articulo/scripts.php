<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
	//Ver
	$("#btn_ver").click(function(){
		campos_incompletos('form_informes');
		$("#informesModalLabel").text("Equipos alquilados");
		carga_informe($("#articulo").val());
	});

	//Funcion para imprimir
    $("#btn_imprimir").click(function(){
        printDiv('contenidoDetalle');
        return false;
    });
</script>