<?php include "../transversales.php"; ?>
<?php include '../scriptsNumeroALetras.php'; ?>
<?php include "scriptsAjax.php"; ?>
<?php include "scriptsPagos.php"; ?>
<?php include "scriptsGuardar.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaPagoAdelantado').DataTable(
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

    //Funcion boton crear pago
	$("#btn_crear_pago").click(function(){
		$("#pagoAdelantadoModalLabel").text("Crear pago adelantado");
		$("#btn_guardar_pago").attr("data-accion","crear");
		$("#form_pago")[0].reset();
        $("#tablaCuotas").html('');
		$("#btn_guardando").hide();
        $("#calcular_cuotas").attr('disabled',false);
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
            $('#contrato').empty();
            $('#contrato').append(new Option('Seleccione un contrato...', 0));
            select_contrato(elegido, '');   
        });
    }

    //Funcion para select dependiente
    $("#contrato").on('change', function () {
        $("#contrato option:selected").each(function () {
            elegido=$(this).val();
            valida_equipos(elegido);
            valida_saldo(elegido);
            valida_meses(elegido);
        });
    });

    //Calcula cuotas
    $("#calcular_cuotas").click(function(){
        resultado = campos_incompletos('form_pago');
        if(resultado == true){
            calcula_cuotas($('#contrato').val(), $('#valor').val());
        }
        $("#calcular_cuotas").attr('disabled',true);
        return false;
    });

    //Funcion mes a letra
    function mesALetra(mes){
        switch(mes) {
          case '1': return 'Enero'; break;
          case '2': return 'Febrero'; break;
          case '3': return 'Marzo'; break;
          case '4': return 'Abril'; break;
          case '5': return 'Mayo'; break;
          case '6': return 'Junio'; break;
          case '7': return 'Julio'; break;
          case '8': return 'Agosto'; break;
          case '9': return 'Septiembre'; break;
          case '10': return 'Octubre'; break;
          case '11': return 'Noviembre'; break;
          case '12': return 'Diciembre'; break;
          default: return 'No existe mes';
        }
    }

    //Funciones en inputs
    function cargar_funciones(){
        $("#valor_pago").keypress(function(){
            $("#saldo_pago").val('Click para calcular saldo');
        });

        $("#descuento").keypress(function(){
            $("#saldo_pago").val('Click para calcular saldo');
        });

        $("#saldo_pago").click(function(){
            calcula_saldo();
        });

        //Funcion check pago entrega
        $('#pagoEntrega').on( 'click', function() {
            if($(this).is(':checked') ){
                calcula_entrega();
            } else {
                retorna_entrega();
            }
        });
    }
</script>