<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaResponsable').DataTable(
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
    $("#tipo_persona").on('change', function () {
        $("#tipo_persona option:selected").each(function () {
            elegido=$(this).val();
            mostrarOcultarDiv(elegido);
            ponerRequeridos(elegido);
        });
   	});

   	//Funcion para ocultar/mostrar div
   	function mostrarOcultarDiv(tipo){
   		if(tipo == 1){
   			$("#divJuridica").hide();
   			$("#divNatural").show();
   			$("#btn_guardar_responsable").attr("data-accion","crear-natural");
   		} else {
   			$("#divNatural").hide();
			$("#divJuridica").show();	
			$("#btn_guardar_responsable").attr("data-accion","crear-juridica");	
   		}
   	}

   	//Funcion para ocultarDivs
   	function ocultarDivs(){
   	   	$("#divJuridica").hide();
   		$("#divNatural").hide();	
   	}

   	//Funcion para los requeridos
   	function ponerRequeridos(tipo){
   		if(tipo == 1){
   			$("#nom1_cli").prop('required', true);
   			$("#apel1_cli").prop('required', true);
   			$("#cedula_cli").prop('required', true);
   			$("#direccion_cli").prop('required', true);
   			$("#telefono_cli").prop('required', true);
   			$("#email_cli").prop('required', true);
   			quitarRequeridos(tipo);
   		} else {
			$("#nit_jur").prop('required', true);
			$("#rsocial_jur").prop('required', true);
			$("#cedula_representante").prop('required', true);
			quitarRequeridos(tipo);
   		}
   	}

   	//Funcion para quitar todos los required
   	function quitarRequeridos(tipo){
   		if(tipo == 2){
   			$("#nom1_cli").prop('required', false);
   			$("#apel1_cli").prop('required', false);
   			$("#cedula_cli").prop('required', false);
   			$("#direccion_cli").prop('required', false);
   			$("#telefono_cli").prop('required', false);
   			$("#email_cli").prop('required', false);
   		} else {
			$("#nit_jur").prop('required', false);
			$("#rsocial_jur").prop('required', false);
			$("#cedula_representante").prop('required', false);
   		}
   	}

    //Funcion boton crear responsable
	$("#btn_crear_responsable").click(function(){
		$("#tipo_persona").attr("disabled", false);
		ocultarDivs();
		$("#responsableModalLabel").text("Crear responsable");
		$("#form_responsable")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar responsable
	$("#btn_guardar_responsable").click(function(){
		resultado = campos_incompletos('form_responsable');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear-natural'){
				crea_responsable_natural();
			}
			if(accion == 'crear-juridica'){
				crea_responsable_juridica();
			}
			if(accion == 'editar-natural'){
				edita_responsable_natural();
			}
			if(accion == 'editar-juridica'){
				edita_responsable_juridica();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_responsable = $(this).attr('data-id-responsable');
		$("#responsableModalLabel").text("Editar responsable");
		$("#form_responsable")[0].reset();
		carga_responsable(id_responsable);
		$("#tipo_persona").attr("disabled", true);
		$("#btn_guardar_responsable").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion para mostrar div
	function mostrarDiv(div){
		$("#"+div).show();
	}

	//Funcion para ocultar div
	function ocultarDiv(div){
		$("#"+div).hide();
	}
</script>