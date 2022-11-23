<?php include "../transversales.php"; ?>
<script type="text/javascript">
    //Funcion para calcular pagos atrasados
    function listaContratos(){
        $.ajax({
            url: "../../controlador/ajaxInformes.php",
            data: "tipo=listaContratos",
            dataType: 'json'
        })
        .done(function(data) {
            for(var i = 0; i < data.length; i++) {
                pagosAtrasados(data[i]["cod_calc"]);
            }
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }

    //Inserta los pagos
    function pagosAtrasados(cod_contrato){
        $.ajax({
            url: "../../controlador/ajaxInformes.php",
            data: "cod_contrato="+cod_contrato+"&tipo=pagosAtrasados",
            dataType: 'json'
        })
        .done(function(data) {
            console.log(data);   
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
        printDiv('contenidoDetalle');
        return false;
    });
</script>