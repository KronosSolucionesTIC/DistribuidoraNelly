<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<?php include "scriptsEquipo.php"; ?>
<?php include "scriptsGeneral.php"; ?>
<?php include "scriptsModal.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaEquipo').DataTable(
        	{
                "pagingType": "full_numbers",
                "lengthMenu": [[ 10, 25, 50, -1], [ 10, 25, 50, "Todos" ]],
                "language": {
                    "lengthMenu":     "Mostrando _MENU_ registros",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "search":         "Buscar:",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "zeroRecords": "No hay registros que coincidan.",
                    "infoEmpty": "No se encuentran registros.",
                    "infoFiltered":   "(Filtrando _MAX_ registros en total)",
                    "paginate": {
                        "first":      "<--",
                        "last":       "-->",
                        "next":       ">",
                        "previous":   "<"
                    },
                    "aria": {
                        "sortAscending":  ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    },
                },
                "order": []
            }
        );
    });

	//Funcion para select dependiente
    $("#clase_equipo").on('change', function () {
        cargaSelects();
   	});

	//Funcion para select dependiente
    $("#cod_parte").on('change', function () {
        $("#cod_parte option:selected").each(function () {
            elegido=$(this).val();
	    	$('#cod_tipo_parte').empty();
	    	$('#cod_tipo_parte').append(new Option('Seleccione una parte...', ''));
            select_tipo_parte(elegido);
        });
   	});

    //Funcion guardar equipo
    $("#btn_guardar_equipo").click(function(){      
        resultado = campos_incompletos('form_equipo');
        if(resultado == true){
            accion = $(this).attr('data-accion');
            if(accion == 'crear'){
                crea_equipo();
            }
            if(accion == 'editar'){
                edita_equipo();
            }
        }
    });

    //Funcion para los selects
    function cargaSelects(){
        $("#clase_equipo option:selected").each(function () {
            elegido=$(this).val();
            select_tipo(elegido);   
            select_tamano(elegido); 
            select_parte(elegido);
        });
    }

    //Funcion cargar inventario
    $("[name*='btn_ver']").click(function(){
        id_equipo = $(this).attr('data-id-equipo');
        console.log(id_equipo);
        cargaEquipo(id_equipo);
        cargaPartes(id_equipo);
        cargaGarantia(id_equipo);
        cargaEmpresa(id_equipo);
    });

    //Funcion para imprimir
    $("#btn_imprimir").click(function(){
        console.log('Entro a imprimir');
        printDiv('contenidoInventario');
        return false;
    });
</script>