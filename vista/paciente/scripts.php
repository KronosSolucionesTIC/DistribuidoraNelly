<?php include "../transversales.php"; ?>
<?php include "scriptsAjax.php"; ?>
<script type="text/javascript">
 	//Funcion para el Datatable
    $(document).ready(function () {
        $('#tablaPaciente').DataTable(
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

    //Funcion boton crear paciente
	$("#btn_crear_paciente").click(function(){
		$("#pacienteModalLabel").text("Crear paciente");
		$("#btn_guardar_paciente").attr("data-accion","crear");
		$("#form_paciente")[0].reset();
		$("#btn_guardando").hide();
		limpiar_campos();
	});

	//Funcion guardar paciente
	$("#btn_guardar_paciente").click(function(){
		resultado = campos_incompletos('form_paciente');
		if(resultado == true){
			accion = $(this).attr('data-accion');
			if(accion == 'crear'){
				crea_paciente();
			}
			if(accion == 'editar'){
				edita_paciente();
			}
		}
	});

	//Funcion para editar
	$("[name*='btn_editar']").click(function(){
		id_paciente = $(this).attr('data-id-paciente');
		$("#pacienteModalLabel").text("Editar paciente");
		carga_paciente(id_paciente);
		$("#btn_guardar_paciente").attr("data-accion","editar");
		$("#btn_guardando").hide();
		limpiar_campos();
	});
</script>