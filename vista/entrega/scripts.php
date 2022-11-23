<?php include "../transversales.php"; ?>
<?php include '../scriptsNumeroALetras.php'; ?>
<?php include "scriptsAjax.php"; ?>
<?php include "scriptsDetalle.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaEntrega').DataTable(
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

    //Funcion boton crear entrega
	$("#btn_crear_entrega").click(function(){
		$("#entregaModalLabel").text("Crear entrega");
		$("#btn_guardar_entrega").attr("data-accion","crear");
		$("#form_entrega")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

    //Funcion para select dependiente
    $("#cliente").on('change', function () {
        $("#cliente option:selected").each(function () {
            elegido=$(this).val();
            cargaSelects();
        });
    });

    //Funcion para los selects
    function cargaSelects(){
        $("#cliente option:selected").each(function () {
            elegido=$(this).val();
            $('#cod_contrato').empty();
            $('#cod_contrato').append(new Option('Seleccione un contrato...', 0));
            select_contrato(elegido, '');   
        });
    }
    
    //Funcion para select dependiente
    $("#cod_contrato").on('change', function () {
        $("#cod_contrato option:selected").each(function () {
            elegido=$(this).val();
            listado_equipos(elegido);
        });
    });

	//Funcion guardar entrega
	$("#btn_guardar_entrega").click(function(){
		resultado = campos_incompletos('form_entrega');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_entrega();
			}
		}
	});

    //Funcion boton detalle
    $("[name*='btn_ver']").click(function(){
        id_entrega = $(this).attr('data-id-entrega');
        carga_empresa();
        carga_entrega(id_entrega);
    });

    //Funciones en inputs
    function cargar_funciones(){
        //Funcion check pago entrega
        $('.seleccion').on( 'click', function() {
            console.log('Entro al clik');
            if($(this).is(':checked') ){
                $("#seleccionados").val(parseInt($("#seleccionados").val()) + 1); 
            } else {
                $("#seleccionados").val(parseInt($("#seleccionados").val()) - 1); 
            }
        });
    }
</script>