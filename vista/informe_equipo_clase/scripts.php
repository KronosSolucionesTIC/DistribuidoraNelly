<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
	//Ver
	$("#btn_ver").click(function(){
		campos_incompletos('form_informes');
		$("#informesModalLabel").text("Equipos alquilados");
		total_alquilado($("#clase").val(), $("#tipo").val());
		total_libre($("#clase").val(), $("#tipo").val());
		total_mantenimiento($("#clase").val(), $("#tipo").val());
		total_baja($("#clase").val(), $("#tipo").val());
		total_equipos($("#clase").val(), $("#tipo").val());
	});

	//Funcion para imprimir
    $("#btn_imprimir").click(function(){
        printDiv('contenidoDetalle');
        return false;
    });

	//Funcion para imprimir factura
    $("#btn_imprimir_factura").click(function(){
        printDiv('contenidoFactura');
        return false;
    });

	//Funcion para select dependiente
    $("#clase").on('change', function () {
        $("#clase option:selected").each(function () {
            elegido=$(this).val();
            select_tipo(elegido);   
        });
   	});
</script>