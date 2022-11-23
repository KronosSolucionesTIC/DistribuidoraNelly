<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<?php include "scriptsSelects.php"; ?>
<?php include "scriptsEquipos.php"; ?>
<?php include "scriptsDetalle.php"; ?>
<?php include "scriptsAnexo.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaContrato').DataTable(
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

    //Funcion para limpiar tabla
    function limpiarTabla(){
        $('#clase').val('');
        $('#consecutivo').val('');
        $('#equipo').val('');
        $('#canon').val(0);
        $('#deposito').val(0);
        $('#total').val(0);
    }

    //Funcion boton crear contrato
	$("#btn_crear_contrato").click(function(){
		$("#contratoModalLabel").text("Crear contrato");
		$("#btn_guardar_contrato").attr("data-accion","crear");
		$("#form_contrato")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
        calculaNumero();
        $('#cod_paciente').empty();
        $('#cod_paciente').append(new Option('Seleccione un cliente...', 0));
        bloquearDesbloquearCampos(false);
        $('#tablaEquipos >tbody').html('');
 	});

	//Funcion guardar contrato
	$("#btn_guardar_contrato").click(function(){
		resultado = campos_incompletos('form_contrato');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_contrato();
			}
			if(accion == 'editar'){
				edita_contrato();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_contrato = $(this).attr('data-id-contrato');
		$("#contratoModalLabel").text("Editar contrato");
		carga_contrato(id_contrato);
        cargaEquipos(id_contrato);
		$("#btn_guardar_contrato").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
        bloquearDesbloquearCampos(true);
	});

    //Funcion para bloquear campos
    function bloquearDesbloquearCampos(parametro){
        $('#tipo_contrato').attr('disabled', parametro);
        $('#cod_cliente').attr('disabled', parametro);
        $('#cod_responsable').attr('disabled', parametro);
        $('#cod_paciente').attr('disabled', parametro);   
    }

    //Funcion para imprimir
    $("#btn_imprimir").click(function(){
        console.log('Entro a imprimir');
        printDiv('contenidoDetalle');
        return false;
    });

    //Funcion para imprimir
    $("#btn_imprimir_anexo").click(function(){
        console.log('Entro a imprimir');
        printDiv('contenidoAnexo');
        return false;
    });
</script>